<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12/7/2017
 * Time: 8:03 PM
 */
require_once ("dbconn.php");
include_once ("Functions.php");
$db=dbconn();
$action= filter_input(INPUT_POST, 'action',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?? NULL;
$Cate= filter_input(INPUT_POST, 'CName',FILTER_SANITIZE_STRING) ?? "";
$id =filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING) ?? filter_input(INPUT_GET, 'id',FILTER_SANITIZE_STRING) ?? "";

session_start();
if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    header("location: ..\index.php");
    exit;
}


switch($action)
{
    case "Add":
        AddCategories($db,$Cate);
        break;
    case"Edit":
        break;
    case"Delete":
        DeleteCategories($db, $id);
        break;
    case"List":
        break;
    case"Choose Image":
        break;
    case"Add Product":
        break;

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
<header>
    <h2>Welcome to the Admin Page!</h2>
    <a href="Logout.php?logout">Logout</a>
    </header>

<!--<a href="..\index.php">Home</a>-->
<form method="post" action="#">
<!-- drop Down List should go right here-->
<?php echo getCategories($db) ?>
<input type="submit" name="action" value="Edit" />
<input type="submit" name="action" value="Delete" />
<input type="submit" name="action" value="List" />
</form>
<form method="post" action="#">
<div class="manage">
<label>Category Name</label>: <input type="text" name="CName" value='' required="" class="textBox"/><br />
    <input type="submit" name="action" value="Add" />
</div>
</form>
<br />
<form method="post" action="#">
<label>Product Name</label>: <input type="text" name="PName" value='' required="" class="textBox"/><br />
<!-- Drop Down list for Products should go right-->
<div class="manage">
<label>Price $</label>: <input type="text" name="Price" value='' required="" class="textBox"/><br />
    <input type="submit" name="action" value="Choose Image" />
    <input type="submit" name="action" value="Add Product" />
</div>
</form>