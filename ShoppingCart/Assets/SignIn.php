<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12/8/2017
 * Time: 12:32 AM
 */
/*If the user has an acount/email and pssword saved they can login to the admin page. but if not then they wont be able to login,
The email must match the password you entereed when signed up.*/
require_once ("dbconn.php");
$db = dbconn();
//Variables
$email = $password="";
$emailErr = $passwordErr = "";
//processes data throught submit
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //check if email is empty
    if(empty(trim($_POST["email"])))
    {
        $emailErr = "please enter in email";
    }else{
        $email = trim($_POST["email"]);
    }
    //check if password is empty
    if(empty(trim($_POST['password']))){
        $passwordErr = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }

    if(empty($emailErr) && empty($passwordErr))
    {
        $sql = "SELECT email, password FROM users WHERE email=:email";
        if($stmt = $db->prepare($sql))
        {
            $stmt->bindParam(':email', $pEmail, PDO::PARAM_STR);
            //mysqli_stmt_bind_param($stmt, "s", $pEmail);
            $pEmail = trim($_POST["email"]);
                if($stmt->execute())
                {
                    //mysqli_stmt_store_result($stmt);
                    if($stmt->rowCount() == 1)
                    {
                        //mysqli_stmt_bind_result($stmt, $email, $hashedPass);
                        if($rows= $stmt->fetch())
                        {
                            $hashedPass = $rows['password'];
                            if(password_verify($password, $hashedPass))
                            {
                                session_start();
                                $_SESSION['email'] = $email;
                                header("Location: AdminPage.php");
                            }else{
                                $passwordErr = "The password was incorrect";
                            }

                        }

                    }else{
                        $emailErr = "email was incorrect";
                    }
                }else{
                    echo "something went wrong!";
                }
        }
        unset($stmt);
    }
    unset($db);
}
/*session_start();
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
}*/

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
            <b>Email:</b> <input type="text" name="email" value='' class="textBox" /><?php echo $emailErr ?><br />
        </div>
        <!--Zipcode: <input type="text" name="zipcode" value='' /><br />-->
        <div class="positionTB">
            <b>Password:</b> <input type="text" name="password" value='' class="textBox" /><?php echo $passwordErr ?><br />
        </div>
        <!--Phone: <input type="text" name="phone" value=''/><br />-->
        <input class="button1" type="submit" name="submit" value="submit" />
    </form>
</div>
<footer>
    Copyright &copy; <?php echo date('Y'); ?> Alex Aguirre. All Rights Reserved. <!-- this is a footer at the bottom of the html code when it is being display-->
</footer>
