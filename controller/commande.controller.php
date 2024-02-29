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
        $tab = [];
        if (isset($_POST["tel"])) {
            $phone = trim($_POST["tel"]);
            if (!empty($phone)) {
                // dd($phone);
                $_SESSION["client-c"] = findClientByTel($phone);
                if ($_SESSION["client-c"]) {
                    loadview("commande/ajoutcommande.html.php");
                } else {
                    $tab = ["tel" => $phone, "msg" => "Cet utilisateur n'existe pas! Veuillez verifier votre saisie."];
                    loadview("commande/ajoutcommande.html.php", ["tab" => $tab]);
                }
            } else {
                $tab = ["tel" => $_POST["tel"], "msg" => " Veuillez saisir un numero."];
                loadview("commande/ajoutcommande.html.php", ["tab" => $tab]);
            }
        } else               
        if (isset($_POST["ref"])) {
            // dd($_POST);
            $ref = trim($_POST["ref"]);
            if (!empty($ref)) {
                $_SESSION["article"] = findArticleByRef($ref);
                if ($_SESSION["article"]) {
                    loadview("commande/ajoutcommande.html.php");
                } else {
                    $tab = ["ref" => $_POST["ref"], "msg2" => "Article introuvable! Veuillez verifier votre saisie."];
                    loadview("commande/ajoutcommande.html.php", ["tab" => $tab]);
                }
            } else {
                $tab = ["ref" => $_POST["ref"], "msg2" => " Veuillez saisir un article."];
                loadview("commande/ajoutcommande.html.php", ["tab" => $tab]);
            }
        } else               
        if (isset($_POST["qte"])) {
            // dd($_POST);
            
            $qte = intval(trim($_POST["qte"]));
            if (!empty($qte)) {
                if ($qte<0) {
                    $tab = ["qte" => $_POST["qte"], "msg3" => "La quantite saisie doit etre superieur a zero!!!"];
                    loadview("commande/ajoutcommande.html.php", ["tab" => $tab]);
                }
                 else if ($_SESSION["article"]["qtestock"] >= $qte) {
                    $nart=[
                        "libelle"=>$_SESSION["article"]["libelle"],
                        "prix"=>$_SESSION["article"]["prixunitaire"],
                        "qte"=>$qte
                    ];
                    $_SESSION["ncom"][]=$nart;
                    //  unset($_SESSION["ncom"]);
                    //  unset($_SESSION["article"]);
                    //  unset($_SESSION["client-c"]);
                    $_SESSION["article"]["qtestock"]=$_SESSION["article"]["qtestock"]-$qte;
                    loadview("commande/ajoutcommande.html.php");
                } else {
                    $tab = ["qte" => $_POST["qte"], "msg3" => "La quantite saisie doit etre inferieur a la quantite en stock"];
                    loadview("commande/ajoutcommande.html.php", ["tab" => $tab]);
                }
            } else {
                $tab = ["qte" => $_POST["qte"], "msg3" => " Veuillez saisir la quantite."];
                loadview("commande/ajoutcommande.html.php", ["tab" => $tab]);
            }
        } else {
            loadview("commande/ajoutcommande.html.php", ["tab" => $tab]);
        }
    }
} else {
    redirectToRoute("commande", "commande");
}
