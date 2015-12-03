<?php
require('/DBConfig/DBConnection.php');

?>
<!--Travail par Ihsen Hachani Section: A IFT1147 25/10/2015  -->
<html lang="fr-ca">
	<head>
		<meta charset="utf-8">
		    <title>Filmotheque</title>
		<script type="text/javascript" src="Scripts/jquery.js"></script>
		<script type="text/javascript" src="Content/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="Scripts/javaScript.js"></script>
		<link rel="stylesheet" href="Content/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="Content/Site.css">
	</head>

<body class="masterContent"> 

<!--Accueil-->

		<div class="mainContent container-fluid" id="zaweli">
			
		</div>

        <div class="positionEnreg" style="position:absolute;top:40%;left:30%;">
        <form name="formConnect" action="" method="" class="formclass">
        <br/>
    <span class="changer">Login : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="username" name="username" class="droite"></br></br>
    <span class="changer">Mot de passe : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" id="password" name="password" class="droite"></br></br>
    <input type="submit" id="connexion" class="btnchanger btn btn-primary" value="Connexion" style="margin-left: 40%; width : 150px"/><br/><br>
	<input type="button" id="saveuser" class="btnchanger btn btn-primary" value="Devenir membre" style="margin-left: 40%; width : 150px" onClick="divVisible('divAjout');"/>
		</form>
		</div>

<!--Connexion-->

<!--Devenir membre-->

<div class="positionEnreg" id="divAjout"  name="divAjout" style="visibility:hidden; position:absolute;top:90%;left:30%;">
<form name="formAdd" action="saveUser.php" method="POST" class="formclass">
        <img src="Content/img/fermer.png" onClick="divInvisible('divAjout');" class="fermer"></br></br>
    <span class="changer">*Nom : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="nom" name="nom"class="droite" required></br></br>
    <span class="changer">*Prenom : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="prenom" name="prenom" class="droite" required></br></br>
    <span class="changer">*Login : </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="user" name="user" class="droite"></br></br>
    <span class="changer">*Mot de passe :</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" id="pass" name="pass" class="droite" required></br></br>
    <span class="changer">*Confirmer le mot de passe :</span> 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="password" id="cpass" name="cpass" class="droite" required></br></br>

    <span class="changer">Cellulaire : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="cell" name="cell" class="droite" placeholder="(xxx) xxx-xxxx" 
     pattern="\([1-9][0-9]{2}\) [0-9]{3}-[0-9]{4}"></br></br>
     <span class="changer">*Courriel : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="courriel" name="courriel"class="droite" required></br></br>
	<span class="changer">Adresse : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" id="adr" name="adr" class="droite"></br></br>
    <span class="changer">*Date : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="date" name="date"class="droite" ></br></br>
    <input type="submit" value="Devenir membre" class="envoieEnreg" ></br></br>
    </form>
    </div>
</body>

	<script type="text/javascript">



$(document).ready(function(){

    $("#connexion").click(function{

        $.post(
            'url.php', 
            {
                login : $("#username").val();  // Nous récupérons la valeur de nos input que l'on fait passer à connexion.php
                password : $("#password").val();
            },

            function(data){

                
                            $("#zaweli").html(data);
                
        
            });
        $('.masterContent').append('<div class="mainContent container-fluid"></div>');

    });

});

	</script>



</html>