<?php			//				module_vers_accueil.php
session_start();

echo "welcome to module";
	
	unset($_SESSION['page']); unset($_SESSION['courante']);

	if(isset($_SESSION['changementNomJoueur']))
	{
		unset($_SESSION['changementNomJoueur']);
	}
	if(isset($_SESSION['changementNomEquipe']))
	{
		unset($_SESSION['changementNomEquipe']);
	}
	if(isset($_SESSION['changementEtatJoueur']))
	{
		unset($_SESSION['changementEtatJoueur']);
	}
	header('Location:../../index.php');

?>