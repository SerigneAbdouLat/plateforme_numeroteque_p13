<?php
session_start();
if (isset($_POST)) {
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];


        require('../../config/connectDB.php');

        $req = $pdo->prepare('SELECT email, password FROM users WHERE email = ?');
        $req->execute(array($email));

        $count = $req->rowCount();

        if ($count == 1) {
            $user = $req->fetch();
            $password_hash = $user["password"];

            if (password_verify($password, $password_hash)) {
                
                $_SESSION['user_email'] = $email;
                echo 1;
            } else {
                echo "Identifiant ou mot de passe incorrect.";
            }
        } else {
            echo "Identifiant ou mot de passe incorrect.";
        }
    } else {
        echo "Certains champs sont vides.";
    }
}
