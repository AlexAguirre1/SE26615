<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/11/2017
 * Time: 1:21 PM
 */
/* Just a demo bad way to write the code.*/

$dsn = "mysql:host=localhost;dbname=dogs";
$username ="dogs";
$password="se266";
try
{
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e)
    {
        // $echo $e->getMessage(); is a method example
        die("There was a problem connecting to the database.");
    }
    /*if (isset($_POST['submit']) )
    {
        $submit= $_POST['submit']

    }else{
    $submit = "";
    }*/
    //$submit = isset($_POST['submit']) ? $_POST['submit'] : "";//ternary
$submit = $_POST ['submit'] ?? ""; // null colesense operator
if ($submit == "Do it") {
    $name = $_POST['name'] ?? "";
    $gender = $_POST['gender'] ?? "F";
    $fixed = $_POST['fixed'] ?? false;
    try {
        $sql = $db->prepare("INSERT INTO animals Values (null, :name, :gender, :fixed)");
        $sql->bindParam(':name', $name);
        $sql->bindParam(':gender', $gender);
        $sql->bindParam(':fixed', $fixed);
        $sql->execute();
        echo $sql->rowCount() . "rows inserted.";
    }catch(PDOException $e)
    {
        die("There was a problem with SQL");
    }
}
?>
<form method="post" action="#">
   Name: <input type="text" name="name" /><br />
    Gender: M <input type="radio" name="gender" value="M" />
    F<input type ="radio" name="gender" value="F"/><br />
    Fixed: <input type="checkbox" name="fixed" value="true"/>
    <input type="submit" name="submit" value="Do it" />
</form>

<?php

$sql = $db->prepare("select * FROM animals");
$sql->execute();
$result = $sql->fetchAll(PDO::FETCH_ASSOC);
if (count($result))
{
    foreach ($result as $dog)
    {
        print_r($dog);
    }
}