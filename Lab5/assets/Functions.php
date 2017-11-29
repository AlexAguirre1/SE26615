<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/29/2017
 * Time: 1:35 PM
 */
function getUrl($db)
{
    try
    {
        $sql = "SELECT * FROM sites";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $Url = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e)
    {
        die($e);
    }
    return $Url;
}
function getSiteLinks($db)
{
    try
    {
        $sql = "SELECT * FROM sitelinks";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $Url = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e)
    {
        die($e);
    }
    return $Url;
}
