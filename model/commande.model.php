<?php
function findAllCommandes(int $filtre,$debut=0):array{
    $sql="select *,DATE_FORMAT(datec, '%d/%m/%Y') as datec from commande c,client cl, etatcom et where c.id=cl.id and c.idetat=et.idetat";
   
    if ($filtre!=0) {
        $sql=$sql." and et.idetat=:filtre";
    }
     $sql=$sql." limit $debut,5";
    return executeSelect($sql,$filtre!=0?["filtre"=>$filtre]:[]);
}

function findAllEtats(){
    $sql="select * from etatcom ";
    return executeSelect($sql);
}

function findAllCommandesByClientId(int $filtre,$id,$debut=0):array{
   
    $sql="select *,DATE_FORMAT(datec, '%d/%m/%Y') as datec from commande c, etatcom et,client cl where c.id= :id and c.idetat=et.idetat and c.id=cl.id";
   
    if ($filtre!=0) {
        $sql=$sql." and et.idetat=:filtre";
    }
     $sql=$sql." limit $debut,5";
    return executeSelect($sql,$filtre!=0?["id"=>$id,"filtre"=>$filtre]:["id"=>$id]);
}
function addCommande(array $ncom){
    $sql="insert into commande (datec, montant, idetat, id) VALUES (:datec,:montant,:idetat,:id)";
    executeUpdate($sql,$ncom);
}

function findLastCommandeId(){
    $sql="SELECT idc FROM `commande` ORDER BY `commande`.`datec` DESC LIMIT 1;";
    return executeSelect($sql,[],true);
}

function addavoir(array $ncom){
    $sql="insert into avoir (qtecmd, idc,ida) VALUES (:qtecmd,:idc,:ida)";
    executeUpdate($sql,$ncom);
}
function addToAvoir($idc,$table){ 
    foreach ($table as $key => $value) {
        $Navoir=[
            "qtecmd"=>$value["qte"],
            "idc"=>$idc,
            "ida"=>$value["ida"]
        ];
        addavoir($Navoir);
    }

}