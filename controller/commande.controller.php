<?php
if (isset($_REQUEST["page"])) {
    if ($_REQUEST["page"] == "commande") {
        
        $commandes =findAllCommandes();
        loadview("commande/allcommande.html.php",["commandes"=>$commandes]);
        
    }
}else{
     
    $commandes=findAllCommandes();
    loadview("commande/allcommande.html.php",["commandes"=>$commandes]);
}
