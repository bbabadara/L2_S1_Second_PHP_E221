<?php
if (isset($_REQUEST["page"])) {
    if ($_REQUEST["page"] == "commande") {
        $filtre=isset($_POST["etat"])?$_POST["etat"]:0;
        $_SESSION["filtre"]= $filtre;
        $etats=findAllEtats();
        $commandes =findAllCommandes($filtre);
        loadview("commande/allcommande.html.php",["commandes"=>$commandes,"etats"=>$etats]);
        
    }
}else{
    header("location:WEBROOT/?controller=commande&page=commande");
    // $commandes=findAllCommandes();
    // loadview("commande/allcommande.html.php",["commandes"=>$commandes]);
}
