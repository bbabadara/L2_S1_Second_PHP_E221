<?php
if (isset($_REQUEST["page"])) {
    if ($_REQUEST["page"] == "commande") {
        $filtre = isset($_GET["etat"]) ? $_GET["etat"] : 0;
        $_SESSION["filtre"] = $filtre;
        $etats = findAllEtats();
        extract(countElement("commande"));
        $page=isset($_GET["pos"])?$_GET["pos"]:1;
        $nbr_page=ceil($total/5);
        $debut= ($page - 1)*5;
        $commandes = isset($key) ? findAllCommandesByClientId($filtre, $key,$debut) : findAllCommandes($filtre,$debut);
        loadview("commande/allcommande.html.php", ["commandes" => $commandes, "etats" => $etats,"nbr_page"=> $nbr_page,"page"=>$page]);
    } else  if ($_REQUEST["page"] == "ajoutcommande") {
      
        if (isset($_POST["tel"])) {
            if (isset( $_SESSION["client-c"])) { unset($_SESSION["client-c"]);}
            if (isset( $_SESSION["article"])) { unset($_SESSION["article"]);}
            if (isset( $_SESSION["qte"])) { unset($_SESSION["qte"]);}
            if (isset( $_SESSION["ncom"])) { unset($_SESSION["ncom"]);}
              $tab = [];
            $phone = trim($_POST["tel"]);
            obligatoire("tel", $phone, $tab);
            if (validate($tab)) {              
                $client = findClientByTel($phone); 
                if ($client) {
                    $_SESSION["client-c"]=$client;
                    // dd( $_SESSION["client-c"]);
                } else {
                    $tab["tel"] = "Ce client n'existe pas! Veuillez verifier votre saisie.";
                    $_SESSION["tab"]=$tab;
                }
            } else {
                $_SESSION["tab"]=$tab;
            }
        } 
                       
        if (isset($_POST["ref"])) {
            if (isset( $_SESSION["article"])) { unset($_SESSION["article"]);}
            if (isset( $_SESSION["qte"])) { unset($_SESSION["qte"]);}
            $tab = [];
            $ref = trim($_POST["ref"]);
            obligatoire("ref", $ref, $tab);
            if (validate($tab)) {
                $article = findArticleByRef($ref);
                if ($article) {
                    $_SESSION["article"]=$article;
                } else {
                    $tab["ref"] = "Cet article n'existe pas! Veuillez verifier votre saisie.";
                    $_SESSION["tab"]=$tab;
                }
            } else {
                $_SESSION["tab"]=$tab;
            }
        }
                    
        if (isset($_POST["qte"])) {
            if (isset( $_SESSION["qte"])) { unset($_SESSION["qte"]);}
            $tab = [];   
            $qte = intval(trim($_POST["qte"]));
            obligatoire("qte", $qte, $tab);
            if (validate($tab)) {
                $_SESSION["qte"]=$qte;
                if ($qte<0) {
                    $_SESSION["tab"]["qte"]="La quantite saisie doit etre superieur a zero!!!";
                }
                 else if ($_SESSION["article"]["qtestock"] >= $qte) {
                    $nart=[
                        "libelle"=>$_SESSION["article"]["libelle"],
                        "prix"=>$_SESSION["article"]["prixunitaire"],
                        "qte"=>$qte
                    ];
                    $_SESSION["ncom"][]=$nart;
                    $_SESSION["article"]["qtestock"]=$_SESSION["article"]["qtestock"]-$qte;
                    loadview("commande/ajoutcommande.html.php");
                } else {
                    $_SESSION["tab"]["qte"]= "La quantite saisie doit etre inferieur a la quantite en stock";
                }
            } else {
                $_SESSION["tab"]=$tab;
            }
        } 
        loadview("commande/ajoutcommande.html.php");
    }
} else {
    redirectToRoute("commande", "commande");
}
