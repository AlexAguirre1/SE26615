<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 10/24/2017
 * Time: 5:27 PM
 */
$id=filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";
require_once ("dbconn.php");
$db = dbconn();

function UpdateCorp($db, $id)
{
    try
    {
        $sql = $db->prepare("SELECT * FROM corps WHERE id=:id");//this selects everything from the actor table
        //$sql = "SELECT * FROM corps WHERE id=:id";
        $sql->bindParam(':id', $id);
        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);
        if($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            foreach($corps as $corp)
            {
                $table .= "<tr><td><label><b>Company: </b></label>" . $corp['corp'];
                $table .= "</td><td><label><b>Date: </b></label>" . $corp['incorp_dt'];// will display the information.
                $table .= "</td><td><label><b>Email: </b></label>" . $corp['email'];
                $table .= "</td><td><label><b>Zip Code: </b></label>" . $corp['zipcode'];
                $table .= "</td><td><label><b>Owner: </b></label>" . $corp['owner'];
                $table .= "</td><td><label><b>Phone: </b></label>" . $corp['phone'];
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
?>
<form method="post" action="#">
    <label for='corps'></label>Company's Name: <input type="text" name="corp" /><br />
    Email: <input type="text" name="email"  /><br />
    Zipcode: <input type="text" name="zipcode" /><br />
    Owner: <input type="text" name="owner"/><br />
    Phone: <input type="text" name="phone"/><br />
    <input type="submit" name="action" value="save" />

</form>

<a href="..\index.php">Home</a>