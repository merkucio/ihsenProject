<?php
	session_start();
	if(isset($_SESSION['Auth']) && $_SESSION['Auth']==true)
	{  
		if($_SESSION['role'] == "user"){
			?>
				<div class="navHeader header-inner clearfix">
					<a href="#" class="brand"></a>
					<ul class="mainNav">
						<li><a href="#"  class="listmovie" title=" ??? ">Liste des films</a></li>
						<li><a href="#" class="userprofile" title=" ??? ">Mon profile</a></li>
						<li><a href="#" title=" ??? ">Mes locations</a></li>
						<li><a href="/">Hello <?php echo $_SESSION['uname'] ?> ! </a><li>
					    <li><a class="logoff" href="#">Deconnexion</a></li>
					</ul>		
				</div>
	<?php	}else{ ?>
				<div class="header-inner clearfix">
					<a href="#" class="brand"></a>
					<ul class="mainNav">
						<li><a href="#" title=" ??? ">Ajouter un film</a></li>
						<li><a href="#" title=" ??? ">Editer un film</a></li>
						<li><a href="#" title=" ??? ">Supprimer un film</a></li>
						<li><a href="/">Hello <?php echo $$_SESSION['uname'] ?> ! </a></li>
					    <li><a id="logoff" href="#">Deconnexion</a></li>
					</ul>
				</div>
	<?php	}
	 } 
	 ?>