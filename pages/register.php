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
    <div class="wrapper" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div style="margin: 0 auto; text-align:center; margin-top:20px;">
            <div class="logo" style="display: inline-block;background-image: url('../assets/img/logo/logo-labo-sedyl.jpg');background-repeat: no-repeat;background-size: 100% 100%;width: 200px;height: 110px;border-radius: 25px;"></div>
            <div class="logo" style="display: inline-block;background-image: url('../assets/img/logo/LOGO2.jpg');background-repeat: no-repeat;background-size: 100% 100%;width: 200px;height: 110px;border-radius: 25px;"></div>
            <div class="logo" style="display: inline-block;background-image: url('../assets/img/logo/LOGO1.jpg');background-repeat: no-repeat;background-size: 100% 100%;width: 200px;height: 110px;border-radius: 25px;"></div>
            <div class="logo" style="display: inline-block;background-image: url('../assets/img/logo/LOGO3.jpg');background-repeat: no-repeat;background-size: 100% 100%;width: 200px;height: 110px;border-radius: 25px;"></div>
        </div>
        <div class="container ajust">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:  #52d2a5">
                        <h3 class="text-center" style="color: #fff;">Creation de compte</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST">
                            <div class="row">
                                <div>
                                    <span class="span-form mon-span">Prénom</span>
                                </div>
                                <div class="input-login">
                                    <INPUT class="form-control" type="text" id="prenom" placeholder="saisir ton prénom" value="">
                                </div>
                                <div>
                                    <span class="span-form mon-span error-prenom">Error</span>
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <span class="span-form mon-span">Nom</span>
                                </div>
                                <div class="input-login">
                                    <INPUT class="form-control" type="text" id="nom" placeholder="saisir ton nom" value="">
                                </div>
                                <div>
                                    <span class="span-form mon-span error-nom">Error</span>
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <span class="span-form mon-span">Adresse mail</span>
                                </div>
                                <div class="input-login">
                                    <INPUT class="form-control" type="email" id="email" placeholder="saisir ton mail" value="">
                                </div>
                                <div>
                                    <span class="span-form mon-span error-email">Error</span>
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <span class="span-form mon-span">Mot de passe</span>
                                </div>
                                <div class="input-login">
                                    <INPUT class="form-control" type="password" id="password" placeholder="Mot de passe" value="">
                                </div>
                                <div>
                                    <span class="span-form mon-span error-password">Error</span>
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    <span class="span-form mon-span">Confirmer le mot de passe</span>
                                </div>
                                <div class="input-login">
                                    <INPUT class="form-control" type="password" id="confirm_password" placeholder="réecrire le mot de passe" value="">
                                </div>

                                <div>
                                    <span class="span-form mon-span error-confirm-password">Error</span>
                                </div>
                            </div>

                            <div>
                                <span class="span-form mon-span error-result">Error</span>
                            </div>

                    </div>
                    <div style="margin: 5px;"> <button type="submit" class="btn butt" id="btn_enregistrer">Enregistrer</button></div>

                    </form>

                    <div class="div-conn">

                        <label style="padding-left: 40px; color:#52d2a5 ">Déja un compte ?&nbsp;&nbsp;
                        </label>


                        <a class="btn monbutt" href="login.php">Se connecter</a>
                    </div>
                </div>
            </div>



        </div>
    </div>
    </div>
    </div>
</body>