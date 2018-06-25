<?php

/**
 * Class Problem
 * Formerly named "Error", but as PHP 7 does not allow Error as class name anymore (as there's a Error class in the
 * PHP core itself) it's now called "Problem"
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Streams extends Controller
{
  /**
   * PAGE: Streamers
   * This method handles what happens when you move to http://yourproject/streams/index
   * The camelCase writing is just for better readability. The method name is case-insensitive.
   */
    public function index()
    {
        $streamers = $this->model->getStreamers(5); // number of pages of the json file of the mixer api.
        $streamersTwitch = $this->model->getStreamersTwitch(1); // number of pages of the json file of the twitch api.
        $followed = $this->model->getFollowed($_SESSION["email"]);

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/streams/streamers.php';
        require APP . 'view/_templates/footer.php';

        $this->model->streamerUpdateMixer('mixer', $streamers);
        $this->model->streamerUpdateTwitch('twitch', $streamersTwitch);
    }
}
