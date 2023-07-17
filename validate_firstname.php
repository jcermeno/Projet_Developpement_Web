<?php
include 'database_connection.php';
$firstname = $_POST['value'];
if (!preg_match("/^[a-zA-Z].*$/", $firstname)) {
  echo "Doit commencer par une lettre a-z ou A-Z";
} else {
  echo "";
}
?>
