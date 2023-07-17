<?php
include 'database_connection.php';
$fName  = $_POST['value'];
if (!preg_match("/^[a-zA-Z].*$/", $fName)) {
  echo "Doit commencer par une lettre a-z ou A-Z";
} else {
  echo "";
}
?>
