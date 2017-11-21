<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/15/2017
 * Time: 1:44 PM
 */
//require_once ("dbconn.php");
//$db = dbconn();
$id=filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";

function getCorps($db)
{
    try
    {
        $sql = "SELECT * FROM corps";
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
        if($col == NULL)
        {
            $col = "id";
        }
        if($dir == NUll)
        {
            $dir = "ASC";
        }
        $sql = "SELECT * FROM corps ORDER BY $col $dir";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $corps = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }catch (PDOException $e) {
        die ("There was a problem getting the table of employees");
    }
    return $corps;
}
function SearchCorp($db, $SearchCol, $search)
{
    try
    {
        if ($SearchCol == NULL)
        {
            $SearchCol = 'id';
        }
        $sql = "SELECT * FROM corps WHERE $SearchCol LIKE '%$search%'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $corps = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = "<table>" . PHP_EOL;
        $table .= "<tr><td>" . $stmt->rowCount() . " Records Found.</td></tr>" . PHP_EOL;
       /* if ($cols) {
            $table .= "<tr>";
            foreach ($cols as $col) {
                $table .= "<th>$col</th>";
            }
            $table .= "</tr>" . PHP_EOL;
        }*/
        foreach ($corps as $corp) {
            $table .= "<tr><td>" . $corp['corp'];
            //$table .= "</td><td>" . $actor['lastname'];// will display the information.
            //$table .= "</td><td>" . $actor['dob'];
            $table .= "</td><td><form action='#' method='get' ><a href='assets/UpdateCorp.php?id=" . $corp['id'] . "'>Update</a> </form>";
            $table .= "</td><td><form action='#' method='get' ><a href='assets/DeleteCorp.php?id=" . $corp['id'] . "'>Delete</a> </form>";//puts a link next to each company name
            $table .= "</td><td><form action='#' method='get'> <a href ='assets/Read.php?id=" . $corp['id'] . "'>Read</a></form>";
            $table .= "</td></tr>";
        }
        $table .= "</table>" . PHP_EOL;
        return $table;
    }
catch (PDOException $e)
    {
        die ($e);
    }
}
function SearchAllCorp($db, $cols, $SearchCol, $search)
{
    try
    {
        /*if ($SearchCol == NULL)
        {
            $SearchCol = 'id';
        }*/
        $sql = "SELECT * FROM corps WHERE $SearchCol LIKE '%$search%'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $corps = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $table = "<table>" . PHP_EOL;
        $table .= "<tr><td>" . $stmt->rowCount() . " Records Found.</td></tr>" . PHP_EOL;
        if ($cols)
        {
            $table .= "<tr>";
            foreach ($cols as $col)
            {
                $table .= "<th>$col</th>";
            }
            $table .= "</tr>" . PHP_EOL;
        }
        foreach ($corps as $corp) {
            $table .= "\t<tr>";
            $table .= "<td>" . $corp['id'] . "</td>";
            $table .= "<td>" . $corp['corp'] . "</td>";
            $table .= "<td>" . date('m/d/Y', strtotime($corp['incorp_dt'])) . "</td>";// will display the information.
            $table .= "<td>" . $corp['email'] . "</td>";
            $table .= "<td>" . $corp['zipcode'] . "</td>";
            $table .= "<td>" . $corp['owner'] . "</td>";
            $table .= "<td>" . $corp['phone'] . "</td>";
            //$table .= "<td><form action='#' method='get' ><a href='assets/UpdateCorp.php?id=" . $corp['id'] . "'>Update</a> </form>" . "</td>";
           // $table .= "<td><form action='#' method='get' ><a href='assets/DeleteCorp.php?id=" . $corp['id'] . "'>Delete</a> </form>" . "</td>";//puts a link next to each company name
            //$table .= "<td><form action='#' method='get'><a href ='assets/Read.php?id=" . $corp['id'] . "'>Read</a></form>" ."</td>";
            $table .= "</tr>" . PHP_EOL;
        }
        $table .= "</table>" . PHP_EOL;
        return $table;
    }
    catch (PDOException $e)
    {
        die ($e);
    }
}
function DropDown($cols)
{
    $form =  "<option value=''> --Select--</option>" . PHP_EOL;
    foreach($cols as $col)
    {
        $form .= "<option value='" . $col . "'>" . $col . "</option>";
    }// End of Foreach
    return $form;
}