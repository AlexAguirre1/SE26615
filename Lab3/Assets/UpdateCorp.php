<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 10/24/2017
 * Time: 5:27 PM
 */
/*my update does not work but i feel like i was close, i did my best to try to figure it out*/
$id=filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";
require_once ("dbconn.php");
require_once("AddCorps.php");
$db = dbconn();
$action= filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING) ?? "";
$corp=filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode=filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner=filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone=filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
switch($action) {
    case "Update":
        $corp = getCorpsInfoAsTable($db, $id);
        break;
}
function UpdateCorp($db, $id)
{

    try
    {
        $sql = $db->prepare("SELECT * FROM corps WHERE id=:id");//this selects everything from the actor table
        $sql->bindParam(':id', $id);

        $sql->execute();
        $corps = $sql->fetchAll(PDO::FETCH_ASSOC);

        if($sql->rowCount() > 0)
        {
            $table = "<table>" . PHP_EOL;
            foreach($corps as $corp)
            {
                $table .= "<tr><td><label><b>Company: </b></label>" . $corp['corp'];
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
//echo UpdateCorp($db,$id);
?>
<form method="post" action="#">
    <label for='corp'>Company's Name: </label><input type="text" name='corp' value="<?php echo $corp['id']?>" /><br />
    Email: <input type="text" name="email" value="<?php echo $corp['email']?>" /> <br />
    Zipcode: <input type="text" name="zipcode" value="<?php echo $corp['zipcode']?>" /><br />
    Owner: <input type="text" name="owner" value="<?php echo $corp['owner']?>" /><br />
    Phone: <input type="text" name="phone" value="<?php echo $corp['phone']?>" /><br />
    <input type="submit" name="action" value="Update" />


</form>

<a href="..\index.php">Home</a>