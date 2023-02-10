<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Inscription/connexion</title>
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
        </div>
        <div class="container ajust">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:  #52d2a5">
                        <h3 class="text-center" style="color: #fff;">Bienvenue dans le portail <br> d'identification !!!!</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST">
                            <div class="row">
                                <div>
                                    <span class="span-form">Adresse mail</span>
                                </div>
                                <div class="input-login">
                                    <INPUT class="form-control" type="email" placeholder="saisissez votre adresse mail" id="email" value="">
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <span class="span-form">Mot de passe</span>
                                </div>
                                <div class="input-login">
                                    <INPUT class="form-control" type="password" placeholder="saisissez votre mot de passe" id="password">
                                </div>
                            </div>

                            <div>
                                <span class="span-form mon-span error-result">Error</span>
                            </div>

                            <div>
                                <a style="text-decoration: none" href="forget-password.php"><span class="span-form mon-span fg-pwd">Mot de passe oublié ?</span> </a>
                            </div>
                    </div>
                    <div> <button type="submit" class="btn butt" id="btn_connecter">Se connecter</button></div>
                    </form>
                    <div class="panel-foot"></div>
                    <div class="div-conn">

                        <label style="padding-left: 40px; color:#52d2a5 ">Première connexion ?&nbsp;&nbsp;
                        </label>


                        <a class="btn monbutt" href="register.php">Créer Mon Compte</a>
                    </div>

                </div>



            </div>

        </div>
    </div>
    </div>
</body>