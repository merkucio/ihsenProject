var wellC="";
//Vider message
function timer_msg(){
	var vide="&nbsp;";
    document.getElementById("message").innerHTML=vide;
    document.getElementById("username").value="";
    document.getElementById("pass").value="";
    document.getElementById("username").focus();

}
function timer_msg3(){
	var vide="&nbsp;";
    document.getElementById("message").innerHTML=vide;
    document.getElementById("delCode").value="";
    document.getElementById('delMem').style.visibility='hidden';

}
function timer_msg2(){
	var vide="&nbsp;";
    document.getElementById("message").innerHTML=vide;
    document.getElementById("code").value="";
    document.getElementById("pass").value="";
    document.getElementById("code").focus();

}
//Fonction receptrice de la réponse du serveur
var reponseServeur = function (xhr){ 
   		var listeMembres = xhr.responseXML; 
		//alert(listeMembres);
		var msg="";
		var action = listeMembres.getElementsByTagName("action")[0].firstChild.nodeValue;


switch(escape(action)){
case "L":
   var code = listeMembres.getElementsByTagName("code")[0].firstChild.nodeValue;
   switch(escape(code)){  
	case "1" : 
	case "2" : msg=listeMembres.getElementsByTagName("message")[0].firstChild.nodeValue;
			   document.getElementById("message").innerHTML="<b><font color='#CA5F19'>"+msg+"</font></b>";
			   if(code=="1"){
			        wellC="<b><font color=\"#CA5F19\">BienVenu </font> <font color=\"#2077CD\">"+document.getElementById("username").value+"</font></b>";
					document.getElementById("user").innerHTML=wellC;
			   }
			   setTimeout('timer_msg()', 3500);
			   break;
    
    default : 	alert("Code Invalide"+code);
    			break;
} 
break;  
case "E":		
	msg=listeMembres.getElementsByTagName("message")[0].firstChild.nodeValue;
	document.getElementById("message").innerHTML="<b><font color='#CA5F19'>"+msg+"</font></b>"; 
     setTimeout('timer_msg2()', 3500);
	break;
case "A":


var table = document.createElement("TABLE");
table.setAttribute("border",1);
var tbody = document.createElement("TBODY");

var lstMem=listeMembres.getElementsByTagName("membre");
var td="";
for(var i=0;i<lstMem.length;i++){
    var tr=document.createElement("TR");
    td = document.createElement("TD");
	var user=lstMem[i].getElementsByTagName("user")[0].firstChild.nodeValue;
	alert(user);
	td.appendChild(document.createTextNode(user));
	tr.appendChild(td);
	td = document.createElement("TD");
	var nom=lstMem[i].getElementsByTagName("nom")[0].firstChild.nodeValue;
	td.appendChild(document.createTextNode(nom));
	tr.appendChild(td);
	td = document.createElement("TD");
	var prenom=lstMem[i].getElementsByTagName("prenom")[0].firstChild.nodeValue;
	td.appendChild(document.createTextNode(prenom));
	tr.appendChild(td);
	td = document.createElement("TD");
	var age=lstMem[i].getElementsByTagName("age")[0].firstChild.nodeValue;
	td.appendChild(document.createTextNode(age));
	tr.appendChild(td);
	td = document.createElement("TD");
	var nciv=lstMem[i].getElementsByTagName("nciv")[0].firstChild.nodeValue;
	td.appendChild(document.createTextNode(nciv));
	tr.appendChild(td);
	td = document.createElement("TD");
	var rue=lstMem[i].getElementsByTagName("rue")[0].firstChild.nodeValue;
	td.appendChild(document.createTextNode(rue));
	tr.appendChild(td);
	td = document.createElement("TD");
	var ville=lstMem[i].getElementsByTagName("ville")[0].firstChild.nodeValue;
	td.appendChild(document.createTextNode(ville));
	tr.appendChild(td);
	td = document.createElement("TD");
	var cp=lstMem[i].getElementsByTagName("cp")[0].firstChild.nodeValue;
	td.appendChild(document.createTextNode(cp));
	tr.appendChild(td);
	td = document.createElement("TD");
	var tel=lstMem[i].getElementsByTagName("tel")[0].firstChild.nodeValue;
	//alert(tel);
	td.appendChild(document.createTextNode(tel));
	tr.appendChild(td);
	td = document.createElement("TD");
	var courriel=lstMem[i].getElementsByTagName("courriel")[0].firstChild.nodeValue;
	td.appendChild(document.createTextNode(courriel));
	tr.appendChild(td);
	tbody.appendChild(tr);
}
table.appendChild(tbody);
document.getElementById("tableau").appendChild(table);


break;
case "D":		
	msg=listeMembres.getElementsByTagName("message")[0].firstChild.nodeValue;
	document.getElementById("message").innerHTML="<b><font color='#CA5F19'>"+msg+"</font></b>"; 
     setTimeout('timer_msg3()', 3500);
	break;
}
}
