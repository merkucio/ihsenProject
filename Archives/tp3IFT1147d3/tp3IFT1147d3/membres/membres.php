<?php
require("../paramDB/connexion.php");

//Envoi message XML
function messageLogin($code,$mess){
        $action="L";
        header ("Content-Type: text/xml");
		echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
		echo "<xml>\n";
			echo "<action>$action</action>\n";
			echo "<code>$code</code>\n";
   			echo "<message>$mess</message>\n";
		echo "</xml>";
}
function messageEnlever($mess){
        $action="D";
        header ("Content-Type: text/xml");
		echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
		echo "<xml>\n";
			echo "<action>$action</action>\n";
   			echo "<message>$mess</message>\n";
		echo "</xml>";
}
//Envoi message XML
function messageEnregistrer($mess){
		$action="E";
        header ("Content-Type: text/xml");
		echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
		echo "<xml>\n";
			echo "<action>$action</action>\n";
   			echo "<message>$mess</message>\n";
		echo "</xml>";
}

function listeMembres($req){
		$action="A";
        header ("Content-Type: text/xml");
		echo "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
		echo "<xml>\n";
		echo "<action>$action</action>\n";
		while ($row = mysql_fetch_object($req))
		{
			echo "<membre>\n";
			echo "<user>$row->login</user>\n";
			echo "<mdp>$row->other</nom>\n";
			echo "<nom>$row->nom</prenom>\n";
			echo "<prenom>$row->prenom</age>\n";
			echo "<cellulaire>$row->cellulaire</age>\n";
			echo "<adresse>$row->adresse</tel>\n";
			echo "</membre>\n";
		}
		echo "</xml>";
}

$action=$_POST['action']; 
switch($action){
case "L" :
	$user=mysql_real_escape_string($_POST['username']);
	$pass=mysql_real_escape_string($_POST['lpass']);
	//$user=$_POST['username'];
	//$pass=$_POST['password'];
	mysql_select_db($sql_bdd,$db_link);
	$req=mysql_query("select * from membre where login='$user' AND other='$pass'",$db_link) or die(mysql_error());  					
	$nbrlines = mysql_num_rows($req); 
	if ($nbrlines==0)  
		messageLogin(2,"Membre inexistant");
	else
		messageLogin(1,"Vous etes connecte");
	mysql_close($db_link);
	break;
case "E" :

		$nom=$_POST['n'];
		$prenom=$_POST['p'];
		$user=$_POST['user'];
		$pass=$_POST['password'];
		$cell=$_POST['cell'];
		$adresse=$_POST['adresse'];
		
			
		mysql_select_db($sql_bdd,$db_link);
		$requete="INSERT INTO membre VALUES('$nom','$prenom',$user,'$pass','$cell','$adresse')";
		$req=mysql_query($requete,$db_link) or die(mysql_error());  
		$requete="INSERT INTO membreconnect VALUES('$user','$pass')";
		$req=mysql_query($requete,$db_link) or die(mysql_error());
		messageEnregistrer("Membre $nom, $prenom bien enregistre");
		break;
case "A" :	
		mysql_select_db($sql_bdd,$db_link);
		$requete="SELECT * FROM membre";
		$req=mysql_query($requete,$db_link) or die(mysql_error());
		listeMembres($req);
		break;
case "D" :
		$code=$_POST['code'];
		mysql_select_db($sql_bdd,$db_link);
		$req="SELECT * FROM membre WHERE user='$code'";
		$req=mysql_query($req,$db_link) or die(mysql_error());
		$nbrlines = mysql_num_rows($req); 
		if ($nbrlines==0)  
			$msg="Membre inexistant";
		else{
			$req="DELETE FROM membres WHERE user='$code'";
			@mysql_query($req,$db_link) or die(mysql_error());
			$req="DELETE FROM infomembres WHERE user='$code'";
			@mysql_query($req,$db_link) or die(mysql_error());
			$msg="Membre $code enlevé";
		}
			messageEnlever($msg);
		break;
}//fin du switch
?>
