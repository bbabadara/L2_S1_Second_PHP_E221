<?php
function ouvrirConnexion(){

}

function fermerConnexion(){
    
}

function executeSelect(){
    
}

function executeUpdate(){
      
}



// Fonction pour établir une connexion à la base de données
function connect_to_database($servername, $username, $password, $dbname) {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        return null;
    }
}

// Fonction pour exécuter une requête SQL avec des paramètres
function execute_query($conn, $sql, $params = array()) {
    try {
        $statement = $conn->prepare($sql);
        $statement->execute($params);
        return $statement;
    } catch(PDOException $e) {
        echo "Erreur lors de l'exécution de la requête : " . $e->getMessage();
        return null;
    }
}

// Fonction pour fermer une connexion à la base de données
function close_connection($conn) {
    $conn = null;
}

// Exemple d'utilisation :

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "bd-php-updated";

$conn = connect_to_database($servername, $username, $password, $dbname);

if ($conn) {
    $login = $_POST['login']; // Supposons que vous récupériez les données du formulaire
    $pwd = $_POST['password'];
    
    $sql = "SELECT idet, nomet, prenomet, matricule, nomp AS role FROM users u 
            INNER JOIN profil p ON u.idp = p.idp 
            WHERE loginet = :login AND mdp = :password";
    
    $params = array(':login' => $login, ':password' => $pwd);
    
    $statement = execute_query($conn, $sql, $params);
    
    if ($statement) {
        $data = $statement->fetch();
        // Traitement des données récupérées
        // ...
        
        // Fermeture de la connexion
        close_connection($conn);
    }
}
