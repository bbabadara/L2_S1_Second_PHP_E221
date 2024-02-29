<?php
function findAllCommandes(int $filtre):array{
    $sql="select *,DATE_FORMAT(datec, '%d/%m/%Y') as datec from commande c,client cl, etatcom et where c.id=cl.id and c.idetat=et.idetat";
    if ($filtre!=0) {
        $sql=$sql." and et.idetat=:filtre";
    }
    
    return executeSelect($sql,$filtre!=0?["filtre"=>$filtre]:[]);
}

function findAllEtats(){
    $sql="select * from etatcom ";
    return executeSelect($sql);
}

function findAllCommandesByClientId(int $filtre,$id):array{
    $sql="select *,DATE_FORMAT(datec, '%d/%m/%Y') as datec from commande c, etatcom et where cl.id=:id and c.idetat=et.idetat";
    if ($filtre!=0) {
        $sql=$sql." and et.idetat=:filtre";
    }
    return executeSelect($sql,$filtre!=0?["id"=>$id,"filtre"=>$filtre]:["id"=>$id]);
}