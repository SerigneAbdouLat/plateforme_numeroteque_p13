<?php

$dossierL=opendir("langues");

$langues = array();
while ($nomFichierLangue=readdir($dossierL)){
    
     if (($nomFichierLangue[0]!='.')and (strstr($nomFichierLangue,".json.")=="")){
         
        $langue_json = file_get_contents('langues/'.$nomFichierLangue);

        array_push($langues, $langue_json);
    };
};

foreach(json_decode($langues[0]) as $key=> $value){
    echo $key;
}
closedir($dossierL);

?>