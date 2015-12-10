<!--Travail par Ihsen Hachani Section: A IFT1147 25/10/2015  -->
<html lang="fr-ca">
<head>
<meta charset="utf-8">
    <title>Films IFT1147</title>
<script type="text/javascript" src="Scripts/javaScript.js"></script>
<link rel="stylesheet" href="Content/Site.css">
</head>
    
<body>

    <main >
   
<!-- Enregistrer un film -->
     <br>
      <br>
      <br> 
      <br> 
    <br>
    <br><br>
<input type="button" value="Enregistrer un film" class="decolorer" style="width : 150px" onClick="divVisible('divAjout')&divInvisible('divRetirer')
                                                                                 &divInvisible('divUpdate');">
                                                                                  <br>
                                                                                  <br>
<div id="divAjout"  name="divAjout" style="visibility:hidden;position:absolute;top:10%;left:30%;">
<form name="formAdd" action="gestionFilms.php" method="post" class="formclass">
    <img src="images/fermer.png" onClick="divInvisible('divAjout');" class="fermer"></br></br>
    <span class="changer">Le titre : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="titre" name="titre" class="droite"></br></br>
    <span class="changer">Le réalisateur :</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="realisateur" name="realisateur" class="droite"></br></br>
    <span class="changer">Catégorie :
   <select name="categorie" class="droite">
        <option name="act" value="action">Choisir une catégorie</option>
       <option name="act" value="action">Action</option>
       <option name="comedie" value="comedie">Comédie</option>
       <option name="horreur" value=""horreur>Horreur</option>
       <option name="scienceFiction" value="scienceFiction"> Science Fiction</option>
       <option name="jeunesse" value="jeunesse">Jeunesse</option>
       <option name="famille" value="famille">Pour la famille</option>
       <option name="documentaire" value="documentaire"> Documentaire</option>
       </select></br></br>
       <span class="changer">La durée :</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input type="text" id="duree" name="duree" class="droite"></br></br>
    <span class="changer"> Le prix : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="prix" name="prix" class="droite"></br></br>
    <span class="changer">L'empalcement : </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="emplacement" name="emplacement" class="droite"></br>
    <input type="hidden" name="monAction" value="ajout" style="width : 150px"></br>
    <input type="button" value="Envoyer" class="envoieEnreg" onClick="envoyerFormulaire(formAdd);"></br></br>
   
</form>
</div>
<br><br>

<!--Supprimer un film-->
<input type="button" value="Retirer un film" style="width : 150px" class="decolorer" 
onClick="divVisible('divRetirer')&divInvisible('divAjout')&divInvisible('divUpdate') ;">                                                                                 <br><br>

<div id="divRetirer" class="positionf" name="divSupprimer" style="visibility:hidden;position:absolute;top:20%;left:30%;">
<form name="formRetirer" action="gestionFilms.php" method="post" class="formclass">
       <img src="images/fermer.png" onClick="divInvisible('divRetirer')" class="fermer"></br>
    <span class="changer">Le numéro du film à retirer:</span>&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="text" id="numfilm" name="numfilm" style="width : 150px"></br>
    <input type="hidden" name="monAction" value="retirer" style="width : 150px"></br>
   <center><input type="button" value="Envoyer" onClick="envoyerFormulaire(formRetirer);" class="bouton" class="envoie"></center>
 </form>
</div>

<!--Mettre à jour un film-->
<br><br>
<input type="button" value="Modifier un film" style="width : 150px" class="decolorer" onClick="divVisible('divUpdate')&divInvisible('divAjout')&divInvisible('divRetirer');">                                                                                 <br><br>

<div id="divUpdate" class="positionf" name="divUpdate" style="visibility:hidden;position:absolute;top:20%;left:30%; widh=50%;">
<form name="formUpdate" action="gestionFilms.php" method="POST" class="formclass">
    <img src="images/fermer.png" onClick="divInvisible('divUpdate')" class="fermer"></br>
    <span class="changer">Le numéro du film à modifier:</span>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="nfilm" name="nfilm" style="width : 150px"></br>
   <input type="hidden" name="monAction" value="modifier">
    <input type="hidden" name="etat" value="rechercher"></br>
  <center> <input type="button" value="Envoyer" onClick="envoyerFormulaire(formUpdate);"></center>
</form>
</div>

<br><br>
<!--Lister les films-->
<input type="button" style="width : 150px" class="decolorer" value="Lister tous les films" onClick="envoyerFormulaire(formListe);">
<form name="formListe" action="gestionFilms.php" method="post" style="visibility:hidden" class="formclass">
   <input type="hidden" name="monAction" value="obtenirListe">

</form>
</main>

<hr>
<footer>
<p class="auteurs">Travail par  Ihsen Hachani(20034267) Section: A IFT1147</p>
<a href="http://validator.w3.org/check/referer">
<img class="imageHtml" src="images/html5bleu.jpg" alt="valide HTML">
</a>
<a href="http://validator.w3.org/check/referer">
<img class="imageCss" src="images/cssbleu.jpg" alt="valide CSS">
</a>
    
    <div id="lienNet"><a href="http://www-ens.iro.umontreal.ca/~hachanii/ift1147/tp2/domjqjvs145.html"> 
                    <spam class="colorer">Redirection en ligne</spam>
                    </a></div>
</footer>
      </div>
</body>
</html>