<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
    <form action="register_check.php" method="post">
        <h1>Registration</h1>
        <label for="fName">First Name:</label>
        <input type="text" id="fName" name="fName" required>
        <label for="lName">Last Name:</label>
        <input type="text" id="lName" name="lName" required>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Register">
        <p>Already registered? <a href="signin.php">Sign In</a></p>
    </form>
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo "<p class='error-message'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 900)) {
        session_unset();
        session_destroy();
    }
    ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="validate.js"></script>

</body>
</html>
