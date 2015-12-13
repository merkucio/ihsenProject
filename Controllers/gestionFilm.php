<?php
require('../DBConfig/DBConnection.php');

$action=$_POST['action'];
switch($action){
	case "allmovies" :
		ListFilms($PDO);
		break;
	case "ajout" :
	    enregistrerFilm();
    	break;
    case "deletemovie" :
	    retirerFilm($PDO);
        break; 
    case "editmovie" :
	    editerFilm($PDO);
        break;
}


function ListFilms($pdo){
	$list = $PDO->query("SELECT * FROM movie");
	$list->setFetchMode(PDO::FETCH_OBJ);
	$films = $list->fetchAll(PDO::FETCH_CLASS, "movie");

	return $films;
}

function editFilm(){

}

function ajouterFilm(){

}

function editerFilm($PDO){
    $req = $PDO->prepare("UPDATE movie SET title=:title,director=:director,year=:year,duration=:duration,price=:price,picture=:picture,trailer=:trailer,description=:description
    	                  WHERE id=:id");

	$postedData = array(
        "title" => $_POST['title'] == null ? null : $_POST['title'], 
        "director" => $_POST['director'] == null ? null : $_POST['director'],
        "year" => $_POST['year'] == null ? 0 : $_POST['year'],
        "duration" => $_POST['duration'] == null ? 0 : $_POST['duration'],
        "description" => $_POST['description'] == null ? null : $_POST['description'],
        "picture" => $_POST['picture'] == null ? null : $_POST['picture'],
        "trailer" => $_POST['trailer'] == null ? null : $_POST['trailer'],
        "price" => $_POST['price'] == null ? 0 : $_POST['price'],
        "id"=> $_POST['id']
        );

    $req->execute($postedData);

    $req2 = $PDO->prepare("UPDATE movie_category SET category_id=:catid WHERE movie_id=:movieid");
	$posting = array(
        "catid" => $_POST['category'] == null ? 0 : $_POST['category'],
        "movieid" => $_POST['id']
        );
    $req2->execute($posting);

	return true;
}

function supprimerFilm($PDO){
	$req = $PDO->prepare("DELETE FROM movie WHERE id=:id");
	$postedData = array("id"=> $_POST['id']);
    $req->execute($postedData);
    return true;   
}

?>