<?php

if (isset($_REQUEST["page"])) {

    if ($_REQUEST["page"] == "ajoutpayement") {
        $modes = findAllMode();
        loadview("payement/ajoutpayement.html.php", ["modes" => $modes]);
    } else
    if ($_REQUEST["page"] == "findClientPaye") {
        if (isset($_SESSION["payement"])) {
            unset($_SESSION["payement"]);
        }
        initPay();
        $tab = [];
        $phone = trim($_POST["tel"]);
        obligatoire("tel", $phone, $tab);
        if (validate($tab)) {
            $client = findClientByTel($phone);
            if ($client) {
                $_SESSION["payement"]["client"] = $client;
                $_SESSION["payement"]["commandes"] = findPayementByClientId($client["id"]);
            } else {
                $tab["tel"] = "Ce client n'existe pas! Veuillez verifier votre saisie!";
                $_SESSION["tab"] = $tab;
            }
        } else {
            $_SESSION["tab"] = $tab;
        }
        redirectToRoute("payement", "ajoutpayement");
    } else
    if ($_REQUEST["page"] == "addToVersement") {
        if (findIfExistOnVersement($_SESSION["payement"]["commandes"][$_GET["line"]]["idc"], $_SESSION["payement"]["versement"])) {
            $_SESSION["payement"]["versement"][] = $_SESSION["payement"]["commandes"][$_GET["line"]];
        } else {
            $_SESSION["line"] = $_GET["line"];
            $_SESSION["tab"]["ajoutv"] = "Deja ajoute!";
        }
        redirectToRoute("payement", "ajoutpayement");
    } else
    if ($_REQUEST["page"] == "removeToVersement") {
        // dd($_GET);
        unset($_SESSION["payement"]["versement"][$_GET["remove"]]);
        $_SESSION["payement"]["versement"] = array_values($_SESSION["payement"]["versement"]);
        redirectToRoute("payement", "ajoutpayement");
    } else
    if ($_REQUEST["page"] == "addVersement") {
        $tab = [];
        // dd($_POST);
        obligatoire("datep", $_POST["datep"], $tab);
        for ($i = 0; $i < count($_SESSION["payement"]["versement"]); $i++) {
            obligatoire("verse" . $i, $_POST["verse".$i], $tab);
            obligatoire("mode" . $i, $_POST["mode".$i], $tab);
            if ($_POST["mode" . $i] == 1) {
                obligatoire("refmode" . $i, $_POST["refmode".$i], $tab);
            }
        }
        // dd($tab);
        if (validate($tab)) {
            // dd($tab);
            for ($i = 0; $i < count($_SESSION["payement"]["versement"]); $i++) {
                $_SESSION["payement"]["versement"][$i]["datep"]= $_POST["datep"];
                $_SESSION["payement"]["versement"][$i]["verse"]= $_POST["verse". $i];
                $_SESSION["payement"]["versement"][$i]["mode"]= $_POST["mode".$i];
                if ($_POST["mode" . $i] == 1) {
                $_SESSION["payement"]["versement"][$i]["refmode"]= $_POST["refmode".$i];
                }
            }
            // dd($tab);
            dd($_SESSION["payement"]["versement"]);
        } else {
            $_SESSION["tab"] = $tab;
        }


        // dd($tab);
        redirectToRoute("payement", "ajoutpayement");
    }
}

function initPay()
{
    $payement = [
        "commandes" =>
        [
            [
                "datec" => "",
                "montant" => "",
                "verser" => "",
                "restant" => ""
            ]
        ],
        "client" =>
        [
            "nom" => "",
            "prenom" => "",
            "tel" => ""
        ],
        "versement" => []

    ];
    $_SESSION["payement"] = $payement;
}
