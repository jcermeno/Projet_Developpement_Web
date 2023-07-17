<?php
include 'database_connection.php';
$lastname = $_POST['value'];
if (!preg_match("/^[a-zA-Z].*$/", $lastname)) {
  echo "Doit commencer par une lettre a-z ou A-Z";
} else {
  echo "";
}
?>
