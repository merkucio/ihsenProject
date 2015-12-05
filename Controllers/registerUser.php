<?php
require('/DBConfig/DBConnection.php');

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $cellphne=$_POST['cellphone'];
    
    $st = $bdd->query("SELECT  * FROM user WHERE username='".$username."' AND password='".$password."' ");
    //var_dump($st);die();
    $st->setFetchMode(PDO::FETCH_OBJ);
    $sts = $st->fetch();
    if ($sts != null)
    {
       $rows= $bdd->query("SELECT * FROM userole WHERE id_role=1 AND id_user=".$sts->id);
       $rows->setFetchMode(PDO::FETCH_OBJ);
    $row = $rows->fetch(); 
       //var_dump($rows);die();
         if ($row != null)
            {
                  echo 'Succes admin';
                  //header("Location:admin.html");
            }else{
                      echo 'Succes user';//header("Location:user.php");

                  }
        
     }
    else
    {
        echo "Login failed";
    }





?>