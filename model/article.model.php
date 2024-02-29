<?php
function findAllArticles(){
    $sql="select *  from article ";
    return executeSelect($sql);
}

function findArticlesByCommandeId($id){
    $sql="select a.*  from article a, commande c, avoir av where c.idc=:id and a.ida=av.ida and c.idc=av.idc ";
    return executeSelect($sql,["id"=>$id]);
}

function findArticleByRef($ref){
    $sql="select *  from article Where libelle like':ref'";
    return executeSelect($sql,["ref"=>$ref],true);
}