<?php
// set nightmode to true if true

session_start();
$nightmode = $_POST["modus"];

if ($nightmode == 'dark-theme')
    $_SESSION['nightmode'] = 'true';
else{
    $_SESSION['nightmode'] = 'false';
}
?>