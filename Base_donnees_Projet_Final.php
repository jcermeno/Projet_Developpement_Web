<?php
/*
// Informations de connexion à la base de données
$servername = "localhost";
$username = "Christian";
$password = "";
$dbname = "Projet_Final_Christian";


// Fonction pour se connecter à la base de données
function connectToDatabase($servername, $username, $password ) {
    $conn = new mysqli($servername, $username, $password );
    if ($conn->connect_error) {
        return ["success" => false, "message" => "Échec de la connexion à la base de données: " . $conn->connect_error];
    } else {
        return ["success" => true, "message" => "Connexion réussie à la base de données"];
    }
}
$connection =  connectToDatabase($servername, $username, $password ) ;

//var_dump($connection);

*/

/*
// Création de la base de données si elle n'existe pas déjà
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "La base de données a gtété créée avec succès.<br>";
} else {
    echo "Erreur lors de la création de la base de données : " . $conn->error;
}

// Sélection de la base de données
$conn->select_db($dbname);
*/
/*
function createDatabase($conn, $dbname) {
    // Création de la base de données si elle n'existe pas déjà
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "La base de données a été créée avec succès.<br>";
    } else {
        echo "Erreur lors de la création de la base de données : " . $conn->error;
    }

    // Sélection de la base de données
    $conn->select_db($dbname);
}



/// Création de la table "player" si elle n'existe pas déjà
$sql = "CREATE TABLE IF NOT EXISTS player (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    fName VARCHAR(50) NOT NULL,
    lName VARCHAR(50) NOT NULL,
    userName VARCHAR(20) NOT NULL,
    registrationTime DATETIME,
    authenticator INT(11),
    passCode VARCHAR(255),
    registrationOrder INT
)";
if ($conn->query($sql) === TRUE) {
    echo "La table 'player' a été créée avec succès.<br>";
} else {
    echo "Erreur lors de la création de la table 'player' : " . $conn->error;
}

// Création de la table "authenticator" si elle n'existe pas déjà
$sql = "CREATE TABLE IF NOT EXISTS authenticator (
    passCode VARCHAR(255),
    registrationOrder INT
)";
if ($conn->query($sql) === TRUE) {
    echo "La table 'authenticator' a été créée avec succès.<br>";
} else {
    echo "Erreur lors de la création de la table 'authenticator' : " . $conn->error;
}

// Création de la table "history" si elle n'existe pas déjà
$sql = "CREATE TABLE IF NOT EXISTS history (
    id VARCHAR(200),
    fName VARCHAR(50),
    lName VARCHAR(50),
    scoreTime DATETIME,
    result ENUM('reussite', 'echec', 'incomplet'),
    livesUsed INT,
    registrationOrder INT
)";
if ($conn->query($sql) === TRUE) {
    echo "La table 'history' a été créée avec succès.<br>";
} else {
    echo "Erreur lors de la création de la table 'history' : " . $conn->error;
}

// Création de la table "score" si elle n'existe pas déjà
$sql = "CREATE TABLE IF NOT EXISTS score (
    scoreTime DATETIME,
    result ENUM('reussite', 'echec', 'incomplet'),
    livesUsed INT,
    registrationOrder INT
)";
if ($conn->query($sql) === TRUE) {
    echo "La table 'score' a été créée avec succès.<br>";
} else {
    echo "Erreur lors de la création de la table 'score' : " . $conn->error;
}
*/
/*
function sqlInsertCommand(){
    //Declare and Assign Values
    $Values = shareFormData('');
    $firstName = $Values['Christian'];
    $lastName = $Values['Ndione'];
    $userName = $Values ['ChristtianCharles'];
    $registrationTime =  $Values ['date(Y-m-d H:i:s)'];
    $authenticator = $Values ['123456789'];
    $passCode = $Values ['password_hash("password123", PASSWORD_DEFAULT)'];
    $registrationOrder = $Values ['1'];

    //Create queries
    $sqlCode['InsertInPlayer']="INSERT INTO Player (firstname, lastname, userName, registrationTime, authenticator, passCode, registrationOrder) VALUES ('$firstName', '$lastName', ' $userName', '$registrationTime', '$registrationTime', '$authenticator','$passCode', '$registrationOrder' );";
    //Return an array of queries
    return $sqlCode;

    
}
*/

/*

// Exemple d'insertion de données dans la table "player"
$firstName = "Christian";
$lastName = "Ndione";
$userName = "ChristtianCharles";
$registrationTime = date('Y-m-d H:i:s');
$authenticator = 123456789;
$passCode = password_hash("password123", PASSWORD_DEFAULT);
$registrationOrder = 1;

$sql = "INSERT INTO player (fName, lName, userName, registrationTime, authenticator, passCode, registrationOrder)
        VALUES ('$firstName', '$lastName', '$userName', '$registrationTime', '$authenticator', '$passCode', '$registrationOrder')";
        */
        /*

if ($conn->query($sql) === TRUE) {
    echo "Les données ont été insérées avec succès dans la table 'player'.<br>";
} else {
    echo "Erreur lors de l'insertion des données dans la table 'player' : " . $conn->error;
}

// Exemple de sélection des données de la table "player"
$sql = "SELECT * FROM player";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . ", Nom: " . $row["fName"] . " " . $row["lName"] . "<br>";
    }
} else {
    echo "Aucun résultat trouvé dans la table 'player'.";
    
}
*/
/*
// Exemple de mise à jour des données dans la table "player"

function updatePlayerData($conn, $newLastName, $playerId) {
    // Exemple de mise à jour des données dans la table "player"
    $sql = "UPDATE player SET lName = '$newLastName' WHERE id = $playerId";

    if ($conn->query($sql) === TRUE) {
        echo "Les données ont été mises à jour avec succès dans la table 'player'.<br>";
    } else {
        echo "Erreur lors de la mise à jour des données dans la table 'player' : " . $conn->error;
    }
}

*/
/*
// Exemple de mise à jour des données dans la table "player"
$newLastName = "Smith";
$playerId = 1;

$sql = "UPDATE player SET lName = '$newLastName' WHERE id = $playerId";

if ($conn->query($sql) === TRUE) {
    echo "Les données ont été mises à jour avec succès dans la table 'player'.<br>";
} else {
    echo "Erreur lors de la mise à jour des données dans la table 'player' : " . $conn->error;
}
*/
/*

function updatePlayerLastName($conn, $newLastName, $playerId) {
    // Exemple de mise à jour des données dans la table "player"
    $sql = "UPDATE player SET lName = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newLastName, $playerId);

    if ($stmt->execute()) {
        echo "Les données ont été mises à jour avec succès dans la table 'player'.<br>";
    } else {
        echo "Erreur lors de la mise à jour des données dans la table 'player' : " . $stmt->error;
    }

    $stmt->close();
}
// Assume you already have a valid database connection object named $conn

$newLastName = "Smith";
$playerId = 1;

updatePlayerLastName($conn, $newLastName, $playerId);




// Fermeture de la connexion
//$conn->close();

function closeMySQL($connection) {
    
   if (isset($connection)) {
            
           $connection->close();
        }
    }

?>
*/
/*

// Informations de connexion à la base de données
$servername = "localhost";
$username = "Christian";
$password = "";
$dbname = "Projet_Final_Christian";



function connectToDatabase($servername, $username, $password, $dbname) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        return ["success" => false, "message" => "Échec de la connexion à la base de données: " . $conn->connect_error];
    } else {
        return ["success" => true, "message" => "Connexion réussie à la base de données"];
    }
    //$connection =  connectToDatabase($servername, $username, $password ) ;

}

function createDatabase($conn, $dbname) {
    // Création de la base de données si elle n'existe pas déjà
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "La base de données a été créée avec succès.<br>";
    } else {
        echo "Erreur lors de la création de la base de données : " . $conn->error;
    }

    // Sélection de la base de données
    $conn->select_db($dbname);
}


var_dump($connection);


function createTable($conn, $table, $sql) {
    // Création de la table si elle n'existe pas déjà
    if ($conn->query($sql) === TRUE) {
        echo "La table '$table' a été créée avec succès.<br>";
    } else {
        echo "Erreur lors de la création de la table '$table' : " . $conn->error;
    }
}

function insertData($conn, $table, $sql) {
    // Insertion des données dans la table
    if ($conn->query($sql) === TRUE) {
        echo "Les données ont été insérées avec succès dans la table '$table'.<br>";
    } else {
        echo "Erreur lors de l'insertion des données dans la table '$table' : " . $conn->error;
    }
}

function selectData($conn, $table, $sql) {
    // Exemple de sélection des données de la table
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . ", Nom: " . $row["fName"] . " " . $row["lName"] . "<br>";
        }
    } else {
        echo "Aucun résultat trouvé dans la table '$table'.";
    }
}

function updatePlayerLastName($conn, $newLastName, $playerId) {
    // Exemple de mise à jour des données dans la table "player"
    $sql = "UPDATE player SET lName = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $newLastName, $playerId);

    if ($stmt->execute()) {
        echo "Les données ont été mises à jour avec succès dans la table 'player'.<br>";
    } else {
        echo "Erreur lors de la mise à jour des données dans la table 'player' : " . $stmt->error;
    }

    $stmt->close();
}

function closeConnection($conn) {
    if ($conn) {
        $conn->close();
    }
}




// Connexion à la base de données
$connection = connectToDatabase($servername, $username, $password, $dbname);

if ($connection["success"]) {
    echo $connection["message"] . "<br>";

    // Création de la base de données
    createDatabase($connection, $dbname);
    

    // Création de la table "player"
    $playerTableSql = "CREATE TABLE IF NOT EXISTS player (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        fName VARCHAR(50) NOT NULL,
        lName VARCHAR(50) NOT NULL,
        userName VARCHAR(20) NOT NULL,
        registrationTime DATETIME,
        authenticator INT(11),
        passCode VARCHAR(255),
        registrationOrder INT
    )";
    createTable($connection, "player", $playerTableSql);

    // Création de la table "authenticator"
    $authenticatorTableSql = "CREATE TABLE IF NOT EXISTS authenticator (
        passCode VARCHAR(255),
        registrationOrder INT
    )";
    createTable($connection, "authenticator", $authenticatorTableSql);

    // Création de la table "history"
    $historyTableSql = "CREATE TABLE IF NOT EXISTS history (
        id VARCHAR(200),
        fName VARCHAR(50),
        lName VARCHAR(50),
        scoreTime DATETIME,
        result ENUM('reussite', 'echec', 'incomplet'),
        livesUsed INT,
        registrationOrder INT
    )";
    createTable($connection, "history", $historyTableSql);

    // Création de la table "score"
    $scoreTableSql = "CREATE TABLE IF NOT EXISTS score (
        scoreTime DATETIME,
        result ENUM('reussite', 'echec', 'incomplet'),
        livesUsed INT,
        registrationOrder INT
    )";
    createTable($connection, "score", $scoreTableSql);

    // Exemple de sélection des données de la table "player"
    $selectPlayerSql = "SELECT * FROM player";
    selectData($connection, "player", $selectPlayerSql);

    // Exemple de mise à jour des données dans la table "player"
    $newLastName = "Smith";
    $playerId = 1;
    updatePlayerLastName($connection, $newLastName, $playerId);

    // Fermeture de la connexion
    closeConnection($connection);
} else {
    echo $connection["message"];
}
*/





/*
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
?>

*/

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





