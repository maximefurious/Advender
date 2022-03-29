<?php
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("location: ../membre/login.php");
	exit;
}
$bdd = new PDO('mysql:host=217.182.207.90;dbname=DBuser2','user2', 'Lyceepassword29');
$pts = $_POST['points'];

if(isset($pts)) {

	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>ajax</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/sombre.css">
		<meta http-equiv="refresh" content="1;URL=http://nsi3.lycee-serusier.fr/advender/classement.php">
	</head>
	<body>
		<div class="grid">
			<h1>Votre score actuel</h1>
			<center><h2>
				<!-- afficher tous les membre -->
				<?php
				$id = $_SESSION["id"];
				$recupUser = $bdd->query("SELECT * FROM users WHERE id = '$id'");
				while ($user = $recupUser->fetch()) {
					$sommeScore = $user['score']+$pts;
					?>
					<p><?= $sommeScore; ?> </p>
					<?php
				}
				$ajoutScore = $bdd->prepare("UPDATE users  SET score ='$sommeScore' WHERE id = $id");
				$ajoutScore->execute();

				echo "Score à été mis à jour";

			}else{
				echo 'pas de données reçues';
			} 
			?>
			<!-- Fin d'afficher tous les membres -->
		</h2></center>
	</div>

</body>
</html>
