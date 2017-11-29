<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/27/2017
 * Time: 12:04 PM
 */
require_once ("assets/dbconn.php");
$db = dbconn();
$action= filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING) ?? "";
$website = filter_input( INPUT_POST, 'website',FILTER_SANITIZE_STRING ) ?? "";
switch ($action)
{
    case "Add":
       AddUrl($db,$website);
        break;

}
function AddUrl($db,$website)
{
    try
    {
        $sql = $db->prepare("INSERT INTO sites VALUES (null, :website)");//inserts/add a ne actore each time to form is filled out.
        $sql->bindParam(':website', $website);
        $sql->execute();
        echo($sql->rowCount(). "rows inserted.");

    }catch(PDOException $e)
    {
        die($e);//will let me know if there is any errors specifically.
    }
}
$website = $websiteErr = "";
if (empty($_POST["website"]))
{
    $website = "";
}else
    {
        $website = test_input($_POST["website"]);
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website))
        {
            $websiteErr = "Invalid Url/Website";
        }
    }

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<form method="post" action="#">
    Enter URL: <input type="text" name="website" value='' /> <?php echo $websiteErr;?> <br />
    <input type="submit" name="action" value="Add" />
</form>
