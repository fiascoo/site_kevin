<?php
	session_start();
	require('connexion_bdd.php');

    $id_competence = $_GET['id_competence'];
	

	if($_POST){

		$niveau = $_POST['niveau'];
		$competence = $_POST['competence'];

		$update = $bdd->query("UPDATE competence SET competence = '$competence', niveau = '$niveau' WHERE id_competence = '$id_competence'  ");
		header('location: competences.php');
	}


	$query = $bdd -> query("SELECT * FROM competence WHERE id_competence = '$id_competence' ");
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
		<label>Compétence</label><br>
		<input class="competence" type="text" name="competence" value="<?= $ligne_c['competence'] ?>"><br>

		<label>Niveau</label><br>
		<input class="niveau" type="text" name="niveau" value="<?= $ligne_c['niveau'] ?>"><br>

		<input class="submit" type="submit" value="Mettre à jour">
	</form>
</body>
</html>
