<!-- // Numérothèque, Chronothèque : onglet calendrier -->

<div class="explique">
<h4>Chronothèque</h4>
<p>Les expressions des séries décitiques expriment la référence temporelle par rapport à la situation d'énonciation actuelle.
Celles des séries anaphoriques expriment la référence temporelle par rapport à une situation donnée dans le contexte.
Les unes comme les autres peuvent recourir ou non à des nombres.</p>
</div>

<?php //json_transmet($TabDonnees["Tab_chrono_jd"], "JSON_Tab_chrono_jd");
//json_transmet($TabDonnees, "JSON_Donnees");

function tableau_chrono($titre, $abreviation){
	global $TabDonnees;
	$idTab="Tab_chrono_".$abreviation;
	if (isset($TabDonnees[$idTab])){
		json_transmet($TabDonnees[$idTab], "JSON_".$idTab);}
	else
		#print ('<div id="JSON_'.$idTab.'" class="hide">{"ref":{"decl":"","expr":"","phon":"","comm":""}}</div>');
		print ('<div id="JSON_'.$idTab.'" class="hide">{}</div>');
	print ('<div id="serie_'.$idTab.'">');
	print ('<h4>'.$titre.'</h4>');
	print ('<div id="lieu_'.$idTab.'"> </div>');
	print ('<p class="aide">Cliquez sur les termes en gras pour ajouter une ligne <strong id="'.$abreviation.'_cree_ligne_debut">au début</strong> ou <strong id="'.$abreviation.'_cree_ligne_fin" >à la fin</strong> du tableau</p>');
	print('</div>');
};

function pluriel($mot){
    if ((substr($mot, -1)!='s') and (substr($mot, -1)!='x')){
        $mot = $mot.'s';
	};
    return($mot);
};
	
function tableaux_chrono($unite){
	$unites=pluriel($unite);
	$initiale=substr($unite, 0,1);
	tableau_chrono("Série déictique non numérique des ".$unites, $initiale."d");
	tableau_chrono("Série déictique numérique des ".$unites, $initiale."dn");
	tableau_chrono("Série anaphorique non numérique des ".$unites, $initiale."a");
	tableau_chrono("Série anaphorique numérique des ".$unites, $initiale."an");
};

//tableau_chrono("Série déictique non numérique des jours", "jd");
//tableau_chrono("Série déictique numérique des jours", "jdn");
//tableau_chrono("Série anaphorique non numérique des jours", "ja");
//tableau_chrono("Série anaphorique numérique des jours", "jan");

tableaux_chrono("jour");
tableaux_chrono("mois");
tableaux_chrono("année");
tableaux_chrono("semaine");
?>


<div id="trace"/></div>
<script type="text/python">
from browser import document
from browser.html import TABLE, TR, TH, TD, P, INPUT
import json


def ajoute_trace(texte):
    trace = document["trace"]
    trace <= P(texte)

#ajoute_trace("C'est ici, la trace !")

def pluriel(mot):
    if mot[-1]!='s' and mot[-1]!='x': 
        mot = mot+'s'
    return(mot)

class TableauCroissant(object):
    " Tableau dans un formulaire de saisie, à la fin (ou au début) duquel on peut ajouter des lignes "
    def __init__(self,id="",t="",lcol=[],u=""):
        self.id_tab = id
        self.titre = t
        #self.ltcl = (col["titre"] for col in lcol)
        self.ltcl = ["Décalage","Expression","API","Commentaire"]
        self.lcolonnes = lcol #liste des colonnes; 
        #    chaque colonne est représentée par un dictionnaire:
        #    titre, placeholder, nom (qui est aussi une part de l'id)
        #    et peut contenir classe et type d'input
        self.unite = u
        self.cpt_apres=0
        self.cpt_avant=0
        self.json = json.loads(document["JSON_"+self.id_tab].html)
#        self.json = json.loads(document["JSON_Donnees"].html)[self.id_tab]
    def nouvelle_ligne_en_fin(self):
#        ajoute_trace("ajoute une ligne en fin")
        self.cpt_apres+=1
        nouvelle_ligne = TR(TD(INPUT(f'value="Cell Fin-{i}"')) for i in range(len(self.lcolonnes)))
        table = document[self.id_tab]
        nouvelle_ligne = self.complete_nouvelle_ligne(nouvelle_ligne, "ap_"+str(self.cpt_apres))
        inpdcl = nouvelle_ligne.get(selector="input")[0]
        inpdcl.value=str(self.cpt_apres)+" "+self.unite
        if self.cpt_apres>1:
            inpdcl.value=pluriel(inpdcl.value)
        inpdcl.value=inpdcl.value+" après"
#        ajoute_trace(inpdcl.id)
        table <= nouvelle_ligne
        return(nouvelle_ligne)
    def nouvelle_ligne_au_debut(self):
#        ajoute_trace("ajoute une ligne au début")
        self.cpt_avant+=1
        nouvelle_ligne = TR(TD(INPUT(f'value="Cell Début-{i}"')) for i in range(len(self.lcolonnes)))
        table = document[self.id_tab]
        nouvelle_ligne = self.complete_nouvelle_ligne(nouvelle_ligne, "av_"+str(self.cpt_avant))
#        ajoute_trace("nouvelle_ligne créée")
        inpdcl = nouvelle_ligne.get(selector="input")[0]
        inpdcl.value=str(self.cpt_avant)+" "+self.unite
        if self.cpt_avant>1:
            inpdcl.value=pluriel(inpdcl.value)
        inpdcl.value=inpdcl.value+" avant"
#        ajoute_trace(inpdcl.id)
        ligne_titre = table.get(selector="tr")[0]
        nouveau = table.insertBefore(nouvelle_ligne, ligne_titre.nextSibling)
        return(nouvelle_ligne)
    def nouvelle_ligne_avant_ref(self):
        self.cpt_avant+=1
        nouvelle_ligne = TR(TD(INPUT(f'value="Cell Début-{i}"')) for i in range(len(self.lcolonnes)))
        table = document[self.id_tab]
        nouvelle_ligne = self.complete_nouvelle_ligne(nouvelle_ligne, "av_"+str(self.cpt_avant))
        inpdcl = nouvelle_ligne.get(selector="input")[0]
        inpdcl.value=str(self.cpt_avant)+" "+self.unite
        if self.cpt_avant>1:
            inpdcl.value=pluriel(inpdcl.value)
        inpdcl.value=inpdcl.value+" avant"
        ligne_ref = document[self.id_tab+"[ref]"]
        nouveau = table.insertBefore(nouvelle_ligne, ligne_ref)
        return(nouvelle_ligne)
    def change_ligne():
        return(null)
    def complete_nouvelle_ligne(self,nouvelle,idl):
        nouvelle.id=self.id_tab+"["+str(idl)+"]"
        for i in range(len(self.ltcl)):
            col = self.lcolonnes[i]
#            ajoute_trace(f"cellule {i} colonne "+col["titre"])
            cellule = nouvelle.get(selector="td")[i]
#            ajoute_trace(f"cellule {i} extraite")
            inp = cellule.get(selector="input")[0]
#            ajoute_trace(f"input de cellule {i} extrait")
            inp.placeholder=col["invite"]
#            ajoute_trace(f"invite de cellule {i} placée")
            inp.id=nouvelle.id+"["+col["nom"]+"]"
            inp.name=inp.id
#            ajoute_trace(f"id de cellule {i} placé: {inp.id}")
        deja_FL=len(nouvelle.select(".FinLigne"))
        if not deja_FL:   # Pour éviter de placer une deuxième fois les boutons de contrôle de la ligne
            FLigne=document["FinLigne"]
            CaseFinLigne=FLigne.firstChild.cloneNode(True)
            nouvelle <= CaseFinLigne
        return(nouvelle)
    def relit_ligne(self,id_ligne):
        idl=self.id_tab+"["+str(id_ligne)+"]"
        if id_ligne=="ref":
            ligne = document[idl]
        else:
            if id_ligne[:2]=="av":
#                ligne=self.nouvelle_ligne_au_debut()
                ligne=self.nouvelle_ligne_avant_ref() # Pour qu'elles soient créées dans le bon ordre
            else:
                ligne=self.nouvelle_ligne_en_fin()
        self.complete_nouvelle_ligne(ligne,id_ligne)
        case_traitee = ligne.get(selector="td")[0]
        inp_case_traitee = case_traitee.get(selector="input")[0]
        for col in self.json[id_ligne].keys():
#            ajoute_trace("on relit une case, "+col)
            inp_case_traitee = case_traitee.get(selector="input")[0]
            inp_case_traitee.value = self.json[id_ligne][col]
            case_traitee = case_traitee.nextSibling
        return(ligne)
    def relit_tableau(self):
        for id_ligne in self.json.keys():
#            ajoute_trace("on relit la ligne, "+id_ligne)
            self.relit_ligne(id_ligne)
    def insere(self,id_div=""):
        if id_div=="":
            id_div="lieu_"+self.id_tab
#        ajoute_trace("insertion du tableau croissant dans "+id_div)
        table = TABLE(id=self.id_tab)
        # ligne de titres
        table <= TR(TH(col["titre"]) for col in self.lcolonnes)
#        table <= TR(TH(lcolonnes[i]["titre"]) for i in range(len(self.lcolonnes)))
        nouvelle_ligne = TR(TD(INPUT(f'value="Cell Fin-{i}"')) for i in range(len(self.lcolonnes)))
        nouvelle_ligne = self.complete_nouvelle_ligne(nouvelle_ligne, "ref")
        inpdcl = nouvelle_ligne.get(selector="input")[0]
        inpdcl.value="référence"
        table <= nouvelle_ligne
        document[id_div] <= table
        return(table)

id_tab = "mon_tableau" # c'est une variable globale, utilisée au sein de certaines fonctions

def ajoute_ligne_debut_tableau(event):
    global id_tab
    id_tab="Tab_chrono_jd"
    Tab_chrono_jd.nouvelle_ligne_au_debut()

def ajoute_ligne_debut_tableau_jd(event):
    global id_tab
    id_tab="Tab_chrono_jd"
    Tab_chrono_jd.nouvelle_ligne_au_debut()

def ajoute_ligne_debut_tableau_jd(event):
    Tab_chrono_jd.nouvelle_ligne_au_debut()

document["jd_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_jd)

def ajoute_ligne_fin_tableau_jd(event):
    Tab_chrono_jd.nouvelle_ligne_en_fin()

document["jd_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_jd)

lcol_jd = [ # sert à l'initialisation de tous les taleaux d'expressions temporelles
    {"titre":"Décalage","invite":"décalage","nom":"decl"},
    {"titre":"Expression","invite":"expression","nom":"expr"},
    {"titre":"API","invite":"phonétique","nom":"phon"},
    {"titre":"Commentaire","invite":"commentaire","nom":"comm"}
	]

### Création des tableaux
Tab_chrono_jd = TableauCroissant("Tab_chrono_jd","Jours déictique",lcol_jd,"jour")
Tab_chrono_jd.insere()
Tab_chrono_ja = TableauCroissant("Tab_chrono_ja","Jours anaphorique",lcol_jd,"jour")
Tab_chrono_ja.insere()
Tab_chrono_jan = TableauCroissant("Tab_chrono_jan","Jours anaphorique",lcol_jd,"jour")
Tab_chrono_jan.insere()
Tab_chrono_jdn = TableauCroissant("Tab_chrono_jdn","Jours anaphorique",lcol_jd,"jour")
Tab_chrono_jdn.insere()

Tab_chrono_sd = TableauCroissant("Tab_chrono_sd","semaines déictique",lcol_jd,"semaine")
Tab_chrono_sd.insere()
Tab_chrono_sa = TableauCroissant("Tab_chrono_sa","semaines anaphorique",lcol_jd,"semaine")
Tab_chrono_sa.insere()
Tab_chrono_san = TableauCroissant("Tab_chrono_san","semaines anaphorique",lcol_jd,"semaine")
Tab_chrono_san.insere()
Tab_chrono_sdn = TableauCroissant("Tab_chrono_sdn","semaines anaphorique",lcol_jd,"semaine")
Tab_chrono_sdn.insere()

Tab_chrono_md = TableauCroissant("Tab_chrono_md","mois déictique",lcol_jd,"mois")
Tab_chrono_md.insere()
Tab_chrono_ma = TableauCroissant("Tab_chrono_ma","mois anaphorique",lcol_jd,"mois")
Tab_chrono_ma.insere()
Tab_chrono_man = TableauCroissant("Tab_chrono_man","mois anaphorique",lcol_jd,"mois")
Tab_chrono_man.insere()
Tab_chrono_mdn = TableauCroissant("Tab_chrono_mdn","mois anaphorique",lcol_jd,"mois")
Tab_chrono_mdn.insere()

Tab_chrono_ad = TableauCroissant("Tab_chrono_ad","années déictique",lcol_jd,"année")
Tab_chrono_ad.insere()
Tab_chrono_aa = TableauCroissant("Tab_chrono_aa","années anaphorique",lcol_jd,"année")
Tab_chrono_aa.insere()
Tab_chrono_aan = TableauCroissant("Tab_chrono_aan","années anaphorique",lcol_jd,"année")
Tab_chrono_aan.insere()
Tab_chrono_adn = TableauCroissant("Tab_chrono_adn","années anaphorique",lcol_jd,"année")
Tab_chrono_adn.insere()

TabChrono = [
    {"ja":Tab_chrono_ja},
    {"jd":Tab_chrono_jd},
    {"jan":Tab_chrono_jan},
    {"jdn":Tab_chrono_jdn},
   
    {"sa":Tab_chrono_sa},
    {"sd":Tab_chrono_sd},
    {"san":Tab_chrono_san},
    {"sdn":Tab_chrono_sdn},
   
    {"ma":Tab_chrono_ma},
    {"md":Tab_chrono_md},
    {"man":Tab_chrono_man},
    {"mdn":Tab_chrono_mdn},
   
    {"aa":Tab_chrono_aa},
    {"ad":Tab_chrono_ad},
    {"aan":Tab_chrono_aan},
    {"adn":Tab_chrono_adn}
    ]

id_TCA = "jd" # code du tableau actif

def change_tableau_actif(event):
    global id_tab
    global id_TCA
    id_div=event.currentTarget.id
    id_tab=id_div[6:]
    id_TCA=id_tab[11:]
#    ajoute_trace("tableau actif: "+id_tab)


# Dans les noms des fonctions qui suivent :
# 	j, s, m, n représentent les unités temporelles jour, semaine, mois, année
# 	a dénote une série anaphorique, d'une série déictique
# 	n dénote une série faisant usage des nombres
# 	Jours

def ajoute_ligne_debut_tableau_jdn(event):
    Tab_chrono_jdn.nouvelle_ligne_au_debut()

document["jdn_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_jdn)

def ajoute_ligne_fin_tableau_jdn(event):
    Tab_chrono_jdn.nouvelle_ligne_en_fin()

document["jdn_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_jdn)

def ajoute_ligne_debut_tableau_ja(event):
    Tab_chrono_ja.nouvelle_ligne_au_debut()

document["ja_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_ja)

def ajoute_ligne_fin_tableau_ja(event):
    Tab_chrono_ja.nouvelle_ligne_en_fin()

document["ja_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_ja)

def ajoute_ligne_debut_tableau_jan(event):
    Tab_chrono_jan.nouvelle_ligne_au_debut()

document["jan_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_jan)

def ajoute_ligne_fin_tableau_jan(event):
    Tab_chrono_jan.nouvelle_ligne_en_fin()

document["jan_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_jan)


# Mois

def ajoute_ligne_debut_tableau_md(event):
    Tab_chrono_md.nouvelle_ligne_au_debut()

document["md_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_md)

def ajoute_ligne_fin_tableau_md(event):
    Tab_chrono_md.nouvelle_ligne_en_fin()

document["md_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_md)

def ajoute_ligne_debut_tableau_mdn(event):
    Tab_chrono_mdn.nouvelle_ligne_au_debut()

document["mdn_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_mdn)

def ajoute_ligne_fin_tableau_mdn(event):
    Tab_chrono_mdn.nouvelle_ligne_en_fin()

document["mdn_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_mdn)


def ajoute_ligne_debut_tableau_ma(event):
    Tab_chrono_ma.nouvelle_ligne_au_debut()

document["ma_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_ma)

def ajoute_ligne_fin_tableau_ma(event):
    Tab_chrono_ma.nouvelle_ligne_en_fin()

document["ma_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_ma)

def ajoute_ligne_debut_tableau_man(event):
    Tab_chrono_man.nouvelle_ligne_au_debut()

document["man_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_man)

def ajoute_ligne_fin_tableau_man(event):
    Tab_chrono_man.nouvelle_ligne_en_fin()

document["man_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_man)

# année

def ajoute_ligne_debut_tableau_ad(event):
    Tab_chrono_ad.nouvelle_ligne_au_debut()

document["ad_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_ad)

def ajoute_ligne_fin_tableau_ad(event):
    Tab_chrono_ad.nouvelle_ligne_en_fin()

document["ad_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_ad)

def ajoute_ligne_debut_tableau_adn(event):
    Tab_chrono_adn.nouvelle_ligne_au_debut()

document["adn_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_adn)

def ajoute_ligne_fin_tableau_adn(event):
    Tab_chrono_adn.nouvelle_ligne_en_fin()

document["adn_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_adn)

def ajoute_ligne_debut_tableau_aa(event):
    Tab_chrono_aa.nouvelle_ligne_au_debut()

document["aa_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_aa)

def ajoute_ligne_fin_tableau_aa(event):
    Tab_chrono_aa.nouvelle_ligne_en_fin()

document["aa_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_aa)

def ajoute_ligne_debut_tableau_aan(event):
    Tab_chrono_aan.nouvelle_ligne_au_debut()

document["aan_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_aan)

def ajoute_ligne_fin_tableau_aan(event):
    Tab_chrono_aan.nouvelle_ligne_en_fin()

document["aan_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_aan)

# semaine
def ajoute_ligne_debut_tableau_sd(event):
    Tab_chrono_sd.nouvelle_ligne_au_debut()

document["sd_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_sd)

def ajoute_ligne_fin_tableau_sd(event):
    Tab_chrono_sd.nouvelle_ligne_en_fin()

document["sd_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_sd)

def ajoute_ligne_debut_tableau_sdn(event):
    Tab_chrono_sdn.nouvelle_ligne_au_debut()

document["sdn_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_sdn)

def ajoute_ligne_fin_tableau_sdn(event):
    Tab_chrono_sdn.nouvelle_ligne_en_fin()

document["sdn_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_sdn)

def ajoute_ligne_debut_tableau_sa(event):
    Tab_chrono_sa.nouvelle_ligne_au_debut()

document["sa_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_sa)

def ajoute_ligne_fin_tableau_sa(event):
    Tab_chrono_sa.nouvelle_ligne_en_fin()

document["sa_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_sa)

def ajoute_ligne_debut_tableau_san(event):
    Tab_chrono_san.nouvelle_ligne_au_debut()

document["san_cree_ligne_debut"].bind("click", ajoute_ligne_debut_tableau_san)

def ajoute_ligne_fin_tableau_san(event):
    Tab_chrono_san.nouvelle_ligne_en_fin()

document["san_cree_ligne_fin"].bind("click", ajoute_ligne_fin_tableau_san)

for id in ("ja", "jd", "jan", "jdn", "ma", "md", "man", "mdn", "aa", "ad", "aan", "adn", "sa", "sd", "san", "sdn"):
    document["serie_Tab_chrono_"+id].bind('mouseenter', change_tableau_actif)
    document["serie_Tab_chrono_"+id].bind('mouseover', change_tableau_actif)
#    ajoute_trace("liaison mouseover de la série "+id)


Tab_chrono_ja.relit_tableau()
Tab_chrono_jan.relit_tableau()
Tab_chrono_jd.relit_tableau()
Tab_chrono_jdn.relit_tableau()

Tab_chrono_ma.relit_tableau()
Tab_chrono_man.relit_tableau()
Tab_chrono_md.relit_tableau()
Tab_chrono_mdn.relit_tableau()

Tab_chrono_aa.relit_tableau()
Tab_chrono_aan.relit_tableau()
Tab_chrono_ad.relit_tableau()
Tab_chrono_adn.relit_tableau()

Tab_chrono_sa.relit_tableau()
Tab_chrono_san.relit_tableau()
Tab_chrono_sd.relit_tableau()
Tab_chrono_sdn.relit_tableau()

#ajoute_trace("au bout du script")

</script>

