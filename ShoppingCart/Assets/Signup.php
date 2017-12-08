<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12/7/2017
 * Time: 4:22 PM
 */
session_start();
if(isset($_SESSION['USession'])!="")
{
    header("Location: AdminPage.php");
}
require_once ("dbconn.php");
if(isset($_POST['register']))
{
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    //$email = strip_tags($_POST['email']);

    $email = $db->real_escape_string($email);
    $password = $db->real_escape_string($password);
    //$email = $db->real_escape_string($email);
    $hashedP = password_hash($password, PASSWORD_DEFAULT);

    $EmailCheck = $db-> query("SELECT * FROM users WHERE email='$email'");
    $Count = $EmailCheck->num_rows;

    if($Count == 0)
    {
        $query = "INSERT INTO users(email, password, now()) VALUES(NULL ,'$email', '$hashedP')";

        if($db->query($query))
        {
            $message = "You were Just registered";
        }else{
            $message = "There was an error trying to register";
        }
    }else{
        $message = "Sorry email was already taken";
    }
    $db->close();
}
//{
  //  if($_POST['action']=="Login")
  //  {
       // $email = mysqli_real_escape_string($db,$_POST['email']);
       // $Password = mysqli_real_escape_string($db,$_POST['password']);
       /* $sql= mysqli_query($connection,"SELECT * FROM users WHERE email='".$email."' and password='".md5($password)."'");
        $results = mysqli_fetch_array($sql);
        if(count($results)>= 1)
        {
            $message = $results['name']." Login Sucessfully!!";
        }
        else
        {
            $message = "Invalid email or password!!";
        }

    }
}
/*session_start();
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
            //header("Location: Signup.php");
            echo "must fill in";
            exit();
        }
        else
        {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))//will validate email.
            {
                //header("Location: Signup.php");
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
                   // header("Location: Signup.php");
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
                        //header("Location: Signup.php");
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
    //header("Location: Signup.php");
   // exit();
}*/
?>
<style>
<?php include("stylesheet.css") ?>
</style>

<div class="item active">
    <h2>Sign Up</h2>
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
        <div class="positionTB">
        <b>Email:</b> <input type="text" name="email" value='' required="" class="textBox"/><br />
        </div>

        <div class="positionTB">
        <b>Password:</b> <input type="text" name="password" value='' required="" class="textBox"/><br />
        </div>
        <div class="positionTB">
            <b>Confirm Password:</b> <input type="text" name="passwordC" value='' required="" class="textBox"/><br />
        </div>
            <input type="submit" name="register" value="register" />
    </form>

</div>
