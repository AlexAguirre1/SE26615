<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 12/7/2017
 * Time: 4:22 PM
 */
/*session_start();
if(isset($_SESSION['USession'])!="")
{
    header("Location: AdminPage.php");
}*/
require_once ("dbconn.php");
$db = dbconn();
//Variables
$email = $password =$passwordC = "";
$emailErr = $passwordErr = $passwordCErr = "";
//processes data when submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //validate if empty
    if(empty(trim($_POST["email"])))
    {
        $emailErr = "Enter in an email";
    }else{
        $sql = "SELECT user_id FROM users WHERE email =:email";
        if($stmt =$db->prepare($sql))
        {
            $stmt->bindParam(':email', $pEmail, PDO::PARAM_STR);
            $pEmail = trim($_POST["email"]);
            if($stmt->execute())
            {
                //mysqli_stmt_store_result($stmt);
                if($stmt->rowCount() == 1)
                {
                    $emailErr = "This email has been taken";
                }else{
                    $email = trim($_POST["email"]);
                }
            }else{
                echo "something went wrong";
            }
        }
        unset($stmt);
    }
    //Validate Password
    if(empty(trim($_POST['password'])))
    {
        $passwordErr = "Please enter in a password";
    }elseif(strlen(trim($_POST['password'])) < 3)
    {
        $passwordErr = "Password needs to be at least 3 letters";
    }else{
        $password = trim($_POST['password']);
    }
    //Validate Confirm Password
    if(empty(trim($_POST["passwordC"])))
    {
        $passwordCErr = "confirm the Passwords";
    }else{
        $passwordC = trim($_POST['passwordC']);
        if($password != $passwordC)
        {
            $passwordCErr = 'Passwords did not match!';
        }
    }
    if(empty($emailErr) && empty($passwordErr) && empty($passwordCErr))
    {
        $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
        if($stmt = $db->prepare($sql))
        {
            //mysqli_stmt_bind_param($stmt, "ss", $pEmail, $pPassword);
           // mysqli_stmt_bind_param($stmt,"ss",$pEmail,$pPassword);
            $stmt->bindParam(':email', $pEmail, PDO::PARAM_STR);
            $stmt->bindParam(':password', $pPassword, PDO::PARAM_STR);

            $pEmail = $email;
            $pPassword = password_hash($password,PASSWORD_DEFAULT);//hashes the password

            if($stmt->execute())
            {
                header("Location: SignIn.php");//brings them to the login page so they can sign in.
            }else{
                echo"something went wrong";
            }

        }
        unset($stmt);
    }
    unset($db);
}
/*if(isset($_POST['register']))
{
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $passwordC = strip_tags($_POST['passwordC']);

    $email = $db->real_escape_string($email);
    $password = $db->real_escape_string($password);
    $passwordC = $db->real_escape_string($passwordC);
    $hashedP = password_hash($password, PASSWORD_DEFAULT);

    $EmailCheck = $db->prepare("SELECT email FROM users WHERE email = :email");
    $EmailCheck->bindParam(':email', $email);
    $EmailCheck->execute();
    $Count = $EmailCheck->rowCount();

    if($Count == 0)
    {
        $date = new DateTime('now');
        $created = $date->format('Y-m-d H:i:s');
        $sql = $db->prepare("INSERT INTO users VALUES (null, :email, :password, :created)");
        $sql->bindParam(':email', $email);
        $sql->bindParam(':password', $password);
        $sql->bindParam(':created', $created);
        $sql->execute();
        //$query = "INSERT INTO users(email, password, now()) VALUES('$email', '$hashedP')";

        if($sql)
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

    <form method="post"  >
        <div class="positionTB">
        <b>Email:</b> <input type="text" name="email" value=''  class="textBox"/><?php echo $emailErr ?><br />
        </div>

        <div class="positionTB">
        <b>Password:</b> <input type="text" name="password" value=''  class="textBox"/><?php echo $passwordErr ?><br />
        </div>
        <div class="positionTB">
            <b>Confirm Password:</b> <input type="text" name="passwordC" value=''  class="textBox"/><?php echo $passwordCErr ?><br />
        </div>
            <input type="submit" name="submit" value="submit" />
    </form>

</div>
<a href="../index.php">SignIn</a><!-- will allow to go back to the sign in page-->