<?php
	try{
        $PDO = new PDO('mysql:host=localhost;dbname=filmotheque','root','');
        $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    }catch(PDOException $e){
        die('Erreur : '.$e->getMessage());
    }
?>