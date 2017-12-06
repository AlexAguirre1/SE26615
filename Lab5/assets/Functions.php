<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/29/2017
 * Time: 1:35 PM
 */
//require_once ("AddURL.php");
function getUrl($db)//grabbing the url
{
    try
    {
        $sql = "SELECT * FROM sites";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e)
    {
        die($e);
    }
    return $sites;
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
/*function addingForm()
{
    $form = "<form method='post' action='#'>";
    $form .= "URL: <input type='text' name='site' /> <br />" . PHP_EOL;
    $form .=  "<input type='submit' name='action' value='Save' />" . PHP_EOL;
    $form .= "</form>";
    return $form;
}*/
function AddUrl($db,$site, $sites, $date)
{
    try
    {
        $sql = $db->prepare("INSERT INTO sites SET site =:site, date =:date");//inserts/add a ne actore each time to form is filled out.
        $sql->bindParam(':site', $site);
        $sql->bindParam(':date', $date);
        $sql->execute();
        $urlID = $db->lastInsertId();
        foreach($sites as $link) {
            $sql = $db->prepare("INSERT INTO sitelinks VALUES (:site_id, :link)");
            $sql->bindParam(':link', $link);
            $sql->bindParam(':site_id', $urlID);
            $sql->execute();
        }
        return $sql->rowCount();
    }catch(PDOException $e)
    {
        die($e);//will let me know if there is any errors.
    }
}
function websiteValid($db,$site,$sites, $date)
{
    if (isset($_POST['site'])) {
        if (empty($_POST['site'])) {
            echo "must enter in in a website.";
        } else if (!preg_match("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $_POST['site'])) {
            echo "this is not a valid website";

        } else {
            $rowN = websiteF($db, $site);
            if ($rowN == 0) {
                $sites = array();
                $files = file_get_contents($_POST['site']);
                preg_match_all("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $files, $similars, PREG_OFFSET_CAPTURE);
                foreach ($similars as $same)
                {
                    foreach($same as $s) {
                        array_push($sites, $s[0]);
                        echo "<a href='" . $s[0] . "'>" . $s[0] . "</a>";
                    }
                }
            }
        }
        AddUrl($db, $site, $sites, $date);
    } else {
        echo "This website has been enter already!";
    }
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
        $sql = $db->prepare("SELECT Count(*) FROM sites WHERE site=:site");
        $sql->bindParam(':site', $site);
        $sql->execute();
        $rowN = $sql->fetchColumn();
        return $rowN;
    }
    catch(PDOException $e)
    {
        die($e);
    }
}function getWebsite($db, $list)
{
    try
    {
        $sql = $db->prepare("SELECT site_id, date FROM sites WHERE site=:list");
        $sql->bindParam(":list", $list);
        $sql->execute();
        $websites = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($websites as $site) {
            echo "<br>" . "Links for " . $list . " was stored on " . $site['date'] . "<hr>";
            $urlID = $site['site_id'];
        }
        $sql = $db->prepare("SELECT * FROM sitelinks WHERE site_id=:urlID");
        $sql->bindParam(":site_id", $urlID);
        $sql->execute();
        $sites = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($sites as $site){
            echo "<a href='" . $site['link'] . "' target='_blank'/>" . $site['link'] . "<br>";
        }
    } catch(PDOException $e){
        die ($e);
    }
}

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}
//Get request function
function isGetRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET' );
}
