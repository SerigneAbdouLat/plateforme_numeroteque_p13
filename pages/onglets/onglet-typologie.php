            <div class="form-group">
                    <h4>Information typologique</h4>
						<select id="infoTypo" name="infoTypo" class="form-control" data-id="typemorphologique">
                                                <option value="typ" disabled selected>Sélectionner le type morphologique</option>
                                                <?php RelitChoixListe("infoTypo", $liste_types_morpho);?>
                                        </select>
										<input id="typemorphologique" type="text" class="form-control hide" placeholder="Autre type morphologique..."  <?php RelitChamp("autre_Typo");?> autocomplete="off"/>
                                        <div class="form-control">
                                            <h4>Déclinaison</h4>
                                            <input type="radio" <?php RelitRadio("déclinaison", "oui");?> onclick="clicDeclinOui()"/>&nbsp;Oui &nbsp;&nbsp;
                                            <input type="radio" <?php RelitRadio("déclinaison", "non");?> onclick="clicDeclinNon()"/>&nbsp;Non
                                        
                                            <div id="diff-case" class="hide">
                                                <input  type="checkbox" <?php RelitCase("decli-N", "Nominatif");?>/>&nbsp;Nominatif
                                                <input  type="checkbox" <?php RelitCase("decli-V", "Vocatif");?> class="mrg-l"/>&nbsp;Vocatif
                                                <input  type="checkbox" <?php RelitCase("decli-Acc", "Accusatif");?> class="mrg-l"/>&nbsp;Accusatif
                                                <input  type="checkbox" <?php RelitCase("decli-E", "Ergatif");?> class="mrg-l"/>&nbsp;Ergatif<br/>
                                                <input  type="checkbox" <?php RelitCase("decli-G", "Génitif");?> class="mrg-l"/>&nbsp;Génitif
                                                <input  type="checkbox" <?php RelitCase("decli-D", "Datif");?> class="mrg-l"/>&nbsp;Datif
                                                <input  type="checkbox" <?php RelitCase("decli-Abl", "Ablatif");?> class="mrg-l"/>&nbsp;Ablatif<br/>
                                                <input  type="checkbox" <?php RelitCase("decli-Ins", "Instrumental");?> class="mrg-l"/>&nbsp;Instrumental
                                                <input  type="checkbox" <?php RelitCase("decli-Loc", "Locatif");?> class="mrg-l"/>&nbsp;Locatif
                                                <!-- <input  name="decli" type="checkbox" value="autre"/>Autre -->
                                                <input type="text" class="form-control" placeholder="Autre cas..." <?php RelitChamp("decli-autre");?> autocomplete="off"/>
                                             </div>
                                        </div>
                                        <div class="form-control">
                                            <h4>Genre / Classe</h4>
                                            <input type="radio" <?php RelitRadio("genre1", "genre");?> onclick="clicGenre()" class="mrg-l"/>&nbsp;Genre &nbsp;&nbsp;
                                            <input type="radio" <?php RelitRadio("genre1", "classe");?> onclick="clicClasse()" class="mrg-l"/>&nbsp;Classe 
                                            <input type="radio" <?php RelitRadio("genre1", "aucun");?> onclick="clicAucun()" class="mrg-l"/>&nbsp;Aucun
                                       </div>
                                       <div id="diff-gen" class="hide">
                                        <input type="checkbox" <?php RelitCase("genre-M", "Masculin");?> data-id="masc"/>&nbsp;Masculin
                                        <input type="checkbox" <?php RelitCase("genre-F", "Féminin");?> data-id="fem" class="mrg-l"/>&nbsp;Féminin
                                        <input type="checkbox" <?php RelitCase("genre-N", "Neutre");?> data-id="neut" class="mrg-l"/>&nbsp;Neutre
                                       </div>
                                       <div id="sfClasse" class="hide">
                                        <input type="checkbox" <?php RelitCase("clas-1", "Classe_1");?> data-id="clas1" class="mrg-l"/>&nbsp;Classe 1
                                        <input type="checkbox" <?php RelitCase("clas-2", "Classe_2");?> data-id="clas2" class="mrg-l"/>&nbsp;Classe 2
                                        <input type="checkbox" <?php RelitCase("clas-3", "Classe_3");?> data-id="clas3" class="mrg-l"/>&nbsp;Classe 3
                                       </div>
                                       

            </div>
            <div class="form-group">
                        <div class="form-control">
                            <h4>Nombre grammatical</h4>
                            
                            <input  type="checkbox" <?php RelitCase("nombre-S", "Singulier");?> class="mrg-l"/>&nbsp;Singulier
                            <input  type="checkbox" <?php RelitCase("nombre-D", "Duel");?> class="mrg-l"/>&nbsp;Duel
                            <input  type="checkbox" <?php RelitCase("nombre-T", "Triel");?> class="mrg-l"/>&nbsp;Triel
                            <input  type="checkbox" <?php RelitCase("nombre-Pau", "Paucal");?> class="mrg-l"/>&nbsp;Paucal
                            <input  type="checkbox" <?php RelitCase("nombre-Plu", "Pluriel");?> class="mrg-l"/>&nbsp;Pluriel
                            <input type="text" class="form-control" placeholder="Autre nombre..." <?php RelitChamp("autre-nombre");?> autocomplete="off"/>
                        </div>
                        <div class="form-control">
                                <h4>Langue à classificateurs numériques</h4> 
                                <input type="radio" <?php RelitRadio("classif", "oui");?> onclick="clicAvecClassificateurs()" class="mrg-l" />&nbsp;Oui
                                <input type="radio" <?php RelitRadio("classif", "non");?> onclick="clicSansClassificateurs()" class="mrg-l" />&nbsp;Non
                                <input type="text" placeholder="Classificateur..." <?php RelitChamp("classificateurs");?> class="form-control hide" autocomplete="off"/>
                        </div>
                            <!-- <h4>Type syntaxique</h4> -->
                            <div id="sans_Cla" class="hide">
                            <h4>Ordre syntaxique sans classificateurs</h4>
                            <input  type="checkbox" <?php RelitCase("sans_c_DN", "DetNom");?> class="mrg-l"/>&nbsp;Det&nbsp;Nom 
                            <input  type="checkbox" <?php RelitCase("sans_c_ND", "NomDet");?> class="mrg-l"/>&nbsp;Nom&nbsp;Det
                            </div>
                        <div id="avec_Cla" class="hide">
                            <h4>Ordre syntaxique avec classificateurs </h4>
                            <input type="checkbox" <?php RelitCase("avec_c_DCN", "Det Clas Nom");?> class="mrg-l"/>&nbsp;Det&nbsp;Clas&nbsp;Nom 
                            <input type="checkbox" <?php RelitCase("avec_c_DNC", "Det Nom Clas");?> class="mrg-l"/>&nbsp;Det&nbsp;Nom&nbsp;Clas 
                            <input type="checkbox" <?php RelitCase("avec_c_CDN", "Clas Det Nom");?> class="mrg-l"/>&nbsp;Clas&nbsp;Det&nbsp;Nom </br>
                            <input type="checkbox" <?php RelitCase("avec_c_CND", "Clas Nom Det");?> class="mrg-l"/>&nbsp;Clas&nbsp;Nom&nbsp;Det 
                            <input type="checkbox" <?php RelitCase("avec_c_NDC", "Nom Det Clas");?> class="mrg-l"/>&nbsp;Nom&nbsp;Det&nbsp;Clas 
                            <input type="checkbox" <?php RelitCase("avec_c_NCD", "Nom Clas Det");?> class="mrg-l"/>&nbsp;Nom&nbsp;Clas&nbsp;Det 
                        </div>
            </div> 
