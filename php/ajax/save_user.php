<?php
if(isset($_POST)){
    if(isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])){

        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        require('../../config/connectDB.php');

        $req = $pdo->prepare('INSERT INTO users (prenom,nom,email,password) VALUES (?,?,?,?)');

        try {
            $req->execute(array($prenom, $nom, $email, $password_hash));
            session_start();
            $_SESSION['user_email'] = $email;
            echo 'success';
        } catch (Exception $err) {
            echo $err->getMessage();
        }

      
    }else{
        echo "Certains champs sont vides !";
    }
}else{
    echo "Error 500";
}
