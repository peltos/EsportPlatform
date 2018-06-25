<?php
// set cookie confirmation to true if true

session_start();
$cookie = $_POST["cookie"];

if ($cookie == 'true')
    $_SESSION['cookie'] = true;
else{
    $_SESSION['cookie'] = false;
}
?>