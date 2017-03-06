<?php
	session_start();
	if(!isset($_SESSION['membre'])){

		header('location:../connexion.php');

	}

		
?>