
<?php

require('/DBConfig/DBConnection.php');

    $nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$username=$_POST['user'];
    $password=$_POST['pass'];
    $cell=$_POST['cell'];
    $cour=$_POST['courriel'];
	$adresse=$_POST['adr'];
	$date=date("m/d/y");
    $bdd->exec("INSERT INTO user(username,password,email,firstname,lastname,cellulaire,adresse,datecreation) VALUES('$username','$password','$cour','$prenom','$nom','$cell','$adresse','$date')");

   echo '1 row has been inserted'; 
     ?>