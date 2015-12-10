<?php
	require('../DBConfig/DBConnection.php');
	
	$action=$_POST['action'];

	switch($action){
		case "login" :
			$username=$_POST['login'];
		    $password=$_POST['password'];
			authentification($PDO, $username, $password);
			break;
		case "register" :
		    ajouterUtilisateur($PDO);
	    	break;
	    case "logoff" :
	    	Deconnexion();
    		break;
    	case "retirer" :
	    	retirer();
    		break;
	}

           // $_SESSION['Auth'] = $insertedId;

	function authentification($PDO, $uname, $pwd){
	    $st = $PDO->query("SELECT * FROM user WHERE username='".$uname."' AND password='".md5($pwd)."' ");
	    $st->setFetchMode(PDO::FETCH_OBJ);
	    $sts = $st->fetch();

	    if ($sts != null){	    	
	       	$roles= $PDO->query("SELECT * FROM user_role WHERE id_user=".$sts->id);
	       	$roles->setFetchMode(PDO::FETCH_OBJ);
	    	$role = $roles->fetch();

	    	$roledesc = $PDO->query("SELECT * from roles WHERE id =".$role->id_role);
	    	$roledesc->setFetchMode(PDO::FETCH_OBJ);
	    	$desc = $roledesc->fetch();

	    	session_start();
	    	$_SESSION['Auth'] = true;
	    	$_SESSION['role'] = $desc->name;
	    	$_SESSION['lname'] = $sts->lastname;
	    	$_SESSION['fname'] = $sts->firstname;
	    	$_SESSION['uname'] = $sts->username;
	    	$_SESSION['userid'] = $sts->id;
	    	$_SESSION['roleid'] = $role->id_role;            	

	    	if ($role->id_role == 1){
	    		header("Location:/Ihsen/trunk/Views/AdminIndex.php");
            }else{
            	header("Location:/Ihsen/trunk/Views/UserIndex.php");	 
            }
	    }else{
	    	return false;
	        //echo "Informations incorrectes. Verifier votre nom d'utilisateur et/ou votre mot de passe !!!";
    	}
	}
   
	function ajouterUtilisateur($PDO){

		//todo : Check if the username is unique
		$request = $PDO->prepare("SELECT COUNT(*) FROM user Where username=:uname");
		$result = $request->execute(array("uname"=>$_POST['username']));
		if($result) return false;

	    $req = $PDO->prepare("INSERT INTO user(firstname,lastname,username,password,addresse,cellulaire,email,creationdate) VALUES (:firstname, :lastname, :username, :password, :addresse, :cellulaire, :email, :creationdate)");

		$postData = array(
            "firstname" => $_POST['firstname'], 
            "lastname" => $_POST['lastname'],
            "username" => $_POST['username'],
            "password" => md5($_POST['password']), 
            "addresse" => $_POST['address'],
            "email" => $_POST['email'],
            "cellulaire" => $_POST['cellphone'],
            "creationdate" => date("Y-m-d")
            );

	    $req->execute($postData);
		$insertedId = $PDO->lastInsertId();
        
        if(isset($insertedId)){
            $role = $PDO->prepare("INSERT INTO user_role(id_user, id_role) VALUES (:iduser, :idrole)");
            $role->execute(array('iduser' => $insertedId, 'idrole' => 2));
            return true;
        }
	}

	function Deconnexion(){
		session_start();
		session_unset();
		session_destroy(); 
		return true;
	}

	function getUtilisateur(){

	}

	function getUtilisateurs(){

	}

	function editerUtilisateur(){

	}

	function supprimerUtilisateur(){

	}

?>