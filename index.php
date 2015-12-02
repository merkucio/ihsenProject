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
		<link rel="stylesheet" href="Content/site.css">
	</head>
<body class="masterContent"> 
		<div class="mainContent container-fluid">
			<?php
			echo"<label class=\"row\">hello world</label>";
			?>
			    <br/>
			<?php
			echo"<label class=\"row\">Ihsen Test</label>";
			?>
			<br/>
		</div>

		<input type="button" class="btnchanger btn btn-primary" value="click me"/>

</body>

	<script type="text/javascript">
		$('.btnchanger').click(function(){	
			$('.mainContent').remove();
			$('.masterContent').append('<div class="mainContent container-fluid"></div>');
			$('.mainContent').load("/Ihsen/trunk/secondpage.html");	
		//$('.mainContent').replaceWith("/secondpage.html");

		});
	</script>



</html>