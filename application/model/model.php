<?php

class Model {

    /**
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    public function checkToken($username, $email, $token) {

        $varMD5 = md5($username . $email);

        if (!($varMD5 == $token)) {
            $_SESSION['username'] = '';
            $_SESSION['email'] = '';
            $_SESSION['token'] = '';
        }
    }

    public function changeNewUsername($Newusername, $Oldusername) {
        $sql = "UPDATE Member SET username = '$Newusername' WHERE username = '$Oldusername'";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function addNewPassword($password, $Email) {
        $sql = "UPDATE Member SET password = '$password' WHERE memberEmail = '$Email'";
        $query = $this->db->prepare($sql);


        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute();
    }

    function console_log($data) {
        echo '<script>';
        echo 'console.log(' . json_encode($data) . ')';
        echo '</script>';
    }

    public function addUser($username, $email, $password) {
        $salt = "djskdjd1434JFFFFAF23";
        $password = $_POST["password"] . $salt;
        $passwordEncrypt = md5($password);

        $sql = "INSERT INTO Member (username, memberEmail, password, firstLogin) VALUES (:username, :email , :password, :datetime)";
        $query = $this->db->prepare($sql);
        $parameters = array(':username' => $username, ':email' => $email, ':password' => $passwordEncrypt, ':datetime' => date("Y-m-d H:i:s"));

        $query->execute($parameters);
    }

    public function getUser($email) {
        $sql = "SELECT * FROM Member WHERE memberEmail = :email";
        $query = $this->db->prepare($sql);
        $parameters = array(':email' => $email);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function checkUsername($username) {
        $sql = "SELECT username FROM Member WHERE username = :username";
        $query = $this->db->prepare($sql);
        $parameters = array('username' => $username);

        $query->execute($parameters);

        return $query->fetch();
    }

    public function timeline() {
        $timelineVar = $this->timelineFilter();

        $url = 'https://api.pandascore.co' . $timelineVar . '?page[number]=1&token=' . PANDASCORE_TOKEN;

        $json = file_get_contents($url);
        $timeline_array = json_decode($json, true);

        return $timeline_array;
    }

    /**
     * Get all upcoming/running/past matches data.
     */
    public function timelineFilter() {
        $timelineVar = null;
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        if (strpos($url, 'running') !== false) {
            $timelineVar = '/matches/running';
        } elseif (strpos($url, 'past') !== false) {
            $timelineVar = '/matches/past';
        } else {
            $timelineVar = '/matches/upcoming';
        }

        return $timelineVar;
    }

    /**
     * Get all tournaments data.
     */
    public function getTournaments() {

        $url = 'https://api.pandascore.co/tournaments?page[number]=1&token=' . PANDASCORE_TOKEN;
        $json = file_get_contents($url);
        $timeline_array = json_decode($json, true);

        return $timeline_array;
    }

    /**
     * Get all Player data.
     */
    public function getPlayers() {
        $playerVar = $this->playerFilter();

        $url = 'https://api.pandascore.co/players?' . $playerVar . 'page[size]=80&token=' . PANDASCORE_TOKEN;
        $json = file_get_contents($url);
        $timeline_array = json_decode($json, true);

        return $timeline_array;
    }

    public function getPlayersFromDb()
    {
        // gets all the items from the database Streamer table
        $sql = "SELECT * FROM Teams";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function sendPlayers2Db($playersWeb)
    {
        // checks the getStreamersID() function
        $playersDb = $this->getPlayersFromDb();


        // if not empty, try to update. if empty, just insert all of it
        if (!empty($playersDb)) {
            // variables for counting the json and database items
            $counterPlayersDb = 0;
            $counterPlayersWeb = 0;

            // counts the database items
            foreach ($playersDb as $playerDb) {
                $counterPlayersDb++;
            }
            // two foreach loops, one for getting all the json items and another to get all the database items
            foreach ($playersWeb as $key => $playerWeb) {

                // if its the pandascore api
                foreach ($playersDb as $playerDb) {

                    // json item equals database item, update the current information about the players
                    if ($playerDb->playerID == $playerWeb['id']) {
                        $sql = "UPDATE Teams SET playerName = :playerName, playerFirstName = :playerFirstName, playerLastName = :playerLastName, 
                              playerTeamID = :playerTeamID, playerTeamName = :playerTeamName, playerTeamImage = :playerTeamImage, playerGame = :playerGame, 
                              playerImage = :playerImage, playerHometown = :playerHometown WHERE playerID = :playerID";
                        $query = $this->db->prepare($sql);

                        $parameters = array(':playerID' => $playerWeb['id'], ':playerName' => $playerWeb['name'], ':playerFirstName' => $playerWeb['first_name'], ':playerLastName' => $playerWeb['last_name'],
                            ':playerTeamID' => $playerWeb['current_team']['id'], ':playerTeamName' => $playerWeb['current_team']['name'], ':playerTeamImage' => $playerWeb['current_team']['image_url'],
                            ':playerGame' => $playerWeb['current_videogame']['name'], ':playerImage' => $playerWeb['image_url'], ':playerHometown' => $playerWeb['hometown']);

                        $query->execute($parameters);


                        // be done with this item and start with the next
                        continue;
                    }

                    $counterPlayersWeb++;

                    //if the amount of items checked with the database is the same amount of items checked with json, then dont update but insert as a new item
                    if ($counterPlayersWeb == $counterPlayersDb) {

                        $sql = "INSERT INTO Teams (playerID, playerName, playerFirstName, playerLastName, playerTeamID, playerTeamName, playerTeamImage, playerGame, playerImage, playerHometown) VALUES 
                            (:playerID, :playerName, :playerFirstName, :playerLastName, :playerTeamID, :playerTeamName, :playerTeamImage, :playerGame, :playerImage, :playerHometown)";
                        $query = $this->db->prepare($sql);
                        $parameters = array(':playerID' => $playerWeb['id'], ':playerName' => $playerWeb['name'], ':playerFirstName' => $playerWeb['first_name'], ':playerLastName' => $playerWeb['last_name'],
                            ':playerTeamID' => $playerWeb['current_team']['id'], ':playerTeamName' => $playerWeb['current_team']['name'], ':playerTeamImage' => $playerWeb['current_team']['image_url'],
                            ':playerGame' => $playerWeb['current_videogame']['name'], ':playerImage' => $playerWeb['image_url'], ':playerHometown' => $playerWeb['hometown']);

                        $query->execute($parameters);
                    }

                }
                // reset counter
                $counterPlayersWeb = 0;
            }
        } else { // do this when database is empty
            foreach ($playersWeb as $key => $playerWeb) {

                $sql = "INSERT INTO Teams (playerID, playerName, playerFirstName, playerLastName, playerTeamID, playerTeamName, playerTeamImage, playerGame, playerImage, playerHometown) VALUES 
                            (:playerID, :playerName, :playerFirstName, :playerLastName, :playerTeamID, :playerTeamName, :playerTeamImage, :playerGame, :playerImage, :playerHometown)";
                $query = $this->db->prepare($sql);
                $parameters = array(':playerID' => $playerWeb['id'], ':playerName' => $playerWeb['name'], ':playerFirstName' => $playerWeb['first_name'], ':playerLastName' => $playerWeb['last_name'],
                    ':playerTeamID' => $playerWeb['current_team']['id'], ':playerTeamName' => $playerWeb['current_team']['name'], ':playerTeamImage' => $playerWeb['current_team']['image_url'],
                    ':playerGame' => $playerWeb['current_videogame']['name'], ':playerImage' => $playerWeb['image_url'], ':playerHometown' => $playerWeb['hometown']);

                $query->execute($parameters);
            }
        }
    }

    public function getTeams()
    {
        // checks the getStreamersID() function
        $playersDb = $this->getPlayersFromDb();
        $teamArray = array();
        $teamsCheck = array();

        $counterPlayersDb = 0;

        // counts the database items
        foreach ($playersDb as $playerDb) {
            $counterPlayersDb++;
        }

        foreach ($playersDb as $playerDb) {
            if (!in_array($playerDb->playerTeamID, $teamsCheck, true)) {
                array_push($teamsCheck, $playerDb->playerTeamID);
            }
        }

        if (!empty($playersDb)) {
            $counter = 0;
            foreach ($playersDb as $key => $playerDb) {
                if (($playerDb->playerTeamID) != null) {

                    $teamArray[$playerDb->playerTeamID][] = array(
                        "playerID" => $playerDb->playerID, array(
                            "playerName" => $playerDb->playerName,
                            "playerFirstName" => $playerDb->playerFirstName,
                            "playerLastName" => $playerDb->playerLastName,
                            "playerTeamID" => $playerDb->playerTeamID,
                            "playerTeamName" => $playerDb->playerTeamName,
                            "playerTeamImage" => $playerDb->playerTeamImage,
                            "playerGame" => $playerDb->playerGame,
                            "playerImage" => $playerDb->playerImage,
                            "playerHometown" => $playerDb->playerHometown));

                } else {
                    $teamArray['other'][] = array(
                        "playerID" => $playerDb->playerID, array(
                            "playerName" => $playerDb->playerName,
                            "playerFirstName" => $playerDb->playerFirstName,
                            "playerLastName" => $playerDb->playerLastName,
                            "playerTeamID" => $playerDb->playerTeamID,
                            "playerTeamName" => $playerDb->playerTeamName,
                            "playerTeamImage" => $playerDb->playerTeamImage,
                            "playerGame" => $playerDb->playerGame,
                            "playerImage" => $playerDb->playerImage,
                            "playerHometown" => $playerDb->playerHometown));
                }
            }
        }

        array_values($teamArray);
        return $teamArray;
    }

    /**
     * Get all game-based Player data.
     */
    public function playerFilter() {
        $playerVar = null;
        $url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        if (strpos($url, 'lol') !== false) {
            $timelineVar = 'filter[videogame_id]=1&';
        } elseif (strpos($url, 'players/ow') !== false) {
            $timelineVar = 'filter[videogame_id]=14&';
        } elseif (strpos($url, 'dota2') !== false) {
            $timelineVar = '/players/dota2';
        } else {
            $timelineVar = '';
        }

        return $playerVar;
    }

    /**
     * Get all streamers data.
     * This is the mixer API.
     */
    public function getStreamers($counter) {
        $result = array();

        for ($i = 0; $i <= $counter; $i++) {
            ${"urlPage$i"} = 'https://mixer.com/api/v1/channels?limit=100&page=' . $i;
            ${"jsonPage$i"} = file_get_contents(${"urlPage$i"});
            ${"arrayPage$i"} = json_decode(${"jsonPage$i"}, true);

            $result = array_merge($result, ${"arrayPage$i"});
        }

        return $result;
    }

    public function getStreamersID()
    {
        // gets all the items from the database Streamer table
        $sql = "SELECT streamID FROM Streamer";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function streamerUpdateMixer($website, $streamersWeb)
    {

        // checks the getStreamersID() function
        $streamersDb = $this->getStreamersID();
        date_default_timezone_set('Europe/Amsterdam');


        // if not empty, try to update. if empty, just insert all of it
        if (!empty($streamersDb)) {

            // variables for counting the json and database items
            $counterStreamersDb = 0;
            $counterStreamersWeb = 0;

            // counts the database items
            foreach ($streamersDb as $streamersDB) {
                $counterStreamersDb++;
            }
            // two foreach loops, one for getting all the json items and another to get all the database items
            foreach ($streamersWeb as $key => $streamerWeb) {

                // if its the mixer api
                foreach ($streamersDb as $streamersDB) {

                    // json item equals database item, update the current information about the streamer
                    if (((float) $streamersDB->streamID) == $streamerWeb['id']) {
                        $sql = "UPDATE Streamer SET streamName = :streamName, lastOnline = :lastOnline, categorie = :categorie, website = :website WHERE streamID = :streamID";
                        $query = $this->db->prepare($sql);
                        $parameters = array(':streamName' => $streamerWeb['token'], ':lastOnline' => date("Y-m-d H:i:s"), ':categorie' => $streamerWeb['type']['name'], ':streamID' => $streamerWeb['id'], ':website' => $website);

                        $query->execute($parameters);


                        // be done with this item and start with the next
                        continue;
                    }

                    $counterStreamersWeb++;

                    if ($streamerWeb["type"]["name"] == "League of legends" || $streamerWeb["type"]["name"] == "Dota 2" || $streamerWeb["type"]["name"] == "Overwatch" || $streamerWeb["languageId"] == "nl") {

                        //if the amount of items checked with the database is the same amount of items checked with json, then dont update but insert as a new item
                        if ($counterStreamersWeb == ($counterStreamersDb) && $streamerWeb['online'] == true) {

                            $sql = "INSERT INTO Streamer (streamID, streamName, lastOnline, categorie, website) VALUES (:streamID, :streamName , :lastOnline, :categorie, :website)";
                            $query = $this->db->prepare($sql);
                            $parameters = array(':streamID' => $streamerWeb['id'], ':streamName' => $streamerWeb['token'], ':lastOnline' => date("Y-m-d H:i:s"), ':categorie' => $streamerWeb['type']['name'], ':website' => $website);

                            $query->execute($parameters);

                            // reset counter
                            $counterStreamersWeb = 0;
                        }
                    }
                }
                // reset counter
                $counterStreamersWeb = 0;
            }
        } else { // do this when database is empty
            foreach ($streamersWeb as $key => $streamerWeb) {

                if ($streamerWeb['online'] == true && ($streamerWeb["type"]["name"] == "League of legends" || $streamerWeb["type"]["name"] == "Dota 2" || $streamerWeb["type"]["name"] == "Overwatch" || $streamerWeb["languageId"] == "nl")) {
                    $sql = "INSERT INTO Streamer (streamID, streamName, lastOnline, categorie, website) VALUES (:streamID, :streamName , :lastOnline, :categorie, :website)";
                    $query = $this->db->prepare($sql);
                    $parameters = array(':streamID' => $streamerWeb['id'], ':streamName' => $streamerWeb['token'], ':lastOnline' => date("Y-m-d H:i:s"), ':categorie' => $streamerWeb['type']['name'], ':website' => $website);

                    $query->execute($parameters);
                }
            }
        }
    }

    public function streamerUpdateTwitch($website, $streamersWeb) {


        // checks the getStreamersID() function
        $streamersDb = $this->getStreamersID();
        date_default_timezone_set('Europe/Amsterdam');


        // if not empty, try to update. if empty, just insert all of it
        if (!empty($streamersDb)) {

            // variables for counting the json and database items
            $counterStreamersDb = 0;
            $counterStreamersWeb = 0;

            // counts the database items
            foreach ($streamersDb as $streamersDB) {
                $counterStreamersDb++;
            }
            // check if the json is a single streamer or mutiple streamers
            if (isset($streamersWeb['streams'])) {


                // two foreach loops, one for getting all the json items and another to get all the database items
                foreach ($streamersWeb['streams'] as $key => $streamerWeb) {

                    // if its the mixer api
                    foreach ($streamersDb as $streamersDB) {
                        // json item equals database item, update the current information about the streamer
                        if (((float) $streamersDB->streamID) == $streamerWeb['_id']) {
                            $sql = "UPDATE Streamer SET streamName = :streamName, lastOnline = :lastOnline, categorie = :categorie, website = :website WHERE streamID = :streamID";
                            $query = $this->db->prepare($sql);
                            $parameters = array(':streamName' => $streamerWeb['channel']['name'], ':lastOnline' => date("Y-m-d H:i:s"), ':categorie' => $streamerWeb['game'], ':streamID' => $streamerWeb['_id'], ':website' => $website);

                            $query->execute($parameters);


                            // be done with this item and start with the next
                            continue;
                        }

                        $counterStreamersWeb++;
                        if ($streamerWeb["game"] == "League of Legends" || $streamerWeb["game"] == "Dota 2" || $streamerWeb["game"] == "Overwatch" || $streamerWeb["channel"]["language"] == "nl") {
                            //if the amount of items checked with the database is the same amount of items checked with json, then dont update but insert as a new item
                            if ($counterStreamersWeb == ($counterStreamersDb) && $streamerWeb['stream_type'] == 'live') {

                                $sql = "INSERT INTO Streamer (streamID, streamName, lastOnline, categorie, website) VALUES (:streamID, :streamName , :lastOnline, :categorie, :website)";
                                $query = $this->db->prepare($sql);
                                $parameters = array(':streamID' => $streamerWeb['_id'], ':streamName' => $streamerWeb['channel']['name'], ':lastOnline' => date("Y-m-d H:i:s"), ':categorie' => $streamerWeb['game'], ':website' => $website);


                                $query->execute($parameters);

                                // reset counter
                                $counterStreamersWeb = 0;
                            }
                        }
                    }
                    // reset counter
                    $counterStreamersWeb = 0;
                }
            } else {
                // two foreach loops, one for getting all the json items and another to get all the database items
                foreach ($streamersWeb as $key => $streamerWeb) {

                    // if its the mixer api
                    foreach ($streamersDb as $streamersDB) {
                        // json item equals database item, update the current information about the streamer
                        if (((float) $streamersDB->streamID) == $streamerWeb['stream']['_id']) {
                            $sql = "UPDATE Streamer SET streamName = :streamName, lastOnline = :lastOnline, categorie = :categorie, website = :website WHERE streamID = :streamID";
                            $query = $this->db->prepare($sql);
                            $parameters = array(':streamName' => $streamerWeb['stream']['channel']['name'], ':lastOnline' => date("Y-m-d H:i:s"), ':categorie' => $streamerWeb['stream']['game'], ':streamID' => $streamerWeb['stream']['_id'], ':website' => $website);

                            $query->execute($parameters);


                            // be done with this item and start with the next
                            continue;
                        }

                        $counterStreamersWeb++;

                        if ($streamerWeb['stream']["game"] == "League of legends" || $streamerWeb['stream']["game"] == "Dota 2" || $streamerWeb['stream']["game"] == "Overwatch" || $streamerWeb['stream']["channel"]["language"] == "nl") {

                            //if the amount of items checked with the database is the same amount of items checked with json, then dont update but insert as a new item
                            if ($counterStreamersWeb == ($counterStreamersDb) && $streamerWeb['stream']['stream_type'] == 'live') {

                                $sql = "INSERT INTO Streamer (streamID, streamName, lastOnline, categorie, website) VALUES (:streamID, :streamName , :lastOnline, :categorie, :website)";
                                $query = $this->db->prepare($sql);
                                $parameters = array(':streamID' => $streamerWeb['stream']['_id'], ':streamName' => $streamerWeb['stream']['channel']['name'], ':lastOnline' => date("Y-m-d H:i:s"), ':categorie' => $streamerWeb['stream']['game'], ':website' => $website);


                                $query->execute($parameters);

                                // reset counter
                                $counterStreamersWeb = 0;
                            }
                        }
                    }
                    // reset counter
                    $counterStreamersWeb = 0;
                }
            }
        } else { // do this when database is empty
            if (isset($streamersWeb['streams'])) {
                foreach ($streamersWeb['streams'] as $key => $streamerWeb) {

                    if ($streamerWeb['stream_type'] == 'live' && ($streamerWeb["game"] == "League of legends" || $streamerWeb["game"] == "Dota 2" || $streamerWeb["game"] == "Overwatch" || $streamerWeb["channel"]["language"] == "nl")) {
                        $sql = "INSERT INTO Streamer (streamID, streamName, lastOnline, categorie, website) VALUES (:streamID, :streamName , :lastOnline, :categorie, :website)";
                        $query = $this->db->prepare($sql);
                        $parameters = array(':streamID' => $streamerWeb['_id'], ':streamName' => $streamerWeb['channel']['name'], ':lastOnline' => date("Y-m-d H:i:s"), ':categorie' => $streamerWeb['game'], ':website' => $website);

                        $query->execute($parameters);
                    }
                }
            } else {
                foreach ($streamersWeb as $key => $streamerWeb) {

                    if ($streamerWeb['stream']['stream_type'] == 'live' && ($streamerWeb['stream']["game"] == "League of legends" || $streamerWeb['stream']["game"] == "Dota 2" || $streamerWeb['stream']["game"] == "Overwatch" || $streamerWeb['stream']["channel"]["language"] == "nl")) {
                        $sql = "INSERT INTO Streamer (streamID, streamName, lastOnline, categorie, website) VALUES (:streamID, :streamName , :lastOnline, :categorie, :website)";
                        $query = $this->db->prepare($sql);
                        $parameters = array(':streamID' => $streamerWeb['stream']['_id'], ':streamName' => $streamerWeb['stream']['channel']['name'], ':lastOnline' => date("Y-m-d H:i:s"), ':categorie' => $streamerWeb['stream']['game'], ':website' => $website);

                        $query->execute($parameters);
                    }
                }
            }
        }
    }

    public function getFollowed($email) {
// gets all the items from the database Streamer table

        $sql = "SELECT f.Member_memberEmail, f.Streamer_streamID, f.likes, s.streamName, s.website
                FROM mini.follow f LEFT JOIN mini.Streamer s ON f.Streamer_streamID = s.streamID
                WHERE Member_memberEmail = :email
                order by likes desc";
// and mostrecent <5
        $query = $this->db->prepare($sql);
        $parameters = array(':email' => $email);

        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getFollowPageMixer($streamers)
    {
        $result = array();
        foreach ($streamers as $streamer) {
            if ($streamer->website == 'mixer') {
                $urlPage = 'https://mixer.com/api/v1/channels/' . $streamer->Streamer_streamID;
                $jsonPage = file_get_contents($urlPage);
                $arrayPage = json_decode($jsonPage, true);

                $result[] = $arrayPage;
            }
        }

        return $result;
    }

    public function getFollowPageTwitch($streamers)
    {
        $result = array();
        foreach ($streamers as $streamer) {
            if ($streamer->website == 'twitch') {
                $urlPage = 'https://api.twitch.tv/kraken/streams/' . $streamer->streamName . '?client_id=' . TWITCH_CLIENT_ID;
                $jsonPage = file_get_contents($urlPage);
                $arrayPage = json_decode($jsonPage, true);

                $result[] = $arrayPage;
            }
        }

        return $result;
    }

    /**
     * Get all streamers data.
     * This is the mixer API.
     */
    public function getStreamersTwitch($counter) {
        for ($i = 0; $i <= $counter; $i++) {
            $urlPage = 'https://api.twitch.tv/kraken/streams?client_id=' . TWITCH_CLIENT_ID;
            $jsonPage = file_get_contents($urlPage);
            $arrayPage = json_decode($jsonPage, true);
        }
        return $arrayPage;
    }

    public
    function getMostFollowedStreamers()
    {
        $sql = "SELECT f.Member_memberEmail, f.Streamer_streamID, s.streamName, s.website
                FROM mini.follow f LEFT JOIN mini.Streamer s ON f.Streamer_streamID = s.streamID
        group by Streamer_streamID
        order by COUNT(*) desc";
        $query = $this->db->prepare($sql);

        $query->execute();

        return $query->fetchAll();
    }

    public function getSearchResults($search) {

        $sql = "SELECT * FROM mini.Streamer WHERE streamName LIKE :search OR categorie LIKE :search limit 20";
        $query = $this->db->prepare($sql);
        $parameters = array(':search' => '%' . $search . '%');

        $query->execute($parameters);

        return $query->fetchAll();
    }

    public function getSearchResultsMixer($streamers) {
        $result = array();
        foreach ($streamers as $streamer) {
            if ($streamer->website == 'mixer') {
                $urlPage = 'https://mixer.com/api/v1/channels/' . $streamer->streamID;
                $jsonPage = file_get_contents($urlPage);
                $arrayPage = json_decode($jsonPage, true);

                $result[] = $arrayPage;
            }
        }

        return $result;
    }

    public function getSearchResultsTwitch($streamers) {
        $result = array();
        foreach ($streamers as $streamer) {
            if ($streamer->website == 'twitch') {
                $urlPage = 'https://api.twitch.tv/kraken/streams/' . $streamer->streamName . '?client_id=' . TWITCH_CLIENT_ID;
                $jsonPage = file_get_contents($urlPage);
                $arrayPage = json_decode($jsonPage, true);

                $result[] = $arrayPage;
            }
        }

        return $result;
    }

    public function setLikesToOne() {
        $sql = "UPDATE favorite
SET likes = 1;";
///// ik hoop dat de haakjes hier geen probleem geven
        $query = $this->db->prepare($sql);
        $query->execute();
    }



}