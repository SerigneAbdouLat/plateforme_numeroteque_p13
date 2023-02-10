            <div class="form-group">
                    <h4>Système de numération en langue</h4>
                      <select data-id="autre-sys" class="form-control" id="Base" name="Base" autocomplete="off">
                                <option value="" disabled selected>Sélectionner la base</option>
								<?php RelitChoixListe("Base", $liste_sys_num);?>
                        </select>
                        <input type="text" class="form-control hide" placeholder="Autre système de numération..." <?php RelitChamp("autre-sys");?> autocomplete="off"/>
                        <input type="text" class="form-control" placeholder="Nombre marginal..." <?php RelitChamp("nombre-marg");?> autocomplete="off"/>
                        <input type="text" class="form-control" placeholder="Lexique de base (Ex : un;deux;trois;...)" <?php RelitChamp("lexiqueNum");?> autocomplete="off" onchange="changeLexique()" /><a class="infobulle"> 
       <img src="../assets/img/logo/image-aide.png" height=32px alt=" ? " /> 
       <div><h4>Lexique de base</h4>Donnez la liste des noms de nombres à partir desquels les autres sont formés, en les séparant par des point-virgules.<br/>Ex: <b>un;deux;trois;...</b></div> 
</a>
						<input type="submit" name="action"  Value="Tableau selon lexique"/>
<a class="infobulle"> 
       <img src="../assets/img/logo/exclam.png" height=32px alt=" ! " /> 
       <div><h4>Modification du lexique</h4><p>Lorsque vous modifiez la liste ci-dessus, utilisez le bouton pour reconstruire le tableau selon lexique.</p><p>Pour l'instant, cette manipulation ramène à la page d'accueil, excusez pour la gêne, correction à venir...</p></div></a>                       
            </div> 

                        <table id="table-cardinale" class="table text-center">
                                <tr>
                                    <th colspan="7"><h4>Lexèmes numéraux</h4></th>
                                </tr>
                                <tr>
                                    <th>Lexème de base</th>
                                    <th>Valeur</th>
                                    <th>Catégorie gram.</th>
                                    <th>Pivot</th>
                                    <th>Variable</th>
                                    <th>Formes</th>
                                    <th>Image</th>
                                </tr>
 								<?php Tableau_lexique_nombres();?>
                        </table>

                        <div class="layer2 hide">
                            <div class="modele-cas">
                                <i class="fas fa-times close-form"></i>
                                <div class="display-cas">
                                    <table class="table text-center">
                                        <thead><tr id="th-genre">
                                           
                                        </tr></thead>
                                        <tbody id="tb-cas"></tbody>
                                    </table>
                                </div>
                                <button class="btn btn-primary cas-save">Enregistrer</button>
                            </div>
                        </div>

            <div class="form-group" style="margin-top: 30px;">
                        <div class="form-control">
                                <h4>Mots de liaison</h4>
                                <input type="radio" <?php RelitRadio("liaison", "oui");?> autocomplete="off" onclick="clicMotsLiaisonOui()" id="liaisonOui"/>&nbsp;Oui &nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" <?php RelitRadio("liaison", "non");?> autocomplete="off" onclick="clicMotsLiaisonNon()"/>&nbsp;Non
                            </div>

                        <table id="tMotsLiaison" class="table text-center hide">
							<?php Tableau_Mots_de_Liaison();?>
                        </table>
            </div>  				
						
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th colspan="4"><h3>Règles de construction</h3></th>
									<th colspan="2"><a href="aide/documentation-site-TUL-regles.pdf"><img src="../assets/img/logo/image-aide.png" height=32px alt=" ? " />aide règles</a></th>
                                </tr>
                                <tr id="reg-const">
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="td-reg-const"><td>
                                    Vous pouvez écrire les règles de production des nombres dérivés ci-dessous. <br/>Ou vous pouvez déposer un fichier texte indiquant les formes écrites des nombres de 1 à 400, et quelques exemples de nombres plus grands permettant de comprendre les règles de formation des nombres.<br/>
									En plus du fichier texte, vous pouvez déposer une version au format pdf si nécessaire</td>									
                                </tr>
								<tr><td><?php Formulaire_Depot_Fichier("Nombres-Règles"); ?>
								</td></tr>
								
                            </tbody>
                        </table>
                        <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th colspan="6">Numéraux dérivés</th>
                                    </tr>
                                    <tr>
                                        <th>N° Règle</th>
                                        <th>Titre</th>
                                        <th>Nb Comp</th>
                                        <th>Liste Composants</th>
                                        <th>Syntaxe Composition</th>
                                        <th>Sémantique</th>
                                    </tr>
                                </thead>
								<?php include("form-regles-tableau.php");?>
                            </table>
