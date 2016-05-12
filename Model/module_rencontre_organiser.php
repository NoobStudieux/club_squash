<?php		//		module_vers_organiser_match.php
	session_start();
	include('module_de_base_pour_controller.php');

	$_SESSION['page'] = 'organiserMatch';

	header("Location:../index.php");

?>