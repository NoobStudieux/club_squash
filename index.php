<?php 		//			localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/index.php

session_start();
include('Model/module_de_base.php');
include('Model/module_Fonctions.php');

$ConnectedStatus = ConnectedStatus($bdd);

if($ConnectedStatus == "connecte")
{
	include('Connecte/index.php');
}
elseif($ConnectedStatus == "login")
{
	include('Connexion/index.php');
}
else
{
	echo "index_pas_connecte.php";

	include('Connexion/index.php'); 
}

// header('Location:Model/module_retour_accueil.php');

?>