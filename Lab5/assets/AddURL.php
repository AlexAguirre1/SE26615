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


/*
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
<form method="post" action="#"><!-- will display the form -->
    Enter URL: <input type="text" name="site" /> <br />
    <input type="submit" name="action" value="Add" />
</form>
