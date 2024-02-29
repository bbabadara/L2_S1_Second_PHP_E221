<?php
function openConnexion(){
    $data=null;
    $servername = 'localhost';
    $username = 'gesarticle';
    $password = 'passer123';
    $dbname="article";
    $conn=null;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        
    }

}

function closeconnection($conn){
    $conn= null;
}

function executeSelect(string $sql,array $data=[],$one=false) {
        $result=null;
        $conn=openConnexion();
        $statement = $conn->prepare($sql);
      count($data)==0?$statement->execute():$statement->execute($data);
      $result=$one==true?$statement->fetch():$statement->fetchAll();
        closeconnection($conn);
        return $result ;
  
}

function executeUpdate(string $sql,array $data){
    $conn=openConnexion();
        $statement = $conn->prepare($sql);
        $statement->execute($data);
   closeconnection($conn);
}

