function changeClasseElementParId(Id, Classe){
//  alert("Clic sur bouton; passer "+Id+" en "+Classe);
  var Elem=document.getElementById(Id);
  Elem.className=Classe;
  Elem.setAttribute("class",Classe);
}

function clicEcritOui(){
//  changeClasseElementParId("type_ecrite", "visible");
  changeClasseElementParId("sfEcriture", "visible");
}

function clicEcritNon(){
//  changeClasseElementParId("type_ecrite", "hide");
  changeClasseElementParId("sfEcriture", "hide");
}

function clicSocioAutreOui(){
  changeClasseElementParId("autre-socio", "visible");
}

function clicSocioAutreNon(){
  changeClasseElementParId("autre-socio", "hide");
}

function controleSocioAutre(){
  var valeur = document.forms['FormulaireGlobal'].autreSocioBox;
  if (valeur.checked){
     clicSocioAutreOui();}
  else{
     clicSocioAutreNon();};
}

function majRefZotero(){
  var code = document.getElementById("codeZotero").value;
//  code = "XW3XJJK6";
  var zone = document.getElementById("refZotero");
  var urlapi = "https://api.zotero.org/groups/2546015/collections/"+code+"/items?format=bib";
//  zone.appendChild(document.createTextNode(urlapi));
  fetch(urlapi).then(function(response) {
    response.text().then(function(text) {
//		zone.appendChild(document.createTextNode(text));
		zone.innerHTML="<h5>Références</h5>"+text;
    });
  });
}

/*function isset(variable){
	var undefined;
	return ( variable == undefined ? false : true );
}*/

function isset(e) {
   try {
     if (eval(e)) {}
    }
   catch(err) {
    }
   return true;
}

function controleCodeZotero(){
  var valeur = document.getElementById("codeZotero").value;
//  alert(valeur);
  if (isset(valeur)){
     if (valeur>""){
       changeClasseElementParId("refZotero", "visible");
	   majRefZotero();}
	 else{
       changeClasseElementParId("refZotero", "hide");};
     }
  else{
     changeClasseElementParId("refZotero", "hide");};
}

function clicDeclinOui(){
  changeClasseElementParId("diff-case", "visible");
}

function clicDeclinNon(){
  changeClasseElementParId("diff-case", "hide");
}

function clicGenre(){
  changeClasseElementParId("diff-gen", "visible");
  changeClasseElementParId("sfClasse", "hide");
}

function clicClasse(){
  changeClasseElementParId("diff-gen", "hide");
  changeClasseElementParId("sfClasse", "visible");
}

function clicAucun(){
  changeClasseElementParId("diff-gen", "hide");
  changeClasseElementParId("sfClasse", "hide");
}

function clicAvecClassificateurs(){
  changeClasseElementParId("sans_Cla", "hide");
  changeClasseElementParId("avec_Cla", "visible");
}

function clicSansClassificateurs(){
  changeClasseElementParId("avec_Cla", "hide");
  changeClasseElementParId("sans_Cla", "visible");
}


function clicMotsLiaisonOui(){
  changeClasseElementParId("tMotsLiaison", "table text-center visible");
}

function clicMotsLiaisonNon(){
  changeClasseElementParId("tMotsLiaison", "hide");
}

function clicGenreEssai(){
  alert("Clic sur genre");
  var divGenre=document.getElementById("diff-gen");
  divGenre.className="";
  var titre=document.getElementById("montitre");
  titre.setAttribute("class","montitre");
  titre.className="autretitre";
  titre.innerHTML="Mon nouveau titre";
}

function fondbleu(){
  var corps=document.body;
  corps.style.backgroundColor="#aaf";
}

function choisirLangue(Langue){
//  fondbleu();
  var champ = document.forms['FormulaireGlobal'].nom_lang;
//  champ.setAttribute("value","Truc");
  champ.setAttribute("value",Langue);
}

function changeLexique(){
  fondbleu();
}

function ouvreISO639(){
  open("https://iso639-3.sil.org/code_tables/639/data","ISO 639-3","");
}

function ouvreLavalFamilles(){
  open("http://www.axl.cefan.ulaval.ca/monde/familles.htm","LavalFamilles","");
}

function ouvreSorosoro(){
  open("http://www.sorosoro.org","Sorosoro","");
}

function SupprimeCetteLigne(obj){
//  obj.style.backgroundColor="#BBF";
  var cellule=obj.parentNode;
  cellule.style.backgroundColor="#BFB";
  var ligne=cellule.parentNode;
//  ligne.style.backgroundColor="#BFB";
  var tableau=ligne.parentNode;
//  tableau.style.backgroundColor="#B9B";
  if (confirm("Voulez-vous effacer cette ligne du tableau&nbsp;?"))
	tableau.removeChild(ligne);
}

function RemonteCetteLigne(obj){
//  obj.style.backgroundColor="#BBF";
  var cellule=obj.parentNode;
//  cellule.style.backgroundColor="#BFB";
  var ligne=cellule.parentNode;
//  ligne.style.backgroundColor="#BFB";
  var lignePrec=ligne.previousSibling;
//  lignePrec.style.backgroundColor="#B9B";
  var tableau=ligne.parentNode;
  if (lignePrec != null)
	  tableau.insertBefore(ligne,lignePrec);
}

function demarrage(){
  var corps=document.body;
  corps.style.backgroundColor="#FE5";
  var valeur = document.forms['FormulaireGlobal'].ecrite.value;
  if (valeur=="oui"){
//     changeClasseElementParId("type_ecrite", "visible");
	 clicEcritOui();
	 };
  var message = "<h4>Démarrage</h4>";
  message += "<p>Ecriture : "+valeur+"</p>";
  valeur = document.forms['FormulaireGlobal'].autreSocioBox;
  if (valeur.checked){
     clicSocioAutreOui();};
  valeur = document.forms['FormulaireGlobal'].déclinaison.value;
  if (valeur=="oui"){
     clicDeclinOui();};
  message += "<p>Déclinaison : "+valeur+"</p>";
  valeur = document.forms['FormulaireGlobal'].genre1.value;
  if (valeur=="genre"){
     clicGenre();};
  if (valeur=="classe"){
     clicClasse();};
  message += "<p>"+valeur+"</p>";
  valeur = document.forms['FormulaireGlobal'].classif.value;
  if (valeur=="oui"){
     clicAvecClassificateurs();};
  if (valeur=="non"){
     clicSansClassificateurs();};
  message += "<p>Classificateurs : "+valeur+"</p>";
  valeur = document.getElementById("liaisonOui");//document.forms['FormulaireGlobal'].liaison.value;
  if (valeur.checked){
     clicMotsLiaisonOui();};
  controleCodeZotero();
  brython()
//  message += "<p>Mots de liaison : "+valeur+"</p>";
//  alert(valeur);
}