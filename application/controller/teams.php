<?php

/**
 * Class Players
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Teams extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/players/index (which is the default page btw)
     */
    public function index()
    {
        $playersJson = $this->model->getPlayers();
        $this->model->sendPlayers2Db($playersJson);

        $playersDb = $this->model->getTeams();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/teams/teams.php';
        require APP . 'view/_templates/footer.php';

    }

    /**
     * PAGE: league of legends Players
     * This method handles what happens when you move to http://yourproject/matches/lol
     */
//    public function lol()
//    {
//        $slider = $this->model->getPlayers();
//
//        // load views
//        require APP . 'view/_templates/header.php';
//        require APP . 'view/players/index.php';
//        require APP . 'view/_templates/footer.php';
//    }
//
//    /**
//     * PAGE: Dota 2 Players
//     * This method handles what happens when you move to http://yourproject/matches/dota2
//     */
//    public function dota2()
//    {
//        $slider = $this->model->getPlayers();
//
//        // load views
//        require APP . 'view/_templates/header.php';
//        require APP . 'view/players/index.php';
//        require APP . 'view/_templates/footer.php';
//    }
//
//    /**
//     * PAGE: Overwatch Players
//     * This method handles what happens when you move to http://yourproject/matches/ow
//     */
//    public function ow()
//    {
//        $slider = $this->model->getPlayers();
//
//        // load views
//        require APP . 'view/_templates/header.php';
//        require APP . 'view/players/index.php';
//        require APP . 'view/_templates/footer.php';
//    }
}
