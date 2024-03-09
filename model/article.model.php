<?php
function findAllArticles( $debut=0){
    $sql="select *  from article ";
    $sql=$sql."limit $debut,5";
    return executeSelect($sql);
}

function findAllArticlesNonPAgi( ){
    $sql="select *  from article ";
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

function findArticleByref1($ref,$all){
    foreach ($all as $value) {
        if ($value["libelle"]==$ref) {
            return $value;
        }
    }
   return false;
}

function updateQte($ref,&$all,$qte){
    //  dd($all);
    foreach ($all as $key => $value) {
        if ($value["libelle"]==$ref) {
             $all[$key]["qtestock"]=$all[$key]["qtestock"]-$qte;
             break;
            //  dd($value);
        }
    }
}

function  upgrateQteAfterRemove($ref,&$all,$qte){
    //  dd($all);
    foreach ($all as $key => $value) {
        if ($value["libelle"]==$ref) {
             $all[$key]["qtestock"]=$all[$key]["qtestock"]+$qte;
             break;
            //  dd($value);
        }
    }
}

function updateNcom($ref,&$all,$qte){
    foreach ($all as $key =>$value) {
        if ($value["libelle"]==$ref) {
             $all[$key]["qte"]=$all[$key]["qte"]+$qte;
             break;
            //  dd($value);
        }
    }
}


function updateArticleStock($stock,$ida){
$sql="UPDATE `article` SET qtestock=(qtestock-:stock) WHERE ida =:ida";
executeUpdate($sql,["stock"=>$stock,"ida"=>$ida]);
}

function updateArticleStock1($tab){
    foreach ($tab as $key => $value) {
        updateArticleStock($value["qte"],$value["ida"]);
    }
}