<?php
if (isset($_REQUEST["page"])) {
    if ($_REQUEST["page"] == "commande") {
        $filtre = isset($_POST["etat"]) ? $_POST["etat"] : 0;
        $_SESSION["filtre"] = $filtre;
        $etats = findAllEtats();
        $commandes = isset($key) ? findAllCommandesByClientId($filtre, $key) : findAllCommandes($filtre);
        loadview("commande/allcommande.html.php", ["commandes" => $commandes, "etats" => $etats]);
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
        }else               
        if (isset($_POST["ref"])) {
            // dd($_POST);
            $ref = trim($_POST["ref"]);
            if (!empty($ref)) {
                $_SESSION["article"]= findArticleByRef($ref);
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
        }
         else {
            loadview("commande/ajoutcommande.html.php", ["tab" => $tab]);
        }
    }
} else {
    redirectToRoute("commande", "commande");
}
