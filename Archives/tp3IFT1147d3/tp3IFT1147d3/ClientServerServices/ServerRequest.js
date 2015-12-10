//Envoi requ�te au serveur

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
        xhr.setRequestHeader("Method", "POST "+sURL+" HTTP/1.1"); //construire ent�te pour POST
        xhr.setRequestHeader("Content-Type",
          "application/x-www-form-urlencoded");
      }
	  //M�thode que �coute les changements d'�tat
      (xhr).onreadystatechange = function(){
        if ((xhr).readyState == 4 && (xhr).status == 200)
        {
            sResp(xhr);//Appel de la fonction JavaScript qui traite la r�ponse
        }};
      xhr.send(sVars); //dans le cas de GET et POST
    } catch(z) { return false; }
    return true;
  }
 

//fonction pour cr�er un connexion selon les param�tres re�us
function requeteServeur(page,method,param,reponseServeur){

		var maConnexion = new connexionServeur();
		var monXHR=maConnexion.getXHR();
		if (!monXHR){ alert("Objet Ajax mon disponible."); return;}
		
	   maConnexion.connexion(page, method, param, reponseServeur); //Fonction reponseServeur dans ServerReply
	   	   		
}
