<?php
function findAllClients(){
    $sql="select * from client ";
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
           $conn==null;
           $statement==null; 
       } catch(PDOException $e){
           echo "Erreur : " . $e->getMessage();
       }
    return $data;
}

function verifPhone($tel){
    $sql="select telephone from client where telephone like $tel ";
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
           $data=$statement->fetch(); 
           $conn==null;
           $statement==null; 
       } catch(PDOException $e){
           echo "Erreur : " . $e->getMessage();
       }
    return $data;
}

function AddClient(array $Nclient){
    $sql="insert into client (nom, prenom, telephone) values (:nom,:prenom,:telephone)";
       $servername = 'localhost';
       $username = 'gesarticle';
       $password = 'passer123';
       $dbname="article";
       try{
           $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
           $statement=$conn->prepare($sql);
           $statement->execute($Nclient); 
           $conn==null;
           $statement==null; 
       } catch(PDOException $e){
           echo "Erreur : " . $e->getMessage();
       }
}