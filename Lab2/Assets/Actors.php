<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/18/2017
 * Time: 12:25 PM
 */
require_once ("Assets/dbconn.php");
$db = dbconn();//allows connection to the database
function  addActor($db, $firstname, $lastname, $dob, $height)
{
    try
    {
        $sql = $db->prepare("INSERT INTO actors VALUES (null, :firstname, :lastname, :dob, :height)");//inserts/add a ne actore each time to form is filled out.
        $sql->bindParam(':firstname', $firstname);
        $sql->bindParam(':lastname', $lastname);
        $sql->bindParam(':dob', $dob);
        $sql->bindParam(':height', $height);
        $sql->execute();
        return $sql->rowCount();
    }catch(PDOException $e)
    {
        die($e);//will let me know if there is any errors specifically.
    }
}
