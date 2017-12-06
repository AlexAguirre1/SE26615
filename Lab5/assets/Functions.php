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
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function DropDown($db)
{
    try
    {
        $sql = "SELECT * FROM sites";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $websites = $stmt->fetchAll(PDO::FETCH_ASSOC);

     if($sql->rowCount() > 0)
     {
         $dropDown = "<option value=''>Choose</option>" . PHP_EOL;
         foreach ($websites as $website)
         {
             $dropDown .="<option value='" . $website['site'] . "'> </option>";
         }
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
function websiteValid($db, $website)
{
    try
    {
        $sql = $db-> prepare("SELECT * FROM sites WHERE 'site' LIKE '%website%'");
        $sql->execute();
        $url = $sql->fetchALL(PDO::FETCH_ASSOC);

        if (count($url) > 0)
        {
            echo("This has been already inserted");
        }
        else
        {
            $key =
        }
    }
}