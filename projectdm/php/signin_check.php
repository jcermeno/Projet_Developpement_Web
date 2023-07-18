<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kidsGames";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username_input = mysqli_real_escape_string($conn, $_POST['username']);
$password_input = $_POST['password'];

$sql = "SELECT p.userName, a.passCode 
        FROM player p 
        JOIN authenticator a 
        ON p.registrationOrder = a.registrationOrder 
        WHERE p.userName = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username_input);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if (password_verify($password_input, $row["passCode"])) {
            $_SESSION["username"] = $username_input;
            $_SESSION['last_activity'] = time(); 
            header("Location: game.php");
        } else {
            $_SESSION["error"] = "Invalid username or password!";
            header("Location: signin.php");
        }
        
    }
} else {
    $_SESSION["error"] = "Invalid username or password!";
    header("Location: signin.php");
}
$conn->close();
?>
