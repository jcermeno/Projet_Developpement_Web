 <?php
    session_start();

    
    $_SESSION['start'] = time();

    
    $inactive = 900;

    
    if (isset($_SESSION['start']) && time() - $_SESSION['start'] > $inactive) {
        
        session_unset();
        session_destroy();
    }

    include('dbConfig.php');

    
    $username = $password = "";
    $username_err = $password_err = "";

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }

      
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }

      
        if (empty($username_err) && empty($password_err)) {
           
            $sql = "SELECT registrationOrder, userName, passCode FROM player JOIN authenticator ON player.registrationOrder = authenticator.registrationOrder WHERE userName = ?";

            if ($stmt = mysqli_prepare($link, $sql)) {
               
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                
                $param_username = $username;

                
                if (mysqli_stmt_execute($stmt)) {
                    
                    mysqli_stmt_store_result($stmt);

                    
                    if (mysqli_stmt_num_rows($stmt) == 1) {                    
                        
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {
                                
                                session_start();

                                
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;                            

                                
                                header("location: welcome.php");
                            } else {
                                
                                $password_err = "The password you entered was not valid.";
                            }
                        }
                    } else {
                        
                        $username_err = "No account found with that username.";
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                
                mysqli_stmt_close($stmt);
            }
        }

        
        mysqli_close($link);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="../css/styles.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="wrapper">
            <h1>Login</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>    
                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
            </form>
        </div>    
    </body>
</html> 
