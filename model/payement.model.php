<?php
function findPayementByClientId($id){
    $sql="SELECT c.*, SUM(montantp) as verser,(c.montant-SUM(montantp)) as restant FROM `payement` p,`commande` c,`client`cl WHERE c.id=cl.id AND cl.id=:id AND c.idc=p.idc GROUP BY p.idc HAVING verser<c.montant;";
    return executeSelect($sql,["id"=>$id]); 
}

function findAllMode( ){
    $sql="select *  from mode ";
    return executeSelect($sql);
}