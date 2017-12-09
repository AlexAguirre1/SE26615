<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12/8/2017
 * Time: 5:30 PM
 */
require_once ("dbconn.php");
$db=dbconn();
$id =filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";
function getCategories($db)
{
    try
    {
        $sql = $db->prepare("SELECT * FROM categories WHERE 0=0");
        $sql->execute();
        $category = $sql->fetchAll(PDO::FETCH_ASSOC);

        if($sql->rowCount() > 0)
        {
            $dropDown = "<select name='list'>" . PHP_EOL;
            foreach ($category as $Cate)
            {
                $dropDown .="<option value='" . $Cate['category_id'] . "'>". $Cate['category']."</option>";
            }
            $dropDown .="</select>";
        }
        else
        {
            $dropDown = "There was nothing found" . PHP_EOL;
        }
        return $dropDown;
    }
    catch(PDOException $e)
    {
        die($e);
    }

}

function AddCategories($db,$Cate)
{
    try
    {
        $sql = $db->prepare("INSERT INTO categories VALUES (null,:category)");//inserts/add a ne actore each time to form is filled out.
        $sql->bindParam(':category', $Cate);
        $sql->execute();
        echo($sql->rowCount(). "rows inserted.");

    }catch(PDOException $e)
    {
        die($e);//will let me know if there is any errors specifically.
    }
}

function EditCategories()
{

}

function DeleteCategories($db, $id)
{
    try
    {
        $sql = $db->prepare("DELETE FROM categories WHERE category_id =:id");//this will delete everything that the id pulls.
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->rowCount(). "rows deleted";

    }catch(PDOException $e)
    {
        die("There was an issue deleting the company");
    }
}
//echo(DeleteCategories($db,$id));