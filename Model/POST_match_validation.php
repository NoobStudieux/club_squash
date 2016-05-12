<?php		//		Model/POST_match_validation.php

	session_start();
	include('module_de_base_pour_controller.php');

	if(isset($_POST['equipe1']) && isset($_POST['equipe2']))
	{
		$Gestionnaire = new Gestionnaire($bdd);

		$team1 = $Gestionnaire->equipeFromId($_POST['equipe1']);
		$team2 = $Gestionnaire->equipeFromId($_POST['equipe2']);

		$testEquipesMatch = $Gestionnaire->testEquipesMatch($team1, $team2);

		if($testEquipesMatch[0] == true) // le match va se faire
		{
			include('../Vues/vue_match_OK.php');
		}
		else
		{
			include('../Vues/vue_match_KO.php');
		}

	//	header('Location:../index.php');
	}
	else
	{
		echo "<br />Match impossible : COntacter le staff. <a href='../index.php'>Retour</a><br />";	
	}
?>