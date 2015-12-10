<?php  

require("conf.php");

// CONNEXION A LA BASE DE DONNEE
$db_link = @mysql_connect($sql_serveur,$sql_user,$sql_passwd);

if(!$db_link) 
{echo "Connexion impossible a  la base de donnees <b>$sql_bdd</b> sur le serveur <b>$sql_server</b><br>Verifiez les parametres du fichier conf.php"; exit;}

?>