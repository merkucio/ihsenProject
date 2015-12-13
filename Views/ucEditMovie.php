<?php
    require('../DBConfig/DBConnection.php');

    $list = $PDO->query('SELECT id FROM movie');
    $list->setFetchMode(PDO::FETCH_OBJ);
    $movies = $list->fetchAll();
 ?>

<div class="container" style="padding: 25px; width: 70%;margin-top: 50px;">
    <div class="col-md-12">
        <section id="newMovieForm">
            <h4>Choisir le film a editer.</h4>
            <hr />
            <form class="ddlform form-horizontal">
                <div class="form-group">
                    <label class="col-md-4 control-label">Choisilr le numero du film :<span class="red"> *</span></label>
                    <div class="col-md-8">
                        <select class="movietoedit form-control" required title="Choisir le film a editer"style="maxWidth:200px;">
                            <?php foreach ($movies as $movie) {
                                echo "<option id=".$movie->id." value=".$movie->id.">".$movie->id."</option>";
                            } ?>
                        </select>
                    </div>
                </div>                
                <hr />
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input type="submit" class="btn btn-primary editmovie" value="Editer le film"/>
                    </div>
                </div>               
            </form>
        </section>
    </div>
</div>