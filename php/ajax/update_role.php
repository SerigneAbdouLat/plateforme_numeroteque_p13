<?php
if(isset($_POST)){
    if(isset($_POST["role"]) && !empty($_POST["role"]) && isset($_POST["uid"]) && !empty($_POST["uid"])){
        
        require('../../config/connectDB.php');

        $type = htmlspecialchars($_POST["role"]);
        $user_id = htmlspecialchars($_POST["uid"]);

        $req = $pdo -> prepare('UPDATE users set type = ? WHERE user_id = ?');
        $req -> execute(array($type, $user_id));

        if($req){
            echo 1;
        }else{
            echo "Une erreur est survenue lors de la mise à jour.";
        }

    }else{
        echo "Une erreur est survenue";
    }
};
?>