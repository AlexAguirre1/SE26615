<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12/7/2017
 * Time: 11:45 PM
 */
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: ..\index.php");
exit;
/*session_start();
if (!isset($_SESSION['USession'])) {
    header("Location: ..\index.php");
} else if (isset($_SESSION['USession'])!="") {
    header("Location: home.php");
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['USession']);
    header("Location: ..\index.php");
}*/