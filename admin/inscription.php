<?php require_once('connexion_bdd.php'); 


if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
	$query = $bdd -> prepare("INSERT INTO user (nom, prenom, pseudo, email, tel, mdp, avatar, age, sexe, etat_civil, statut, adresse, code_postal, ville, pays) VALUES(:nom, :prenom, :pseudo, :email, :tel, :mdp, :avatar, :age, :sexe, :etat_civil, :statut, :adresse, :code_postal, :ville, :pays) ");
	$query -> bindParam(':nom',$_POST['nom'], PDO::PARAM_STR);
	$query -> bindParam(':prenom',$_POST['prenom'], PDO::PARAM_STR);
	$query -> bindParam(':pseudo',$_POST['pseudo'], PDO::PARAM_STR);
	$query -> bindParam(':email',$_POST['email'], PDO::PARAM_STR);
	$query -> bindParam(':tel',$_POST['tel'], PDO::PARAM_STR);
	$query -> bindParam(':mdp',$_POST['mdp'], PDO::PARAM_STR);
	$query -> bindParam(':avatar',$_POST['avatar'], PDO::PARAM_STR);
	$query -> bindParam(':age',$_POST['age'], PDO::PARAM_INT);
	$query -> bindParam(':sexe',$_POST['sexe'], PDO::PARAM_STR);
	$query -> bindParam(':etat_civil',$_POST['etat_civil'], PDO::PARAM_STR);
	$query -> bindParam(':statut',$_POST['statut'], PDO::PARAM_STR);
	$query -> bindParam(':adresse',$_POST['adresse'], PDO::PARAM_STR);
	$query -> bindParam(':code_postal',$_POST['code_postal'], PDO::PARAM_STR);
	$query -> bindParam(':ville',$_POST['ville'], PDO::PARAM_STR);
	$query -> bindParam(':pays',$_POST['pays'], PDO::PARAM_STR);

	$query -> execute();

	echo "<div class='success'>Vos données ont été envoyées avec succès !</div>";
}else{

	echo "<div class='alert alert-danger' role='alert'>
	 Erreur, l'inscription n'a pas pu aboutir </div>";
	
}

 ?>

<?php /*require_once('inc/nav.inc.php')*/ ?>
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
	<h1>Inscription</h1>
	<form method="POST">
		<label>Nom</label><br>
		<input type="text" name="nom"><br><br>

		<label>Prénom</label><br>
		<input type="text" name="prenom"><br><br>

		<label>Pseudo</label><br>
		<input type="text" name="pseudo"><br><br>

		<label>Mot de passe</label><br>
		<input type="password" name="mdp"><br><br>

		<label>Email</label><br>
		<input type="text" name="email"><br><br>

		<label>Téléphone</label><br>
		<input type="text" name="tel"><br><br>

		<label>Photo de profil</label><br>
		<input type="text" name="avatar"><br><br>

		<label>Age</label><br>
		<input type="text" name="age"><br><br>

		<label>Sexe</label><br>
		<select name="sexe" id="">
			<option value="h">Homme</option>
			<option value="f">Femme</option>
		</select><br><br>

		<label>Etat Civil</label><br>
		<input type="radio" name="etat_civil" value="M" checked>M.
		<input type="radio" name="etat_civil" value="Mme">Mme
		<input type="radio" name="etat_civil" value="Mlle">Mlle<br><br>

		<label>Statut</label><br>
		<input type="text" name="statut"><br><br>

		<label>Adresse</label><br>
		<input type="text" name="adresse"><br><br>

		<label>Code postal</label><br>
		<input type="text" name="code_postal"><br><br>

		<label>Ville</label><br>
		<input type="text" name="ville"><br><br>

		<label>Pays</label><br>
		<input type="text" name="pays"><br><br>

		<input type="submit" value="Inscription">
	</form>
</body>

<?php /*require_once('inc/footer.inc.php')*/ ?> 