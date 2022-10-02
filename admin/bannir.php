<?php
session_start();
$bdd = new PDO('mysql:host=...;dbname=...','...', '...');
if(!$_SESSION['mdp']){
	header('Location: connexion.php');
	exit;
}

if(isset($_GET['id']) AND !empty($_GET['id'])){
	$getid = $_GET['id'];
	$recupUser = $bdd->prepare('SELECT * FROM users WHERE id = ?');
	$recupUser->execute(array($getid));
	if($recupUser->rowCount() >0){

		$bannirUser = $bdd->prepare('DELETE FROM users WHERE id = ?');
		$bannirUser->execute(array($getid));

		header('Location: membres.php');

	}else{
		echo "Aucun membre n'a été trouvé";
	}
}else{
	echo "L'identifiant n'a pas été recupérer";
}

?>


