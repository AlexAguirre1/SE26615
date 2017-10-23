<?php
/**
 * Created by PhpStorm.
 * User: 001408507
 * Date: 10/23/2017
 * Time: 12:16 PM
 */
function  addActor($db, $corp, $incorp_dt, $email, $zipcode, $owner, $phone)
{
    try
    {
        $sql = $db->prepare("INSERT INTO coprs VALUES (null, :corp, :incorp_dt, :email, :zipcode, :owner, :phone)");//inserts/add a ne actore each time to form is filled out.
        $sql->bindParam(':corp', $corp);
        $sql->bindParam(':incorp_dt', $incorp_dt);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':zipcode', $zipcode);
        $sql->bindParam(':owner', $owner);
        $sql->bindParam(':phone', $phone);
        $sql->execute();
        return $sql->rowCount();
    }catch(PDOException $e)
    {
        die($e);//will let me know if there is any errors specifically.
    }
}