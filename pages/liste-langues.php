<?php

echo '<div id="ListeLangues"><h4>Liste des langues abordées</h4>';
echo "<p>Cliquez sur une langue pour la choisir, ou écrivez le nom d'une nouvelle langue ci-dessous</p><ul>";

$dossierL=opendir("langues");
while ($nomFichierLangue=readdir($dossierL))
 {if (($nomFichierLangue[0]!='.')and (strstr($nomFichierLangue,".json.")==""))
	 {$LaLangue=str_replace(".json","",$nomFichierLangue);
	 echo '<li onclick="choisirLangue(\''.$LaLangue.'\')">'.$LaLangue.'</li>';
 };};

closedir($dossierL);
echo "</ul></div>";

?>