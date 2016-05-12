<?php				//				POST_edition_nom_Joueur.php

	session_start();
	include('module_de_base_pour_controller.php');

	if(isset($_SESSION['changementEtatJoueur']))
	{
		unset($_SESSION['changementEtatJoueur']);
	}
	
	if(isset($_SESSION['courante']) && isset($_POST['nom']))
	{
		$Gestionnaire = new Gestionnaire($bdd);
		$joueur = $Gestionnaire->joueurFromId($_SESSION['courante']);
		$_SESSION['changementNomJoueur'] = $Gestionnaire->changementNomJoueur($joueur, $_POST['nom']);
		$joueur->Afficher();

		$_SESSION['idNouveauJoueurs'][] = $joueur->id();

		header("Location:../index.php");
	}
	else
	{
		echo "<br />changement de nom impossible : Contacter le staff. <a href='../index.php'>Retour</a><br />";
	}
?>