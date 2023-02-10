             <table class="table text-center">
                 <thead>
                     <tr>
                         <th colspan="4">
                                <h4>Auteur(s)</h4>
                         </th>
                     </tr>
                     <tr>
                         <th>Nom</th>
                         <th>Prénom</th>
                         <th>E-mail</th>
                         <th>Institution</th>
                     </tr>
                 </thead>
				 <?php Tableau_Auteurs();?>
            </table>
			
             <table class="table text-center">
                    <thead>
                        <tr>
                            <th colspan="7">
                                    <h4>Informateur(s)</h4>
                            </th>
                        </tr>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>E-mail</th>
                            <th>&Acirc;ge</th>
                            <th>Niv. langue</th>
                            <th>&Eacute;tudes</th>
                            <th>Sexe</th>
                        </tr>
                    </thead>
				 <?php Tableau_Informateurs();?>
				 <tr id="FinLigne" class = "hide"><?php print(CaseFinLigne()).'';?></tr>

<!--                      <tbody>
                        <tr>
                            <td>
                                    <select data-id="autre-lang" id="langue-maternelle"  class="form-control">
                                            <option value="langue maternelle et usuelle">Langue maternelle et usuelle</option>
                                            <option value="langue maternelle non usuelle">langue maternelle non usuelle</option>
                                            <option class="autre" value="autre">autre</option>
                                        </select>   
                                        <input type="text" id="autre-lang" class="form-control hide" placeholder="Autre..." autocomplete="off"/>
                            </td>
                            <td>
                                    <select data-id="autre-niveau" id="niveau-scolaire"  class="form-control">
                                            <option value="" disabled selected>Niveau d'étude</option>
                                            <option value="primaire">Primaire</option>
                                            <option value="secondaire">Secondaire</option>
                                            <option value="universitaire">Universitaire</option>
                                            <option value="aucun">Aucun</option>
                                            <option class="autre" value="autre">Autre</option>
                                            
                                        </select> 
                                        <input type="text" id="autre-niveau" class="form-control hide" placeholder="Autre Niveau..." autocomplete="off"/>
                            </td>
                            <td style="position: relative;">
                                    
                                            <textarea id="sourceInfo" class="form-control" placeholder="Les sources..." autocomplete="off"> </textarea>
                                            <i style="top: 46px;" class="fas fa-times remove-tr"></i>
                                       
                            </td>
                        </tr>
                    </tbody> -->
                </table>

						<?php 
						$trace = false;
						if ($trace){
							//var_dump($liste_nivLangueInformateur);
							var_dump($TabDonnees["NomInformateur"]);
							var_dump($TabDonnees["PrénomInformateur"]);
							var_dump($TabDonnees["EmailInformateur"]);
							var_dump($TabDonnees["AgeInformateur"]);
							};?>
 						<?php 
						$trace = false;
						if ($trace){
							var_dump($TabDonnees);
							};?>  
							
			<center><h4>Source(s)</h4></center>
			<p><a href="aide/documentation-site-TUL-references.pdf"><img src="../assets/img/logo/image-aide.png" height=32px alt=" ? " />aide références</a></p>
			
<p>Code Zotero de cette langueu pour le projet : <input type="text" <?php RelitChamp("codeZotero");?> placeholder="code Zotero" class="form-control" autocomplete="off" MAXLENGTH="15" onChange="controleCodeZotero()" /></p>
            <div id="refZotero" >
			    <h5>Références</h5>
			</div>
			<p></p>
			<p>Vous pouvez aussi déposer un fichier contenant vos références (texte ou export de votre système de gestion de références, BiBTeX, Mendeley...), les sources utilisées; si l'écriture n'est pas en alphabet latin, vous pouvez ajouter une version du document au format pdf, et aussi un fichier de police de caractères adéquat.</p>
			<?php Formulaire_Depot_Fichier_Ref("Références");
			?>
						
        <?php include ("liste-fichiers.php");  
		tousFichiers();?> 

