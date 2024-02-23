<?php
function findAllCommandes(){
    $sql="select *  from commande ";
        $data=null;
       $servername = 'localhost';
       $username = 'root';
       $password = '';
       $dbname="bd-php-com";
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