<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/23/2017
 * Time: 11:51 AM
 */
require_once ("Assets/dbconn.php");
$db = dbconn();
function getCorpsInfoAsTable($db, $id)
{
    $sql = "SELECT * FROM corps WHERE id=:id";
}
include_once ("Assets/Header.php");
include_once ("Assets/View.php");
echo getCorpsAsTable($db);// displays the table.
include_once ("Assets/Footer.php");

?>