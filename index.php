<!--Travail par Ihsen Hachani Section: A IFT1147 25/10/2015  -->
<?php session_start();
	if(isset($_SESSION['Auth']) && $_SESSION['Auth']==true)
	{ ?>		
		<input type="hidden" id="loggedin" value=" <?php echo $_SESSION['Auth'] ?>"/>
 <?php } ?>
<html lang="fr-ca">
	<head>
		<meta charset="utf-8">
		    <title>Filmotheque</title>
		<script type="text/javascript" src="Scripts/jquery.js"></script>
		<script type="text/javascript" src="Scripts/jquery-ui.js"></script>
		<script type="text/javascript" src="Content/bootstrap/js/bootstrap.js"></script>
        <script type="text/javascript" src="Scripts/javaScript.js"></script>
        <script type="text/javascript" src="Scripts/Application.js"></script>
        <script type="text/javascript" src="Scripts/jquery.validate.js"></script>
		<link rel="stylesheet" href="Content/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="Content/Site.css">
	</head>

    <body class="masterContent"> 
    		<header id="navBar"></header>
    		<div class="mainContent container-fluid"></div>    		
			<footer>
				<p class="copy">
					Powered by <a href="#">Ihsen Hachani</a> - Location de Film
				</p>
			</footer>
    </body>
</html>