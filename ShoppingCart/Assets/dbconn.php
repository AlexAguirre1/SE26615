<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12/7/2017
 * Time: 4:04 PM
 */
/*function dbconn() // this creates a connection to connect to the database with a username and password.
{
    $dsn = "mysql:host=localhost;dbname=phpclassfall2017";
    $username = "PHPClassFall2017";
    $password = "SE266";
    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        // $echo $e->getMessage(); is a method example
        die($e);
    }
}*/

$dbServerName= "localhost";
//$dsn = "mysql:host=localhost;dbname=phpclassfall2017";
$username = "PHPClassFall2017";
$password = "SE266";
$dbName = "phpclassfall2017";
$db = mysqli_connect($dbServerName, $username, $password, $dbName);
if(!$db)
{
    die("connection failed: " .mysqli_connect_error());
}
