<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kidsgames";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['username_check'])) {
    $username_input = $conn->real_escape_string($_POST['username']);

    $sql = "SELECT * FROM player WHERE userName='$username_input'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "exists";
    } else {
        echo "not_exists";
    }
}

$conn->close();
?>
