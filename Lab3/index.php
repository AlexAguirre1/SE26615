<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/23/2017
 * Time: 11:51 AM
 */
require_once ("Assets/dbconn.php");
require_once("Assets/AddCorps.php");
include_once ("Assets/Header.php");
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
   /* case "Delete":
        break;
    case "Update":
        $corp = getCorpsInfoAsTable($db,$id);
        break;*/
}

include_once ("Assets/View.php");
echo getCorpsAsTable($db);// displays the table.
include_once ("Assets/Footer.php");
?>