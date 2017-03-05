<?php 
session_start(); 
require_once('admin/connexion_bdd.php');
 

if ($_POST) {
	$pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];
	
	$query = $bdd -> prepare("SELECT * FROM user WHERE pseudo = :pseudo && mdp = :mdp");
	$query -> bindParam(':pseudo',$pseudo, PDO::PARAM_STR);
	$query -> bindParam(':mdp',$mdp, PDO::PARAM_STR);
	$query -> execute();

	$userIsOk = $query -> rowCount();

	if ($userIsOk) {
		
		$_SESSION['membre'] = $query -> fetch(PDO::FETCH_ASSOC);

		header('location:admin/membre.php');
	}else{
		echo "<div class='error'>Identifiants incorrectes !</div>";
	}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connexion</title>
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="framework/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>

<section>
<header id="header_connexion">Connexion</header>
<form id="form-connexion" action="" method="POST">
	<label>Pseudo</label><br>
	<input type="text" name="pseudo"><br><br>

	<label>Mot de passe</label><br>
	<input type="password" name="mdp"><br><br>

	<input name="connexion" type="submit" value="Connexion">
</form>
