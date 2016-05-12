<?php		//		module_vers_Rencontres.php
	session_start();
	include('module_de_base_pour_controller.php');

	$_SESSION['page'] = 'affichageRencontres';

	header("Location:../../index.php");

?>