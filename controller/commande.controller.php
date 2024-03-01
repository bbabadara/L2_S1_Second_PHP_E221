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
    //     extract(findLastCommandeId());
    //    dd($idc) ;
        if (isset( $_SESSION["allArticle"])) { unset($_SESSION["allArticle"]);}
        
        $_SESSION["allArticle"]=findAllArticlesNonPAgi();
       
        if (isset($_POST["tel"])) {
            if (isset( $_SESSION["client-c"])) { unset($_SESSION["client-c"]);}
            if (isset( $_SESSION["article"])) { unset($_SESSION["article"]);}
            if (isset( $_SESSION["qte"])) { unset($_SESSION["qte"]);}
            if (isset( $_SESSION["ncom"])) { unset($_SESSION["ncom"]);}
            $_SESSION["ncom"]=[];
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
                $article = findArticleByRef1($ref, $_SESSION["allArticle"]);
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
                        "qte"=>$qte,
                        "ida"=>$_SESSION["article"]["ida"]
                    ];
                    
                    $xol=findArticleByref1($nart['libelle'],$_SESSION["ncom"]);                 
                    if ($xol) {
                        updateNcom($nart['libelle'],$_SESSION["ncom"],$qte);
                        // dd($_SESSION["ncom"]);
                    } else {
                     $_SESSION["ncom"][]=$nart;
                    }
                      updateQte($_SESSION["article"]["libelle"],$_SESSION["allArticle"],$qte);
                    $_SESSION["article"]["qtestock"]=$_SESSION["article"]["qtestock"]-$qte;

                    // loadview("commande/ajoutcommande.html.php");
                } else {
                    $_SESSION["tab"]["qte"]= "La quantite saisie doit etre inferieur a la quantite en stock";
                }
            } else {
                $_SESSION["tab"]=$tab;
            }
        }
        if (isset($_POST["Acommander"])) {
            $Ncom=[
                "datec" => date("Y-m-d"), 
                "montant"=>intval($_SESSION["som"]),
                "idetat"=>2,
                "id"=>intval($_SESSION["client-c"]["id"])
            ];

            addCommande($Ncom);
            extract(findLastCommandeId());
            

            redirectToRoute("commande", "commande");
            exit;
        }
        
        loadview("commande/ajoutcommande.html.php");
    }
} else {
    redirectToRoute("commande", "commande");
}