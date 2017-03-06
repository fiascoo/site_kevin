<?php 
    session_start();
    require('connexion_bdd.php'); ?>

<?php
   
    if (isset($_POST['experience'])) {
        if (!empty($_POST['experience']) && !empty($_POST['description']) && !empty($_POST['dates']) && !empty($_POST['lieu'])) {
            $experience = addslashes($_POST['experience']);
            $description = addslashes($_POST['description']);
            $dates = addslashes($_POST['dates']);
            $lieu = addslashes($_POST['lieu']);

        $bdd -> exec("INSERT INTO experience VALUES (NULL, '$experience', '$description', '$lieu', '$dates','')");
        header("location: experience.php");
        exit();
        }
    }

    // Suppression d'une expérience
    if (isset($_GET['id_experience'])) {
        $delete = $_GET['id_experience'];
        $sql = "DELETE FROM experience WHERE id_experience = '$delete' ";
        $bdd -> query($sql);
    }

?>

<?php /*require("inc/nav.inc.php");*/  ?>
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
    <h1>Les expériences</h1>

    <form id="formulaire" method="post" action="experience.php">
        <label>Titre du poste</label><br>
        <input class="experiences" type="text" name="experience" placeholder="Développeur / Intégrateur web"><br>

        <label>Activités et responsabilités</label><br>
        <textarea class="description" type="text" name="description" placeholder="Activités exercées / tâches effectués..."></textarea><br>

        <label>Dates début et fin</label><br>
        <input class="dates" type="text" name="dates" placeholder="xx/xx/xxxx"><br>

        <label>Lieu</label><br>
        <input class="lieu" type="text" name="lieu" placeholder="Paris"><br>

        <input class="submit" type="submit" value="Insérer une nouvelle experience">
    </form>

    <?php
        $query = $bdd -> query("SELECT * FROM experience");
    ?>

    <table id="experience" border="1">
        <thead>
            <th>Experience</th>
            <th>Activité / Responsabilité</th>
            <th>Lieu</th>
            <th>Dates</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tr>
            <?php while ($ligne = $query -> fetch()) { ?>
            <td><?php echo $ligne['experience']; ?></td>
            <td><?php echo $ligne['description']; ?></td>
            <td><?php echo $ligne['lieu']; ?></td>
            <td><?php echo $ligne['dates']; ?></td>
            <td><a href="modifier_e.php?id_experience=<?php echo $ligne['id_experience']; ?>">Modifier</i></a></td>
            <td><a href="experience.php?id_experience=<?php echo $ligne['id_experience']; ?>">Supprimer</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

