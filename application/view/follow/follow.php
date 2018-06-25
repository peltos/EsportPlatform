<div class="container follow-container">

    <h2 class="homepage-title"> Followed Channels
      <span class="tooltip"><i class="fas fa-info-circle"></i>
        <span class="tooltiptext">Manage your followed channels.</span></span></h2>

    <div class="filterBar-container">
        <div class="filterBar--inner">
            <div class="dateFilter">
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'all')"><i
                            class="filter-icon fas fa-filter"></i></a>
                <a class="tablinks dateFilter--item active" href="#" id="onlineNav">online</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'all')">all</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'dutch')">Dutch streamers</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'lol')">League of Legends</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'dota2')">Dota 2</a>
                <a class="tablinks dateFilter--item" href="#" onclick="openCity(event, 'overwatch')">Overwatch</a>
            </div>
        </div>
    </div>

    <?php //Start: Dutch Streamers ?>

    <div id="dutch" class="tabcontent">
        <h3>Dutch streamers</h3>
        <ul class="streamers__list">
            <?php
            $counter = 0;

            // Use Filter variable to determine what streamers you get for mixer

            $filter = 'nl';
            if (!empty($followPageMixer)) {
                foreach ($followPageMixer as $key => $item) {
                    if ($item["languageId"] == $filter) {
                        include APP . 'view/_templates/streamer-mixer.php';
                    }
                }
            }

            // Use Filter variable to determine what streamers you get for twitch

            $filter = 'nl';
            if (!empty($followPageTwitch)) {
                foreach ($followPageTwitch as $key => $item) {
                    if (!$item['stream'] == null) {
                        if ($item['stream']["channel"]["language"] == $filter) {
                            include APP . 'view/_templates/streamer-twitch.php';
                        }
                    }
                }
            } ?>
        </ul>
    </div>

    <?php //End: Dutch Streamers ?>

    <?php //Start: League of Legends Streamers ?>

    <div id="lol" class="tabcontent">
        <h3>League of Legends</h3>
        <ul class="streamers__list">
            <?php
            $counter = 0;

            // Use Filter variable to determine what streamers you get for mixer

            $filter = 'League of legends';
            if (!empty($followPageMixer)) {
                foreach ($followPageMixer as $key => $item) {
                    if ($item["type"]["name"] == $filter) {
                        include APP . 'view/_templates/streamer-mixer.php';
                    }
                }
            }

            // Use Filter variable to determine what streamers you get for twitch

            $filter = 'League of Legends';
            if (!empty($followPageTwitch)) {
                foreach ($followPageTwitch as $key => $item) {
                    if (!$item['stream'] == null) {
                        if ($item['stream']["channel"]["game"] == $filter) {
                            include APP . 'view/_templates/streamer-twitch.php';
                        }
                    }
                }
            } ?>
        </ul>
    </div>

    <?php //End: League of Legends Streamers ?>

    <?php //Start: Dota 2 Streamers ?>

    <div id="dota2" class="tabcontent" >
        <h3>Dota 2</h3>
        <ul class="streamers__list">
            <?php
            $counter = 0;

            // Use Filter variable to determine what streamers you get for mixer

            $filter = 'Dota 2';
            if (!empty($followPageMixer)) {
                foreach ($followPageMixer as $key => $item) {
                    if ($item["type"]["name"] == $filter) {
                        include APP . 'view/_templates/streamer-mixer.php';
                    }
                }
            }

            // Use Filter variable to determine what streamers you get for twitch

            $filter = 'Dota 2';
            if (!empty($followPageTwitch)) {
                foreach ($followPageTwitch as $key => $item) {
                    if (!$item['stream'] == null) {
                        if ($item['stream']["channel"]["game"] == $filter) {
                            include APP . 'view/_templates/streamer-twitch.php';
                        }
                    }
                }
            } ?>
        </ul>
    </div>

    <?php //End: Dota 2 Streamers ?>

    <?php //Start: Overwatch Streamers ?>

    <div id="overwatch" class="tabcontent" >
        <h3>Overwatch</h3>
        <ul class="streamers__list">
            <?php
            $counter = 0;

            // Use Filter variable to determine what streamers you get for mixer

            $filter = 'Overwatch';
            if (!empty($followPageMixer)) {
                foreach ($followPageMixer as $key => $item) {
                    if ($item["type"]["name"] == $filter) {
                        include APP . 'view/_templates/streamer-mixer.php';
                    }
                }
            }

            // Use Filter variable to determine what streamers you get for twitch

            $filter = 'Overwatch';
            if (!empty($followPageTwitch)) {
                foreach ($followPageTwitch as $key => $item) {
                    if (!$item['stream'] == null) {
                        if ($item['stream']["channel"]["game"] == $filter) {
                            include APP . 'view/_templates/streamer-twitch.php';
                        }
                    }
                }
            } ?>
        </ul>
    </div>

    <?php //End: Overwatch Streamers ?>

</div>
