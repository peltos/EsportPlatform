<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Ajax extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function ajaxnightmode()
    {
        // ajax javascript query
        require APP . 'view/ajax/nightmode.php';
    }
    public function ajaxfollow()
    {
        // ajax javascript query
        require APP . 'view/ajax/follow.php';
    }
    public function ajaxcookie()
    {
        // ajax javascript query
        require APP . 'view/ajax/cookie.php';
    }
    
    public function ajaxlike()
    {
        // ajax javascript query
        require APP . 'view/ajax/like.php';
    }
    
    public function messageClear()
    {
        // ajax javascript query
        require APP . 'view/ajax/messageClear.php';
    }
    
    
}
