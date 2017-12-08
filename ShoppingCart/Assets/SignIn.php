<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12/8/2017
 * Time: 12:32 AM
 */
//session_start();
require_once ("dbconn.php");
if(isset($_SESSION['USession'])!="")
{
    header("Location: AdminPage.php");
    exit();
}

if(isset($_POST['login'])) {
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    $email = $db->real_escape_string($email);
    $password = $db->real_escape_string($password);

    $sql = $db->query("SELECT user_id, email, password FROM users WHERE email='$email'");
    $row = $sql->fetch_array();

    $rowCount = $sql->num_rows;

    if (password_verify($password, $row['password']) && $rowCount == 1) {
        $_SESSION['USession'] = $row['user_id'];
        header("Location: AdminPage.php");
    }else{
        $message = "Invalid Email or Password";
    }
    $db->close();
}

?>
<style>
    <?php include("stylesheet.css") ?>
</style>
<div class="item active">
    <h2>Sign In</h2>
</div>
<div class="errorMessages">
    <?php
    if (isset($message)) {
        echo $message;
    }
    ?>
</div>
<div class="manage">
    <form method="post" >
        <!--Company's Name: <input type="text" name="corp" value='' /><br />-->
        <div class="positionTB">
            <b>Email:</b> <input type="text" name="email" value='' class="textBox" /><br />
        </div>
        <!--Zipcode: <input type="text" name="zipcode" value='' /><br />-->
        <div class="positionTB">
            <b>Password:</b> <input type="text" name="password" value='' class="textBox" /><br />
        </div>
        <!--Phone: <input type="text" name="phone" value=''/><br />-->
        <input type="submit" name="login" value="Login" />
    </form>
</div>
