<?php				//				module_joueur_redevient_valide.php

	session_start();
	include('../Model/module_de_base_pour_controller.php');

	if(isset($_SESSION['courante']))
	{
		$Gestionnaire = new Gestionnaire($bdd);
		$joueur = $Gestionnaire->joueurFromId($_SESSION['courante']);

		$_SESSION['changementEtatJoueur'] = true;		
		$Gestionnaire->declarerJoueurValide($joueur);
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
		echo "<br />déclaration de remise sur pieds impossible : COntacter le staff. <a href='module_retour_accueil.php'>Retour</a><br />";
	}
?>