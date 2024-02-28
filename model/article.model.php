<?php
function findAllArticles(){
    $sql="select *  from article ";
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

function findArticlesByCommandeId($id){
    $sql="select a.*  from article a, commande c, avoir av where c.idc=$id and a.ida=av.ida and c.idc=av.idc ";
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

function findArticleByRef($ref){
    $sql="select *  from article Where libelle like'$ref'";
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