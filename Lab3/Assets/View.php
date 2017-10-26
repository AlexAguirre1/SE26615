<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/23/2017
 * Time: 12:03 PM
 */
function getCorpsAsTable($db)
{
    try
    {
        $sql = $db->prepare("SELECT * FROM corps");//this selects everything from the actor table
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            foreach($corps as $corp)
            {
                $table .= "<tr><td>" . $corp['corp'];
                //$table .= "</td><td>" . $actor['lastname'];// will display the information.
                //$table .= "</td><td>" . $actor['dob'];
               $table .= "</td><td><form action='#' method='get' ><a href='Assets/UpdateCorp.php?id=" . $corp['id'] ."'>Update</a> </form>";
               $table .="</td><td><form action='#' method='get' ><a href='Assets/DeleteCorp.php?id=". $corp['id'] ."'>Delete</a> </form>";//puts a link next to each company name
               $table .= "</td><td><form action='#' methods='get'> <a href ='Assets/Read.php?id=". $corp['id'] ."'>Read</a></form>";
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
        die("There was a problem retrieving the company");
    }

}
// maybe to show the the information for each company name
/*function getActorsAsTable($db)
{
    try
    {
        $sql = $db->prepare("SELECT * FROM corps");//this selects everything from the actor table
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            foreach($corps as $corp)
            {
                $table .= "<tr><td>" . $corp['corp'];
                $table .= "</td><td>" . $corp['incorp_dt'];// will display the information.
                $table .= "</td><td>" . $corp['email'];
                $table .= "</td><td>" . $corp['zipcode'];
                $table .= "</td><td>" . $corp['owner'];
                $table .= "</td><td>" . $corp['phone'];
               $table .= "</td><td><form action='#' method='post'><input type='hidden'
                name='id' value='" . $corp['id'] ."' /><input type ='submit' name='action' value='Edit' /> </form>";
               $table .="</td><td><form action='#' method='post'><input type='hidden'
                 name='". $corp['id'] ."' /><input type='submit' name='action' value='Delete' /> </form>";
               $table
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
        die("There was a problem retrieving the information of the company you selected.");
    }

}
  */