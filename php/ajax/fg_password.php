<?php
if (isset($_POST)) {
    if (isset($_POST['email']) && !empty($_POST['email'])) {

        $email = $_POST['email'];


        require('../../config/connectDB.php');

        $req = $pdo->prepare('SELECT user_id,email,nom FROM users WHERE email = ?');
        $req->execute(array($email));

        $count = $req->rowCount();

        if ($count == 1) {
           $user = $req->fetch();
            $token = sha1(md5($user["email"].$user["user_id"].$user["nom"].time()));

            $req_update = $pdo->prepare('UPDATE users set token = ? WHERE email = ?');
            $req_update->execute(array($token, $email));

            if($req_update){
                // envoi de mail
                echo $token;

            }else{
                echo 'Error 500 :Une erreur est survenue. Réessayer ultérieurement.';
            }

        } else {
            echo "Un e-mail vous sera envoyé si votre adresse e-mail est présente dans le système";
        }
    } else {
        echo "Le champs e-mail ne doit pas etre vide.";
    }
}
