<?php
$token_is_valid = false;
if(isset($_GET['token']) && !empty($_GET['token'])){
    require('../config/connectDB.php');

    $error = "";


    $token = htmlspecialchars($_GET['token']);

    $req = $pdo->prepare('SELECT email FROM users WHERE token = ?');
    $req->execute(array($token));

    $count = $req->rowCount();

    if($count == 1){
        $token_is_valid = true;

        if(isset($_POST['fg_new_pwd']) && isset($_POST['fg_conf_pwd'])){
            
            $error_input = "";

            if(!empty($_POST['fg_new_pwd']) && !empty($_POST['fg_conf_pwd'])){

                $new_password =htmlspecialchars($_POST['fg_new_pwd']);
                $confirm_password =htmlspecialchars($_POST['fg_conf_pwd']);

                if($new_password == $confirm_password){

                    $new_password_hash = password_hash($new_password, PASSWORD_BCRYPT);

                    $req_update = $pdo -> prepare('UPDATE users set password = ? WHERE email = ?');

                    $user = $req->fetch();
                    $req_update->execute($new_password_hash, $user["email"]);

                    session_start();

                    $_SESSION['alert_success'] = "Mot de passe modifié avec succès.";

                }else{
                    $error_input = "Les deux mots de passe ne correspondent pas.";
                }
            }else{
                $error_input = "Certains champs sont vides.";
            }
        }
    }else{
        $error = "Le lien est invalide. Verifiez que vous avez bien récupérer le lien depuis votre boite de réception.";
    }


}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Mot de passe oublié</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/bubbles.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../assets/js/auth.js"></script>


</head>


<body>


    <div class="wrapper col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <div style="margin: 0 auto; text-align:center; margin-top:20px;">
            <div class="logo" style="display: inline-block;background-image: url('../assets/img/logo/logo-labo-sedyl.jpg');background-repeat: no-repeat;background-size: 100% 100%;width: 200px;height: 130px;border-radius: 25px;"></div>
            <div class="logo" style="display: inline-block;background-image: url('../assets/img/logo/LOGO2.jpg');background-repeat: no-repeat;background-size: 100% 100%;width: 200px;height: 130px;border-radius: 25px;"></div>
            <div class="logo" style="display: inline-block;background-image: url('../assets/img/logo/LOGO1.jpg');background-repeat: no-repeat;background-size: 100% 100%;width: 200px;height: 130px;border-radius: 25px;"></div>
            <div class="logo" style="display: inline-block;background-image: url('../assets/img/logo/LOGO3.jpg');background-repeat: no-repeat;background-size: 100% 100%;width: 200px;height: 130px;border-radius: 25px;"></div>
        
            <?php if(isset($error) && !empty($error)): ?>
                <div class="alert alert-danger" style="width: 70%; margin: 0 auto; margin-top: 10px" role="alert"><?php echo $error ?></div>
            <?php endif ?>
        </div>

        <?php if  ($token_is_valid == false) : ?>
        <div class="container ajust">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:  #52d2a5">
                        <h3 class="text-center" style="color: #fff;">Mot de passe oublié</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST">
                            <div class="row">
                                <div>
                                    <span class="span-form">Adresse mail</span>
                                </div>
                                <div class="input-login">
                                    <INPUT class="form-control" type="email" placeholder="saisissez votre adresse mail associé à votre compte" id="fg_email" value="">
                                </div>
                            </div>
                        

                            <div>
                                <span class="span-form mon-span error-result">Error</span>
                            </div>
                    </div>
                    <div> 
                        <button type="submit" class="btn butt" id="btn_fg_password">Créer un nouveau mot de passe</button>
                    </div>
                    </form>
                    <div class="div-conn">
                        <a class="btn monbutt" href="login.php">Retourner vers la page de connexion</a>
                    </div>

                </div>



            </div>

        </div>
        <?php else: ?>
            <div class="container ajust">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:  #52d2a5">
                        <h3 class="text-center" style="color: #fff;">Nouveau mot de passe</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST">
                            <div class="row">
                                <div>
                                    <span class="span-form">Nouveau mot de passe</span>
                                </div>
                            
                                <div class="input-login">
                                    <INPUT class="form-control" type="password" placeholder="saisissez votre nouveau mot de passe" name="fg_new_pwd" id="fg_new_pwd" value="">
                                </div>

                                <div>
                                    <span class="span-form">Confirmation du mot de passe</span>
                                </div>
                                <div class="input-login">
                                    <INPUT class="form-control" type="password" placeholder="confirmer votre mot de passe" name="fg_conf_pwd" id="fg_conf_pwd" value="">
                                </div>
                            </div>
                        
                            <?php if(isset($error_input) && !empty($error_input)): ?>
                            <div>
                                <span class="span-form mon-span error-result" style="display: block; margin: 0; padding: 0"><?=  $error_input ?></span>
                            </div>
                            <?php endif ?>

                            <div> 
                                <button type="submit" class="btn butt" style="margin-top:10px" name="btn_save_new_pwd" id="btn_save_new_pwd">Modifier votre mot de passe</button>
                            </div>
                            
                    </div>
                    
                    </form>
                    <div class="div-conn">
                        <a class="btn monbutt" href="login.php">Retourner vers la page de connexion</a>
                    </div>

                </div>



            </div>

        </div>
        <?php endif; ?>
    </div>
    </div>
</body>