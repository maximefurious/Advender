<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="../css/sombre.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
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
    <center><h1 class="my-5">Bonjour, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b><br>Bienvenue sur notre site internet.</h1></center>
    <center><p>
        <a href="reset-password.php" class="btn btn-warning">réinitialisation du mot de passe</a>
        <a href="logout.php" class="btn btn-danger ml-3">déconnexion</a>
    </p></center>
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

    a.btn {
        margin-top: 20px;
        text-decoration: none;
        display: inline-block;
        width: auto;
        height: 25px;
        background: #333;
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        color: white;
        font-weight: bold;
        line-height: 25px;
    }

    a.btn:hover{
        background-color: #fff;
        color: #333;
        border: 1px solid #333;    
    }
</style> 
</body>
</html>