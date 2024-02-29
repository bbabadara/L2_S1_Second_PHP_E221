<?php
if (isset($_REQUEST["page"])) {
    if ($_REQUEST["page"] == "ajoutclient") {
        loadview("client/ajoutclient.html.php");
    } else 
     if ($_REQUEST["page"] == "listclient") {
        extract(countElement("client"));
        $page=isset($_GET["pos"])?$_GET["pos"]:1;
        $nbr_page=ceil($total/5);
        $debut= ($page - 1)*5;
        // dd($nbr_page);
        $clients = findAllClients($debut);
        loadview("client/listclient.html.php", ["clients" => $clients,"nbr_page"=> $nbr_page]);
    } else
    if ($_REQUEST["page"] == "addclient") {
        $errors = [];
        $nom = trim($_POST["nom"]);
        $prenom = trim($_POST["prenom"]);
        $tel = trim($_POST["tel"]);
        $tab = ["prenom" => $prenom, "nom" => $nom, "tel" => $tel];
        $_SESSION["tab"] = $tab;
        obligatoire("nom", $nom, $errors, "Le nom est obligatoire");
        obligatoire("prenom", $prenom, $errors, "Le prenom est obligatoire");
        obligatoire("tel", $tel, $errors, "Le telephone est obligatoire");
        if (validate($errors)) {
            $verif = verifPhone($tel);
            if (!$verif) {
                unset($_POST["page"]);
                unset($_POST["controller"]);
                $Nclient = [
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "telephone" => $tel
                ];
                addClient($Nclient);
                // redirectToRoute("client","listclient");
            } else {
                $_SESSION["errors"] = ["tel" => "Ce numero de telephone existe deja!!!"];
            }
        } else {
            $_SESSION["errors"] = $errors;
        }
        redirectToRoute("client", "listclient");
    }
} else {
    redirectToRoute("client", "listclient");
}
