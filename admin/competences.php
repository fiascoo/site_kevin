<?php 	
	session_start();
	require("connexion_bdd.php"); 
	/*require("inc/nav.inc.php");*/
?>
<?php
	if(isset($_POST['competence'])){
		if($_POST['competence'] != '' && $_POST['niveau'] != ''){
			$competence = addslashes($_POST['competence']);
			$niveau = addslashes($_POST['niveau']);

		$bdd -> exec("INSERT INTO competence VALUES (NULL, '$competence', '$niveau')");
		header("location: competences.php");
		exit();
		}
	}

	// Suppression d'une compétence
	if(isset($_GET['id_competence'])){
		$delete = $_GET['id_competence'];
		$sql = "DELETE FROM competence WHERE id_competence = '$delete'";
		$bdd -> query($sql);
	}
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
	<h1>Les compétences</h1>
	<form id="formulaire" action="competences.php" method="post">
		<label>Compétences</label><br>
		<input class="competence" type="text" name="competence"><br>

		<label>Niveau</label><br>
		<input class="titre_competence" type="text" name="niveau" placeholder="Notions, début, intermédiaire, confirmé"><br>

		<input class="submit" type="submit" value="Insérer une nouvelle compétence">

	</form>

	<?php 
		$query = $bdd -> query("SELECT * FROM competence");
	?>

	<table id="competences" border="1">
		<thead>
			<th>Compétences</th>
			<th>Niveau</th>
			<th>Supprimer</th>
		</thead>
		<tr>		
			<?php while ($ligne = $query->fetch()) { ?>
			<td><?php echo $ligne['competence']; ?></td>
			<td><?php echo $ligne['niveau']; ?></td>
			<td><a href="modifier_c.php?id_competence=<?php echo $ligne['id_competence']; ?>">Modifier</a></td>
			<td><a href="competences.php?id_competence=<?php echo $ligne['id_competence']; ?>">Supprimer</a></td>
		</tr>
		<?php } ?>	

	</table>
</body>
	
