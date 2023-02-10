<?php
function tousFichiers(){
echo '<div id="ListeFichiers"><h4>Liste des Fichiers</h4><ul>';

$dossierL=opendir("fichiers");
while ($nomFichier=readdir($dossierL))
 {if (($nomFichier[0]!='.')and (strstr($nomFichier,".json.")==""))
	 {$LeFichier=str_replace(".json","",$nomFichier);
	 echo '<li><a href="fichiers/'.$nomFichier.'">'.$LeFichier.'</a></li>';
//	 echo '<li onclick="choisirLangue()">'.$LaLangue.'</li>';
 };};

closedir($dossierL);
echo "</ul></div>";
};

// function AfficheListeFichiers(LFic){
// echo '<div id="ListeFichiers"><h4>Liste des Fichiers</h4><ul>';

// foreach ($LFic as $num=>$LeFichier){
 // if (($LeFichier[0]!='.')and (strstr($LeFichier,".json.")==""))
	 //{$LeFichier=str_replace(".json","",);
	 // echo '<li><a href="fichiers/'.$LeFichier.'">'.$LeFichier.'</a></li>';
 // };
// echo "</ul></div>";
// };

// function listeTousFichiers(){
// $dossierL=opendir("fichiers");
// while ($nomFichier=readdir($dossierL))
 // {if (($nomFichier[0]!='.')and (strstr($nomFichierLangue,".json.")==""))
// //	 {$LeFichier=str_replace(".json","",);
     // $LesFichiers[]=$nomFichier;
// //	 echo '<li><a href="'.$LeFichier.'">'.$LeFichier.'</a></li>';
// //	 echo '<li onclick="choisirLangue()">'.$LaLangue.'</li>';
 // };

// closedir($dossierL);
// return ($LesFichiers);
// };

//function AfficheListeFichiers(listeTousFichiers());
?>