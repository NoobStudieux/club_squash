<?php				//				module_joueur_edition_se_blesse.php

	session_start();
	include('../Model/module_de_base_pour_controller.php');

	if(isset($_SESSION['courante']))
	{
		$Gestionnaire = new Gestionnaire($bdd);
		$joueur = $Gestionnaire->joueurFromId($_SESSION['courante']);
		

		$Gestionnaire->declarerJoueurBlesse($joueur);

		$_SESSION['changementEtatJoueur'] = false;

		$joueur->Afficher();

		$_SESSION['idNouveauJoueurs'][] = $joueur->id();

		if(isset($_SESSION['changementNomJoueur']))
		{
			unset($_SESSION['changementNomJoueur']);
		}
		
		 header("Location:../../index.php");
	}
	else
	{
		echo "<br />déclaration de blessure impossible : COntacter le staff. <a href='module_retour_accueil.php'>Retour</a><br />";
	}
?>