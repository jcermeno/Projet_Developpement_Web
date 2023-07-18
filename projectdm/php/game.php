<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: signin.php");
    exit;
}


if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 900)) {
    
    session_unset();     
    session_destroy();   
    header("Location: signin.php");
    exit;
}
$_SESSION['last_activity'] = time(); 
?>
<!DOCTYPE html>
<html>
<head>
    <title>Game</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Welcome to the Game, <?php echo $_SESSION['username']; ?>!</h1>
    <a href="../index.php">Logout</a>
   

    <script>
        setTimeout(function() {
            window.location.href = "signout.php";
        }, 900000);
    </script>
</body>
</html>
