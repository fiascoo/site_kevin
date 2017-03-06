<?php 
	session_start();
	require('connexion_bdd.php'); 

	$id_formations = $_GET['id_formations'];		
	
	if($_POST){
			
		$formations = $_POST['formations'];
		$lieu = $_POST['lieu'];
		$dates = $_POST['dates'];

		$update = $bdd->query("UPDATE formations SET formations = '$formations', lieu = '$lieu', dates = '$dates' WHERE id_formations = '$id_formations'  ");
		header('location: formations.php');
	}

?>

 <?php /*require_once('inc/haut.inc.php')*/ ?> 

	<?php 
		$query = $bdd -> query("SELECT * FROM formations WHERE id_formations = '$id_formations' ");
		$ligne_c = $query -> fetch();
	?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Site CV</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
	<h1>Modification des compétences</h1>

	<form id="formulaire" method="post">
		<label>Formation</label><br>
		<input class="formations" type="text" name="formations" placeholder="Insérer une formation..." value="<?= $ligne_c['formations'] ?>"><br>

		<label>Lieu</label><br>
		<input class="lieu" type="text" name="lieu" value="<?= $ligne_c['lieu'] ?>"><br>

		<label>Date</label><br>
		<input class="dates" type="text" name="dates" value="<?= $ligne_c['dates'] ?>"><br>

		<input class="submit" type="submit" value="Mettre à jour">
	</form>
</body>
 <?php /*require_once('inc/bas.inc.php');*/ ?> 