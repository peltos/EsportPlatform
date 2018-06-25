<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Home extends Controller {

    private $numberOfFavouriteStreamers = 3;

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index() {
        $slider = $this->model->timeline();
        $followed = $this->model->getFollowed($_SESSION['email']);
        $followPage = $this->model->getFollowPageMixer($followed);
        $followPageTwitch = $this->model->getFollowPageTwitch($followed);

        $mostFollowed = $this->model->getMostFollowedStreamers();
        $followPageRecommendedMixer = $this->model->getFollowPageMixer($mostFollowed);
        $followPageRecommendedTwitch = $this->model->getFollowPageTwitch($mostFollowed);

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/home.php';
        require APP . 'view/_templates/footer.php';

        $this->model->streamerUpdateMixer('mixer', $followPage);
        $this->model->streamerUpdateMixer('mixer', $followPageRecommendedMixer);
    }

    public function logout() {
        $_SESSION['username'] = '';
        $_SESSION['email'] = '';
        $_SESSION['profilePicture'] = '';
        header('location: ' . URL);
    }

}
