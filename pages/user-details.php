<?php
if(isset($_SESSION["user_email"]) && !empty($_SESSION["user_email"])){
    require('../config/connectDB.php');

    $req = $pdo->prepare('SELECT user_id, prenom, nom, email,type FROM users WHERE email = ?' );
    $req->execute(array( $_SESSION['user_email']));

    $user_connect = $req->fetch();


    $count = $req->rowCount();

  

}

?>