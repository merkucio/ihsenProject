
function envoyerFormulaire(leForm){
	leForm.submit();
 }
 function divVisible(leDiv){
   document.getElementById(leDiv).style.visibility='visible';
 }
 function divInvisible(leDiv){
   document.getElementById(leDiv).style.visibility='hidden';
 }

function identifierDiv()
{
elem = document.getElementById('divConnexMess')
return elem;
}   

function cacherBouton(){
document.getElementById('tableau').style.visibility='hidden';
document.getElementById('monBouton').style.visibility='hidden';
}

function testerLogin() {
		if(!document.getElementById('username').value) {
			alert("SVP entrer un ID");
			document.getElementById('username').focus();
			return false;
		}
		if(!document.getElementById('lpass').value) {
			alert("SVP entrer un mot de passe");
			document.getElementById('lpass').focus();
			return false;
		}  
		envoyerLogin();
	} 
function testerFormulaire() {
   alert("Vous devez tester vos données. Pour cette fois ci vous êtes pardonnez");
  envoyerFormulaire();
}

function nouveauMembre(){
	document.getElementById('formMembre').style.visibility="visible";
}
//********************************************* Appel Serveur ********************************************************
function listerMembres(){
	var	donnees='action='+"A";
	requeteServeur("membres//membres.php",'POST',donnees,reponseServeur);
}
function enleverMembre(){
    var code=document.getElementById('delCode').value;
	var	donnees='action='+"D"+"&code="+code; 
	requeteServeur("membres//membres.php",'POST',donnees,reponseServeur);
}
//********************************************* Appel Serveur ********************************************************
function envoyerLogin(){
    var	usn=document.getElementById('username').value;
    var	pas=document.getElementById('lpass').value;

	var	donnees='username='+usn+'&password='+pas+'&action='+"L";
	requeteServeur("membres//membres.php",'POST',donnees,reponseServeur);

}
function envoyerFormulaire(){
	var n=document.getElementById('nom').value;
	var pr=document.getElementById('prenom').value;
	var u=document.getElementById('user').value;
	var	p=document.getElementById('pass').value;
	var	c=document.getElementById('cell').value;
	var	a=document.getElementById('adr').value;
	var	donnees="";
	donnees+='nom='+n+'&prenom='+pr+'&user='+u+'&password='+p;
	donnees+='&cell='+c+'&adresse='+a+'&action='+"E";
	requeteServeur("membres//membres.php",'POST',donnees,reponseServeur);
alert("Rabi ifarej");
}   

