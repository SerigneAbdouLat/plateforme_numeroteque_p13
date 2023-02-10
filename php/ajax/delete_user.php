<?php 
if(isset($_POST)){
    if(isset($_POST["uid"]) && !empty($_POST["uid"])){
        
        require('../../config/connectDB.php');

        $user_id = htmlspecialchars($_POST["uid"]);

        $req = $pdo -> prepare('DELETE FROM users WHERE user_id = ?');
        $req -> execute(array($user_id));

        if($req){
            echo 1;
        }else{
            echo "Une erreur est survenue lors de la suppression";
        }

    }else{
        echo "Une erreur est survenue";
    }
};

?>