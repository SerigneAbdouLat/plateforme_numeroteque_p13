<?php
$param = json_encode($_POST);

if(isset($_POST) && !empty($_POST)){
	var_dump($param);

die();
}
$langue = "Non indiquée";
if (isset($_POST['nom_lang'])){
	$langue = $_POST['nom_lang'];
};
$action = "rien";
if (isset($_POST['action'])){
	$action = $_POST['action'];
};
//echo('<h1>Enregistrement des données pour la langue <i>'.$langue.'</i></h1>');
$nom_du_fichier = "langues/".$langue.'.json';
$TabDonnees=$_POST;

include("fct_php.php");

$FormatsPermis = array("txt","odt","doc","jpg","png","gif","svg","ttf","otf","bib","tex","pdf","html","zip","docx","rdf","sql","sqlite");	
sort($FormatsPermis);

function Chaine_Formulaire_Depot_Fichier($theme){ //theme : Références, nombre, images...
// Le nom de fichier sera complété avec la langue et ce thème
	global $langue;
	global $FormatsPermis;
	global $maxsize;
	
$chaine = "<form name='up' action='depose_fichier/upload2_ok.php' method='post' ENCTYPE='multipart/form-data' target='_blank'>";
$chaine .= '<input name="upfile" type="file" value="Parcourir..." size="50">';
$chaine .= '<input name="theme" type="hidden" value="'.$theme.'"><input name="langueFormFic" type="hidden" value="'.$langue.'">
<input type="hidden" name="boolform" value="0">
			<input type="submit" value="Déposer ce fichier" onclick="boolform.value=1">';
$chaine .= '		</form>';
return($chaine);
};

function upload($index,$destination)
{	$extensions=array('png','gif','jpg','jpeg','svg');
	$maxsize=20000000;
   //Test1: fichier correctement uploadé
     if (!isset($_FILES[$index]) OR $_FILES[$index]['error'] > 0) return FALSE;
   //Test2: taille limite
     if ($maxsize !== FALSE AND $_FILES[$index]['size'] > $maxsize) return FALSE;
   //Test3: extension
     $ext = substr(strrchr($_FILES[$index]['name'],'.'),1);
     if ($extensions !== FALSE AND !in_array($ext,$extensions)) return FALSE;
   //Déplacement
     return move_uploaded_file($_FILES[$index]['tmp_name'],$destination);
}

if ($action=="Enregistrer"){
	// Ouverture du fichier
	$fichier = fopen($nom_du_fichier, 'w+');

// Ecriture dans le fichier
	fwrite($fichier, $param);

// Fermeture du fichier
	fclose($fichier);
	
	// Ouverture du fichier daté
	$fichierD = fopen($nom_du_fichier.'.'.date('y-m-d-H-i-s').'.json', 'w+');
//	echo '<br/>'.'<br/>'.'<br/>'.$nom_du_fichier.'.'.date('y-m-d-H-i-s').'.json';

// Ecriture dans le fichier
	fwrite($fichierD, $param);

// Fermeture du fichier
	fclose($fichierD);
};
if ($action=="Relire"){
	// Si les données json sont dans un fichier distant:
	$json_source = file_get_contents($nom_du_fichier);

// On va boucler sur un tableau
	$json_data = json_decode($json_source, true);
	$TabDonnees=$json_data;
};

if ($action=="Télécharger"){
	if (isset($TabDonnees["lexiqueNum"])){
		$ChLexique=$TabDonnees["lexiqueNum"];
		};
	for ($mot=strtok($ChLexique,';'); $mot!='';$mot=strtok(';')){
		$ficIndice = "LexImage[".$mot."]";
		if(isset($_FILES[$ficIndice])){
			$destination="images-nombres/".$langue.'_'.$mot.'_'.$_FILES[$ficIndice]['name'];
			$message="Envoi de ".$ficIndice." sur ".$destination;
			var_dump($message);
			upload($ficIndice,$destination);
		};
	};
};

$tableaux=array(
	"NomAuteur","PrénomAuteur","EmailAuteur","InstAuteur",
	"NomInformateur","PrénomInformateur","EmailInformateur","AgeInformateur","nivLangueInformateur","nivEducInformateur","sexeInformateur",
	"LexMot", "LexValeur", "LexCatégorie","LexPivot", "LexVariable", "LexFormes", "LexImage"
	);

function RelitChampChaine($NomChamp){
	global $tableaux;
	global $TabDonnees;
//	global $_POST;
	if(in_array ($NomChamp,$tableaux)){
		echo($tableaux);
	}
	else
	{
		$chaine = ' id="'.$NomChamp.'" ';
		$chaine .= 'name="'.$NomChamp.'" ';
		// if (isset($_POST[$NomChamp])){
			// $chaine = 'value="'.$_POST[$NomChamp].'" ';
		// };
		if (isset($TabDonnees[$NomChamp])){
			$chaine .= 'value="'.$TabDonnees[$NomChamp].'" ';
		};
		return($chaine);
	};};

function CaseFinLigne(){
	return('<td> <b class="FinLigne" onClick="RemonteCetteLigne(this)">▲</b> <b class="FinLigne" onClick="SupprimeCetteLigne(this)">Ø</b></td>');
};

function RelitChampTableauChaine($NomChamp,$indice){
	global $tableaux;
	global $TabDonnees;
//	global $_POST;
	if(!(in_array ($NomChamp,$tableaux))){
		echo($tableaux);
	}
	else
	{
		$chaine = ' id="'.$NomChamp.'_'.$indice.'" ';
		$chaine .= 'name="'.$NomChamp.'['.$indice.']" ';
		// if (isset($_POST[$NomChamp])){
			// $chaine = 'value="'.$_POST[$NomChamp].'" ';
		// };
		if (isset($TabDonnees[$NomChamp])){
			if (isset($TabDonnees[$NomChamp][$indice])){
				$chaine .= 'value="'.$TabDonnees[$NomChamp][$indice].'" ';
			};
		};
		return($chaine);
	};};

function RelitChamp($NomChamp){
	global $tableaux;
	global $TabDonnees;
//	global $_POST;
	if(in_array ($NomChamp,$tableaux)){
		echo($tableaux);
	}
	else
	{
		$chaine = ' id="'.$NomChamp.'" ';
		$chaine .= 'name="'.$NomChamp.'" ';
		// if (isset($_POST[$NomChamp])){
			// $chaine = 'value="'.$_POST[$NomChamp].'" ';
		// };
		if (isset($TabDonnees[$NomChamp])){
			$chaine .= 'value="'.$TabDonnees[$NomChamp].'" ';
		};
		echo($chaine);
	};};


$liste_familles = array(
    "afro-asiatique (chamito-sémitique)" => "afro-asiatique (chamito-sémitique)",
    "altaïque" => "altaïque",
    "austronésienne" => "austronésienne",                     
    "austro-asiatique" => "austro-asiatique",
//    "bantoue" => "bantoue",	// retrait Maximilien
    "caucasique" => "caucasique",	// ajout Maximilien
    "créole" => "créole",	// ajout Maximilien
    "dravidienne" => "dravidienne",
    "eskaléoute" => "eskaléoute",
    "indo-européenne" => "indo-européenne",
    "Khoisan" => "Khoisan",	// ajout Maximilien
    "maya" => "maya",
    "nilo-saharienne" => "nilo-saharienne",
    "Niger-Congo" => "Niger-Congo",
    "ouralienne" => "ouralienne",
    "quechua" => "quechua",
    "sino-tibétaine" => "sino-tibétaine",
    "tai-kadai" => "tai-kadai",	// ajout Maximilien
    "(y)uto-aztèque" => "(y)uto-aztèque",
    "isolat" => "isolat",
    "autre" => " autre famille linguistique",
    "construite" => "langue construite"
   );
   
$liste_types_morpho = array(
    "agglutinante" => "agglutinante",       
	"flexionnelle" => "flexionnelle",       
    "isolante" => "isolante",
	"autre" => "autre"
	);

$liste_statuts = array(
    "vivante" => "Vivante", 
	"en danger" => "En danger", 
    "historique" => "Historique (état ancien d'une langue actuelle)",       
    "éteinte" => "Éteinte",        	
    "autre" => "Autre"
	);

$liste_sys_num = array(
    "décimale" => "décimale (10)",
    "duodécimale" => "duodécimale (12)",
    "vigésimal" => "vigésimale (20)",
    "hybride-20-10" => "hybride vigésimale-décimale",
    "autre" => "Autre"
	);

$liste_pivots = array(
    "multi" => "multiplicatif",
    "additif" => "additif",
    "non" => "non"
	);

$liste_nivLangueInformateur = array(
    "maternUsuelle" => "Langue maternelle usuelle",
    "materNonUsuelle" => "Langue maternelle non usuelle",
    "autre" => "autre"
	);

$liste_nivEducInformateur = array(
    "primaire" => "Primaire",
    "secondaire" => "Secondaire",
    "universitaire" => "Universitaire",
    "aucune" => "Aucune",
    "autre" => "Autre..."
	);

$liste_sexes = array(
    "masc" => "Homme",
    "fem" => "Femme",
    "autre" => "Autre"
	);

	
$liste_ecrit_alphabetique = array(
    "arabe" => "Arabe",
    "araméen" => "Araméen",
    "cyrillique" => "Cyrillique",
    "grec" => "Grec",
    "hangeul" => "Hangeul",
    "hebreu" => "Hébreu",
	"latin" => "Latin"
	);
$liste_ecrit_syllabique = array(
    "Syllabique" => "Syllabique"
	);
$liste_ecrit_logosyllabique = array(
    "Logosyllabique" => "Logosyllabique"
	);
$liste_ecrit_logographique = array(
    "Logographique" => "Logographique"
	);
$liste_autre = array(
    "autre" => "autre"
	);
$liste_sens_lecture = array(
    "gauche-droite" => 'gauche-droite → <i class="fas fa-arrow-right"></i>',
    "droite-gauche" => 'droite-gauche ←<i class="fas fa-arrow-left"></i>',       
    "boustrophédon" => 'boustrophédon ←<i class="fas fa-arrow-left"></i>',       
    "haut-bas" => 'haut-bas ↓<i class="fas fa-arrow-down"></i>',
    "bas-haut" => 'bas-haut ↑<i class="fas fa-arrow-up"></i></i>',    
    "autre" => "autre"
	);
	
function RelitChoixListe($champ, $liste){
	global $TabDonnees;
	$retour = "";
	if (isset($TabDonnees[$champ])){
		$retour=$TabDonnees[$champ];
		};
	foreach ($liste as $option=>$texte){
		$choix='<option value="'.$option.'"';
		if (strstr ($retour, $option) != ""){
			$choix .= " selected ";
		};
		$choix .= ">".$texte."</option>";
		echo $choix;
	};
};

function ListeOptions($liste){
	$liste_relue="";
	foreach ($liste as $option=>$texte){
		$choix='<option value="'.$option.'"';
		$choix .= ">".$texte."</option>";
		$liste_relue .= $choix;
	};
	return ($liste_relue);
};

function RelitChoixListeTableau($champ, $indice, $liste){
	global $TabDonnees;
	$retour = "";
	$liste_relue="";
	if (isset($TabDonnees[$champ])){
		if (isset($TabDonnees[$champ][$indice])){
			$retour=$TabDonnees[$champ][$indice];
		};
	};
	foreach ($liste as $option=>$texte){
		$choix='<option value="'.$option.'"';
		if (strstr ($retour, $option) != ""){
			$choix .= " selected ";
		};
		$choix .= ">".$texte."</option>";
		$liste_relue .= $choix;
	};
	return ($liste_relue);
};

function RelitRadio($champ, $valeur){
	global $TabDonnees;
	$retour = "";
	if (isset($TabDonnees[$champ])){
		$retour=$TabDonnees[$champ];
		};
	$choix=' name="'.$champ.'"';
	$choix .= ' value="'.$valeur.'"';
	if (strstr ($retour, $valeur) != ""){
		$choix .= " checked ";
		};
	echo $choix;
};

function RelitCase($champ, $valeur){
	RelitRadio($champ, $valeur);
};

function RelitCaseTableau($champ, $indice, $valeur){
	global $TabDonnees;
	$retour = "";
	if (isset($TabDonnees[$champ])){
		if (isset($TabDonnees[$champ][$indice])){
			$retour=$TabDonnees[$champ][$indice];
		};
	};
	$choix=' name="'.$champ.'['.$indice.']"';
	$choix .= ' value="'.$valeur.'"';
	if (strstr ($retour, $valeur) != ""){
		$choix .= " checked ";
		};
	return ($choix);
};

function Tableau_Mots_de_Liaison(){
	global $TabDonnees;
	print ('                            <thead>
                                <tr>
                                    <th colspan="4"><h4>Mots de liaison</h4></th>
                                </tr>
                                <tr>
                                    <th><i id="add-tr-table" class="far fa-plus-square add-plus"></i>Mot</th>
                                    <th>Signification</th>
                                    <th>Catégorie</th>
                                    <th>Commentaire</th>
                                </tr>
                            </thead>
<tbody id="MotsLiaison">');
if (isset($TabDonnees) && isset($TabDonnees["MotLiaison"])){
	foreach ($TabDonnees["MotLiaison"] as $num=>$Mot){
		if($Mot!=''){
		$FAuteur='<tr><td><input type="text" name="MotLiaison[]" id="MotLiaison_'.$num.'" value="'.$Mot.'" class="form-control" /></td>';
		$FAuteur .= '<td><input type="text" name="MotLiSignification[]"  id="MotLiSignification_'.$num.'" value="'.$TabDonnees["MotLiSignification"][$num].'" class="form-control"/></td>';
		$FAuteur .= '<td><input type="text" name="MotLiCatégorie[]"  id="MotLiCatégorie_'.$num.'" value="'.$TabDonnees["MotLiCatégorie"][$num].'" class="form-control" /></td>';
		$FAuteur .= '<td><input type="text" name="MotLiCommentaire[]"  id="MotLiCommentaire_'.$num.'" value="'.$TabDonnees["MotLiCommentaire"][$num].'" class="form-control" /></td>';
        $FAuteur.=CaseFinLigne().'</tr>';
		print ($FAuteur);
}}}
else{
	$LigneAuteurVide='                     <tr> 
                        <td><input id="MotLiaison[]" name="MotLiaison[]" type="text" class="form-control" placeholder="Mot..." autocomplete="off"/></td> 
                        <td><input id="MotLiSignification[]" name="MotLiSignification[]" type="text" class="form-control" placeholder="Signification..." autocomplete="off"/></td> 
                        <td><input id="MotLiCatégorie[]" name="MotLiCatégorie_" type="text" class="form-control" placeholder="Catégorie..." autocomplete="off"/></td> 
                        <td style="position: relative;"><input id="MotLiCommentaire_" name="MotLiCommentaire[]" type="text" class="form-control" placeholder="Commentaire..." autocomplete="off"/>
					</td>'.CaseFinLigne().'</tr>';
	print $LigneAuteurVide;
};
print ('
</tbody>
<tr><td colspan="4"> 
<form action=');
print ('"'.$_SERVER['PHP_SELF'].'" method="post" id="FormulaireMotsLiaison">
<input type="button" onclick="AjouteMotLiaison()" value="Ajouter un mot" class="btn btn-primary"/>
</form>
</tr>');
}
// <input type="button" onclick="fondbleu()" value="Ajouter un mot" class="btn btn-primary"/>


function Tableau_lexique_nombres(){
	global $TabDonnees;
	global $liste_pivots;
	print('<tbody id="tab_lexique_nombres">');
	if (isset($TabDonnees["lexiqueNum"])){
	// remplacé l'id lexique par lexiqueNum pour éviter la concurrence du tableau initial
		$ChLexique=$TabDonnees["lexiqueNum"];
		};
	for ($mot=strtok($ChLexique,';'); $mot!='';$mot=strtok(';')){
		$ligne='<tr><td><a class="infobulle">'.'<div>'.Chaine_Formulaire_Depot_Fichier("Image-".$mot).'</div>'.$mot.'</a><input readonly hidden name="LexMot[]" value="'.$mot.'"/></td>';
		$ligne.='<td><input type="text" '.RelitChampTableauChaine('LexValeur',$mot).' class="form-control"/></td>';
		$ligne.='<td><input type="text" '.RelitChampTableauChaine('LexCatégorie',$mot).' class="form-control"/></td>';
        $ligne.='<td><select class="form-control" name="LexPivot['.$mot.']" id="pivot_'.$mot.'">';
		$ligne.='<option value="" disabled selected>Pivot...?</option>';
		$ligne.=RelitChoixListeTableau('LexPivot', $mot, $liste_pivots);
        $ligne.='</select></td>';
        $ligne.='<td><input type="checkbox" ';
		$ligne.=RelitCaseTableau('LexVariable', $mot, $mot);
        $ligne.='/></td>';
		$ligne.='<td><input type="text" '.RelitChampTableauChaine('LexFormes',$mot).' class="form-control"/></td>';
		$ligne.='<td><a class="infobulle">Img<div>'.Chaine_Formulaire_Depot_Fichier("Image").'</div></a></td>';
        $ligne.=CaseFinLigne();
	//	$ligne.='<td><input  style="overflow: hidden;" type="file" name="LexImage['.$mot.']" /></td>';
		$ligne.='</tr>
';
		print($ligne);
	};
	//print('<tr><td>'.'<input type="submit" name="action"  Value="Télécharger"/>'.'</td>'.'</tr>');
	print("</tbody>");	
	print("</table>");	
};

function Tableau_regles_derivation(){
	global $TabDonnees;
	global $liste_pivots;
//	print("<table>");
	if (isset($TabDonnees["lexiqueNum"])){
	// remplacé l'id lexique par lexiqueNum pour éviter la concurrence du tableau initial
		$ChLexique=$TabDonnees["lexiqueNum"];
		};
	for ($mot=strtok($ChLexique,';'); $mot!='';$mot=strtok(';')){
		$ligne='<tr><td>'.$mot.'<input readonly hidden name="LexMot[]" value="'.$mot.'"/></td>';
		$ligne.='<td><input type="text" '.RelitChampTableauChaine('LexValeur',$mot).' class="form-control"/></td>';
		$ligne.='<td><input type="text" '.RelitChampTableauChaine('LexCatégorie',$mot).' class="form-control"/></td>';
        $ligne.='<td><select class="form-control" name="LexPivot['.$mot.']" id="pivot_'.$mot.'">';
		$ligne.='<option value="" disabled selected>Pivot...?</option>';
		$ligne.=RelitChoixListeTableau('LexPivot', $mot, $liste_pivots);
        $ligne.='</select></td>';
        $ligne.='<td><input type="checkbox" ';
		$ligne.=RelitCaseTableau('LexVariable', $mot, $mot);
        $ligne.='/></td>';
		$ligne.='<td><input type="text" '.RelitChampTableauChaine('LexFormes',$mot).' class="form-control"/></td>';
		$ligne.='<td>(à venir)</td>';
        $ligne.=CaseFinLigne();
	//	$ligne.='<td><input  style="overflow: hidden;" type="file" name="LexImage['.$mot.']" /></td>';
		$ligne.='</tr>';
		print($ligne);
	};
	//print('<tr><td>'.'<input type="submit" name="action"  Value="Télécharger"/>'.'</td>'.'</tr>');
	print("</table>");	
};

function Tableau_Auteurs(){
	global $TabDonnees;
print '<tbody id="Auteurs">';
if (isset($TabDonnees) && isset($TabDonnees["NomAuteur"])){// print ($TabDonnees["NomAuteur"]);
	foreach ($TabDonnees["NomAuteur"] as $num=>$NAuteur){
		if($NAuteur!='' || $TabDonnees["PrénomAuteur"][$num]!=''){
		$FAuteur='<tr><td><input type="text" name="NomAuteur[]" id="NomAuteur_'.$num.'" value="'.$NAuteur.'" class="form-control" /></td>';
		$FAuteur .= '<td><input type="text" name="PrénomAuteur[]"  id="PrénomAuteur_'.$num.'" value="'.$TabDonnees["PrénomAuteur"][$num].'" class="form-control"/></td>';
		$FAuteur .= '<td><input type="text" name="EmailAuteur[]"  id="EmailAuteur_'.$num.'" value="'.$TabDonnees["EmailAuteur"][$num].'" class="form-control" /></td>';
		$FAuteur .= '<td><input type="text" name="InstAuteur[]"  id="InstAuteur_'.$num.'" value="'.$TabDonnees["InstAuteur"][$num].'" class="form-control" /></td>';
		$FAuteur .=CaseFinLigne().'</tr>';
		print ($FAuteur);
}}}
else{
	$LigneAuteurVide='                     <tr> 
                        <td><input id="NomAuteur[]" name="NomAuteur[]" type="text" class="form-control" placeholder="Nom..." autocomplete="off"/></td> 
                        <td><input id="PrénomAuteur[]" name="PrénomAuteur[]" type="text" class="form-control" placeholder="Prenom..." autocomplete="off"/></td> 
                        <td><input id="emailAuteur[]" name="EmailAuteur[]" type="email" class="form-control" placeholder="email..." autocomplete="off"/></td> 
                        <td style="position: relative;"><input id="instAuteur_" name="InstAuteur[]" type="text" class="form-control" placeholder="Institution..." autocomplete="off"/></td>'.CaseFinLigne().'</tr>';
	print $LigneAuteurVide;
};
print'</tbody>

<tr><td colspan="4"> 
<form action="'.$_SERVER['PHP_SELF'].'" method="post" id="FormulaireAuteurs">
<input type="button" onclick="AjouteAuteur()" value="Ajouter un auteur" class="btn btn-primary"/>
</form>
</tr> ';
};   


function Tableau_Informateurs(){
	global $TabDonnees;
	global $liste_nivLangueInformateur;
	global $liste_nivEducInformateur;
	global $liste_sexes;
print '<tbody id="Informateurs">';
if (isset($TabDonnees) && isset($TabDonnees["NomInformateur"])){
	foreach ($TabDonnees["NomInformateur"] as $num=>$NInformateur){
		if($NInformateur!='' || $TabDonnees["PrénomInformateur"][$num]!=''){
		$FInformateur='<tr><td><input type="text" name="NomInformateur[]" id="NomInformateur_'.$num.'" value="'.$NInformateur.'" class="form-control" /></td>';
		$FInformateur .= '<td><input type="text" name="PrénomInformateur[]"  id="PrénomInformateur_'.$num.'" value="'.$TabDonnees["PrénomInformateur"][$num].'" class="form-control"/></td>';
		$FInformateur .= '<td><input type="text" name="EmailInformateur[]"  id="EmailInformateur_'.$num.'" value="'.$TabDonnees["EmailInformateur"][$num].'" class="form-control" /></td>';
		$FInformateur .= '<td><input type="text" name="AgeInformateur[]"  id="AgeInformateur_'.$num.'" value="'.$TabDonnees["AgeInformateur"][$num].'" class="form-control" /></td>';
        $FInformateur.='<td><select class="form-control" name="nivLangueInformateur['.$num.']" id="nivLangueInformateur_'.$num.'">';
		$FInformateur.='<option value="" disabled selected>Langue...?</option>';
		$FInformateur.=RelitChoixListeTableau('nivLangueInformateur', $num, $liste_nivLangueInformateur);
        $FInformateur.='</select></td>';
        $FInformateur.='<td><select class="form-control" name="nivEducInformateur['.$num.']" id="nivEducInformateur_'.$num.'">';
		$FInformateur.='<option value="" disabled selected>Etudes</option>';
		$FInformateur.=RelitChoixListeTableau('nivEducInformateur', $num, $liste_nivEducInformateur);
        $FInformateur.='</select></td>';
        $FInformateur.='<td><select class="form-control" name="sexeInformateur['.$num.']" id="sexeInformateur_'.$num.'">';
		$FInformateur.='<option value="" disabled selected>Sexe</option>';
		$FInformateur.=RelitChoixListeTableau('sexeInformateur', $num, $liste_sexes);
        $FInformateur.='</select></td>';
 				
        $FInformateur.=CaseFinLigne();
        $FInformateur.='</tr>';
		print ($FInformateur);
}}}
else{
$LigneInformateurVide='                     <tr id="LigneInformateurVide" class="hide"> 
                        <td><input id="NomInformateur[]" name="NomInformateur[]" type="text" class="form-control" placeholder="Nom..." autocomplete="off"/></td> 
                        <td><input id="PrénomInformateur[]" name="PrénomInformateur[]" type="text" class="form-control" placeholder="Prenom..." autocomplete="off"/></td> 
                        <td><input id="emailInformateur[]" name="EmailInformateur[]" type="email" class="form-control" placeholder="email..." autocomplete="off"/></td> 
                        <td style="position: relative;"><input id="AgeInformateur_" name="AgeInformateur[]" type="text" class="form-control" placeholder="Âge" autocomplete="off"/>
					</td>';
		$num='';
        $FInformateur='<td><select class="form-control" name="nivLangueInformateur[]" id="nivLangueInformateur_">';
		$FInformateur.='<option value="" disabled selected>Langue...?</option>';
		//$FInformateur.=ListeOptions ($liste_nivLangueInformateur);
		$FInformateur.=RelitChoixListeTableau('nivLangueInformateur', $num, $liste_nivLangueInformateur);
        $FInformateur.='</select></td>';
        $FInformateur.='<td><select class="form-control" name="nivEducInformateur['.$num.']" id="nivEducInformateur_'.$num.'">';
		$FInformateur.='<option value="" disabled selected>Etudes</option>';
		//$FInformateur.=ListeOptions ($liste_nivEducInformateur);
		$FInformateur.=RelitChoixListeTableau('nivEducInformateur', $num, $liste_nivEducInformateur);
        $FInformateur.='</select></td>';
        $FInformateur.='<td><select class="form-control" name="sexeInformateur['.$num.']" id="sexeInformateur_'.$num.'">';
		$FInformateur.='<option value="" disabled selected>Sexe</option>';
		//$FInformateur.=ListeOptions ($liste_sexes);
		$FInformateur.=RelitChoixListeTableau('sexeInformateur', $num, $liste_sexes);
        $FInformateur.='</select></td>';

		
		// $FInformateur.=ListeOptions ($liste_nivLangueInformateur);
		// $FInformateur.=RelitChoixListe('nivLangueInformateur', $liste_nivLangueInformateur);
        $FInformateur.=CaseFinLigne().'</tr>';
	print ($LigneInformateurVide.$FInformateur);
};

print'</tbody>

<tr><td colspan="8"> 
<form action="'.$_SERVER['PHP_SELF'].'" method="post" id="FormulaireInformateurs">
<input type="button" onclick="AjouteInformateur()" value="Ajouter un Informateur" class="btn btn-primary"/>
</form>
</tr> ';
};   


function Formulaire_Depot_Fichier($theme){ //theme : Références, nombre, images...
// Le nom de fichier sera complété avec la langue et ce thème
	global $langue;
	global $FormatsPermis;
	global $maxsize;
	
print ("<form name='up' action='depose_fichier/upload2_ok.php' method='post' ENCTYPE='multipart/form-data' target='_blank'>");
print ('<div ><input name="upfile" type="file" value="Parcourir..." size="50">');
print ('<input name="theme" type="hidden" value="'.$theme.'"><input name="langueFormFic" type="hidden" value="'.$langue.'">
<input type="hidden" name="boolform" value="0">
			<input type="submit" value="Déposer ce fichier" onclick="boolform.value=1"></div>');
print ('		</form>');
};

function Formulaire_Depot_Fichier_Ref($theme){ //theme : Références, nombre, images...
// Le nom de fichier sera complété avec la langue et ce thème
	global $TabDonnees;
	global $langue;
	global $FormatsPermis;
	global $regles;
	global $maxsize;
	
print ("<h4>Dépôt de fichier $theme");
print ('<a class="infobulle"> 
       <img src="../assets/img/logo/image-aide.png" height=32px alt=" ? " /> 
       <div>
');					
					if ($regles != "") {
					echo "règles :<br>$regles";
					}
echo '					 <br><br></div>
					<br><div align="center">					Formats de fichiers permis:<br>';
foreach ($FormatsPermis as $num=>$format){
   echo $format.' ';
};
print (' <br>
<ul>
<li>Vous ne pouvez pas charger de fichier dont le type n\'est pas cité ci-dessus.</li>
<li> Pour les fichiers d\'autres types, ou dépassant la taille limite, créez un fichier zip.</li>
<li>Taille maximale du fichier : '.$maxsize.' octets.</li>
<li> Pas d\'espace dans les noms de fichiers.</li>
<li> Pas de caractères spéciaux (accents).</li>
</ul></div></a></h4>');
print ("<form name='up' action='depose_fichier/upload2_ok.php' method='post' ENCTYPE='multipart/form-data' target='_blank'>");
print ('<div ><input name="upfile" type="file" value="Parcourir..." size="50"><br>Taille maximale du fichier : '.$maxsize.' octets.');
print ('<input name="theme" type="hidden" value="'.$theme.'"><input name="langueFormFic" type="hidden" value="'.$langue.'">
<input type="hidden" name="boolform" value="0">
			<input type="submit" value="Déposer ce fichier" onclick="boolform.value=1"></div>');
print ('		</form>');
};

function json_transmet($tableau, $id_div){
	print ('<div id="'.$id_div.'" class="hide">'.json_encode($tableau)."</div>");
};

?>