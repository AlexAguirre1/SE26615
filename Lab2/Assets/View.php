<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/18/2017
 * Time: 1:55 PM
 */
require_once ("dbconn.php");
$db = dbconn();// allows connection to the database.
function getActorsAsTable($db)
{
    try
    {
        $sql = $db->prepare("SELECT * FROM actors");//this selects everything from the actor table
        $sql->execute();
        $actors = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            foreach($actors as $actor)
            {
                $table .= "<tr><td>" . $actor['firstname'];
                $table .= "</td><td>" . $actor['lastname'];// will display the information.
                $table .= "</td><td>" . $actor['dob'];
                $table .= "</td><td>" . $actor['height'];
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else
        {
            $table ="No Actors found.";
        }
        return $table;
    }catch(PDOException $e)
    {
        die("There was a problem retrieving the Actor");
    }

}

echo getActorsAsTable($db);// displays the table.
