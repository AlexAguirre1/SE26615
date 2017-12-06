<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/27/2017
 * Time: 12:04 PM
 */
require_once ("dbconn.php");
require_once ("Functions.php");
$db = dbconn();
$action= filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING) ?? "";
$site = filter_input( INPUT_POST, 'site',FILTER_SANITIZE_STRING ) ?? "";
$sites = filter_input( INPUT_POST, 'sites',FILTER_SANITIZE_STRING ) ?? "";

/*function addingForm()
{
    $form = "<form method='post' action='#'>";
    $form .= "URL: <input type='text' name='site' /> <br />" . PHP_EOL;
    $form .=  "<input type='submit' name='action' value='Save' />" . PHP_EOL;
    $form .= "</form>";
    return $form;
}
function AddUrl($db,$site, $sites, $date)
{
    try
    {
        $sql = $db->prepare("INSERT INTO sites SET site =:site, date =: date");//inserts/add a ne actore each time to form is filled out.
        $sql->bindParam(':site', $site);
        $sql->bindParam(':date', $date);
        $sql->execute();
        $urlID = $db->lastInsertId();
        foreach($sites as $link) {
            $sql = $db->prepare("INSERT INTO sitlinks VALUES (:site_id, :link)");
            $sql->bindParam(':link', $link);
            $sql->bindParam(':site_id', $urlID);
            $sql->execute();

        }
        return $sql->rowCount();

    }catch(PDOException $e)
    {
        die($e);//will let me know if there is any errors.
    }
}
function websiteValid($db,$site,$sites, $date)
{
    if (isset($_POST['site'])) {
        if (empty($_POST['site'])) {
            echo "must enter in in a website.";
        } else if (!preg_match("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $_POST['site'])) {
            echo "this is not a valid website";

        } else {
            $rowN = websiteF($db, $site);
            if ($rowN == 0) {
                $sites = array();
                $files = file_get_contents($_POST['site']);
                preg_match_all("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $files, $similars, PREG_OFFSET_CAPTURE);
                foreach ($similars as $same)
                {
                    array_push($sites, $same[0]);
                echo "<a href='" . $same[0] . "'>" . $same[0] . "</a>";
            }
            }
        }
        AddUrl($db, $site, $sites, $date);
    } else {
        echo "This website has been enter already!";
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
    }*/

//<?php echo $websiteErr;

?>
<form method="post" action="#">
    Enter URL: <input type="text" name="site" /> <br />
    <input type="submit" name="action" value="Add" />
</form>
