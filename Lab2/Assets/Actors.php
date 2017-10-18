<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/18/2017
 * Time: 12:25 PM
 */
function getactorsAsTable($db)
{
    try
    {
        $sql = $db->prepare("SELECT * FROM actors");
        $sql->execute();
        $actors = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            foreach($actors as $actor)
            {
                $table .= "<tr><td>" . $actor['firstname'];
                $table .= "</td><td>" . $actor['lastname'];
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