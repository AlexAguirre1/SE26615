<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/1/2017
 * Time: 1:13 PM
 */
/*$action= filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING) ?? "";
$corp=filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode=filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner=filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone=filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";*/
$id=filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";

require_once ("dbconn.php");
$db = dbconn();

function getCorpsInfoAsTable($db,$corps,$cols = null,$sortable = false)
{
    setlocale(LC_MONETARY, 'en_US.UTF-8');
    $table = "";
    if (count($corps) > 0):
        $table = "<table>" . PHP_EOL;
        if ($cols && !$sortable):
            $table .= "\t<tr>";
            foreach ($cols as $col) {
                $table .= "<th>" . $col['id'] . "</th>";
                $table .= "<th>" . $col['corp'] . "</th>";
                $table .= "<th>" . $col['incorp_dt'] . "</th>";
                $table .= "<th>" . $col['email'] . "</th>";// build column headers as anchors, indicating sort=asc&col=colname
                $table .= "<th>" . $col['Zipcode'] . "</th>";
                $table .= "<th>" . $col['owner'] . "</th>";
                $table .= "<th>" . $col['phone'] . "</th>";
                $table .= "</th>";
            }
            $table .= "</tr>" . PHP_EOL;
        endif;
        foreach ($corps as $corp):
            $table .= "\t<tr>";
            $table .= "<td>" . $corp['corp'] . "</td>";
            $table .= "<td>" . date('m/d/Y', strtotime($corp['incorp_dt'])) . "</td>";// will display the information.
            $table .= "<td>" . $corp['email'] . "</td>";
            $table .= "<td>" . $corp['zipcode'] . "</td>";
            $table .= "<td>" . $corp['owner'] . "</td>";
            $table .= "<td>" . $corp['phone'] . "</td>";
            $table .= "<td><form action='#' method='get' ><a href='Assets/UpdateCorp.php?id=" . $corp['id'] . "'>Update</a> </form>";
            $table .= "</td><td><form action='#' method='get' ><a href='Assets/DeleteCorp.php?id=" . $corp['id'] . "'>Delete</a> </form>";//puts a link next to each company name
            $table .= "</td><td><form action='#' methods='get'> <a href ='Assets/Read.php?id=" . $corp['id'] . "'>Read</a></form>";
            $table .= "</tr>" . PHP_EOL;
        endforeach;
        $table .= "</table>" . PHP_EOL;
        return $table;
    else :
        return "<section>We have no corps to display</section>";
    endif;

}
//echo getCorpsInfoAsTable($db,$id);// displays the table.

?>