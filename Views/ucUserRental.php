  <div class="pageWrap">
    <div class="itemGrid">
      <?php 
        require('../DBConfig/DBConnection.php');

        session_start();

        $list = $PDO->query("SELECT * FROM movie where id IN (SELECT id FROM location WHERE userid =".$_SESSION['userid'].")");
        $list->setFetchMode(PDO::FETCH_OBJ);
        //$films = $list->fetchAll(PDO::FETCH_CLASS, "movie");
        $films = $list->fetchAll();

        //return $films;

        foreach ($films as $film) { ?>
          <div class="itemUnit">
            <div class="desc">
              <h3 class="title"> <?php echo $film->title; ?></h3>
              <h3 class="director"><?php echo $film->director; ?></h3>              
            </div>
            <hr/>
            <div >
              <img src="<?php echo "Content/covers/".$film->picture; ?>" alt="">
            </div>

            <hr/>
            <span class="price"><?php echo $film->price; ?>$</span>
            <span class="year"><?php echo $film->year; ?></span>
            
            <div class="actions">
              <a href="#" class="preview pill-button">Apercu</a>
              <a href="#" class="addCart pill-button blue-button">Ajouter au panier</a>
              <input type="hidden" id="filmid" class="filmid" value="<?php echo $film->id; ?>" />
            </div>
          </div>
        <?php }
      ?>
      </div>
  </div>