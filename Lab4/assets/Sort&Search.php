<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11/4/2017
 * Time: 10:11 PM
 */
?>
<form method="get" action="">
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
</form>