<?php

$dossierL=opendir("langues");

$langues = array();
$langue_names = array();
$modals = array();
while ($nomFichierLangue=readdir($dossierL)){
    
     if (($nomFichierLangue[0]!=='.')and (strstr($nomFichierLangue,".json.")=="")){
         
        $langue_json = file_get_contents('langues/'.$nomFichierLangue);

        $LeFichier=str_replace(".json","",$nomFichierLangue);

        array_push($langues, $langue_json);
        array_push($langue_names, $LeFichier);
    };
};
closedir($dossierL);

?>

<h4>Langues</h4>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Type</th>
      <th scope="col">Abrévation</th>
      <th scope="col">Status</th>
      <th scope="col">Ecriture</th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody style="background: #ffffff">

  <?php
  $langue_id = 0;
  foreach ($langues as $langue) {

    $ligne = '<tr id="tr-'.$langue_id.'">';

    $auteurs = array();

    $have_authors = false;

    $nomLangue = '';

    $modal = '<div class="modal fade" id="modal-'.$langue_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" style="max-width : 800px" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Détails de la langue</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">';

      $langue = json_decode($langue);
     
     foreach ($langue as $key => $value) {



        if(gettype($value) == 'string'){

            if($value !== ''){
                $modal .= '<p>'.$key.' : <b>'.$value. '</b></p>';
            }
       

        }else if(gettype($value) == 'array'){


            switch ($key) {
                case 'NomAuteur':
                    if(count($value) !== 0){
                        $have_authors = true;
                        array_push($auteurs, $value);
                    };
                    break;
                case 'PrénomAuteur':
                    if(count($value) !== 0){
                        $have_authors = true;
                        array_push($auteurs, $value);
                    };
                    # code...
                    break;
                case 'EmailAuteur':
                    if(count($value) !== 0){
                        $have_authors = true;
                        array_push($auteurs, $value);
                    };
                case 'InstAuteur':
                    if(count($value) !== 0){
                        $have_authors = true;
                        array_push($auteurs, $value);
                    };
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }


            $modal .= '<p>'.$key.' : <b> TABLEAU</b></p>';
        }

         
        if($key == 'nom_lang'){
            $ligne .= '<td>'.$value.'</td>';
        }

        if($key == 'famille'){
            $ligne .= '<td>'.$value.'</td>';
        }
        if($key == 'abréviation'){
            $ligne .= '<td>'.$value.'</td>';
        }
        if($key == 'epoque'){
            $ligne .= '<td>'.$value.'</td>';
        }
        if($key == 'ecrite'){
            $ligne .= '<td>'.$value.'</td>';
        }
     }

     $table_author = '';

     if($have_authors == true){


        $table_author .= '
        
        <h4>Liste des auteurs</h4>
        
        <table class="table">
         <thead class="thead-dark">
           <tr>
             <th scope="col">Nom</th>
             <th scope="col">Prénom</th>
             <th scope="col">Email</th>
             <th scope="col">Institution</th>
           </tr>
         </thead>
         <tbody>';

         $i = 0;

         $tr = '';

         for ($i=0; $i < count($auteurs); $i++) { 
            $tr .= '<tr>'; 
            
         foreach ($auteurs as $auteur) {

            if($i < count($auteur)){
                 $tr .= '<td>'.$auteur[$i]. '</td>';
            }
           
         }
         $tr .= '</tr>';

         if($tr !== '<tr></tr>'){
            $table_author .= $tr;
         }
         }

         
        
        $table_author .='</tbody> </table>';
     }

     $modal .= $table_author.'</div>
     <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>';


     $ligne .= '<td><button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#modal-'.$langue_id.'">Voir les détails</button></td>';
     $ligne .= '<td><button type="button" class="btn btn-success">Enregistrer</button></td>';
     $ligne .= '<td><button type="button" class="btn btn-danger btn_delete_lang" lang-id="'.$langue_id.'" lang-name="'.$langue_names[$langue_id].'">Supprimer</button></td>';

     $ligne .= '</tr>';

    echo $ligne;
    array_push($modals, $modal);
    $langue_id = $langue_id + 1;



  } 

?>

  </tbody>
</table>

<?php foreach ($modals as $modal) {
   echo $modal;
}
