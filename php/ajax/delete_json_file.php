<?php 
if(isset($_POST['file_name']) && !empty($_POST['file_name'])){
    $delete = unlink('../../pages/langues/'.$_POST['file_name']);

    if($delete){
        echo 1;
    }else{
        echo "Impossible de supprimer cette langue";
    }
}else{
    echo "Une erreur s'est produite.";
}
 ?>