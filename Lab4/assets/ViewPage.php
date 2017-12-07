<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/1/2017
 * Time: 1:13 PM
 */
//got everthying coded but i couldn't get my sort or search to work i tried everything but could get it to work
//i tried my best but ill take what i can get for a grade. the code is a mess so sorry.
// i feel like the column name was messing me up for the sort and search i felt like should of worked but i guess not.
$action= filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING) ?? "";
$corp=filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";
$email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";
$zipcode=filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";
$owner=filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
$phone=filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
$id=filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";
$dir = filter_input(INPUT_GET, 'dir', FILTER_SANITIZE_STRING) ?? null;
  $col = filter_input(INPUT_GET, 'col', FILTER_SANITIZE_STRING) ?? null;
require_once ("dbconn.php");
require_once ("corps.php");
$db = dbconn();

function getCorpsInfoAsTable($db, $cols = null, $sortable = false)//will get the the table and display
{
    $corps= getCorpsAsSortedTable($db, $col, $dir);
    setlocale(LC_MONETARY, 'en_US.UTF-8');
    $table = "";
    if (count($corps) > 0):
        $table .= "<table>" . PHP_EOL;
        if ($cols && ($sortable == null || $sortable =="ASC")):
        {
            $table .= "<tr>";
            foreach ($col as $cols)
            {
                $dir = "DESC";
                $table .= "<th><a href='?action=sort&col=$col&dir=$dir'>$cols</a></th>";
            }// End of Foreach
            $table .= "</tr>" . PHP_EOL;
        }
        else:
            $table .="<tr>";
        foreach($col as $cols):
            $dir = "ASC";
            $table="<th><a href='?action=sort&col=$col&dir=$dir'>$col</a></th>";
            endforeach;
            $table .= "<tr>" . PHP_EOL;
            endif;
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
        return "<section>There is nothing to Display.</section>";
    endif;
}
function getCorpsAsSortedTable($db, $col, $dir) {//grab the table as sorted if it worked.
    if($col == null) {
        try {
            $sql = "SELECT * FROM corps";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $corps = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die ("There was a problem getting the table of Corps");
        }
    }
    else {
        try {
            $sql = "SELECT * FROM corps ORDER BY $col $dir";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $corps = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die ("There was a problem getting the table of Corps");
        }
    }
    return $corps;
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

<!--if ($cols && !$sortable):
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
endif;
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
    $table .= "</tr>" . PHP_EOL;-->