<?php
if (isset($_REQUEST["page"])) {
    if ($_REQUEST["page"] == "ajoutclient") {
        loadview("client/ajoutclient.html.php");     
    }else 
     if ($_REQUEST["page"] == "listclient") {
        $clients=findAllClients();
        loadview("client/listclient.html.php",["clients"=>$clients]);     
    }else
    if ($_REQUEST["page"] == "addclient") {
        $nom=trim($_POST["nom"]);$prenom=trim($_POST["prenom"]);$tel=trim($_POST["tel"]);
        if (!empty($prenom) && !empty($nom) && !empty($tel)) {
            
            $verif=verifPhone($tel);
            
            if (!$verif) {
                $Nclient=[
                    "nom"=>$nom,
                    "prenom"=>$prenom,
                    "telephone"=>$tel
                ];
                addClient($Nclient);
                redirectToRoute("client","listclient");
            } else {
                $tab=["prenom"=>$prenom,"nom"=>$nom,"tel"=>$tel,"msg"=>"Ce numero de telephone existe deja!!!"];
            loadview("client/ajoutclient.html.php",["tab"=>$tab]);
            }
            
        } else {
            $tab=["prenom"=>$prenom,"nom"=>$nom,"tel"=>$tel,"msg"=>"Veuillez remplir tous les champs SVP!!!"];
            loadview("client/ajoutclient.html.php",["tab"=>$tab]);   
        }
        
    }
}else {
    redirectToRoute("client","listclient");
}