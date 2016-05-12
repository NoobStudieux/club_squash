<?php		//		module_ajout_equipe.php
	session_start();
	include('../Model/module_de_base_pour_controller.php');

	if(isset($_POST['nom']))
	{
			$Gestion = new Gestionnaire($bdd);
			$nouvelleEquipe = $Gestion->InscriptionEquipe($_POST['nom']);
			if($nouvelleEquipe  != false)
			{

				$_SESSION['idNouvelleEquipe'][] = $nouvelleEquipe->id();

				header('../Model/module_vers_accueil.php');
		
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