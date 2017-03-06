<?php 
	session_start();
	require('connexion_bdd.php'); 
	
	$id_experience = $_GET['id_experience'];	
		
	if($_POST){
	
		$experience = $_POST['experience'];
		$description = $_POST['description'];
		$dates = $_POST['dates'];
		$lieu = $_POST['lieu'];

		$update = $bdd -> query("UPDATE experience SET  experience = '$experience', description = '$description', dates = '$dates', lieu = '$lieu' WHERE id_experience = '$id_experience' ");
		header('location: experience.php');
	}

?>
<?php /*require_once('inc/nav.inc.php')*/ ?> 

<?php 
	$query = $bdd -> query("SELECT * FROM experience WHERE id_experience = '$id_experience' ");
	$ligne_e = $query -> fetch();
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
	<h1>Modification des expériences</h1>

	<form id="formulaire" method="post">
		<label>Titre du poste</label><br>
		<input class="experiences" type="text" name="experience" value="<?= $ligne_e['experience']; ?>" ><br>

		<label>Activités et responsabilités</label><br>
		<textarea id="editor1" type="text" name="description"><?= $ligne_e['description']; ?></textarea><br>
		<script>
			CKEDITOR.replace('editor1');
		</script>

		<label>Dates de début et de fin</label><br>
		<input class="dates" type="text" name="dates" value="<?= $ligne_e['dates']; ?>"><br>

		<label>Lieu</label><br>
		<input class="lieu" type="text" name="lieu" value="<?= $ligne_e['lieu']; ?>"><br>
		<input class="submit" type="submit" name="modifier" value="Modifier">

	</form>
</body>
 <?php /*require_once('inc/footer.inc.php')*/ ?>