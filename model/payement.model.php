<?php
function findPayementByClientId($id){
    $sql="SELECT c.*, SUM(montantp) as verser,(c.montant-SUM(montantp)) as restant FROM `payement` p,`commande` c,`client`cl WHERE c.id=cl.id AND cl.id=:id AND c.idc=p.idc GROUP BY p.idc HAVING verser<c.montant;";
    return executeSelect($sql,["id"=>$id]); 
}

function findAllMode( ){
    $sql="select *  from mode ";
    return executeSelect($sql);
}

function findIfExistOnVersement( $idc, array $all):bool{
    foreach ($all as $value) {
        if ($value["idc"]==$idc) {
            return false;
        }
    }
   return true;
}

function addpayement(array $Npayement){
    $sql="insert into payement (datep, montantp, idmod,idc,ref_mode) values (:datep, :montantp, :idmod, :idc,:ref_mode)";
    executeUpdate($sql,$Npayement);
}


function mAddPayement(array $payment){
    foreach ($payment as $value) {
        $Npayement=[
            "datep"=>$value["datep"],
            "montantp"=>$value["verse"],
            "idmod"=>$value["mode"],
            "idc"=>$value["idc"],
            "ref_mode"=>isset($value["refmode"])?$value["refmode"]:null
        ];
        addpayement($Npayement);
    }
}