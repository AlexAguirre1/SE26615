<?php
require_once ("Assets/dbconn.php");
require_once ("Assets/Actors.php");
include_once ("Assets/Header.php");

$db = dbconn();
$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? "";
$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING) ?? "";
$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING) ?? ""; // validation/filter for the names, etc..
$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING) ?? "";
$height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_STRING) ?? "";
switch ($action)
{
    case "Add": // adds the actors.
        addActor($db, $firstname, $lastname, $dob, $height);
        break;
}

include_once ("Assets/ActorsForm.php");
include_once ("Assets/footer.php");
?>

