<?php

$bdd = new PDO('mysql:host=217.182.207.90;dbname=DBuser2','user2', 'Lyceepassword29');

$requete = $bdd->query("SELECT * FROM users ORDER BY score DESC");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>classement</title>
  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <link rel="stylesheet" type="text/css" href="css/classement.css">
  <link rel="stylesheet" type="text/css" href="css/sombre.css">
</head>
<style>
  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  #customers td, #customers th {
    border: 1px solid #f1f1f1;
    padding: 8px;
  }

  #customers tr:hover {background-color: #ddd;}

  #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #333;
    color: #f1f1f1;
  }
</style>
<body>
  <nav>
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li><a href="confidentialite.html">confidentialité</a></li>
      <li><a href="contact.html">contact</a></li>
      <li><a href="parametre.html">Paramètre</a></li>
      <li><a href="membre/login.php">Profil</a></li>
    </ul>
  </nav>
  <div class="grid">
    <center><h1>Classement</h1></center>
    <table id="customers">
      <thead>
        <tr>
          <th>username</th>
          <th>score</th>
        </tr>
      </thead>
      <?php
      while($resultat = $requete->fetch())
      {
        ?>
        <tbody>
          <tr>
            <td><?php echo $resultat['username']; ?></td>
            <td><?php echo $resultat['score']; ?></td>
          </tr>
        </tbody>
        <?php
      }
      ?>
    </table>
  </div>       
</body>
</html>