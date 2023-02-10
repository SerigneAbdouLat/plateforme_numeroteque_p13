$(document).ready(function () {
   
    $('#prenom').keyup(function (e) {
        traitement_prenom($('#prenom').val());
    })

    $('#nom').keyup(function (e) {
        traitement_nom($('#nom').val());
    })

    $('#email').keyup(function (e) {
        traitement_email($('#email').val());
    })

    $('#password').keyup(function (e) {
        traitement_password($('#password').val());
    })

    $('#confirm_password').keyup(function (e) {
        traitement_confirm_password($('#password').val(), $('#confirm_password').val());
    })

    $('#btn_enregistrer').click(function (e) {
        e.preventDefault();
        var success = traitement_prenom($('#prenom').val())*traitement_nom($('#prenom').val())*traitement_email($('#email').val());
        success = success*traitement_password($('#password').val())*traitement_confirm_password($('#password').val(), $('#confirm_password').val());

        if(success == 1){
            enregistrer_data($('#prenom').val(), $('#nom').val(), $('#email').val(), $('#password').val());
        }
    });

    $('#btn_connecter').click(function (e) {
        e.preventDefault();
        var email = $('#email').val();
        var password = $('#password').val();

        verification_user(email, password);
    });


    $('#btn_fg_password').click(function (e) {
        e.preventDefault();
        traitement_mot_de_passe_oublie($('#fg_email').val());
    });

    function verification_user (email, password){
        $.ajax({
            type: "POST",
            url: "../php/ajax/check_user.php",
            async: false,
            data: {
                email : email,
                password : password
            },
            success: function (data) {

                   
                if(data == 1){
                    $('.error-result').html('').hide();
                    window.location.href = "numerotheque.php";
                }else{
                    $("#password").val("");
                    $('.error-result').html(data).show();
                }
            }
        });
    }

    function traitement_prenom(prenom) {
        if(prenom.length < 2){
            $(".error-prenom").html('Prénom invalide (min 2 caractéres).').show();
            return 0;
        }else{
            $(".error-prenom").html('Prénom invalide (min 2 caractéres).').hide();
            return 1;
        }
    }

    function traitement_nom(nom) {
        if(nom.length < 2){
            $(".error-nom").html('Nom invalide (min 2 caractéres).').show();
            return 0;
        }else{
            $(".error-nom").hide();
            return 1;
        }
    }

    function traitement_email(email) {

        var result = 0;
        $.ajax({
            type: "POST",
            url: "../php/ajax/check_email.php",
            async: false,
            data: {
                email : email
            },
            success: function (data) {
                if (data == 1){
                    $('.error-email').hide();
                    result =  1;
                }else{
                    $('.error-email').html(data).show();
                    result =  0;
                }
            }
        });

        return result;
    }


    function traitement_password(password) {
        if(password.length < 8){
            $(".error-password").html('Mot de passe invalide (min 8 caractéres).').show();
            return 0;
        }else{
            $(".error-password").hide();
            return 1;
        }
    }

    function traitement_confirm_password(password, confirm_password) {
        if(confirm_password  != password){
            $(".error-confirm-password").html('Les deux mots de passe ne correspondent pas.').show();
            return 0;
        }else{
            $(".error-confirm-password").hide();
            return 1;
        }
    }

    function enregistrer_data(prenom, nom, email, password){
        $.ajax({
            type: "POST",
            url: "../php/ajax/save_user.php",
            async: false,
            data: {
                prenom : prenom,
                nom : nom,
                email : email,
                password : password
            },
            success: function (data) {
               
                if(data == 'success'){
                    $('.error-result').hrml('').hide();
                    window.location.href = "numerotheque.php";
                }else{
                    $('.error-result').html(data).show();
                }
            }
        });
    }


    function traitement_mot_de_passe_oublie(fg_email) {
        $.ajax({
            type: "POST",
            url: "../php/ajax/fg_password.php",
            async: false,
            data: {
                email : fg_email,
            },
            success: function (data) {
               $('.error-result').html(data).show();
            }
        });
    }




});