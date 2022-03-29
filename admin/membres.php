<?php
session_start();
$bdd = new PDO('mysql:host=217.182.207.90;dbname=DBuser2','user2', 'Lyceepassword29');
if(!$_SESSION['mdp']){
  header('Location: connexion.php');
  exit;
}

$allusers = $bdd->query("SELECT * FROM users ORDER BY username ASC");
if (isset($_GET['s']) AND !empty($_GET['s'])){
  $recherche = htmlspecialchars($_GET['s']);
  $allusers = $bdd->query("SELECT username FROM users WHERE username LIKE '%".$recherche."%' ORDER BY username ASC");

}

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/admin.css">
  <link rel="stylesheet" type="text/css" href="../css/nav.css">
  <title>Afficher les membres</title>
  <meta charset="utf-8">
</head>
<body>
  <!-- Debut menu nav header -->
  <div class="grid-container">
    <header class="header">
      <div class="header__search">
       <form method="GET">
        <input type="Search" name="s" class="header__input" placeholder="Search..." autocomplete="off" />
      </form>
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
  <main class="main">
   <center><div class="grid">
    <h1>Tous les membres</h1>
    <!-- afficher tous les membre -->
    <?php
    if($allusers->rowCount() > 0){
      ?>
      <?php
      while ($user = $allusers->fetch()) {		
       ?>
       <p class="overviewcard"><?= $user['username']; ?><a href="bannir.php?id=<?= $user['id']; ?>" class="danger" onclick='confirm("Voulez-vous vraiment supprimer cet utilisateur ? ")' >Bannir le membre</a></p><br>
       <?php
     }
   }else{
    ?>
    <p>Aucun utilisateur trouvé</p>
    <?php
  }
  ?>
  <!-- Fin d'afficher tous les membres -->
</div></center>
</main>	
<!-- Fin du contenu principal -->
<footer class="footer">
  <p><span class="footer__copyright">&copy;</span> 2021 RYM</p>
  <p>Fait avec amour grâce à <a href="../index.php" target="_blank" class="footer__signature">Señor Chang</a></p>
</footer>
</body>
</html>