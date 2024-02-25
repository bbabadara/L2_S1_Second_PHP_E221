<?php
if (isset($_REQUEST["page"])) {
    if ($_REQUEST["page"] == "commande") {
        $filtre=isset($_POST["etat"])?$_POST["etat"]:0;
        $_SESSION["filtre"]= $filtre;
        $etats=findAllEtats();
        $commandes=isset($key)?findAllCommandesByClientId($filtre,$key):findAllCommandes($filtre);
        loadview("commande/allcommande.html.php",["commandes"=>$commandes,"etats"=>$etats]);  
    }else  if ($_REQUEST["page"] == "ajoutcommande") {
        
        loadview("commande/ajoutcommande.html.php");     
    }
}else{
    redirectToRoute("commande","commande");
}
