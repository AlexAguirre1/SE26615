<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11/4/2017
 * Time: 10:11 PM
 */
require_once ("dbconn.php");
require_once ("corps.php");
$db = dbconn();
$cols = getColumnNames($db, 'corps');
$dropD= DropDown($cols)
?>

<form method="get" action="#">
    <label for="col">Sort Column by</label>
    <select name="col">
        <?php echo $dropD ?>
    </select>
    <label for="asc">Ascending: </label>
    <input type="radio" name="dir" value="ASC" id="asc">
    <label for="desc">Descending: </label>
    <input type="radio" name="dir" value="DESC" id="desc">
    <input type="hidden" name="action" value="sort">
    <input type="submit">
    <input type="submit" name="action" value="Reset">
</form>

<form method="get" action="#">
    <label>Search Column by</label>
    <select name="SearchCol">
        <?php echo $dropD ?>
    </select>
    <label >Search: </label> <input type="text" name="search" value=""/>
    <input type="submit" value="search"/>
    <input type="hidden" name="action" value="search"/>
    <input type="submit" name="action" value="Reset"/>
</form>