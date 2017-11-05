<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 10/24/2017
 * Time: 5:28 PM
 */
$id= filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT) ?? null;

require_once ("dbconn.php");
require_once ("DeleteCorp.php");

$db = dbconn();

function DeleteCorp($db,$id)
{
    try
    {
        $sql = $db->prepare("DELETE FROM corps WHERE id =:id");//this will delete everything that the id pulls.
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->rowCount(). "rows deleted";

    }catch(PDOException $e)
    {
        die("There was an issue deleting the company");
    }
}
echo(DeleteCorp($db,$id));
?>

<a href="..\index.php">Home</a>
