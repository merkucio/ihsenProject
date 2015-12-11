<?php
    require('../DBConfig/DBConnection.php');

    $cat = $PDO->query('SELECT * FROM category');
    $cat->setFetchMode(PDO::FETCH_OBJ);
    $categories = $cat->fetchAll();
 ?>


<div class="container" style="padding: 25px; width: 70%;margin-top: 50px;">
    <div class="col-md-12">
        <section id="newMovieForm">
            <h4>Entrer un nouveau compte.</h4>
            <hr />
            <form class="movieform form-horizontal divAjout">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Categorie :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <select class="form-control" required title="ntrer la categorie du film"style="maxWidth:200px;">
                                <?php foreach ($categories as $cat) {
                                    echo "<option id=".$cat->id." value=".$cat->category_name.">".$cat->category_name." </option>";
                                } ?>
                            </select>
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Titre :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="text"  id="title" name="title" class="title form-control" title="Entrer le tutre du film" placeholder="Titre du film" required style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Directeur :</label>
                        <div class="col-md-8">
                            <input type="text" id="director" name="director" class="director form-control" title="Entrer le nom du realisateur" placeholder="Nom du realisateur" style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Annee de production :</label>
                        <div class="col-md-8">
                            <input type="text" id="year" name="year" class="year form-control" title="Entrer la date de sortie du film" placeholder="Date de sortie" style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Duree du film :</label>
                        <div class="col-md-8">
                            <input type="text"  id="duration"  name="duration"  class="duration form-control" title="Entrer la duree du film" placeholder="Duree du film" style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Description :</label>
                        <div class="col-md-8">
                            <input type="text" id="description"  name="description"  class="form-control description" title="Entrer la description ici" placeholder="Description du film" style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Prix :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="text" id="price" name="price"  class="price form-control" title="Entrer le prix du film" placeholder="Prix" required style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div id="imageContainer" class="form-group">
                        <label class="col-md-4 control-label">Photo :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="file" id="cover" class="cover" title="Choisir la couverture du film" name="movie_image" required  accept="image/*" style="maxWidth:200px;">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-md-4 control-label">Apercu Video :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="file" id="trailer" name="movie_trailer" class="trailer" title="Choisir un apercu pour le film" accept="video/*" required style="maxWidth:200px;">
                        </div>
                    </div>    
                
                    <hr />
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="submit" class="btn btn-primary addmovie" value="Enregistrer le film"/>
                        </div>
                    </div>
               
            </form>
        </section>
    </div>
</div>