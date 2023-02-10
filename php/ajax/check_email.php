<?php

if(isset($_POST)){
    if(isset($_POST['email']) && !empty($_POST['email'])){

        $email = $_POST['email'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "L'adresse email '$email' est invalide.";
        }else{
            require('../../config/connectDB.php');

            $req = $pdo->prepare('SELECT email FROM users WHERE email = ?');
            $req->execute(array($email));

            $count = $req->rowCount();

            if($count != 0){
                echo "L'adresse email '$email' existe déjà.";
            }else{
                echo 1;
            }
        }

    }else{
        echo "Veuillez saisir votre adresse e-mail";
    }
}

?>