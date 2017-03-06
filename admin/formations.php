<?php 	
	session_start();
	require("connexion_bdd.php"); 
	/*require("inc/nav.inc.php");*/
?>
<?php
	if(isset($_POST['formations'])){
		if($_POST['formations'] != '' && $_POST['niveau'] != ''){
			$competence = addslashes($_POST['formations']);
			$niveau = addslashes($_POST['niveau']);

		$bdd -> exec("INSERT INTO formations VALUES (NULL, '$formations', '$niveau')");
		header("location: formations.php");
		exit();
		}
	}

	// Suppression d'une compétence
	if(isset($_GET['id_formations'])){
		$delete = $_GET['id_formations'];
		$sql = "DELETE FROM formations WHERE id_formations = '$delete'";
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
		$query = $bdd -> query("SELECT * FROM formations");
	?>

	<table id="formations" border="1">
		<thead>
			<th>Compétences</th>
			<th>Niveau</th>
			<th>Supprimer</th>
		</thead>
		<tr>		
			<?php while ($ligne = $query->fetch()) { ?>
			<td><?php echo $ligne['formations']; ?></td>
			<td><?php echo $ligne['niveau']; ?></td>
			<td><a href="modifier_f.php?id_formations=<?php echo $ligne['id_formations']; ?>">Modifier</a></td>
			<td><a href="formations.php?id_formations=<?php echo $ligne['id_formations']; ?>">Supprimer</a></td>
		</tr>
		<?php } ?>	

	</table>
</body>	
	
<!-- <?php require("inc/footer.inc.php"); ?> -->