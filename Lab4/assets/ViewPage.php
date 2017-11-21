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
//$id=filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";
/*$dir = filter_input(INPUT_POST, 'dir', FILTER_VALIDATE_REGEXP,
        array("options"=>array("regexp"=>'/^[ASC,DESC]$/') )
    ) ?? "";*/
require_once ("dbconn.php");
require_once ("corps.php");
$db = dbconn();

function getCorpsInfoAsTable($db, $corps, $cols = null, $sortable = false)
{
    setlocale(LC_MONETARY, 'en_US.UTF-8');
    $table = "";
    if (count($corps) > 0):
        $table .= "<table>" . PHP_EOL;
        if ($cols)
        {
            $table .= "<tr>";
            foreach ($cols as $col)
            {
                $table .= "<th>$col</th>";
            }// End of Foreach
            $table .= "</tr>" . PHP_EOL;
        }
        /*if ($cols && !$sortable):
            $table .= "\t<tr>";
            foreach ($cols as $col):

                $table .= "<th>" . $col['id'] . "</th>";
                $table .= "<th>" . $col['corp'] . "</th>";
                $table .= "<th>" . $col['incorp_dt'] . "</th>";
                $table .= "<th>" . $col['email'] . "</th>";// build column headers as anchors, indicating sort=asc&col=colname
                $table .= "<th>" . $col['Zipcode'] . "</th>";
                $table .= "<th>" . $col['owner'] . "</th>";
                $table .= "<th>" . $col['phone'] . "</th>";
                //$table .= "</th>";
            endforeach;
            $table .= "</tr>" . PHP_EOL;
        endif;*/
       //$sql = "SELECT * FROM corps WHERE id=:id";
       /* if (isset($_GET['dir']) && $sortable):
            if($_GET['dir'] == 'ASC') $sql .= "ORDER BY corps ASC";
            if($_GET['dir'] == 'DESC') $sql .= "ORDER BY corps DESC";
            //$dir = "ASC";
            /*$table .= "\t<tr>";
            foreach ($cols as $col) {
                $table .= "<th>" . $col['id'] . "</th>";
                $table .= "<th>" . $col['corp'] . "</th>";
                $table .= "<th>" . $col['incorp_dt'] . "</th>";
                $table .= "<th>" . $col['email'] . "</th>";// build column headers as anchors, indicating sort=asc&col=colname
                $table .= "<th>" . $col['Zipcode'] . "</th>";
                $table .= "<th>" . $col['owner'] . "</th>";
                $table .= "<th>" . $col['phone'] . "</th>";
            }
            $table .= "</tr>" . PHP_EOL;
        endif;*/
        foreach ($corps as $corp):
            $table .= "\t<tr>";
            $table .= "<td>" . $corp['id'] . "</td>";
            $table .= "<td>" . $corp['corp'] . "</td>";
            $table .= "<td>" . date('m/d/Y', strtotime($corp['incorp_dt'])) . "</td>";// will display the information.
            $table .= "<td>" . $corp['email'] . "</td>";
            $table .= "<td>" . $corp['zipcode'] . "</td>";
            $table .= "<td>" . $corp['owner'] . "</td>";
            $table .= "<td>" . $corp['phone'] . "</td>";
            $table .= "<td><form action='#' method='get' ><a href='assets/UpdateCorp.php?id=" . $corp['id'] . "'>Update</a> </form>" . "</td>";
            $table .= "<td><form action='#' method='get' ><a href='assets/DeleteCorp.php?id=" . $corp['id'] . "'>Delete</a> </form>" . "</td>";//puts a link next to each company name
            $table .= "<td><form action='#' method='get'><a href ='assets/Read.php?id=" . $corp['id'] . "'>Read</a></form>" ."</td>";
            $table .= "</tr>" . PHP_EOL;
        endforeach;
        $table .= "</table>" . PHP_EOL;
        return $table;
    else :
        return "<section>We have no corps to display</section>";
    endif;
}
?>
<!--<form method="get" action="">
<label for="col">Sort Column by</label>
<select name="col" id="col">
    <option value="id">id</option>
    <option value="corp">corp</option>
    <option value="incorp_dt">incorp_dt</option>
    <option value="email">email</option>
    <option value="zipcode">zipcode</option>
    <option value="owner">owner</option>
    <option value="phone">phone</option>
</select>
<label for="asc">Ascending: </label>
<input type="radio" name="dir" value="ASC" id="asc">
<label for="desc">Descending: </label>
<input type="radio" name="dir" value="DESC" id="desc">
<input type="hidden" name="action" value="sort">
<input type="submit">
<input type="submit" name="action" value="Reset">
</form>

<form method="get" action="">
    <label for="col">Search Column by</label>
    <select name="col" id="col">
        <option value="id">id</option>
        <option value="corp">corp</option>
        <option value="incorp_dt">incorp_dt</option>
        <option value="email">email</option>
        <option value="zipcode">zipcode</option>
        <option value="owner">owner</option>
        <option value="phone">phone</option>
    </select>
    <label for="term" >Term: </label>
    <input type="text" name="action" value="search">
    <input type="hidden" name="action" value="search">
    <input type="submit">
    <input type="submit" name="action" value="Reset">
</form>-->

