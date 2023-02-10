// var xml;
$('.save').on('click',function(){
/* INITIALISATION */

// La Langue
var faux = 0;
var nomLang = $('#nom_lang').val(); // Le nom de la langue
var familleLang = $('#famille').val()+'  '+$('#autre-famille').val(); // La famille de la langue
var provenanceLang = $('#provenance').val(); // Le provenance Geographique
var abbrevationLang = $('#abbrevation').val(); // L'abbrevation de la langue
var epoqueLang = $('#epoque').val()+'  '+$('#autre-epoque').val(); // L'epoque de la langue
var socioLang = '';$('input[name=sociolinguistique]:checked').each(function(){socioLang+=$(this).val()+', ';}); // La sociolinguistique : beaucoup de choix
var ecriture = $('input[name=ecrite]:checked').val(); // L'ecriture : Oui ou Non
var typeEcriture = $('#type-ecriture').val()+'  '+$('#autre-type').val(); // Le type d'ecriture 
var sensEcriture = $('#sens-ecriture').val()+'  '+$('#autre-sens').val(); // Le sense d'ecriture 
if(nomLang == '' || familleLang == '' || provenanceLang == '' || abbrevationLang == '' || epoqueLang == '' || socioLang == '' || ecriture == '' || typeEcriture == '  ' ||sensEcriture == '  '  )faux=1;
// Les auteurs et L'informateurs

var nomAuteur = $('#nomAuteur').val();
var prenomAuteur = $('#prenomAuteur').val();
var emailAuteur = $('#emailAuteur').val();
var instAuteur = $('#instAuteur').val();

if(nomAuteur == '' || prenomAuteur == '' ||  emailAuteur == '' || instAuteur == '' )faux=1;

var nomInformateur = $('#nomInformateur').val();
var prenomInformateur = $('#prenomInformateur').val();
var ageInformateur = $('#ageInformateur').val();
var emailInformateur = $('#emailInformateur').val();
if(nomInformateur == '' || prenomInformateur == '' ||  ageInformateur == '' || emailInformateur == '' )faux=2;
var langMaternelle = $('#langue-maternelle').val()+' '+$('#autre-lang').val();
var niveauScolaire = $('#niveau-scolaire').val()+'  '+$('#autre-niveau').val();
var sexeInformateur = $('input[name=sexeInfo]:checked').val(); 
var decOuiNon = $('input[name=declination]:checked').val(); 
var genreClass = $('input[name=genre1]:checked').val(); 
var classOuiNon = $('input[name=classificateur]:checked').val(); 
var sourceInformateur = $('#sourceInfo').val();
if(langMaternelle == '' || niveauScolaire == '' ||  sexeInformateur == '' || sourceInformateur == '' )faux=3;

var infoTypo = $('#infoTypo').val()+'  '+$('#typemorphologique').val();
// var declination = $('#diff-decli').val()+'  '+$('#autre-decli').val();
var declination = '';$('input[name=decli]:checked').each(function(){declination+=$(this).val()+', ';})+'  '+$('#autre-decli').val();
var genre = '';$('input[name=genre]:checked').each(function(){genre+=$(this).val()+'  ';});
// var nombre = $('#nombre').val()+'  '+$('#autre-nombre').val();
var nombre = '';$('input[name=nombre]:checked').each(function(){nombre+=$(this).val()+', ';})+'  '+$('#autre-nombre').val();
if(infoTypo == '' || declination == '' ||  genre == '  ' || nombre == '  ' )faux=1;
var classificateur = $('#classificateur').val();
var avec_c = '';$('input[name=avec_c]:checked').each(function(){avec_c+=$(this).val()+', ';});
var sans_c = '';$('input[name=sans_c]:checked').each(function(){sans_c+=$(this).val()+', ';});
var num_base = $('#Base').val()+' '+$('#autre-sys').val();
var nombre_marg = $('#nombre-marg').val();
var lexique = $('#lexique').val();
if(classOuiNon == '' || num_base == ' ' ||  nombre_marg == '' || lexique == '' )faux=4;

// if (faux != 0){ $('.alert-danger').show().fadeOut(3000); return 0; }

     $('.alert-success').show().fadeOut(3000);

var imprime = '<div class="odd"> <span>Langue</span> </div>'+
'<div class="even"><span>Nom</span> : '+nomLang+'</div>'+
'<div class="even"> <span>Abrévation</span> : '+abbrevationLang+'</div>'+
'<div class="even"> <span>Famille</span> : '+familleLang+'</div>'+
'<div class="even"> <span>Epoque</span> : '+epoqueLang+'</div>'+
'<div class="even"> <span>Provenance Geographique</span> : '+provenanceLang+'</div>'+
'<div class="even"> <span>La Sociolinguistique </span> : '+socioLang+'</div>'+
'<div class="even"><span>Ecriture</span> : '+ecriture+'</div>'+
'<div class="even"> <span>Type d\'Ecriture</span> : '+typeEcriture+'</div>'+
'<div class="even"> <span>Sens d\'Ecriture</span> : '+sensEcriture+'</div>'+

'<div class="odd"> <span>Auteurs</span> </div>'+
'<div class="even"> <span>Nom</span> : '+nomAuteur+'</div>'+
'<div class="even"><span>Prenom</span> : '+prenomAuteur+'</div>'+
'<div class="even"><span>E-mail</span> : '+emailAuteur+'</div>'+
'<div class="even"><span>Institution</span> : '+instAuteur+'</div>'+

'<div class="odd"> <span>Informateurs</span> </div>'+
'<div class="even"> <span>Nom</span> : '+nomInformateur+'</div>'+
'<div class="even"> <span>Langue Maternelle</span> : '+langMaternelle+'</div>'+
'<div class="even"><span>E-mail</span> : '+emailInformateur+'</div>'+
'<div class="even"><span>Prenom</span> : '+prenomInformateur+'</div>'+
'<div class="even"><span>Age</span> : '+ageInformateur+'</div>'+
'<div class="even"><span>Niveau D\'education</span> : '+niveauScolaire+'</div>'+
'<div class="even"><span>Sexe</span> : '+sexeInformateur+'</div>'+
'<div class="even"><span>Source</span> : '+sourceInformateur+'</div>'+

'<div class="odd"> <span>Information Typologique</span> </div>'+
'<div class="even"><span>Type Morphologique</span> : '+infoTypo+'</div>'+
'<div class="even"><span>Genre/Classe</span> : '+genreClass+' </div>'+
'<div class="even"><span></span>  '+genre+' </div>'+
'<div class="even"><span>Nombre</span> : '+nombre+'</div>'+
'<div class="even"><span>Classificateur</span> : '+classOuiNon+'</div>'+
'<div class="even"><span></span>  '+classificateur+'</div>'+
'<div class="even"><span>Type Syntaxique</span> : '+avec_c+sans_c+' </div>'+
'<div class="even"><span>Déclinaison</span> : '+decOuiNon+'</div>'+
'<div class="even"><span></span>  '+declination+'</div>'+

'<div class="odd"> <span>Système de Numération en langue</span> </div>'+
'<div class="even"><span>La Base</span> : '+num_base+'</div>'+
'<div class="even"><span>Nombre Marginal</span> : '+nombre_marg+'</div>'+
'<div class="even"><span>Lexique de Base</span> : '+lexique+'</div>';

$('.display-data').html(imprime);
// $('.display-data').attr('contenteditable','false');
    $('#display-data').fadeIn(1000);
var json_data = {prenom_aut:prenomAuteur,nom_aut:nomAuteur,email_aut:emailAuteur,inst:instAuteur,nom_info:nomInformateur,prenom_info:prenomInformateur,age:ageInformateur,
        langue:langMaternelle, niveau:niveauScolaire,email_info:emailInformateur,sexe:sexeInformateur,sources:sourceInformateur,type:infoTypo,decOuiNon:decOuiNon,
        declination:declination,genreClass:genreClass,genre:genre,nombre:nombre,classOuiNon:classOuiNon,
        classificateur:classificateur,sansClass:sans_c,avecClass:avec_c, famille:familleLang,epoque:epoqueLang,abb:abbrevationLang,
        geo:provenanceLang,socio:socioLang,ecriture:ecriture,type_ecrit:typeEcriture,sens:sensEcriture,lang:nomLang,base:num_base,marginal:nombre_marg,lexique:lexique}; 

// var data_json = {nom_aut:nomAuteur,prenom_aut:prenomAuteur,email_aut:emailAuteur,inst:instAuteur,nom_info:nomInformateur,prenom_info:prenomInformateur,age:ageInformateur,
//    langue:langMaternelle, niveau:niveauScolaire,email_info:emailInformateur,sexe:sexeInformateur,sources:sourceInformateur,type:infoTypo,declination:declination,
//    genre:genre,nombre:nombre,classificateur:classificateur,sansClass:sans_c,avecClass:avec_c, famille:familleLang,epoque:epoqueLang,abb:abbrevationLang,
//    geo:provenanceLang,socio:socioLang,type_ecrit:typeEcriture,sens:sensEcriture,lang:nomLang,code:imprime,jsonData:JSON.stringify(json_data)}; 

var data_json = {nom_aut:nomAuteur,prenom_aut:prenomAuteur,email_aut:emailAuteur,inst:instAuteur,nom_info:nomInformateur,prenom_info:prenomInformateur,age:ageInformateur,
    langue:langMaternelle, niveau:niveauScolaire,email_info:emailInformateur,sexe:sexeInformateur,sources:sourceInformateur,type:infoTypo,declination:declination,
    genre:genre,nombre:nombre,classificateur:classificateur,sansClass:sans_c,avecClass:avec_c, famille:familleLang,epoque:epoqueLang,abb:abbrevationLang,
    geo:provenanceLang,socio:socioLang,type_ecrit:typeEcriture,sens:sensEcriture,lang:nomLang,jsonData:JSON.stringify(json_data)}; 
    // console.log(data_json);
    //$.post("update.php",data_json,function(data){alert(data);});
    $.post("test-select.php",data_json,function(data){alert(data);});
});
$(document).on('click','.modifier',function (){
	$('.alert-danger').show().fadeOut(3000);
	var nomLang = $('#nom_lang').val();
	var nomFichier = 'langues/'+nomLang+'.json';
	var obj 
	var message = '<div class="odd"> <span>Langue</span> </div>'+
	'<div class="even"><span>Nom</span> : '+nomLang+'<br>';
    message = message+'Nom fichier : ' + nomFichier + '<br>';
	message = message + 'Prénom : ' + DonneesLangues.Allemand.prenom_aut + '<br>'
	message = message + 'Prénom : ' + DonneesLangues.Français.prenom_aut + '<br>'
	if (nomLang=="Allemand") {obj=DonneesLangues.Allemand};
	if (nomLang=="Français") {obj=DonneesLangues.Français};
//	var fileSystem=new ActiveXObject("Scripting.FileSystemObject");
//	var monfichier=fileSystem.OpenTextFile(nomFichier, 1 ,true);
//	alert(monfichier.ReadAll()); // imprime: "tutoriels en folie"
//	monFichier.Close();
	$.getJSON('langues/'+nomLang+'.json',function(data){
//            $('#zone').append('Prénom : ' + data.Prenom + '<br>');
//            $('#zone').append('Nom : ' + data.Nom + '<br>');
//            $('#zone').append('Age : ' + data.Age + '<br>');
//            message=message+'Prénom : '+data.prenom.'<br>';
//            message.append('Nom : ' + data.nom_aut + '<br>');
//            message.append('Age : ' + data.Age + '<br>');
          });
    message = message+'</div>';
// php	$json = file_get_contents(nomFichier);
	$('.display-data').html(message);
// $('.display-data').attr('contenteditable','false');
    $('#display-data').fadeIn(2000);
//        var obj = JSON.parse($(this).siblings('.modifier-data').text());

        $('#nom_lang').val(obj.lang);
        $('#famille').append('<option value="'+obj.famille+'" selected>'+obj.famille+'</option>');
        $('#provenance').val(obj.geo);
        $('#abbrevation').val(obj.abb); 
        $('#epoque').append('<option value="'+obj.epoque+'" selected>'+obj.epoque+'</option>');
        // $('input[name=ecrite]:checked').val();
        $('#type-ecriture').append('<option value="'+obj.type_ecrit+'" selected>'+obj.type_ecrit+'</option>'); 
        $('#sens-ecriture').append('<option value="'+obj.sens+'" selected>'+obj.sens+'</option>');
        $('#nomAuteur').val(obj.nom_aut);
        $('#prenomAuteur').val(obj.prenom_aut);
        $('#emailAuteur').val(obj.email_aut);
        $('#instAuteur').val(obj.inst);
        $('#nomInformateur').val(obj.nom_info);
        $('#prenomInformateur').val(obj.prenom_info);
        $('#ageInformateur').val(obj.age);
        $('#emailInformateur').val(obj.email_info);
        $('#langue-maternelle').append('<option value="'+obj.langue+'" selected>'+obj.langue+'</option>');
        $('#niveau-scolaire').append('<option value="'+obj.niveau+'" selected>'+obj.niveau+'</option>');
        $('#infoTypo').append('<option value="'+obj.type+'" selected>'+obj.type+'</option>');
        // $('input[name=sexeInfo]:checked').val(); 
        $('#classificateur').val(obj.classificateur);
        $('#sourceInfo').val(obj.sources);
        $('#infoTypo').val(obj.type);
        $('#Base').append('<option value="'+obj.base+'" selected>'+obj.base+'</option>');
        $('#nombre-marg').val(obj.marginal);
        $('#lexique').val(obj.lexique);
        $('input[name=sociolinguistique]').each(function(){ if(obj.socio.indexOf($(this).val())!=-1)$(this).prop('checked',true); });
        $('input[name=sexeInfo]').each(function(){if($(this).val()==obj.sexe)$(this).prop('checked',true);});
        $('input[name=ecrite]').each(function(){if($(this).val()==obj.ecriture)$(this).prop('checked',true);});
        $('input[name=declination]').each(function(){if($(this).val()==obj.decOuiNon)$(this).prop('checked',true);});
        $('input[name=genre1]').each(function(){if($(this).val()==obj.genreClass)$(this).prop('checked',true);});
        $('input[name=classificateur]').each(function(){if($(this).val()==obj.classOuiNon)$(this).prop('checked',true);});
        $('input[name=decli]').each(function(){if(obj.declination.indexOf($(this).val())!=-1)$(this).prop('checked',true);});
        $('input[name=genre]').each(function(){if(obj.genre.indexOf($(this).val())!=-1)$(this).prop('checked',true);});
        $('input[name=nombre]').each(function(){if(obj.nombre.indexOf($(this).val())!=-1)$(this).prop('checked',true);});
        $('input[name=avec_c]').each(function(){if(obj.avecClass.indexOf($(this).val())!=-1)$(this).prop('checked',true);});
        $('input[name=sans_c]').each(function(){if(obj.sansClass.indexOf($(this).val())!=-1)$(this).prop('checked',true);});
        $(this).parents('.layer').fadeOut();
    
});