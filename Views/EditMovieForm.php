<?php
    require('../DBConfig/DBConnection.php');

    $movie = $PDO->query('SELECT * FROM movie where id='.$_POST['id']);
    $movie->setFetchMode(PDO::FETCH_OBJ);
    $movie = $movie->fetch();

    $cat = $PDO->query('SELECT * FROM category');
    $cat->setFetchMode(PDO::FETCH_OBJ);
    $categories = $cat->fetchAll();
?>

<div class="container" style="padding: 25px; width: 70%;margin-top: 50px;">
    <div class="col-md-12">
        <section>
            <h4>Edition.</h4>
            <hr />
            <form class="editmovieform form-horizontal divAjout">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Categorie :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <select class="category form-control" required title="Entrer la categorie du film"style="maxWidth:200px;">
                                <?php foreach ($categories as $cat) {
                                    echo "<option id=".$cat->id." value=".$cat->id." ".( $_POST['id'] == $cat->id ? 'selected="selected"' : '' ).">".$cat->category_name." </option>";
                                } ?>
                            </select>
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Titre :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="text"  id="title" name="title" class="title form-control" title="Entrer le tutre du film" placeholder="Titre du film" required style="maxWidth:200px;" value="<?php echo $movie->title; ?>">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Directeur :</label>
                        <div class="col-md-8">
                            <input type="text" id="director" name="director" class="director form-control" title="Entrer le nom du realisateur" value="<?php echo $movie->director; ?>" placeholder="Nom du realisateur" style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Annee de production :</label>
                        <div class="col-md-8">
                            <input type="text" id="year" name="year" class="year form-control" title="Entrer la date de sortie du film" value="<?php echo $movie->year; ?>" placeholder="Date de sortie" style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Duree du film :</label>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo $movie->duration; ?>" id="duration"  name="duration"  class="duration form-control" title="Entrer la duree du film" placeholder="Duree du film" style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Description :</label>
                        <div class="col-md-8">
                            <input type="text" id="description" value="<?php echo $movie->description; ?>" name="description"  class="form-control description" title="Entrer la description ici" placeholder="Description du film" style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div class="form-group">
                        <label class="col-md-4 control-label">Prix :<span class="red"> *</span></label>
                        <div class="col-md-8">
                            <input type="text" value="<?php echo $movie->price; ?>" id="price" name="price"  class="price form-control" title="Entrer le prix du film" placeholder="Prix" required style="maxWidth:200px;">
                        </div>
                    </div>    

                    <div id="imageContainer" class="form-group">
                        <label class="col-md-4 control-label">Photo :</label>
                        <label class="col-md-4"><?php echo $movie->picture; ?></label> 
                        <div class="col-md-4">                            
                            <input type="file" id="cover" class="cover" title="Choisir la couverture du film" name="movie_image"  accept="image/*" style="maxWidth:200px;">
                        </div>     
                    </div> 

                    <div class="form-group">
                        <label class="col-md-4 control-label">Apercu Video :</label>
                        <label class="col-md-4"><?php echo $movie->trailer; ?></label> 
                        <div class="col-md-4">
                            <input type="file" value="<?php echo $movie->trailer; ?>" id="trailer" name="movie_trailer" class="trailer" title="Choisir un apercu pour le film" accept="video/*" style="maxWidth:200px;">
                        </div>
                    </div>    
                
                    <hr />
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <input type="hidden" class="movieid" value="<?php echo $movie->id; ?>"/>
                            <input type="submit" class="btn btn-primary confirmEditMovie" value="Enregistrer les modifications"/>
                        </div>
                    </div>
               
            </form>
        </section>
    </div>
</div>