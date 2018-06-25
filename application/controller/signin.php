<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Signin extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */

    public function index()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/signin/signin.php';
        require APP . 'view/_templates/footer.php';
    }
    public function checkUser()
    {
        $getInfoUser = $this->model->getUser($_POST["email"]);

        // if we have POST data to create a new song entry
        if (isset($getInfoUser)) {
            $salt="djskdjd1434JFFFFAF23";
            $password = $_POST["password"].$salt;
            $md5Password = md5($password);

            if (($md5Password == $getInfoUser->password) && ($_POST["email"] == $getInfoUser->memberEmail)) {
                $_SESSION["email"] = $getInfoUser->memberEmail;
                $_SESSION["username"] = $getInfoUser->username;
                $_SESSION["token"] = md5($_SESSION["email"] . $_SESSION["username"]);

                $_SESSION['message'] = '';
                $_SESSION['signinEmail'] = '';

                header('location: ' . URL);
            }else{
                $_SESSION['message'] = 'Your Username or Password is incorrect';
                $_SESSION['signinEmail'] = $_POST["email"];
                header('location: ' . URL  . 'signin');
            }
        }else{
            $_SESSION['message'] = 'Your Username or Password is incorrect';
            header('location: ' . URL  . 'signin');
        }
    }

}
