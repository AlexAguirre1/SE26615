<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/23/2017
 * Time: 12:09 PM
 */
require_once ("dbconn.php");
require_once("AddCorps.php");
include_once ("Header.php");
$db = dbconn();
$action= filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING) ?? "";
$corp=filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode=filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner=filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone=filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
switch ($action)
{
    case "Add":
        addCorp($db, $corp,  $email, $zipcode, $owner, $phone);// adds the actors.
        break;
    /*
     */

}
//echo(addCorp($db));
?>
<form method="post" action="#">
    Company's Name: <input type="text" name="corp" value='' /><br />
    Email: <input type="text" name="email" value='' /><br />
    Zipcode: <input type="text" name="zipcode" value='' /><br />
    Owner: <input type="text" name="owner" value='' /><br />
    Phone: <input type="text" name="phone" value=''/><br />
    <input type="submit" name="action" value="Add" />

</form>

<a href="..\index.php">Home</a>