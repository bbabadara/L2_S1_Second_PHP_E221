<?php
function findAllClients(){
    $sql="select * from client ";
    return executeSelect($sql);
}

function verifPhone($tel){
    $sql="select telephone from client where telephone like :tel ";
    $recup=executeSelect($sql,["tel"=>$tel],true);
    return $recup;
}

function addClient(array $Nclient){
    $sql="insert into client (nom, prenom, telephone) values (:nom,:prenom,:telephone)";
    executeUpdate($sql,$Nclient);
}

function findClientByTel($tel){
    $sql="select * from client where telephone like :tel ";
    return executeSelect($sql,["tel"=>$tel],true); 
}