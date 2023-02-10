
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="pragma" content="no-cache" />
    <title>Numérothèque – Chronothèque</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
   
    <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/numerotheque.css">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script type="text/javascript" language="javascript" src="../assets/js/main.js"></script>

    <link rel="stylesheet" type="text/css" href="../assets/css/keyboard.css"> 
    <!-- <link rel="stylesheet" type="text/css" href="bubbles.css">  -->
    <script type="text/javascript" src="../assets/js/keyboard.js"></script>
    <script type="text/javascript" src="../assets/js/brython.js"></script>
    <script type="text/javascript" src="../assets/js/brython_stdlib.js"></script>
    <script type="text/javascript" language="javascript" src="langues/ToutesLangues.json"></script>
    <script type="text/javascript" language="javascript" src="../assets/js/numerotheque.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/js/saisie.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/js/exploiter-regles.js"></script>
<?php 
session_start();
require("./user-details.php");
include("./actions.php");

?>
</head>
<body onload="demarrage()">
 <form action="numerotheque.php" method="post" id="FormulaireGlobal">

    <div class="layer hide">
        <div class="list">
                <i class="fas fa-times close-form"></i>  
                <table class="table">
                    <thead>
                    <tr>
                        <th>#Id</th>
                        <th>Langue</th>
                        <!-- <th>Nom de Fichier</th> -->
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody id="display-data1">
                                                                    
                    </tbody>
                </table>
       
        </div>
    </div>
    <div id="display-data" class="layer1 hide">
        <div class="list1">
                <i class="fas fa-times close-form"></i>
                <i class="fas fa-download" style="font-size: 30px;position: absolute;top: 10px;left: 30px;"></i>
                <i class="fas fa-edit" style="font-size: 30px;position: absolute;top: 10px;left: 80px;"></i>
                <button id="save-btn" class="btn btn-primary hide" style="position: absolute;top: 10px;left: calc(43%);">Enregistrer</button>

				 <div id="print-this">
                    <div class="display-data">
                                            
                    </div>
                 </div>
        </div>
    </div>
    

    <header>
        <div class="holder">
        <div class="brand" style=" position:  absolute; top: 3px; left: 10px; ">Numérothèque – Chronothèque</div>
      
        <?php if(isset($user_connect) && !empty($user_connect["user_id"])) : ?>
            <div class="float-right" style="margin-top: 20px; margin-left: 10px">

                            
                            <p class="user-name"><a href="#"><?= $user_connect["prenom"] ?>  <?= $user_connect["nom"] ?> </a><span class="span-type"> (<?= $user_connect["type"] ?>)</span></p>
                            
                            <a class="a-logout" href="./logout.php">Déconnexion</a>

            </div>

        <?php else: ?>

            <div class="float-right" style="margin-top: 20px; margin-left: 10px">

                                    
            <p class="user-name">Non connecté</p>

            <a class="a-login" href="./login.php">Se connecter</a>

</div>

       <?php endif; ?>

       <?php if(isset($user_connect) && $user_connect["type"] != "visiteur") : ?>

       <div class="float-right" style="margin-top: 20px">

            <input type="submit" name="action"  Value="Enregistrer" class="btn btn-success "/>
            <input type="submit" name="action"  Value="Relire" class="btn btn-primary "/>
            

       </div>

       <?php endif; ?>
        </div>
    </header>
    <!--les rubriques -->
	<aside>
        <ul>
        
        <?php if(isset($user_connect) && $user_connect["type"] == "administrateur") : ?> 
        <li  data-id="roles" class="activeli"><i class="fas fa-users"></i>Roles</li>
        <li  data-id="langues" ><i class="fas fa-language"></i>Langues</li>
        <li data-id="back"><a class="a-aside" href="./numerotheque.php"><i class="fas fa-arrow-left"></i>Retour</a></li>

        <?php endif; ?>
         </ul>
    </aside>
    <div class="alert alert-success hide text-center"> Données sauvegardées. </div>
    <div class="alert alert-danger hide text-center"> Vérifier les Champs. </div>
    <main>
   
    <div class="forms" id="roles">
		<?php include("onglets/onglet-roles.php");?>        
      </div>

      <div class="forms" id="langues">
		<?php include("onglets/onglet-langues-admin.php");?>

      </div> 
      <div class="forms" id="back"></div>
   
    </main>
    </form>    
 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
    <script src="../assets/js/regroupe.js"></script>
    <script src="../assets/js/script.js"></script>
    <script type="text/javascript"> $(document).ready(function() { $('.affiche-clavier').keyboard({ language: 'us, arabic, vietnamese, japanese-latin, hindi' }); }); </script>


</body>
</html>