<?php
$listeId=array();
$var=array();
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tp3;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query('SELECT numero, titre FROM film ');
$reponse->setFetchMode(PDO::FETCH_OBJ);
while ($donnees = $reponse->fetch())
{
    echo $donnees->nom . '  ' . $donnees->titre . '<br />';
    array_push($var, $donnees->nom);
    array_push($var, $donnees->titre);
}
$reponse->closeCursor();

$listeId = array( $var);
<script>alert($listeId)</script>
//var_dump($listeId);

//json_encode($listeId);  
?>





