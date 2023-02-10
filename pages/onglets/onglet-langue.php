                    <div class="form-group">
					  <?php include("liste-langues.php");?>
                      <h4>Nom de la langue</h4>
                        <div class="autocomplete">
                        <input class="form-control" type="text" <?php RelitChamp("nom_lang");?> placeholder="Langue..." autocomplete="off"/>
                        </div>
                        <?php if(isset($user_connect) && $user_connect["type"] != 'visiteur'): ?>
                        <div class="autocomplete">
                        <input class="form-control" type="text" <?php RelitChamp("user_id");?> placeholder="Langue..." style="display: none" value="<?= $user_connect["user_id"] ?>" autocomplete="off"/>
                        </div>
                        <?php endif; ?>
						<?php 
						$trace = False;
						if ($trace){var_dump($_POST);};?>
                    </div>
                    <div class="form-group">
                        <h4>Type de langue<a class="infobulle"> 
       <img src="../assets/img/logo/image-aide.png" height=32px alt=" ? " /> 
       <div>Pour les <b>types de langues</b> voir la <b onclick="ouvreLavalFamilles()">carte de l'université Laval</b></div></a> </h4>
						<?php if ($trace){var_dump($TabDonnees);};?>
                         <select data-id="autre-famille" class="form-control" id="famille" name="famille" >			
                             <option value="" disabled selected>Sélectionner la famille</option>
							 <?php RelitChoixListe("famille", $liste_familles);?>
                        </select>
                        <input  <?php RelitChamp("autre-famille");?> id="autre-famille" type="text" placeholder="Autre Famille..." class="form-control hide" autocomplete="off"/>
                    </div>

                <div class="form-group">
                        <h4>Aire géographique<a class="infobulle"> 
       <img src="../assets/img/logo/image-aide.png" height=32px alt=" ? " /> 
       <div>Pour les <b>aires géographiques</b> voir la page <b onclick="ouvreSorosoro()">Sorosoro</b></div></a> </h4>
                        <input type="text" <?php RelitChamp("aire");?> placeholder="Aire géographique..." class="lang-geo form-control" autocomplete="off"/>
                </div>
                <div class="form-group">
                    <h4>Abréviation <a class="infobulle"> 
       <img src="../assets/img/logo/image-aide.png" height=32px alt=" ? " /> 
       <div>Vous trouverez les <b>Codes ISO 639-3</b> des langues sur la page <b onclick="ouvreISO639()">https://iso639-3.sil.org/code_tables/639/data</b></div></a> </h4>
                        
                    <input <?php RelitChamp("abréviation");?>   type="text" placeholder="Abréviation (ISO 639-3)..." class="form-control" cols="15" autocomplete="off"/>
              </div>
              <div class="form-group">
                  <h4>Statut</h4>
                  <select data-id="autre-epoque" class="form-control" id="epoque" name="epoque" autocomplete="off">
                        <option value="" disabled selected>Sélectionner le statut de la langue</option>
                        <?php RelitChoixListe("epoque", $liste_statuts); ?>
                    </select>
                    <input <?php RelitChamp("autre-epoque");?> type="text" placeholder="Autre époque..." class="form-control hide" autocomplete="off"/>
                    <div class="visible" style="margin-top:50px;">
                        <h4>Écriture</h4> 
                        <input type="radio" class="ecrite" <?php RelitRadio("ecrite", "oui");?> autocomplete="off"/>Oui
                        <input type="radio" class="ecrite mrg-l" <?php RelitRadio("ecrite", "non");?> autocomplete="off"/>Non
                    </div>
                    <div class="hide" id="sfEcriture" style="width: 100%;margin-left: 0;">
<!--                        <h4>Sous-formulaire d'écriture</h4>
                   </div>
                    <div class="form-group" id="type_ecrite" style="width: 100%;margin-left: 0;">
--> 
                       <h4>Type d'écriture
<a class="infobulle"> 
       <img src="../assets/img/logo/image-aide.png" height=32px alt=" ? " /> 
       <div>Avec la touche [CTRL], vous pouvez choisir plusieurs écritures</div> 
</a></h4>
                            <select multiple id="type-ecriture" name="type-ecriture" class="form-control" data-id="autre-type" autocomplete="off">
                                <option class="opt" value="" disabled selected >Type d'écriture</option>
                                <optgroup label="Alphabétique">
									<?php RelitChoixListe("type-ecriture", $liste_ecrit_alphabetique);?>
                                </optgroup>
                                <optgroup label="Syllabique">
									<?php RelitChoixListe("type-ecriture", $liste_ecrit_syllabique);?>
                                </optgroup>
                                <optgroup label="Logosyllabique">
									<?php RelitChoixListe("type-ecriture", $liste_ecrit_logosyllabique);?>
                                </optgroup>
                                <optgroup label="Logographique">
 									<?php RelitChoixListe("type-ecriture", $liste_ecrit_logographique);?>
                                </optgroup>
									<?php RelitChoixListe("type-ecriture", $liste_autre);?>
                           </select>
                                <input  class="form-control hide" id="autre-type" name="autre-type" type="text" placeholder="Autre type.." autocomplete="off"  />
                                <h4>Sens de lecture</h4>
                                <select id="sens-lecture" name="sens-lecture" class="form-control" data-id="autre-sens" autocomplete="off">
                                    <option value="" disabled selected>Sélectionner le sens </option>
									<?php RelitChoixListe("sens-lecture", $liste_sens_lecture);?>
                                </select>
                            <input  class="form-control hide" id="autre-sens" name="autre-sens" type="text" placeholder="Autre sens.." autocomplete="off"  />
                    </div>
            </div>
            <div class="form-group">
                <h4>Situation sociolinguistique</h4> 
				<?php if (isset($TabDonnees["sociolinguistique"])){var_dump($TabDonnees["sociolinguistique"]);};?>
                <table style="margin: 0 auto;">
                    <tr> 
                        <td> <input type="checkbox" <?php RelitCase("sociolinguistique-vern", "vernaculaire");?>/> </td> 
                        <td><pre>   </pre></td>
                        <td> vernaculaire </td> 
                    </tr>
                    <tr> 
                        <td> <input type="checkbox" <?php RelitCase("sociolinguistique-véhi", "véhiculaire");?>/> </td> 
                        <td><pre>   </pre></td>
                        <td> véhiculaire </td> 
                    </tr>
                    <tr>
                     <td> <input type="checkbox" <?php RelitCase("sociolinguistique-class", "classique");?>/> </td> 
                            <td><pre>   </pre></td>
                            <td> classique </td>
                    </tr>
                    <tr>
                         <td> <input type="checkbox" <?php RelitCase("sociolinguistique-liturg", "liturgique");?>/></td> 
                            <td><pre>   </pre></td>
                            <td> liturgique </td>
                    </tr>
                   <tr>
                            <td> <input type="checkbox" <?php RelitCase("sociolinguistique-contact", "Langue de contact");?>/> </td> 
                            <td><pre>   </pre></td>
                            <td> langue de contact</td>
                    </tr>
                    <tr>
                            <td> <input id="autreSocioBox" type="checkbox" <?php RelitCase("autreSocioBox", "autre");?> onclick="controleSocioAutre()"/> </td> 
                            <td><pre>   </pre></td>
                            <td> autre </td>
                    </tr>
                </table>	
            
                    <input <?php RelitChamp("autre-socio");?>   type="text" placeholder="Autre..." class="form-control hide" cols="15" autocomplete="off"/>

            </div>
            
           
