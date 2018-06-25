<?php
session_start();

// check if a session for nightmode is made. if not make one
if (!isset($_SESSION['nightmode'])) {
    $_SESSION['nightmode'] = 'false';
}

// check if a session for the profile picture is made. if not make one
if (!isset($_SESSION['profilePicture'])) {
    $_SESSION['profilePicture'] = '';
}

// check if a session for the username is made. if not make one
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = '';
}

// check if a session for the email is made. if not make one
if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = '';
}

// check if a session for the email is made. if not make one
if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = '';
}

// check if a session for cookies are made. if not make one
if (!isset($_SESSION['cookie'])) {
    $_SESSION['cookie'] = false;
}

// check if a session for signup messages are made. if not make one
if (!isset($_SESSION['message'])) {
    $_SESSION['message'] = false;
}

if (!isset($_SESSION['addUserUsername'])) {
    $_SESSION['addUserUsername'] = '';
}

if (!isset($_SESSION['addUserEmail'])) {
    $_SESSION['addUserEmail'] = '';
}

// check if a session for signup messages are made. if not make one
if (!isset($_SESSION['signinEmail'])) {
    $_SESSION['signinEmail'] = '';
}

// check what is in all sessions
//echo '<pre>' . var_dump($_SESSION) . '</pre>';

// set a constant that holds the project's folder path, like "/var/www/".
// DIRECTORY_SEPARATOR adds a slash to the end of the path
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
// set a constant that holds the project's "application" folder, like "/var/www/application".
define('APP', ROOT . 'application' . DIRECTORY_SEPARATOR);

// This is the (totally optional) auto-loader for Composer-dependencies (to load tools into your project).
// If you have no idea what this means: Don't worry, you don't need it, simply leave it like it is.
if (file_exists(ROOT . 'vendor/autoload.php')) {
    require ROOT . 'vendor/autoload.php';
}

// load application config (error reporting etc.)
require APP . 'config/config.php';

// FOR DEVELOPMENT: this loads PDO-debug, a simple function that shows the SQL query (when using PDO).
// If you want to load pdoDebug via Composer, then have a look here: https://github.com/panique/pdo-debug
require APP . 'libs/helper.php';

// load application class
require APP . 'core/application.php';
require APP . 'core/controller.php';

// start the application
$app = new Application();
