<?php		//		module_equipe_inscrire_score.php
	session_start();
	include('../Model/module_de_base_pour_controller.php');

	if(isset($_POST['idRencontre'], $_POST['scoreTeam1'], $_POST['scoreTeam2'] ))
	{
			$Gestionnaire = new Gestionnaire($bdd);
			$rencontre = $Gestionnaire->rencontreFromId($_POST['idRencontre']);
			$teamA = $Gestionnaire->equipeFromId($rencontre->idEquipe1());
			$teamB = $Gestionnaire->equipeFromId($rencontre->idEquipe2());

			$rencontre = $Gestionnaire->inscrireScoreRencontre($rencontre, $_POST['scoreTeam1'], $_POST['scoreTeam2']);
			$_SESSION['page'] = 'editionRencontre';

			$rencontre->Afficher($bdd);
			echo $rencontre->idVainqueur().$rencontre->scoreEquipeGagnante().$rencontre->scoreEquipePerdante().$rencontre->id();

			header('Location:../../index.php');			
	}
	else
	{
	//	header('Location:../Model/module_vers_accueil.php');
			if(isset($_POST['idRencontre']))
			{
				echo 'idrencontre is set';
			}
			if(isset($_POST['scoreTeam1']))
			{
				echo 'scoreTeam1 is set'.$_POST['scoreTeam1'];
			}
	}

?>