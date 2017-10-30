<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/30/2017
 * Time: 1:31 PM
 */
function getDepts($db)
{
    $sql = "SELECT * FROM departments";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $depts = $stmt -> fetchALL(PDO::FETCH_ASSOC);
    return $depts;

}