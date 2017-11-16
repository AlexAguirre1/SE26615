<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/15/2017
 * Time: 1:44 PM
 */
require_once ("dbconn.php");
$db = dbconn();

function getCorps($db)
{
    try
    {
        $sql = "SELECT `corps`.`id`, `corps`.`corp`,`corps`.`incorp_dt`, `corps`.`email`, `corps`.`zipcode`,`corps`.`owner`, `corps`.`phone` FROM `corps` WHERE `corps`.`id` = `corps`.`id`";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $corps = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e)
    {
        die($e);
    }
    return $corps;
}

function getCorpsAsSortedTable($db, $col, $dir) {
    try {
        $sql = "SELECT `corps`.`id`, `corps`.`corp`,`corps`.`incorp_dt`, `corps`.`email`, `corps`.`zipcode`,`corps`.`owner`, `corps`.`phone` FROM `corps` WHERE `corps`.`id` = `corps`.`id` ORDER BY $col $dir";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $corps = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }catch (PDOException $e) {
        die ("There was a problem getting the table of employees");
    }
    return $corps;
}
