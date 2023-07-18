<?php

session_start();



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kidsgames";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$fName = $conn->real_escape_string($_POST['fName']);
$lName = $conn->real_escape_string($_POST['lName']);
$username_input = $conn->real_escape_string($_POST['username']);
$password_input = $conn->real_escape_string($_POST['password']);


$sql = "SELECT * FROM player WHERE userName='$username_input'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $_SESSION['error'] = "Username already exists!";
    header("Location: register.php");
    exit();
}


$hashed_password = password_hash($password_input, PASSWORD_DEFAULT);


$sql = "INSERT INTO player (fName, lName, userName, registrationTime) VALUES ('$fName', '$lName', '$username_input', NOW())";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    
    $sql = "INSERT INTO authenticator (passCode, registrationOrder) VALUES ('$hashed_password', '$last_id')";
    if ($conn->query($sql) === TRUE) {
        
        header("Location: ../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
 
}

$conn->close();
?>
