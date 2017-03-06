<?php 
session_start(); 
require_once('connexion_bdd.php'); ?>

<?php 

if(isset($_SESSION['Auth'])){

	header('location:index.php');
}
if ($_POST) {
	$pseudo = $_POST['pseudo'];
	$mdp = $_POST['mdp'];
	
	$query = $bdd -> prepare("SELECT * FROM user WHERE pseudo = :pseudo && mdp = :mdp");
	$query -> bindParam(':pseudo',$pseudo, PDO::PARAM_STR);
	$query -> bindParam(':mdp',$mdp, PDO::PARAM_STR);
	$query -> execute();

	$userIsOk = $query -> rowCount();

	if ($userIsOk) {
		$_SESSION['Auth'] = $query -> fetch(PDO::FETCH_ASSOC);

		header('location:index.php');
	}else{
		echo "<div class='alert alert-danger' role='alert'>Identifiants incorrectes</div>";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Connexion</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>
<body>

<section>
<header>Connexion</header>
<form action="connexion.php" method="POST">
	<label>Pseudo</label><br>
	<input type="text" name="pseudo"><br><br>

	<label>Mot de passe</label><br>
	<input type="password" name="mdp"><br><br>

	<input name="connexion" type="submit" value="Connexion">
</form>
	
<?php /*require_once('inc/footer.inc.php')*/ ?>