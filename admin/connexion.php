<?php 
session_start();
if(isset($_POST['valider'])) {
	if (!empty($_POST['pseudo']) AND !empty($_POST['mdp'])) {
		$pseudo_par_defaut = 'admin';
		$mdp_par_defaut = 'admin1234';

		$pseudo_saisi = htmlspecialchars($_POST['pseudo']);
		$mdp_saisi = htmlspecialchars($_POST['mdp']);

		if($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
			$_SESSION['mdp'] = $mdp_saisi;
			header('Location: index.php');
			exit;
		}else{
			echo "Votre mdp ou pseudo est incorrect";
		}
	}else{
		echo "Veuillez compléter tous les champs...";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Espace de connexion admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/nav.css">
	<link rel="stylesheet" type="text/css" href="../css/contact.css">
	<link rel="stylesheet" type="text/css" href="../css/sombre.css">
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
	<div class="grid">
		<h1>Connecte toi !</h1>
		<form method="POST" action="">
			<label>Pseudo:</label>
			<input type="text" name="pseudo" placeholder="Pseudo" autocomplete="off">

			<label>Mot de passe:</label>
			<input type="password" name="mdp" placeholder="Password">

			<input type="submit" name="valider">
		</form>
	</div>
</body>
</html>