<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/18/2017
 * Time: 12:14 PM
 */
function dbconn()
{
    $dsn = "mysql:host=localhost;dbname=phpclasfall2017";
    $username = "PHPClassFall2017";
    $password = "Alex120";
    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        // $echo $e->getMessage(); is a method example
        die($e);
    }
}