<?php		//		module_joueur_inscription.php

	session_start();
	include('../Model/module_de_base_pour_controller.php');

	if(isset($_SESSION['changementNomJoueur']))
	{
		unset($_SESSION['changementNomJoueur']);
	}
	if(isset($_SESSION['changementNomEquipe']))
	{
		unset($_SESSION['changementNomEquipe']);
	}
	if(isset($_SESSION['changementEtatJoueur']))
	{
		unset($_SESSION['changementEtatJoueur']);
	}

	if(isset($_POST['id_equip']) && isset($_SESSION['courante']))
	{
		$Gestionnaire = new Gestionnaire($bdd);
		$joueur = $Gestionnaire->joueurFromId($_SESSION['courante']);
		$team = $Gestionnaire->equipeFromId($_POST['id_equip']);

		$Gestionnaire->ajoutJoueur($team, $joueur);

		$_SESSION['idNouveauJoueurs'][] = $joueur->id();
		$_SESSION['idNouvelleEquipe'][] = $team->id();

		header('Location:../../index.php');
	}
	elseif(isset($_POST['id_joueur']) && isset($_SESSION['courante']))
	{
		$Gestionnaire = new Gestionnaire($bdd);
		$joueur = $Gestionnaire->joueurFromId($_POST['id_joueur']);
		$team = $Gestionnaire->equipeFromId($_SESSION['courante']);

		$Gestionnaire->ajoutJoueur($team, $joueur);

		$_SESSION['idNouveauJoueurs'][] = $joueur->id();
		$_SESSION['idNouvelleEquipe'][] = $team->id();

		header('Location:../../index.php');
	}
	else
	{
		echo "<br />Inscription impossible : COntacter le staff. <a href='../index.php'>Retour</a><br />";	
	}
?>