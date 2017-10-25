<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 10/24/2017
 * Time: 5:28 PM
 */
$id=filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";

require_once ("dbconn.php");
$db = dbconn();

function DeleteCorp($db,$id)
{
    try
    {
        $sql = $db->prepare("DELETE * FROM corps WHERE id =:id");
        $sql->bindParam(':id', $id, PDO::PARAM_INT);
        $sql->execute();
        return $sql->rowCount();
    }catch(PDOException $e)
    {
        die("There was an issue deleting the company")
    }
}
?>

<a href="..\index.php">Home</a>
