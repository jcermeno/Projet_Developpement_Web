<?php
include 'database_connection.php';

$username = $_POST['username'];
$password = $_POST['psw'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

if (strlen($username) >= 8 && $password === $_POST['psw-repeat'] && preg_match("/^[a-zA-Z].*$/", $firstname) && preg_match("/^[a-zA-Z].*$/", $lastname)) {
  $result = $conn->query("SELECT * FROM users WHERE username='$username'");
  if ($result && $result->num_rows > 0) {
    echo "Nom d'utilisateur déjà pris";
  } else {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $conn->query("INSERT INTO users (username, password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')");
    header("Location: homepage.html");
  }
} else {
  echo "Il y a des erreurs dans le formulaire";
}
?>
