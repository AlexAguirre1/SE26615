<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12/7/2017
 * Time: 8:03 PM
 */
session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    header("location: ..\index.php");
    exit;
}
//echo "Welcome to the Admin Page, coming Soon.";
/*session_start();
require_once ("dbconn.php");
if (!isset($_SESSION['USession'])) {
    header("Location: ..\index.php");
}
$sql = $db->query("SELECT * FROM users WHERE user_id=".$_SESSION['USession']);
$rows=$sql->fetch_array();
$db->close();*/

?>
<style>
<?php include("stylesheet.css") ?>
</style>
<!--<h2>Welcome - <?php echo $rows['email']; ?></h2>-->
<header>
    <h2>Welcome to the Admin Page!</h2>
    <a href="Logout.php?logout">Logout</a>
    </header>

<!--<a href="..\index.php">Home</a>-->
<!-- drop Down List should go right here-->
<input type="submit" name="Edit" value="Edit" />
<input type="submit" name="Delete" value="Delete" />
<input type="submit" name="List" value="List" />
<div class="manage">
<label>Category Name</label>: <input type="text" name="CName" value='' required="" class="textBox"/><br />
    <input type="submit" name="AddC" value="Add Category" />
</div>
<br />
<label>Product Name</label>: <input type="text" name="PName" value='' required="" class="textBox"/><br />
<!-- Drop Down list for Products should go right-->
<div class="manage">
<label>Price $</label>: <input type="text" name="Price" value='' required="" class="textBox"/><br />
    <input type="submit" name="Images" value="Choose Image" />
    <input type="submit" name="Add" value="Add Product" />
</div>