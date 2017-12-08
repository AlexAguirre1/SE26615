<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12/7/2017
 * Time: 4:22 PM
 */

if(isset($_POST['submit']))
{
    require_once("dbconn.php");
   // $db = dbconn();
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    //$userID= mysqli_real_escape_string($db, $_POST);
    //$password2 =mysqli_real_escape_string($db,$_POST['password2']);
       /* if(empty($email) || empty($email))//checks if the input field is empty
        {
            //header("Location: Signup_Login.php");
            echo "must fill in";
            exit();
        }
        else
        {*/
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))//will validate email.
            {
                //header("Location: Signup_Login.php");
                echo "Not a Valid Email";
                //exit();
            }
            else//will check if email has been taken
            {
                $sql = "SELECT * FROM users WHERE user_id='$email'";
                $results = mysqli_query($db,$sql);
                $resultC = mysqli_num_rows($results);

                if($resultC > 0)
                {
                   // header("Location: Signup_Login.php");
                    echo "email has already been taken";
                    //exit();
                }
                else//will hash the password when saved
                {
                    //if ($password == $password2) {
                        $PasswordHash = md5($password);
                        $sql = "INSERT INTO users(email, password, now()) VALUES('$email','$PasswordHash')";
                        $result = $db ->query($db, $sql);
                        header("Location: index.php");
                        //$_SESSION['message'] = "The Password do not match";
                        //header("Location: Signup_Login.php");
                        //exit();
                        //$sql = $db->prepare("INSERT INTO users VALUES (null, :email,:password now())");//inserts/add a ne actore each time to form is filled out.
                        //$sql->bindParam(':email', $email);
                        //$sql->bindParam(':password', $PasswordHash);
                        //$sql->bindParam(':zipcode', $zipcode);
                        //$sql->bindParam(':owner', $owner);
                        //$sql->bindParam(':phone', $phone);
                        //$sql->execute();
                        //echo($sql->rowCount(). "rows inserted.");
                    }


            }

}
else
{
    //echo "hello";
    //header("Location: Signup_Login.php");
   // exit();
}
?>
<style>
<?php include("stylesheet.css") ?>
</style>
<div class="item active">
<h2>Sign In</h2>
</div>
<div class="manage">
<form method="POST" action="Assets/AdminPage.php">
    <!--Company's Name: <input type="text" name="corp" value='' /><br />-->
    Email: <input type="text" name="email" value='' /><br />
    <!--Zipcode: <input type="text" name="zipcode" value='' /><br />-->
    Password: <input type="text" name="password" value='' /><br />
    <!--Phone: <input type="text" name="phone" value=''/><br />-->
    <input type="submit" name="login" value="Login" />
</form>
</div>
<div class="item active">
    <h2>Sign Up</h2>
</div>
<!--<div class="manage">-->
    <form method="POST" action="Assets/AdminPage.php">
        Email: <input type="text" name="email" value='' required="" /><br />
        Password: <input type="text" name="password" value='' required=""/><br />
        Confirm Password: <input type="text" name="passwordC" value='' required=""/><br />
        <input type="submit" name="submit" value="register" />
    </form>
<!--</div>-->
