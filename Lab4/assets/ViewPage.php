<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/1/2017
 * Time: 1:13 PM
 */
$action= filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING) ?? "";
$corp=filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode=filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner=filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone=filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
$id=filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";

require_once ("dbconn.php");
$db = dbconn();

function getCorpsInfoAsTable($db,$corps,$cols = null,$sortable = false)
{
    setlocale(LC_MONETARY, 'en_US.UTF-8');
    $table = "";
    if (count($corps) > 0):
    {
        $table = "<table>" . PHP_EOL;
        if ($cols && !$sortable):
            $table .= "\t<tr>";
            foreach ($cols as $col) {
                $table .= "<th>" . $col['id'];
                $table .= "<th>" . $col['corp'];
                $table .= "<th>" . $col['incorp_dt'];
                $table .= "<th>" . $col['email'];// build column headers as anchors, indicating sort=asc&col=colname
                $table .= "<th>" . $col['Zipcode'];
                $table .= "<th>" . $col['owner'];
                $table .= "<th>" . $col['phone'];
                $table .= "</th>";
            }
            $table .= "</tr>" . PHP_EOL;
        endif;
        /*if ($cols && $sortable):
            $dir = "ASC";
            $table .= "\t<tr>";
            foreach ($cols as $col) {
                $table .= "<th>" . $col['id'] . $dir;
                $table .= "<th>" . $col['corp'] . $dir;
                $table .= "<th>" . $col['incorp_dt'] .$dir;
                $table .= "<th>" . $col['email'] . $dir;// build column headers as anchors, indicating sort=asc&col=colname
                $table .= "<th>" . $col['Zipcode'] .$dir;
                $table .= "<th>" . $col['owner'] . $dir;
                $table .= "<th>" . $col['phone'] . $dir;
                $table.="</th>";
            }
            $table .= "</tr>" . PHP_EOL;
        endif;*/

        foreach ($corps as $corp):

            $table .="\t<tr>";
            $table .= "<td>" . $corp['corp'];
            $table .= "<td>" . date('m/d/Y', strtotime($corp['incorp_dt']));// will display the information.
            $table .= "<td>" . $corp['email'];
            $table .= "<td>" . $corp['zipcode'];
            $table .= "<td>" . $corp['owner'];
            $table .= "<td>" . $corp['phone'];
            $table .= "<td><form action='#' method='get' ><a href='assets/UpdateCorp.php?id=" . $corp['id'] . "'>Update</a> </form>";
            $table .= "<td><form action='#' method='get' ><a href='assets/DeleteCorp.php?id=" . $corp['id'] . "'>Delete</a> </form>";//puts a link next to each company name
            $table .= "<td><form action='#' methods='get'> <a href ='assets/Read.php?id=" . $corp['id'] . "'>Read</a></form>";
            $table .= "</td>";
            $table .= "</tr>";
        endforeach;
        $table .= "</table>" . PHP_EOL;
        return $table;
    //else :
        //return "<section>We have no employees to display</section>";
    endif;
}
//echo getCorpsInfoAsTable($db,$id);// displays the table.
function getCorps($db)
{
    try
    {
        $sql = "SELECT `corps`.`id`, `corps`.`corp`, `corps`.`incorp_dt`, `corps`.`email`, `corps`.`zipcode`, `corps`.`owner`, `corps`.`phone` FROM `corps` WHERE id=:id";
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
        $sql = "SELECT `corps`.`id`, `corps`.`corp`, `corps`.`incorp_dt`, `corps`.`email`, `corps`.`zipcode`, `corps`.`owner`, `corps`.`phone` FROM `corps` WHERE id=:id  ORDER BY $col $dir";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $corps = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die ("There was a problem getting the table of employees");
    }
    return $corps;
}
?>