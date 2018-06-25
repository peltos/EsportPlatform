<?php

/**
 * Class Matches
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Matches extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/matches/index
     */
    public function index()
    {
        $timeline = $this->model->timeline();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/upcoming/upcoming.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: running matches
     * This method handles what happens when you move to http://yourproject/matches/running
     */
    public function running()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/running/running.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: league of legends matches
     * This method handles what happens when you move to http://yourproject/matches/lol
     */
    public function lol()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/upcoming/upcominglol.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Dota 2 matches
     * This method handles what happens when you move to http://yourproject/matches/dota2
     */
    public function dota2()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/upcoming/upcomingdota2.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Overwatch matches
     * This method handles what happens when you move to http://yourproject/matches/ow
     */
    public function ow()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/upcoming/upcomingow.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: past matches
     * This method handles what happens when you move to http://yourproject/matches/past
     */
    public function past()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/past/past.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: league of legends past matches
     * This method handles what happens when you move to http://yourproject/matches/lolscore
     */
    public function lolscore()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/past/pastlol.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Dota 2 past matches
     * This method handles what happens when you move to http://yourproject/matches/dota2score
     */
    public function dota2score()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/past/pastdota2.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: Overwatch past matches
     * This method handles what happens when you move to http://yourproject/matches/owscore
     */
    public function owscore()
    {
        $timeline = $this->model->timeline();

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/matches/past/pastow.php';
        require APP . 'view/_templates/footer.php';
    }
}
