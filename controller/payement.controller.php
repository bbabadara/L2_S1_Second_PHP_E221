<?php

if (isset($_REQUEST["page"])) {
    if ($_REQUEST["page"] == "ajoutpayement") {
        $modes=findAllMode();
        loadview("payement/ajoutpayement.html.php", ["modes"=>$modes]);
    }else
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
        redirectToRoute("payement","ajoutpayement");
    }else
    if ($_REQUEST["page"] == "addToVersement") {
        $_SESSION["payement"]["versement"][]= $_SESSION["payement"]["commandes"][$_GET["line"]] ;
        redirectToRoute("payement","ajoutpayement");
    }else
    if ($_REQUEST["page"] == "removeToVersement") {
        // dd($_GET);
      unset($_SESSION["payement"]["versement"][$_GET["remove"]]);
      $_SESSION["payement"]["versement"]=array_values($_SESSION["payement"]["versement"]);
        redirectToRoute("payement","ajoutpayement");
    }

}

function initPay()
{
    $payement = [
        "commandes" => 
        [
            ["datec" => "",
            "montant" => "",
            "verser" => "",
            "restant" => ""]
        ],
        "client" => 
        [
            "nom" => "",
            "prenom" => "",
            "tel"=>""
        ],
        "versement"=>[
           
        ]

    ];
    $_SESSION["payement"] = $payement;
}
