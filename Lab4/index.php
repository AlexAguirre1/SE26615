<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/1/2017
 * Time: 1:09 PM
 */
$action= filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING) ?? "";
$corp=filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode=filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner=filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone=filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
$id=filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";
require_once ("assets/dbconn.php");
$db = dbconn();


include_once ("assets/Header.php");
include_once ("assets/Sort&Search.php");
require_once ("assets/ViewPage.php");
//echo getCorpsInfoAsTable($db,$id);

switch($action)
{
    case "Reset":
echo getCorpsInfoAsTable($db,$id);
    default:
        $cols = getColumnNames($db, 'corps');
}

include_once ("assets/Footer.php");