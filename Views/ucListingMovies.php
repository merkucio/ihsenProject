	<div class="pageWrap">
		<div class="itemGrid">
			<?php 
				require('../DBConfig/DBConnection.php');
				require('../Models/movie.php');

				session_start();

				$list = $PDO->query("SELECT * FROM movie");
				$list->setFetchMode(PDO::FETCH_OBJ);
				$films = $list->fetchAll(PDO::FETCH_CLASS, "movie");

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
							<a href="#" class="pill-button">Apercu</a>
							<a href="#" class="pill-button blue-button">Ajouter au panier</a>
						</div>
					</div>
				







				<?php }
			?>
			</div>
					</div>
