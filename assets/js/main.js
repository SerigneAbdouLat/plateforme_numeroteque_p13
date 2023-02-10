$(document).ready(function(){

    $('.btn_update').click(function(e){
        
        var uid = $(this).attr('data-uid');
        var select = '.select-' + uid;

        var select_option = $(select).val();

        update_user_role(uid, select_option);
    });

    $('.btn_delete').click(function(e){
        
        var uid = $(this).attr('data-uid');
        var user = $(this).attr('data-user');

        alertify.confirm(
            'Suppression', 
            'Souhaitez-vous supprimer définitivement le compte de ' + user, 
            function () {
                delete_user(uid);
            }, 
            
            function () {
                
            });
    });

    $('.btn_delete_lang').click(function(e){
       
        var lang_id = $(this).attr('lang-id');
        var lang_name = $(this).attr('lang-name');

        alertify.confirm(
            'Suppression', 
            'Souhaitez-vous supprimer définitivement la langue ' + lang_name + ' ? ', 
            function () {
               delete_language(lang_name+'.json', lang_id);
            }, 
            
            function () {
                
            });
    });

    $('#btn_back').click(function (e) {
       alert('OK'); 
    });

    function update_user_role(uid, select_option) {
        $.ajax({
            type: "POST",
            url: "../php/ajax/update_role.php",
            async: false,
            data: {
                uid : uid,
                role : select_option,
            },
            success: function (data) {
                if(data == 1){
                    alertify.success("Profil mis à jour");
                }else{
                    alertify.error(data);
                }
                
            }
        });
    }

    function delete_user(uid) {
        var tr_id = '#tr-'+uid;
        
        $.ajax({
            type: "POST",
            url: "../php/ajax/delete_user.php",
            async: false,
            data: {
                uid : uid,
            },
            success: function (data) {
                if(data == 1){
                    alertify.success("Le compte a été supprimé avec succès.");
                    $(tr_id).hide(); 
                }else{
                    alertify.error(data);
                }
                
            }
        });
    }


    function delete_language(file_language, lang_id) {
        var tr_id = '#tr-'+lang_id;

        $.ajax({
            type: "POST",
            url: "../php/ajax/delete_json_file.php",
            async: false,
            data: {
                file_name : file_language,
            },
            success: function (data) {
                if(data == 1){
                    alertify.success("Le langage a été supprimé avec succès.");
                    $(tr_id).hide(); 
                }else{
                    alertify.error(data);
                }
                
            }
        });
    }
    
});

