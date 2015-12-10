<!--Auteurs : Ihsen Hachani Section : AIFT 1147 25/10/2015-->

<html lang="fr-ca">
<head>
  <meta charset="utf-8">
<title>Films IFT1147</title>
    <script language="javascript" src="js/javaScript.js"></script>
    <link rel="stylesheet" type="text/css" href="css/cssTp2ift1147.css" /> 

</head>
    

    <body>
<?php
//************include le fichier de classe Film *********************
//require_once("film.inc.php");

//************Ecriture dans le fichier film.txt *********************

function enregistrerFilm(){
    
	 try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tp3;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
    $titre=$_POST['titre'];
    $realisateur=$_POST['realisateur'];
    $categorie=$_POST['categorie'];
    $duree=$_POST['duree'];
    $prix=$_POST['prix'];
    $photo=$_POST['emplacement'];
    $bdd->exec("INSERT INTO film(titre,realisateur,categorie,duree,prix,photo) VALUES('$titre','$realisateur','$categorie','$duree','$prix','$photo')");
   echo '1 row has been inserted'; 

}

//************Lister tous les films *********************


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

function afficherFilms(){

  try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tp3;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
echo "<center><table border=2 style=\"background-color: #5af; text-align:center;\">";
$resultats=$bdd->query("SELECT * FROM film");
$resultats->setFetchMode(PDO::FETCH_OBJ);
while( $resultat = $resultats->fetch() ){
echo "<tr>";
        $numero = $resultat->numero;
        echo "<td>".$numero."</td>";
        echo "<td>".$resultat->titre."</td>";
        echo "<td>".$resultat->realisateur."</td>";
        echo "<td>".$resultat->categorie."</td>";
        echo "<td>".$resultat->duree."</td>";
        echo "<td>".$resultat->photo."</td>";

echo "</tr>";
} 

echo "</table></center>";
$resultats->closeCursor();

}


//************Retirer un film *********************

function retirer(){

    try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tp3;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$numF=intval($_POST['numfilm']);
echo $numF; 
$bdd->exec("DELETE FROM film WHERE numero=$numF");

}

function modifierFilm()
{

   try
{
    $bdd = new PDO('mysql:host=localhost;dbname=tp3;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
echo "<center><table border=2 style=\"background-color: #5af; text-align:center;\">";
$resultats=$bdd->query("SELECT * FROM film");
$resultats->setFetchMode(PDO::FETCH_OBJ);
while( $resultat = $resultats->fetch() ){
echo "<tr>";
        $numero = $resultat->numero;
        echo "<td>".$numero."</td>";
        echo "<td>".$resultat->titre."</td>";
        echo "<td>".$resultat->realisateur."</td>";
        echo "<td>".$resultat->categorie."</td>";
        echo "<td>".$resultat->duree."</td>";
        echo "<td>".$resultat->photo."</td>";

echo "</tr>";

}

//************Modifier un film *********************

/*
function envoyerDossier(){

		    echo "<br><br>Film introuvable<br><br>";
        echo "<p><a href= \"index.html\"> Retour à la page d'accueil</a></p>";
   
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
}*/

//******************Modifier film *******************

//Le controleur

$action=$_POST['monAction'];
switch($action){
	case "obtenirListe" :
		afficherFilms();
	break;
	case "ajout" :
	    enregistrerFilm();
    break;
    case "retirer" :
	    retirer();
        	break;
}
?>
        </body>
</html>