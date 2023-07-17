<?php
include 'database_connection.php';
$lName  = $_POST['value'];
if (!preg_match("/^[a-zA-Z].*$/", $lName )) {
  echo "Doit commencer par une lettre a-z ou A-Z";
} else {
  echo "";
}
?>
