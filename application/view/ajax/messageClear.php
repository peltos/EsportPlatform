<?php
// Clear message when you leave the page

session_start();
$messageClear = $_POST["messageClear"];

if ($messageClear == 'true') $_SESSION['message'] = '';

?>