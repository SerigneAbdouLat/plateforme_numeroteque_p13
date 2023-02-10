function AjouteAuteur() {
try {
  var tr = document.createElement('tr');
  var td = document.createElement('td');
  var input = document.createElement('input');
  var td2 = document.createElement('td');
  var input2 = document.createElement('input');
  var td2 = document.createElement('td');
  var input3 = document.createElement('input');
  var td3 = document.createElement('td');
  var input4 = document.createElement('input');
  var td4 = document.createElement('td');

  input.setAttribute('type','text');
  input.setAttribute('name','NomAuteur[]');
  input.setAttribute('value','');
  input.setAttribute('class','form-control');
  input.setAttribute('placeholder','Nom...');
  input.appendChild(document.createTextNode(''));

  td.appendChild(input);
  tr.appendChild(td);

  input2.setAttribute('type','text');
  input2.setAttribute('name','PrénomAuteur[]');
  input2.setAttribute('value','');
  input2.setAttribute('class','form-control');
  input2.setAttribute('placeholder','Prénom...');
  input2.appendChild(document.createTextNode(''));

  td2.appendChild(input2);
  tr.appendChild(td2);

  input3.setAttribute('type','text');
  input3.setAttribute('name','EmailAuteur[]');
  input3.setAttribute('value','');
  input3.setAttribute('class','form-control');
  input3.setAttribute('placeholder','email...');
  input3.appendChild(document.createTextNode(''));

  td3.appendChild(input3);
  tr.appendChild(td3);

  input4.setAttribute('type','text');
  input4.setAttribute('name','InstAuteur[]');
  input4.setAttribute('value','');
  input4.setAttribute('class','form-control');
  input4.setAttribute('placeholder','Institution...');
  input4.appendChild(document.createTextNode(''));

  td4.appendChild(input4);
  tr.appendChild(td4);
  var FLigne=document.getElementById("FinLigne");
  var CaseFinLigne=FLigne.firstChild.cloneNode(true); 
  tr.appendChild(CaseFinLigne);

  document.getElementById('Auteurs').appendChild(tr);
} catch(e) {
  alert(e);
};
};

function AjouteInformateur() {
try {
//  alert("Appel ajout informateur");
  var tr = document.createElement('tr');
  var td = document.createElement('td');
  var input = document.createElement('input');
  var td2 = document.createElement('td');
  var input2 = document.createElement('input');
  var td2 = document.createElement('td');
  var input3 = document.createElement('input');
  var td3 = document.createElement('td');
  var input4 = document.createElement('input');
  var td4 = document.createElement('td');
  var input5 = document.createElement('select');
  var td5 = document.createElement('td');
  var input6 = document.createElement('select');
  var td6 = document.createElement('td');
  var input7 = document.createElement('select');
  var td7 = document.createElement('td');
  var td8 = document.createElement('td');
//  var iSuppr = document.createElement('i');
//  var TxtSuppr = document.createTextNode('<b>Suppr</b>');

  input.setAttribute('type','text');
  input.setAttribute('name','NomInformateur[]');
  input.setAttribute('value','');
  input.setAttribute('class','form-control');
  input.setAttribute('placeholder','Nom...');
  input.appendChild(document.createTextNode(''));

  td.appendChild(input);
  tr.appendChild(td);

  input2.setAttribute('type','text');
  input2.setAttribute('name','PrénomInformateur[]');
  input2.setAttribute('value','');
  input2.setAttribute('class','form-control');
  input2.setAttribute('placeholder','Prénom...');
  input2.appendChild(document.createTextNode(''));

  td2.appendChild(input2);
  tr.appendChild(td2);

  input3.setAttribute('type','text');
  input3.setAttribute('name','EmailInformateur[]');
  input3.setAttribute('value','');
  input3.setAttribute('class','form-control');
  input3.setAttribute('placeholder','email...');
  input3.appendChild(document.createTextNode(''));

  td3.appendChild(input3);
  tr.appendChild(td3);

  input4.setAttribute('type','text');
  input4.setAttribute('name','AgeInformateur[]');
  input4.setAttribute('value','');
  input4.setAttribute('class','form-control');
  input4.setAttribute('placeholder','Âge');
  input4.appendChild(document.createTextNode(''));

  td4.appendChild(input4);
  tr.appendChild(td4);
  
  input5.setAttribute('type','select');
  input5.setAttribute('name','nivLangueInformateur[]');
  input5.options[0] = new Option('Niveau langue','');
  input5.options[0].setAttribute('disabled',true);
  input5.options[1] = new Option('Langue maternelle et usuelle','maternUsuelle');
  input5.options[2] = new Option('Langue maternelle non usuelle','materNonUsuelle');
  input5.options[3] = new Option('Autre...','autre');

  td5.appendChild(input5);
  tr.appendChild(td5);

  input6.setAttribute('type','select');
  input6.setAttribute('name','nivEducInformateur[]');
  input6.options[0] = new Option('Etudes','');
  input6.options[0].setAttribute('disabled',true);
  input6.options[1] = new Option('Primaire','primaire');
  input6.options[2] = new Option('Secondaire','secondaire');
  input6.options[3] = new Option('Universitaire','universitaire');
  input6.options[4] = new Option('Aucune','aucune');
  input6.options[5] = new Option('Autre...','autre');

  td6.appendChild(input6);
  tr.appendChild(td6);
  
  input7.setAttribute('type','select');
  input7.setAttribute('name','sexeInformateur[]');
  input7.options[0] = new Option('Sexe','');
  input7.options[0].setAttribute('disabled',true);
  input7.options[1] = new Option('Homme','masc');
  input7.options[2] = new Option('Femme','fem');
  input7.options[3] = new Option('Autre','autre');

  td7.appendChild(input7);
  tr.appendChild(td7);
  
//  TxtSuppr.setAttribute('onClick'='SupprimeCetteLigne(this)');
//  td8.appendChild(iSuppr);
  var FLigne=document.getElementById("FinLigne");
  var CaseFinLigne=FLigne.firstChild.cloneNode(true); 
  tr.appendChild(CaseFinLigne);

  document.getElementById('Informateurs').appendChild(tr);
  
  //var LInformVide=document.getElementById("LigneInformateurVide");
  //var NouvelleLigne=LInformVide.cloneNode(true);
  //NouvelleLigne.setAttribute("class","");
  //NouvelleLigne.removeAttribute("id");
  //document.getElementById('Informateurs').appendChild(NouvelleLigne);
} catch(e) {
  alert(e);
};
};

function AjouteMotLiaison() {
try {
  var tr = document.createElement('tr');
  var td = document.createElement('td');
  var input = document.createElement('input');
  var td2 = document.createElement('td');
  var input2 = document.createElement('input');
  var td2 = document.createElement('td');
  var input3 = document.createElement('input');
  var td3 = document.createElement('td');
  var input4 = document.createElement('input');
  var td4 = document.createElement('td');

  input.setAttribute('type','text');
  input.setAttribute('name','MotLiaison[]');
  input.setAttribute('value','');
  input.setAttribute('class','form-control affiche-clavier');
  input.setAttribute('placeholder','Mot...');
  input.appendChild(document.createTextNode(''));

  td.appendChild(input);
  tr.appendChild(td);

  input2.setAttribute('type','text');
  input2.setAttribute('name','MotLiSignification[]');
  input2.setAttribute('value','');
  input2.setAttribute('class','form-control');
  input2.setAttribute('placeholder','Signification...');
  input2.appendChild(document.createTextNode(''));

  td2.appendChild(input2);
  tr.appendChild(td2);

  input3.setAttribute('type','text');
  input3.setAttribute('name','MotLiCatégorie[]');
  input3.setAttribute('value','');
  input3.setAttribute('class','form-control');
  input3.setAttribute('placeholder','Catégorie...');
  input3.appendChild(document.createTextNode(''));

  td3.appendChild(input3);
  tr.appendChild(td3);

  input4.setAttribute('type','text');
  input4.setAttribute('name','MotLiCommentaire[]');
  input4.setAttribute('value','');
  input4.setAttribute('class','form-control');
  input4.setAttribute('placeholder','Commentaire...');
  input4.appendChild(document.createTextNode(''));

  td4.appendChild(input4);
  tr.appendChild(td4);
  
  var FLigne=document.getElementById("FinLigne");
  var CaseFinLigne=FLigne.firstChild.cloneNode(true); 
  tr.appendChild(CaseFinLigne);

  document.getElementById('MotsLiaison').appendChild(tr);
} catch(e) {
  alert(e);
};
};

function AjouteComposant() {
try {
  var tr = document.createElement('tr');
  var td = document.createElement('td');
  var input = document.createElement('input');
  var td2 = document.createElement('td');
  var input2 = document.createElement('input');
  var td2 = document.createElement('td');

  input.setAttribute('type','text');
  input.setAttribute('name','ComposantId[]');
  input.setAttribute('value','');
  input.setAttribute('class','form-control');
  input.setAttribute('placeholder','Code...');
  input.appendChild(document.createTextNode(''));

  td.appendChild(input);
  tr.appendChild(td);

  input2.setAttribute('type','text');
  input2.setAttribute('name','ComposantListe[]');
  input2.setAttribute('value','');
  input2.setAttribute('class','form-control');
  input2.setAttribute('placeholder','éléments...');
  input2.appendChild(document.createTextNode(''));

  td2.appendChild(input2);
  tr.appendChild(td2);

  var FLigne=document.getElementById("FinLigne");
  var CaseFinLigne=FLigne.firstChild.cloneNode(true); 
  tr.appendChild(CaseFinLigne);

  document.getElementById('Composants').appendChild(tr);
 } catch(e) {
  alert(e);
};
}; 



function AjouteRegle() {
try {
  var tr = document.createElement('tr');
  var td = document.createElement('td');
  var input = document.createElement('input');
  var td2 = document.createElement('td');
  var input2 = document.createElement('input');
  var td2 = document.createElement('td');
  var input3 = document.createElement('input');
  var td3 = document.createElement('td');
  var input4 = document.createElement('input');
  var td4 = document.createElement('td');
  var input5 = document.createElement('input');
  var td5 = document.createElement('td');
  var input6 = document.createElement('input');
  var td6 = document.createElement('td');

  input.setAttribute('type','text');
  input.setAttribute('name','RegleId[]');
  input.setAttribute('value','');
  input.setAttribute('class','form-control');
  input.setAttribute('placeholder','Code...');
  input.appendChild(document.createTextNode(''));

  td.appendChild(input);
  tr.appendChild(td);

  input2.setAttribute('type','text');
  input2.setAttribute('name','RegleTitre[]');
  input2.setAttribute('value','');
  input2.setAttribute('class','form-control');
  input2.setAttribute('placeholder','Titre...');
  input2.appendChild(document.createTextNode(''));

  td2.appendChild(input2);
  tr.appendChild(td2);

  input3.setAttribute('type','text');
  input3.setAttribute('name','RegleNbComposants[]');
  input3.setAttribute('value','');
  input3.setAttribute('class','form-control');
  input3.setAttribute('placeholder','NbComp');
  input3.appendChild(document.createTextNode(''));

  td3.appendChild(input3);
  tr.appendChild(td3);

  input4.setAttribute('type','text');
  input4.setAttribute('name','RegleListeComposants[]');
  input4.setAttribute('value','');
  input4.setAttribute('class','form-control');
  input4.setAttribute('placeholder','Liste des Composants...');
  input4.appendChild(document.createTextNode(''));

  td4.appendChild(input4);
  tr.appendChild(td4);

  input5.setAttribute('type','text');
  input5.setAttribute('name','RegleSyntaxe[]');
  input5.setAttribute('value','');
  input5.setAttribute('class','form-control');
  input5.setAttribute('placeholder','Syntaxe...');
  input5.appendChild(document.createTextNode(''));

  td5.appendChild(input5);
  tr.appendChild(td5);

  input6.setAttribute('type','text');
  input6.setAttribute('name','RegleSemantique[]');
  input6.setAttribute('value','');
  input6.setAttribute('class','form-control');
  input6.setAttribute('placeholder','Signification...');
  input6.appendChild(document.createTextNode(''));

  td6.appendChild(input6);
  tr.appendChild(td6);
  
  var FLigne=document.getElementById("FinLigne");
  var CaseFinLigne=FLigne.firstChild.cloneNode(true); 
  tr.appendChild(CaseFinLigne);

  document.getElementById('Regles').appendChild(tr);
}  catch(e) {
  alert(e);
};
}; 

