<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 10/24/2017
 * Time: 5:28 PM
 */
require_once ("dbconn.php");
$db = dbconn();

$id = filter_input(INPUT_GET, 'id');

$sql = $db->prepare("DELETE FROM corps WHERE id =:id");
$binds = array(":id" => $id);
$deleted = false;
if($sql ->execute($binds) && $sql ->rowCount() > 0)
{
    $deleted = true;
}

?>

<a href="..\index.php">Home</a>
