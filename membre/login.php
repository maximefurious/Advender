<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }

// Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

// Validate credentials
    if(empty($username_err) && empty($password_err)){
    // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
        // Set parameters
            $param_username = $username;
            
        // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
            // Store result
                mysqli_stmt_store_result($stmt);
                
            // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                        // Password is correct, so start a new session
                            session_start();
                            
                        // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                        // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                        // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

        // Close statement
            mysqli_stmt_close($stmt);
        }
    }

// Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
    <link rel="stylesheet" type="text/css" href="../css/sombre.css">
    <link rel="stylesheet" type="text/css" href="../css/contact.css">
</head>
<body>
    <nav>
      <ul>
        <li><a href="../index.php">Accueil</a></li>
        <li><a href="../confidentialite.html">confidentialité</a></li>
        <li><a href="../contact.html">contact</a></li>
        <li><a href="../parametre.html">Paramètre</a></li>
        <li><a href="../membre/login.php">Profil</a></li>
    </ul>
</nav>
<div class="wrapper">
    <?php 
    if(!empty($login_err)){
        echo '<div class="alert alert-danger">' . $login_err . '</div>';
    }        
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h1>Login</h1>
        <label>Username</label>
        <input type="text" name="username" placeholder="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
        <span class="invalid-feedback"><?php echo $username_err; ?></span>
        <label>Password</label>
        <input type="password" name="password" placeholder="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
        <span class="invalid-feedback"><?php echo $password_err; ?></span>
        <input type="submit" class="btn btn-primary" value="Login">
        <p>Pas de compte ? <a href="register.php">Enregistez-vous !</a></p>
    </form>
</div>

<style type="text/css">
    .wrapper{
        width: 600px;
        height: auto;
        margin: 0 auto;
        background-color: #fff;
        padding: 10px 50px 50px 50px;
        border-radius: 1.5em;
        box-shadow:0px 11px 35px 2px rgba(0,0,0,0.14);
    }

    .wrapper h1{
        font-family: "sans-serif";
        background-color: #ffffff;
        font-size: 60px;
        text-align: center;
        color: #c8bfca;
        padding: 2px 0px;
    }

    .wrapper input[type=text], input[type=password] {
        border-radius: 0.5em;
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .wrapper input[type=submit] {
        border-radius: 0.5em;
        background-color: #333;
        color: #fff;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    .wrapper input[type=submit]:hover {
        background-color: #fff;
        color: #333;
        border: 1px solid #333;
    }
</style>
</body>
</html>