<?php 
session_start();
if(!$_SESSION['mdp']){
  header('Location: connexion.php');
  exit;
}	


?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
  <title>Home</title>
  <meta charset="utf-8">
</head>
<body>
  <div class="grid-container">
    <header class="header">
      <div class="header__search">
        <input class="header__input" placeholder="Search..." />
      </div>
      <div class="header__avatar"></div>
    </header>

    <!-- Fin menu nav header -->

    <!-- Debut sidebar menu -->
    <aside class="sidenav">
      <div class="sidenav__brand">
        <a class="sidenav__brand-link" href="../index.php">Ad<span class="text-light">vender</span></a>
      </div>
      <div class="sidenav__profile">
        <div class="sidenav__profile-avatar"></div>
        <div class="sidenav__profile-title text-light">Señor Chang</div>
      </div>
      <div class="row row--align-v-center row--align-h-center">
        <ul class="navList">
          <li class="navList__heading">Admin</li>
          <li class="sidenav__list-item"><a href="index.php">Dashboard</a></li>
          <li class="sidenav__list-item"><a href="membres.php">Membres</a></li>
          <li class="sidenav__list-item"><a href="../calendrier/index.php">calendrier</a></li>
          <li class="sidenav__list-item"><a href="../secret/tetris/index.html">Tetris</a></li>
          <li class="sidenav__list-item"><a href="../secret/flappybird/index.html">Flappybird</a></li>
        </ul>
      </div>    
    </aside>
    <!-- Fin sidebar menu -->

    <!-- Debut du contenu principal -->
    <main class="main"></main>
    <!-- Fin du contenu principal -->
    <footer class="footer">
      <p><span class="footer__copyright">&copy;</span> 2021 RYM</p>
      <p>Fait avec amour grâce à <a href="../index.php" target="_blank" class="footer__signature">Señor Chang</a></p>
    </footer>
  </body>
  </html>