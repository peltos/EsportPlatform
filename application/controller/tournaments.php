<?php
/**
 * Class Tournaments
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Tournaments extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/tournaments/index (which is the default page btw)
     */
    public function index()
    {
        $slider = $this->model->getTournaments();
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/tournaments/tournaments.php';
        require APP . 'view/_templates/footer.php';
    }
}
