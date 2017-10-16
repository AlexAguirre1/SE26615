<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/16/2017
 * Time: 12:15 PM
 */
function getDogsAsTable($db)
{
    $sql = $db->prepare("select * FROM animals");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    /*if (count($result))
    {
        foreach ($result as $dog)
        {
            print_r($dog);
        }
    }*/

}