<html>
<header>
    <h1>URL Listing</h1>
    <a href ="..\index.php">Home</a>
    <nav>

    </nav>

</header>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/27/2017
 * Time: 12:33 PM
 */
// There are some selection that wont work because the validation on some will not display the url that follows with.
require_once ("dbconn.php");//calling connection to database
require_once ("Functions.php");
$db = dbconn();
$list = filter_input(INPUT_POST, 'list', FILTER_SANITIZE_STRING) ?? NULL;
$form = "<form method='post' action='#'>";
$form .= DropList($db);
$form .= "<input type='submit' name='action' value='submit' />";
echo $form;//displays the form/dropdown list
if(isPostRequest())
{
     getWebsite($db, $list);
}

?>
</section>
<!--<a href ="Assets/CorpsForm.php">Add</a>-->
<footer>
    Copyright &copy; <?php echo date('Y'); ?> Alex Aguirre. All Rights Reserved. <!-- this is a footer at the bottom of the html code when it is being display-->
</footer>
</body>

</html>

