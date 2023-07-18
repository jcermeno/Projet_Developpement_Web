<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" type="text/css" href=".././css/styles.css">
</head>
<body>
    <form action="signin_check.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Sign In">
    </form>
    <p>Not registered yet? <a href="register.php">Sign Up</a></p>
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo "<p>" . $_SESSION['error'] . "</p>";
        echo "<p><a href='password_reset.php'>Forgot your password? Reset it.</a></p>";
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 5)) {
        session_unset();
        session_destroy();
    }
    ?>
    <script>
        setTimeout(function() {
            window.location.href = "signout.php";
        }, 150000);
    </script>
</body>
</html>
