<?php		//		module_ajout_joueur.php
	session_start();
	include('../Model/module_de_base_pour_controller.php');

	if(isset($_POST['nom']))
	{
			$Gestion = new Gestionnaire($bdd);
			$nouveauJoueur = $Gestion->InscriptionJoueur($_POST['nom']);
			if($nouveauJoueur  != false)
			{

				$_SESSION['idNouveauJoueurs'][] = $nouveauJoueur->id();

				header('Location:../../index.php');
		
			}
			else
			{
				echo "<br />Inscription impossible : pseudo existant déjà. <a href='../Model/module_vers_accueil.php'>Retour</a><br />";
			}
	}
	else
	{
		echo "<br />Problème de transmission des donnees : <a href='../Model/module_vers_accueil.php'>Retour</a><br />";
	}

?>