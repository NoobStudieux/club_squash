<?php		//		module_match_trouver_creneau.php

	session_start();
	include('module_de_base_pour_controller.php');

	if(isset($_POST['idEquipe1']) && isset($_POST['idEquipe2']))
	{
		$Gestionnaire = new Gestionnaire($bdd);

		$team1 = $Gestionnaire->equipeFromId($_POST['idEquipe1']);
		$team2 = $Gestionnaire->equipeFromId($_POST['idEquipe2']);

		include('../Vues/vue_match_choix_d_un_creneau.php');
	}
	else
	{
	
	}

?>