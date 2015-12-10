<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=locfilm;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

    
    $st = $bdd->query("SELECT * FROM user WHERE username='".$_POST["hsan"]."' AND password='".$_POST["miboune"]."' ");
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
                  echo 'Succes admin'//header("Location:admin.html");
            }else{
                      echo 'Succes user'//header("Location:user.php");

            }
        
     }
    else
    {
        echo "Login failed";
    }
?>