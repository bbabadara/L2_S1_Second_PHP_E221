<?php
function findAllCommandes(){
    $sql="select *,DATE_FORMAT(datec, '%d/%m/%Y') as datec from commande c,client cl, etatcom et where c.id=cl.id and c.idetat=et.idetat; ";
        $data=null;
       $servername = 'localhost';
       $username = 'gesarticle';
       $password = 'passer123';
       $dbname="article";
       try{
           $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
           $statement=$conn->query($sql);
           $data=$statement->fetchAll();  
       } catch(PDOException $e){
           echo "Erreur : " . $e->getMessage();
       }
    return $data;
}