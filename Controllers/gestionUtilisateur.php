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
	    	case "updateuser" :
		    modifierUtilisateur($PDO);
	    	break;
	    case "logoff" :
	    	Deconnexion();
    		break;
    	case "retirer" :
	    	retirer();
    		break;
    	case "addtocart" :
	    	AjouterPanier($PDO);
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

	function modifierUtilisateur($PDO){
		$request = $PDO->query("SELECT * FROM user Where username='".$_POST['username']."'");
		$request->setFetchMode(PDO::FETCH_OBJ);
		$count = $request->rowCount();
		$request = $request->fetch();
		
		if($request->username == $_POST['username'] || $count > 0) return false;

		session_start();

	    $req = $PDO->prepare("UPDATE user SET firstname=:firstname,lastname=:lastname,username=:username,addresse=:addresse,cellulaire=:cellulaire,email=:email
	    	                  WHERE id=:id");

		$postedData = array(
            "firstname" => $_POST['firstname'], 
            "lastname" => $_POST['lastname'],
            "username" => $_POST['username'],
            "addresse" => $_POST['address'],
            "email" => $_POST['email'],
            "cellulaire" => $_POST['cellphone'],
            "id"=> $_SESSION['userid']
            );

	    $req->execute($postedData);
		
    	$_SESSION['lname'] = $_POST['lastname'];
    	$_SESSION['fname'] = $_POST['firstname'];
    	$_SESSION['uname'] = $_POST['username'];

		return true;        
	}

	function Deconnexion(){
		session_start();
		session_unset();
		session_destroy(); 
		return true;
	}

	function AjouterPanier($PDO){
	    $req = $PDO->prepare("INSERT INTO location(userid, filmid, paiement_method, date_location, montant, duree_location, numero_carte, date_carte, cvv_carte) 
	    						VALUES (:user, :film, :method, :dloc, :montant, :duree, :numerocard, :dcarte, :cvv)");

  		$postData = array(
            "user" => $_POST['userid'] == null ? null : $_POST['userid'], 
            "film" => $_POST['filmid']  == null ? null : $_POST['filmid'],
            "montant" => 0,
            "method" => $_POST['paiment'] == null ? null : $_POST['paiment'], 
            "duree" => 0, 
            "numerocard" => $_POST['card'] == null ? null : $_POST['card'],
            "dcarte" => $_POST['dateval'] == null ? null : $_POST['dateval'],
            "cvv" => $_POST['cvv'] == null ? null : $_POST['cvv'],
            "dloc" => date("Y-m-d")
            );

	    $req->execute($postData);
		$insertedId = $PDO->lastInsertId();
		return true;
    }

	function getUtilisateurs(){

	}

	function editerUtilisateur(){

	}

	function supprimerUtilisateur(){

	}

?>