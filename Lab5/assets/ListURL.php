<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 11/27/2017
 * Time: 12:33 PM
 */
require_once ("dbconn.php");
require_once ("Functions.php");
$db = dbconn();
/*function DropDown()
{
    $form =  "<option value=''></option>" . PHP_EOL;
    foreach($cols as $col)
    {
        $form .= "<option value='" . $col . "'>" . $col . "</option>";
    }// End of Foreach
    return $form;
}*/
?>

<html>
<header>
    <h1>URL Listing</h1>
    <a href ="index.php">Home</a>
    <nav>
<?php echo DropDown($db); ?>
    </nav>

</header>
</html>