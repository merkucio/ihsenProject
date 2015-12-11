<div class="container" style="padding: 25px; width: 100%;margin-top: 50px;">
    <div class="col-md-12">
        <section>
            <h4>Liste des films disponibles.</h4>
            <hr />
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="19%">Titre du Film</th>
                        <th width="14%"> Directeur </th>
                        <th width="10%">Date de sortie</th>
                        <th width="12%">Categorie</th>
                        <th width="10%">Duree</th>
                        <th width="10%">Description</th>
                        <th width="5%">Prix</th>
                       <!-- <th width="10%">Couverture</th>
                        <th width="10%">Apercu Video</th>-->
                        <th width="10%" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>      
                
                <?php
                    require('../DBConfig/DBConnection.php');
                    session_start();
                    $list = $PDO->query("SELECT m.title, m.director, m.year, m.duration, m.description, m.price, m.trailer, m.picture, c.category_name 
                                          FROM movie m 
                                          INNER JOIN movie_category mc ON m.id = mc.movie_id 
                                          INNER JOIN category c ON mc.category_id = c.id");
                    $list->setFetchMode(PDO::FETCH_OBJ);
                    $films = $list->fetchAll();
                    if($films != null){
                        foreach ($films as $film) {
                ?>

                <tr>
                    <td><?php echo $film->title ?></td>
                    <td><?php echo $film->director ?></td>
                    <td><?php echo $film->year ?></td>
                    <td><?php echo $film->category_name ?></td>
                    <td><?php echo $film->duration ?>min</td>
                    <td><?php echo $film->description ?></td>
                    <td><?php echo $film->price ?>$</td>
                    <!--<td><?php echo $film->picture ?></td>
                    <td><?php echo $film->trailer ?></td>-->
                    <td class="text-center">
                      <a href="#">Editer</a> /
                      <a href="#">Supprimer</a>
                    </td> 
                </tr>
                <?php } }?>
            </tbody>
        </table>
        </section>
    </div>
</div>





<!--
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


Supprimer un film
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

Mettre à jour un film
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




Lister les films

<input type="button" style="width : 150px" class="decolorer" value="Lister tous les films" onClick="envoyerFormulaire(formListe);">
<form name="formListe" action="gestionFilms.php" method="post" style="visibility:hidden" class="formclass">
   <input type="hidden" name="monAction" value="obtenirListe">

</form>
-->