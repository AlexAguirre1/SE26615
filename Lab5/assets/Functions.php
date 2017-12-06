<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/29/2017
 * Time: 1:35 PM
 */
function getUrl($db)//grabbing the url
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
/*function getSiteLinks($db)
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
}*/
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
         $dropDown = "<option value='dropL'>" . PHP_EOL;
         foreach ($websites as $website)
         {
             $dropDown .="<option value='" . $website['site'] . "'> </option>";
         }
         $dropDown .="</option>";
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
function websiteF($db, $site)
{
    try {
        $sql = $db->prpare("SELECT Count(*) FROM sites WHERE site=:site");
        $sql->bindParam(':site', $site);
        $sql->execute();
        $rowN = $sql->fetchColumn();
        return $rowN;
    }
    catch(PDOException $e)
    {
        die($e);
    }
}function getWebsite()
{
    
}
