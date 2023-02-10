<?php

    if($count === 1){
        $is_admin = true;
        $req_users = $pdo->prepare("SELECT user_id, prenom, nom, type FROM users WHERE email != ? ORDER BY user_id DESC");
        $req_users->execute(array($_SESSION["user_email"]));
        $users = $req_users->fetchAll();
    }


?>