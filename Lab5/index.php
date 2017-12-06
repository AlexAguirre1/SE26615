<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/27/2017
 * Time: 11:56 AM
 */

require_once ("assets/dbconn.php");
$db = dbconn();
$action= filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING) ?? "";
$site = filter_input( INPUT_POST, 'site',FILTER_SANITIZE_STRING ) ?? "";
$sites = filter_input( INPUT_POST, 'sites',FILTER_SANITIZE_STRING ) ?? "";
$date =


include_once ("assets/Header.php");
require_once ("assets/AddURL.php");
switch ($action)
{
    case "Add":
        AddUrl($db,$site,$site, $date);
        $date = date_creat('now')->format('M-d-Y H:i:s');
        break;

}
include_once ("assets/Footer.php");