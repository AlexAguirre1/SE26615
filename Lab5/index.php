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
$website = filter_input( INPUT_POST, 'website',FILTER_SANITIZE_STRING ) ?? "";

include_once ("assets/Header.php");
require_once ("assets/AddURL.php");
switch ($action)
{
    case "Add":
        AddUrl($db,$website);
        break;

}
include_once ("assets/Footer.php");