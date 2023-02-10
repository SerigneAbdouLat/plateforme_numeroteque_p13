<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/bubbles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"> 
</head>
<body>
<div class="wrapper">
    <div class="brand" style="position: absolute;top: 50px;left: calc(27%);">

        
        <div class="logo" style="display: inline-block;background-image: url('assets/img/logo/logo-labo-sedyl.jpg');background-repeat: no-repeat;background-size: 100% 100%;width: 200px;height: 130px;border-radius: 25px;"></div>
        <div class="logo" style="display: inline-block;background-image: url('assets/img/logo/LOGO2.jpg');background-repeat: no-repeat;background-size: 100% 100%;width: 200px;height: 130px;border-radius: 25px;"></div>
		<div class="logo" style="display: inline-block;background-image: url('assets/img/logo/LOGO1.jpg');background-repeat: no-repeat;background-size: 100% 100%;width: 200px;height: 130px;border-radius: 25px;"></div>
        <div class="logo" style="display: inline-block;background-image: url('assets/img/logo/LOGO3.jpg');background-repeat: no-repeat;background-size: 100% 100%;width: 200px;height: 130px;border-radius: 25px;"></div>

<div>
<br/>
<quote><i>
Il faut bien que tout dictionnaire s'arrête à un moment donné dans la numération décimale ;  on peut imaginer des nombres tels que sextillions, septillions, etc... mais l'on est bien obligé pratiquement de limiter cet etc. à un nombre fini de nombres.</i></quote>
<p>Émile Borel – Paradoxes de l'infini</p>
</div>		
    <form style=" text-align:  center; margin-top: 15%; ">
        <h2>Bienvenue</h2>
        <a class="btn btn-default btn-welcome" href="pages/login.php" style=" margin: 30px 0; ">Entrer</a>
        <p style=" width:  70%; margin:  0 auto; text-align: center; ">
            <b style="display:block;font-weight:bold;">Description&nbsp;:</b>


Réalisation d'une plate-forme permettant de décrire les numérations orales et les expressions calendaires dans différentes langues pour les comparer.</p>
    </form>
        <ul class="bg-bubbles">
            </ul>
</div> 
<script>
    $('#login-button').on('click',function(){
        window.location.href ='numerotheque.php';
    });
</script>
</body>
</html>