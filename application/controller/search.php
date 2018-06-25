<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Search extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */

    public function index()
    {
        $searches = null;
        $message = '';
        $followPageMixer = null;
        $followPageTwitch = null;

        if (isset($_GET['s']) ) {
            if (strlen($_GET['s']) >= 3){
                $searches = $this->model->getSearchResults($_GET['s']);
                $followPageMixer = $this->model->getSearchResultsMixer($searches);
                $followPageTwitch = $this->model->getSearchResultsTwitch($searches);
            }else{
                $message = 'Please search for a word that\'s equal or longer than 3 characters';
            }
        }

        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/search/search.php';
        require APP . 'view/_templates/footer.php';
    }

    public function redirect()
    {
        if (isset($_POST['search-input'])) {
            header('location: ' . URL . 'search' . '?s=' . $_POST['search-input']);
        }else{
            header('location: ' . URL . 'search');
        }
    }

}
