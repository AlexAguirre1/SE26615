<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/1/2017
 * Time: 1:09 PM
 */
require_once ("assets/dbconn.php");
require_once ("assets/corps.php");
include_once ("assets/Header.php");
include_once ("assets/Sort&Search.php");
require_once ("assets/ViewPage.php");

$db = dbconn();
$action= filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING) ?? "";
$corp=filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode=filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner=filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone=filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
$id=filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";
$col = filter_input(INPUT_GET, 'col', FILTER_SANITIZE_STRING) ?? NULL;
$dir = filter_input(INPUT_GET, 'dir', FILTER_SANITIZE_STRING) ?? NULL;
$SearchCol = filter_input(INPUT_GET, 'SearchCol', FILTER_SANITIZE_STRING) ?? NULL;
$search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING) ?? NULL;



//echo getCorpsInfoAsTable($db,$id);

switch($action)
{
    case 'Reset':
        $corps= getCorps($db);
        echo getCorpsInfoAsTable($db,$id);
        break;
    case 'sort':
        $sortable = true;
        $cols = getColumnNames($db, 'corps');
       echo getCorpsInfoAsTable($db, $cols, $col, $dir);
       break;
    case 'search':
        $cols = getColumnNames($db, 'corps');
        echo SearchAllCorp($db, $cols, $SearchCol, $search);
        break;
    default:
        $sortable = true;
        $corps= getCorps($db);
        $cols = getColumnNames($db, 'corps');
        echo getCorpsInfoAsTable($db, $corps, $cols, $sortable);
        break;

}

include_once ("assets/Footer.php");
