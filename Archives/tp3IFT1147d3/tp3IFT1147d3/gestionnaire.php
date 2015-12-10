<!--Travail par Ihsen Hachani & Abdelilah Khaouch Section: A IFT1147 25/10/2015  -->
<html lang="fr-ca">
<head>
<meta charset="utf-8">
    <title>Films IFT1147</title>
<script language="javascript" src="js/javaScript.js"></script>
        <link rel="stylesheet" type="text/css" href="css/cssTp2Ift1147.css" /> 
</head>

    <body>
<?php
//************include le fichier de classe Film *********************
//require_once("film.inc.php");


//************Connexion Base de données *********************

/*$reponse = $bdd->query('SELECT * FROM film');

while ($donnees = $reponse->fetch())
{
    echo $donnees['numero'] . '  ' . $donnees['titre'] .' '. $donnees['realisateur'] . '  ' . $donnees['categorie'].'<br />';
}

$reponse->closeCursor();*/
}

//************ Authentification *********************

function authentification()
{


try
{
    $bdd = new PDO('mysql:host=localhost;dbname=locfilm;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

//session_start();
//$_SESSION["login"]=$_POST["username"];
//$_SESSION["password"]=$_POST["password"];
 // if(($_SESSION["login"] == "") or($_SESSION['password'] == "")) {
    //echo "veuillez saisir un login et un mot de passe";
//else {

    
    $st = $bdd->query("SELECT * FROM user WHERE username='".$_POST["username"]."' AND password='".$_POST["password"]."' ");
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
                  header("Location:admin.html");
            }else{
                      header("Location:user.php");

            }
        
     }
    else
    {
        echo "Login failed";
    }

        //{

       // if($_SESSION["login"]=='admin'&&$_SESSION["password"]=='admin')
            //header("Location:admin.html");
      /*//header("Location:index.php");
       echo "<div id=\"divConnexMess\"  name=\"divConnexMess\" style=\"visibility:visible;position:absolute;top:10%;left:30%;\">
    <img src=\"images/fermer.png\" onClick=\"divInvisible('divConnexMess');\" class=\"fermer\"></br></br>
    <p>test connexion réussie</p>
</div>
<br><br>";*/
           
       //else echo "Login failed";
//}

   
}

//************ Enregistrer membre *********************

function enregistrerMembre(){
    try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tp3;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$username=$_POST['user'];
    $password=$_POST['pass'];
    $cell=$_POST['cell'];
	$adresse=$_POST['adr'];
    $bdd->exec("INSERT INTO membre(login,other,nom,prenom,cellulaire,adresse) VALUES('$username','$password','$nom','$prenom','$cell','$adresse')");
$bdd->exec("INSERT INTO membreconnect(username,pass) VALUES('$username','$password')");
   echo '1 row has been inserted'; 

    

}
function enregistrerFilm(){
    connexionServeur();
	$numeroFilm=$_POST['film'];
	$titre=$_POST['titre'];
	$realisateur=$_POST['realisateur'];
    $categorie=$_POST['categorie'];
    $duree=$_POST['duree'];
	$prix=$_POST['prix'];
    $emplacement=$_POST['emplacement'];
    
   	$ligne=$numeroFilm."\t".$titre."\t".$realisateur."\t".$categorie."\t".$duree."\t".$prix."\t".$emplacement."\r\n";   
    $fic=fopen("films.txt","a");
	fputs($fic,$ligne);
    fclose($fic);
	echo "Film bien enregistré<br><br>";


}
function listerMembres()
{
	try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tp3;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$resultats=$bdd->query("SELECT * FROM membre");
$resultats->setFetchMode(PDO::FETCH_OBJ);
while( $resultat = $resultats->fetch() )
{if($resultat->login!='admin'&&$resultat->other!='admin')
        echo $resultat->nom." ".$resultat->prenom."<br>";
        
}
$resultats->closeCursor();

}
//************Lister tous les films *********************
function remplir(){
$tabFilms=array();
$fic=fopen("films.txt","r");
$ligne=fgets($fic);
while (!feof($fic)){
    $numeroFilm=strtok($ligne,"\t");
    //echo $numeroFilm;
	$titre=strtok("\t");
	$realisateur=strtok("\t");
    $categorie=strtok("\t");
    $duree=strtok("\t");
	$prix=strtok("\t");
    $emplacement=strtok("\t");
    
	$tabFilms[]= new Film($numeroFilm,	$titre,	$realisateur,$categorie, $duree, $prix, $emplacement);
    
	$ligne=fgets($fic);
}
fclose($fic);
    
    return $tabFilms;  }


function entete()
{

    echo "<tr style=\"background-color:red;\">";       
    echo "<td>"."Numero"."</td>";     
    echo "<td>"."Titre"."</td>";  
    echo "<td>"."Réalisateur"."</td>";
    echo  "<td>"."Catégorie"."</td>";
    echo "<td>"."Durée"."</td>";
    echo "<td>"."Prix"."</td>";
    echo "<td>"."Emplacement photo film"."</td>";
    echo "</tr>";
  
}
//Afficher tableau

function afficherTableau(){

$tFilms=remplir();
$taille=count($tFilms);
        
echo "<center><table border=2 style=\"background-color: #5af; text-align:center;\">";
entete();
    for($i=0;$i<$taille;$i++)
   
    echo $tFilms[$i]->afficher();
   
echo "</table></center>";
    echo "    <center><p><a href= \"index.html\"> Retour à la page d'accueil</a></p></center>";
    
}

//************Retirer un film *********************

function retirer($num){
    $film=rechercher('numfilm');
    if ($film==null){
	    echo "<br><br>Film introuvable<br><br>";
        echo "    <p><a href= \"index.html\"> Retour à la page d'accueil</a></p>";
    }else{
	$tempo=fopen("tempo.txt","a");
	$fic=fopen("films.txt","r");
	$tab=array();
	$ligne=fgets($fic);//la première ligne
	while(!feof($fic)){
		$tab=explode("\t",$ligne);
		if($tab[0]!==$num)
		     fputs($tempo,$ligne);
		$ligne=fgets($fic);
	}//fin while
	fclose($fic);
	fclose($tempo);
	unlink("films.txt");
    rename("tempo.txt","films.txt");echo "<br><br>Film ".$numF." bien supprimé<br><br>";}
}

//************Modifier un film *********************

function rechercher($numero){
	$numf=trim($_POST[$numero]);
	$tab=array();
	$trouve=false;
	$fic=fopen("films.txt","r");
	$ligne=fgets($fic);
	while(!feof($fic) && !$trouve){
		$tab=explode("\t",$ligne);
		if ($tab[0]===$numf)
		     $trouve=true;
		else
			$ligne=fgets($fic);
	}
	fclose($fic);
	if ($trouve)
	    return $tab;
	else
		return null;
}
function envoyerDossier(){
	$film=rechercher('nfilm');
    if ($film==null){
	    echo "<br><br>Film introuvable<br><br>";
        echo "<p><a href= \"index.html\"> Retour à la page d'accueil</a></p>";
    }
	else {
		echo "<form style=\"border: groove 5px ; background-color:darkblue; position: absolute; top:  100px;
    right: 200px; width: 50%;height: 400px; width: 800px;\" name=\"formAdmission\" action=\"gestionFilms.php\" method=\"post\">\n\n"; 
        echo "   <img src=\"images/fermer.png\" style=\"float:right;\" onClick=\"divInvisible('divAdmission')\"></br></br>\n"; 
		echo "   <span style=\"font-family:fantasy; color:mediumvioletred; font-size: 14px; text-align: left; margin-left: 10%;\"> Numéro de film : </span> <input style=\"float: right; width : 150px; margin-right: 10%;\" type=\"text\" id=\"film\" name=\"film\" value=\"".$film[0]."\" readonly></br></br>\n"; 
		echo "   <span style=\"font-family:fantasy; color:mediumvioletred; font-size: 14px; text-align: left; margin-left: 10%;\">Titre : </span><input style=\"float: right; width : 150px; margin-right: 10%;\" type=\"text\" id=\"titre\" name=\"titre\" value=\"".$film[1]."\"></br></br>\n"; 
		echo "  <span style=\"font-family:fantasy; color:mediumvioletred; font-size: 14px; text-align: left; margin-left: 10%;\"> Réalisateur :</span> <input style=\"float: right; width : 150px; margin-right: 10%;\" type=\"text\" id=\"realisateur\" name=\"realisateur\" value=\"".$film[2]."\"></br></br>\n"; 
		echo "  <span style=\"font-family:fantasy; color:mediumvioletred; font-size: 14px; text-align: left; margin-left: 10%;\"> Catégorie :</span> <input style=\"float: right; width : 150px; margin-right: 10%;\" type=\"text\" id=\"categorie\" name=\"categorie\" value=\"".$film[3]."\" readonly></br></br>\n"; 
        echo "   <span style=\"font-family:fantasy; color:mediumvioletred; font-size: 14px; text-align: left; margin-left: 10%;\"> Nouvelle Catégorie : </span>"; 
           echo "<select style=\"float: right; width : 150px; margin-right: 10%;\" name=\"categorie\">";
           echo "<option value=\"".$film[3]."\">Choisir une catégorie</option>";
           echo "<option name=\"act\" value=\"action\">Action</option>";
           echo "<option name=\"comedie\" value=\"comedie\">Comédie</option>";
           echo "<option name=\"horreur\" value=\"horreur\">Horreur</option>";
           echo "<option name=\"scienFiction\" value=\"scinceFiction\">Science Fiction</option>";
           echo "<option name=\"jeunesse\" value=\"jeunesse\">Jeunesse</option>";
           echo "<option name=\.famille\" value=\"famille\">Pour la famille</option>";
           echo "<option name=\"documentaire\" value=\"documentaire\">Documentaire</option>";
           echo "</select><br><br>\n";
		echo "  <span style=\"font-family:fantasy; color:mediumvioletred; font-size: 14px; text-align: left; margin-left: 10%;\"> Durée : </span> <input style=\"float: right; width : 150px; margin-right: 10%;\" type=\"text\" id=\"duree\" name=\"duree\" value=\"".$film[4]."\"></br><br>\n"; 
		echo "  <span style=\"font-family:fantasy; color:mediumvioletred; font-size: 14px; text-align: left; margin-left: 10%;\"> Prix :</span> <input type=\"text\" style=\"float: right; width : 150px; margin-right: 10%;\" id=\"prix\" name=\"prix\" value=\"".$film[5]."\"></br><br>\n"; 
        echo "  <span style=\"font-family:fantasy; color:mediumvioletred; font-size: 14px; text-align: left; margin-left: 10%;\"> Emplacement :</span> <input style=\"float: right; width : 150px; margin-right: 10%;\" type=\"text\" id=\"emplacement\" name=\"emplacement\" value=\"".$film[6]."\"></br></br>\n"; 
        
		echo "   \n"; 
		echo "   <input type=\"hidden\" name=\"monAction\" value=\"modifier\">\n";
		echo "   <input type=\"hidden\" name=\"etat\" value=\"maj\">\n\n"; 	
		echo "   <input type=\"button\" style=\"margin-left: 40%; margin-right: 60%; width: auto;\" value=\"Envoyer\" onClick=\"envoyerFormulaire(formAdmission);\"></br>\n"; 
        echo "<br><a href=\"index.html\">Retour a la page accueil</a><br>";
		echo "</form>\n";
	}
}

//Le controleur

$action=$_POST['monAction'];
switch($action){
	case "connexion" :
		authentification();
	break;
	case "devenirMembre" :
	    enregistrerMembre();
    break;
    case "ListerMem":
    	listerMembres();
    	break;
    case "modifier" :
		$etat=$_POST['etat'];
		if ($etat=="rechercher")
			envoyerDossier();
		else {//$etat=="maj"
		    $numeroFilm=$_POST['film'];
			retirer($numeroFilm);
		    enregistrerFilm();
		   echo "<br><br>Film ".$numeroFilm." bien modifié<br><br>";
            }; break;
    case "retirer" :
	    $numF=trim($_POST['numfilm']); 
		retirer($numF);
        	break;
}
?>
        </body>
</html>