<?php
function findAllArticles( $debut=0){
    $sql="select *  from article ";
    $sql=$sql."limit $debut,5";
    return executeSelect($sql);
}

function findArticlesByCommandeId($id,$debut){
    $sql="select a.*  from article a, commande c, avoir av where c.idc=:id and a.ida=av.ida and c.idc=av.idc ";
    $sql=$sql."limit $debut,5";
    return executeSelect($sql,["id"=>$id]);
}

function findArticleByRef($ref){
    $sql="select *  from article Where libelle like :ref";
    return executeSelect($sql,["ref"=>$ref],true);
}