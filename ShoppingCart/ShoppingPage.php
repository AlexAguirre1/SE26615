<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12/8/2017
 * Time: 10:30 PM
 */
//Shopping cart page with link to cart
require_once("Assets/dbconn.php");
include_once("Assets/Functions.php");
$db=dbconn();
?>
<style>
    <?php include("Assets/stylesheet.css") ?>
</style>
<div class="item active">
    <h3>Welcome go ahead and go shopping!</h3>
</div>
<nav>
<a href="Assets/CartPage.php">Cart</a>

</nav>

<label><b>Category:</b></label><?php echo getCategories($db) ?>
<footer>
    Copyright &copy; <?php echo date('Y'); ?> Alex Aguirre. All Rights Reserved. <!-- this is a footer at the bottom of the html code when it is being display-->
</footer>
