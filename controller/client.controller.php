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
        if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["tel"])) {
            $verif=verifPhone($_POST["tel"]);
            // dd($verif);
            if (!$verif) {
                $Nclient=[
                    "nom"=>$_POST["nom"],
                    "prenom"=>$_POST["prenom"],
                    "telephone"=>$_POST["tel"]
                ];
                AddClient($Nclient);
                redirectToRoute("client","listclient");
            } else {
                $tab=["prenom"=>$_POST["prenom"],"nom"=>$_POST["nom"],"tel"=>$_POST["tel"],"msg"=>"Ce numero de telephone existe deja!!!"];
            loadview("client/ajoutclient.html.php",["tab"=>$tab]);
            }
            
        } else {
            $tab=["prenom"=>$_POST["prenom"],"nom"=>$_POST["nom"],"tel"=>$_POST["tel"],"msg"=>"Veillez remplir tous les champs SVP!!!"];
            loadview("client/ajoutclient.html.php",["tab"=>$tab]);   
        }
        
    }
}else {
    redirectToRoute("client","listclient");
}