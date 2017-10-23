<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/23/2017
 * Time: 1:34 PM
 */
require_once ("dbconn.php");
$db = dbconn();
function getCorpsInfoAsTable($db)
{
    try
    {
        $sql = $db->prepare("SELECT * FROM corps ");//this selects everything from the actor table
        //$sql = "SELECT * FROM corps WHERE id=:id";
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            foreach($corps as $corp)
            {
                //$table .= "<tr><td><label>id: </label>" . $corp['id'];
                $table .= "<tr><td><label>Company: </label>" . $corp['corp'];
                $table .= "</td><td><label>Date: </label>" . $corp['incorp_dt'];// will display the information.
                $table .= "</td><td><label>Email: </label>" . $corp['email'];
                $table .= "</td><td><label>Zip Code: </label>" . $corp['zipcode'];
                $table .= "</td><td><label>Owner: </label>" . $corp['owner'];
                $table .= "</td><td><label>Phone: </label>" . $corp['phone'];
                $table .= "</td><td><form action='#' method='post'><input type='hidden'
                name='id' value='" . $corp['id'] ."' /><input type ='submit' name='action' value='Edit' /> </form>";
                $table .="</td><td><form action='#' method='post'><input type='hidden'
                 name='". $corp['id'] ."' /><input type='submit' name='action' value='Delete' /></form>";
                //$table
                $table .= "</td></tr>";
            }
            $table .= "</table>" . PHP_EOL;
        } else
        {
            $table ="Nothing Found.";
        }
        return $table;
    }catch(PDOException $e)
    {
        die($e);
    }

}
echo getCorpsInfoAsTable($db);// displays the table.