<?php
include 'database_connection.php';
$username = $_POST['value'];
if (strlen($username) < 8) {
  echo "Doit contenir au moins 8 caractères";
} else {
  $result = $conn->query("SELECT * FROM users WHERE username='$username'");
  if ($result && $result->num_rows > 0) {
    echo "Nom d'utilisateur déjà pris";
  } else {
    echo "";
  }
}
?>
