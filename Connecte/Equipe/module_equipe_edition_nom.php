<?php				//				module_equipe_edition_nom.php

	session_start();
	include('../Model/module_de_base_pour_controller.php');

	if(isset($_SESSION['courante']) && isset($_POST['nom']))
	{
		$Gestionnaire = new Gestionnaire($bdd);
		$team = $Gestionnaire->equipeFromId($_SESSION['courante']);
		$nom =(string)$_POST['nom'];
		$_SESSION['changementNomEquipe'] = $Gestionnaire->changementNomEquipe($team, $nom);

		$_SESSION['idNouvelleEquipe'][] = $team->id();

		header("Location:../../index.php");
	}
	else
	{
		echo "<br />changement de nom impossible : Contacter le staff. <a href='../index.php'>Retour</a><br />";
	}
?>