<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/29/2017
 * Time: 1:35 PM
 */
//my Validation does not work i tried different patterns to valid the url but nothing works and it is late so i rather hadn in what is working so far
//require_once ("AddURL.php");
function getUrl($db)//grabbing the url
{
    try
    {
        $sql = "SELECT * FROM sites";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $websites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e)
    {
        die($e);
    }
    return $websites;
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

function AddUrl($db,$site, $websites, $date)// can insert/add the url
{
    try
    {
        $sql = $db->prepare("INSERT INTO sites SET site =:site, date =:date");//inserts/add a ne actore each time to form is filled out.
        $sql->bindParam(':site', $site);
        $sql->bindParam(':date', $date);
        $sql->execute();
        $urlID = $db->lastInsertId();
        foreach($websites as $link) {
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
function websiteValid($db, $site, $websites, $date)// this is my validation function it does not work it is funky when it comes to validating an email
{
    if (isset($_POST['site'])) {
        if (empty($_POST['site'])) {
            echo "must enter in a website. Example would be https://www.amazon.com/";
        } else if (!preg_match("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $_POST['site'])) {
            echo "this is not a valid website.Example would be https://www.amazon.com/";

        } else {
            $rowN = websiteF($db, $site);
            if ($rowN == 0) {
                $websites = array();
                $files = file_get_contents($_POST['site']);
                preg_match_all("/(https?:\/\/[\da-z\.-]+\.[a-z\.]{2,6}[\/\w \.-]+)/", $files, $similar, PREG_OFFSET_CAPTURE);
                foreach ($similar as $same)
                {
                    foreach($same as $s) {
                        array_push($websites, $s[0]);
                        echo "<a href='" . $s[0] . "'>" . $s[0] . "</a>";
                    }
                }
            }
        }
        AddUrl($db, $site, $websites, $date);
    } else {
        echo "This website has been enter already!";
    }
}
function DropList($db)//creates the drop down list of the saved emails
{
    try
    {
        $sql = $db->prepare("SELECT * FROM sites");
        //$sql = $db->prepare($sql);
        $sql->execute();
        $websites = $sql->fetchALL(PDO::FETCH_ASSOC);
     if($sql->rowCount() > 0)
     {
         $dropDown = "<select name='list'>" . PHP_EOL;
         foreach ($websites as $website)
         {
             $dropDown .="<option value='" . $website['site'] . "'>". $website['site']."</option>";
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
function websiteF($db, $site)//this function will find the urls
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
}function getWebsite($db, $list)//this will get the website and put them in the drop down list as well display the urls that have been selected.
{
    try
    {
        $sql = $db->prepare("SELECT site_id, date FROM sites WHERE site=:list");
        $sql->bindParam(":list", $list);
        $sql->execute();
        $websites = $sql->fetchALL(PDO::FETCH_ASSOC);
        foreach($websites as $site) {
            echo "<br>" . "Links for " . $list . " was stored on " . $site['date'] . "<hr>";
            $urlID = $site['site_id'];
        }
        $sql = $db->prepare("SELECT * FROM sitelinks WHERE site_id=:site_id");
        $sql->bindParam(":site_id", $urlID);
        $sql->execute();
        $websites = $sql->fetchALL(PDO::FETCH_ASSOC);
        foreach($websites as $site){
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
