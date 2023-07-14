<?php

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kidsGames";

// Fonction pour se connecter à la base de données
function connectToDatabase($servername, $username, $password, $dbname) {
    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }

    $conn->select_db($dbname);
    return $conn;
}

$connection = connectToDatabase($servername, $username, $password, $dbname);

function createDatabase($conn, $dbname) {
    // Création de la base de données si elle n'existe pas déjà
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "La base de données a été créée avec succès.<br>";
    } else {
        echo "Erreur lors de la création de la base de données : " . $conn->error;
    }
}

// Création de la base de données
createDatabase($connection, $dbname);

function sqlCommands($conn) {
    // Création des tables
    $sqlCode['createTab1'] = "CREATE TABLE IF NOT EXISTS player(
        fName VARCHAR(50) NOT NULL, 
        lName VARCHAR(50) NOT NULL, 
        userName VARCHAR(20) NOT NULL UNIQUE,
        registrationTime DATETIME NOT NULL,
        id VARCHAR(200) GENERATED ALWAYS AS (CONCAT(UPPER(LEFT(fName,2)),UPPER(LEFT(lName,2)),UPPER(LEFT(userName,3)),CAST(registrationTime AS SIGNED))),
        registrationOrder INTEGER AUTO_INCREMENT,
        PRIMARY KEY (registrationOrder)
    ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

    $sqlCode['createTab2'] = "CREATE TABLE IF NOT EXISTS authenticator(   
        passCode VARCHAR(255) NOT NULL,
        registrationOrder INTEGER, 
        FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
    ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

    $sqlCode['createTab3'] = "CREATE TABLE IF NOT EXISTS score( 
        scoreTime DATETIME NOT NULL, 
        result ENUM('réussite', 'échec', 'incomplet'),
        livesUsed INTEGER NOT NULL,
        registrationOrder INTEGER, 
        FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
    ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

    // Exécution des requêtes de création des tables
    foreach ($sqlCode as $query) {
        if ($conn->query($query) === TRUE) {
            echo "Requête exécutée avec succès.<br>";
        } else {
            echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
        }
    }

    // Création de la vue history
    $sqlCode['createView'] = "CREATE OR REPLACE VIEW history AS
        SELECT s.scoreTime, p.id, p.fName, p.lName, s.result, s.livesUsed 
        FROM player p, score s
        WHERE p.registrationOrder = s.registrationOrder";

    // Exécution de la requête de création de la vue
    if ($conn->query($sqlCode['createView']) === TRUE) {
        echo "Requête exécutée avec succès.<br>";
    } else {
        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($conn);
    }
}

// Exécution des commandes SQL
sqlCommands($connection);

function sqlInsertCommand($values){
    //Declare and assign values
    $fn = $values['fname'];
    $ln = $values['lname'];
    $eml = $values['email'];
    //Create queries
    $sqlCode['InsertInplayer'] = "INSERT INTO player (fName, lName, userName) VALUES ('$fn', '$ln', '$eml');";
    //Return an array of queries
    return $sqlCode;
}

function executeSqlQuery($connection, $query){
    //Execute the query
    $invokeQuery = $connection->query($query);
    //If data insertion to the table failed, save the system error message  
    if ($invokeQuery === FALSE){
        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($connection);
        return FALSE;
    } else {
        return $invokeQuery;
    }
}

function displaySelectData($query){
    //Calculate the number of rows available
    $number_of_rows = $query->num_rows;
    //Use a loop to display the rows one by one
    echo "<table>";
    echo "<tr><td>ID</td><td>First Name</td><td>Last Name</td><td>Email</td></tr>";
    for ($j = 0; $j < $number_of_rows; ++$j) {
        echo "<tr>";
        //Assign the records of each row to an associative array
        $each_row = $query->fetch_array(MYSQLI_ASSOC);
        //Display each the record corresponding to each column
        foreach ($each_row as $item)
            echo "<td>" . $item . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

function disconnectFromDBMS($connection){
    $disconnectDBMS = $connection->close();
    if ($disconnectDBMS === FALSE){
        echo "Erreur lors de la déconnexion de la base de données : " . mysqli_error($connection);
        return FALSE;
    }
    return TRUE;
}

// Insertion des données de test dans les tables
function insertDummyData($connection) {
    $dummyData['player'] = "INSERT INTO player(fName, lName, userName, registrationTime)
        VALUES('Patrick','Saint-Louis', 'sonic12345', NOW()),
        ('Marie','Jourdain', 'asterix2023', NOW()),
        ('Jonathan','David', 'pokemon527', NOW())";

$dummyData['authenticator'] = "INSERT INTO authenticator(passCode, registrationOrder)
VALUES('$2y$10/3mMZl7tn8wnZrJ1ddidYfVYW', 1),
('$2y$10.x2ft6Qo9h..xmtm82lmSuv/vaQKs9xPJ4rhKlMJAF.', 2),
('$2y$10.TYEEmbOHF4JfeiBCdWFHcqRTILM7nF/7CPjE3dNEWj3W', 3)";


    $dummyData['score'] = "INSERT INTO score(scoreTime, result, livesUsed, registrationOrder)
        VALUES(NOW(), 'réussite', 4, 1),
        (NOW(), 'échec', 6, 2),
        (NOW(), 'incomplet', 5, 3)";

    foreach ($dummyData as $tableName => $query) {
        if ($connection->query($query) === TRUE) {
            echo "Données insérées avec succès dans la table $tableName.<br>";
        } else {
            echo "Erreur lors de l'insertion des données dans la table $tableName : " . mysqli_error($connection);
        }
    }
}

// Insertion des données de test
insertDummyData($connection);

// Fermeture de la connexion à la base de données
//disconnectFromDBMS($connection);

function disconnectToDBMS($connection){
    $disconnectDBMS = $connection->close();
}

?>





