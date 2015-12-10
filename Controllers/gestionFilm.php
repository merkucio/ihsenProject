<?php
require('../DBConfig/DBConnection.php');

$action=$_POST['monAction'];
switch($action){
	case "allmovies" :
		ListFilms($PDO);
	break;
	case "ajout" :
	    enregistrerFilm();
    break;
    case "retirer" :
	    retirer();
        	break;
}

class movie {
    public $name;
    public $trailer;
    public $date;

}

public function ListFilms($pdo){
	$list = $PDO->query("SELECT * FROM movie");
	$list->setFetchMode(PDO::FETCH_OBJ);
	$films = $list->fetchAll(PDO::FETCH_CLASS, "movie");

	return $films;
}

public function getFilm(){

}

public function ajouterFilm(){


}

public function editerFilm(){

}

public function supprimerFilm(){

}

public function 

?>