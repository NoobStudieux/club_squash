<?php		//		module_match_creation.php


session_start();
	include('module_de_base_pour_controller.php');

		

	if(isset($_POST['id_equipe1'], $_POST['id_equipe2'], $_POST['horaire']))
	{
		$Gestionnaire = new Gestionnaire($bdd);

		echo $_POST['id_equipe1']."  " .$_POST['id_equipe2']."  ".$_POST['horaire'];
		$rencontre = $Gestionnaire->creationRencontre($_POST['id_equipe1'], $_POST['id_equipe2'],$_POST['horaire']);

		$_SESSION['courante'] = $rencontre->id();
		$_SESSION['page'] = 'editionRencontre';
	//	echo $_POST['horaire'];
		header('Location:../../index.php');
	}
	else
	{
		unset($_SESSION['page']);
	}







?>