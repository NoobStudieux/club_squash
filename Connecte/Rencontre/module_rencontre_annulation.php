<?php		//		module_rencontre_annulation.php
	session_start();
	include('../Model/module_de_base_pour_controller.php');

	if(isset($_POST['idRencontre']))
	{
			$Gestionnaire = new Gestionnaire($bdd);
			$rencontre = $Gestionnaire->rencontreFromId($_POST['idRencontre']);

			$Gestionnaire->supprimerRencontre($rencontre);
			$_SESSION['page'] = 'affichageRencontres';

			header('Location:../../index.php');			
	}
	else
	{
		header('Location:module_vers_accueil.php');
	}

?>