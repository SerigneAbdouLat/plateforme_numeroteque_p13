<?php

//info pour le script :
$maxsize=1000000; //Taille maximale des fichiers qui seront uploadés (en octet)
$link_css='style1.css'; // lien vers une feuille de style pour les couleurs du texte et des liens
$alink='black'; // couleur des liens actives
$background=''; // Image de fond (s'il y en a pas ne rien mettre)
$bgcolor='white'; //Couleur du fond
$link='navy'; //couleur des liens
$text='black'; // couleur du texte
$vlink='navy'; //couleur des liens déjà visités
//Type des fichiers qui peuvent être uploadés... 6 extensions maximum disponible pour le moment
$type1='rtf'; 
$type2='odt';
$type3='ods';
$type4='zip';
$type5='doc';
$type6='pdf';
$url_site='http://127.0.0.1/depose_fichier/'; // Chemin vers le fichier upload.php et upload_ok.php avec le '/' à la fin
//$page_appel=$_SERVER["HTTP_REFERER"];
//$page_appel=$_SERVER["SERVER_NAME"];
//echo("<h2>SN: ".$page_appel."</h2>");
//$page_appel=$_SERVER["PHP_SELF"];
//echo("<h2>PS: ".$page_appel."</h2>");
//$page_appel=$_SERVER["DOCUMENT_ROOT"];
//echo("<h2>DR: ".$page_appel."</h2>");
//$page_appel=$_SERVER["SCRIPT_FILENAME"];
//echo("<h2>SF: ".$page_appel."</h2>");
//$url_dossier=str_replace("upload1.php","",str_replace("numerotheque.php","",$page_appel));
$regles=''; //Mettez ici les règles que doivent respecter vos visiteurs (pas de Warez...) et pour faire un retour à la ligne, il faut mettre <br>



	//extraction de n caractères d'une chaine en partant de la droite
	function right($str,$nbr)
	{ 
		return substr($str,-$nbr); 
	}
	
	//extraction de n caractères d'une chaine en partant de la gauche
	function left($str,$nbr)
	{ 
		return substr($str,0,$nbr); 
	}
	
?>