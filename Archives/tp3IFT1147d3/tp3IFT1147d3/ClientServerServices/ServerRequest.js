//Envoi requête au serveur

function connexionServeur()
{
	this.xhr;
}

connexionServeur.prototype.getXHR=function(){
	if (window.XMLHttpRequest) {xhr=new XMLHttpRequest();}
	else {if (window.ActiveXObject) 
	try {xhr=ActiveXObject("Msxml2.XMLHTTP");}
	catch (e) {
		try {xhr=ActiveXObject("Microsoft.XMLHTTP");}
	catch (e) {xhr=NULL;}
	}}
  return xhr;
}
connexionServeur.prototype.connexion = function(sURL, sMethod, sVars, sResp)
  {
   
    sMethod = sMethod.toUpperCase(); //convertir GET et POST en majuscules

    try {
      if (sMethod == "GET")
      {
       
        xhr.open(sMethod, sURL+"?"+sVars, true); //true pour asynchrone
        
      }
      else
      {
        xhr.open(sMethod, sURL, true);
        xhr.setRequestHeader("Method", "POST "+sURL+" HTTP/1.1"); //construire entête pour POST
        xhr.setRequestHeader("Content-Type",
          "application/x-www-form-urlencoded");
      }
	  //Méthode que écoute les changements d'état
      (xhr).onreadystatechange = function(){
        if ((xhr).readyState == 4 && (xhr).status == 200)
        {
            sResp(xhr);//Appel de la fonction JavaScript qui traite la réponse
        }};
      xhr.send(sVars); //dans le cas de GET et POST
    } catch(z) { return false; }
    return true;
  }
 

//fonction pour créer un connexion selon les paramètres reçus
function requeteServeur(page,method,param,reponseServeur){

		var maConnexion = new connexionServeur();
		var monXHR=maConnexion.getXHR();
		if (!monXHR){ alert("Objet Ajax mon disponible."); return;}
		
	   maConnexion.connexion(page, method, param, reponseServeur); //Fonction reponseServeur dans ServerReply
	   	   		
}
