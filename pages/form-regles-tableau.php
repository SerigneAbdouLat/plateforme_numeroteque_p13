<tbody id="Regles">
<?php
if (isset($TabDonnees) && isset($TabDonnees["RegleId"])){
	foreach ($TabDonnees["RegleId"] as $num=>$IdRègle){
		if($IdRègle!=''){
		$FRegle='<tr><td><input type="text" name="RegleId[]" id="RegleId'.$num.'" value="'.$IdRègle.'" class="form-control" /></td>';
		$FRegle .= '<td><input type="text" name="RegleTitre[]"  id="RegleTitre'.$num.'" value="'.$TabDonnees["RegleTitre"][$num].'" class="form-control"/></td>';
		$FRegle .= '<td><input type="text" name="RegleNbComposants[]"  id="RegleNbComposants_'.$num.'" value="'.$TabDonnees["RegleNbComposants"][$num].'" class="form-control" /></td>';
		$FRegle .= '<td><input type="text" name="RegleListeComposants[]"  id="RegleListeComposants_'.$num.'" value="'.$TabDonnees["RegleListeComposants"][$num].'" class="form-control" /><i class="fas fa-times remove-tr"></i></td>';
		$FRegle .= '<td><input type="text" name="RegleSyntaxe[]"  id="RegleSyntaxe_'.$num.'" value="'.$TabDonnees["RegleSyntaxe"][$num].'" class="form-control" /><i class="fas fa-times remove-tr"></i></td>';
		$FRegle .= '<td><input type="text" name="RegleSemantique[]"  id="RegleSemantique_'.$num.'" value="'.$TabDonnees["RegleSemantique"][$num].'" class="form-control" /><i class="fas fa-times remove-tr"></i></td>';
		$FRegle .= CaseFinLigne().'</tr>';
		print ($FRegle);
}}}
else{
	$LigneRègleVide='                     <tr> 
                        <td><input id="RegleId[]" name="RegleId[]" type="text" class="form-control" placeholder="Code..." autocomplete="off"/></td> 
                        <td><input id="RegleTitre[]" name="RegleTitre[]" type="text" class="form-control" placeholder="Titre..." autocomplete="off"/></td> 
                        <td><input id="RegleNbComposants[]" name="RegleNbComposants" type="email" class="form-control" placeholder="Nb Comp..." autocomplete="off"/></td> 
                        <td style="position: relative;"><input id="RegleListeComposants_" name="RegleListeComposants[]" type="text" class="form-control" placeholder="Liste des Composants..." autocomplete="off"/>
                        <td><input id="RegleSyntaxe[]" name="RegleSyntaxe[]" type="text" class="form-control" placeholder="Titre..." autocomplete="off"/></td> 
                        <td><input id="RegleSemantique[]" name="RegleSemantique[]" type="text" class="form-control" placeholder="Titre..." autocomplete="off"/></td> 
					</td>'.CaseFinLigne().'</tr>';;
	print $LigneRègleVide;
};
?>
</tbody>

<tr><td colspan="6"> 
<form action=<?php echo '"'.$_SERVER['PHP_SELF'].'"';?> method="post" id="FormulaireRègles">
<input type="button" onclick="AjouteRegle()" value="Ajouter une règle" class="btn btn-primary"/>
</form>
</tr>
</table>

                        <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th colspan="2">Composants des règles</th>
                                    </tr>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Liste</th>
                                    </tr>
                                </thead>
    

<tbody id="Composants">
<?php
if (isset($TabDonnees) && isset($TabDonnees["ComposantId"])){
	foreach ($TabDonnees["ComposantId"] as $num=>$IdComp){
		if($IdComp!=''){
		$FComp='<tr><td><input type="text" name="ComposantId[]" id="RegleId'.$num.'" value="'.$IdComp.'" class="form-control" /></td>';
		$FComp .= '<td><input type="text" name="ComposantListe[]"  id="ComposantListe'.$num.'" value="'.$TabDonnees["ComposantListe"][$num].'" class="form-control"/></td>';
		$FComp .= CaseFinLigne().'</tr>';
		print ($FComp);
}}}
else{
	$LigneComposantVide='                     <tr> 
                        <td><input id="ComposantId[]" name="ComposantId[]" type="text" class="form-control" placeholder="Nom..." autocomplete="off"/></td> 
                        <td><input id="ComposantListe[]" name="ComposantListe[]" type="text" class="form-control" placeholder="éléments" autocomplete="off"/></td> 
					</td>'.CaseFinLigne().'</tr>';
	print $LigneComposantVide;
};
?>
</tbody>
<tr><td colspan="2"> 
<form action=<?php echo '"'.$_SERVER['PHP_SELF'].'"';?> method="post" id="FormulaireComposants">
<input type="button" onclick="AjouteComposant()" value="Ajouter un composant" class="btn btn-primary"/>
</form>
</tr>

                 

