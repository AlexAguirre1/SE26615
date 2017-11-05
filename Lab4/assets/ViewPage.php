<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/1/2017
 * Time: 1:13 PM
 */
$action= filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING) ?? "";
$corp=filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode=filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner=filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone=filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
$id=filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";

require_once ("dbconn.php");
$db = dbconn();

function getCorpsInfoAsTable($db,$id)
{
    try
    {
        $sql = $db->prepare("SELECT * FROM corps");//this selects everything from the actor table
        $sql->bindParam(':id', $id);
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            foreach($corps as $corp)
            {
                $table .= "<tr><td><label><b>Company: </b></label>" . $corp['corp'];
                $table .= "</td><td><label><b>Date: </b></label>" . date('m/d/Y', strtotime($corp['incorp_dt']));// will display the information.
                $table .= "</td><td><label><b>Email: </b></label>" . $corp['email'];
                $table .= "</td><td><label><b>Zip Code: </b></label>" . $corp['zipcode'];
                $table .= "</td><td><label><b>Owner: </b></label>" . $corp['owner'];
                $table .= "</td><td><label><b>Phone: </b></label>" . $corp['phone'];
                $table .= "</td><td><form action='#' method='get' ><a href='assets/UpdateCorp.php?id=" . $corp['id'] ."'>Update</a> </form>";
                $table .="</td><td><form action='#' method='get' ><a href='assets/DeleteCorp.php?id=". $corp['id'] ."'>Delete</a> </form>";//puts a link next to each company name
                $table .= "</td><td><form action='#' methods='get'> <a href ='assets/Read.php?id=". $corp['id'] ."'>Read</a></form>";
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
echo getCorpsInfoAsTable($db,$id);// displays the table.
?>