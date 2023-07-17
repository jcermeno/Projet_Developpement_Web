<?php
include 'database_connection.php';
$userName  = $_POST['value'];
if (strlen($userName ) < 8) {
  echo "Doit contenir au moins 8 caractères";
} else {
  $result = $conn->query("SELECT * FROM users WHERE username='$userName '");
  if ($result && $result->num_rows > 0) {
    echo "Nom d'utilisateur déjà pris";
  } else {
    echo "";
  }
}
?>
