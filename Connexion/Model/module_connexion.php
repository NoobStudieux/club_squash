<?php 	//		module_connexion_POST.php

session_start();
include('../../Model/module_de_base.php');
include('../../Model/module_Fonctions.php');

if(isset($_POST['login']) && isset($_POST['password']))
{
	$login = htmlspecialchars(($_POST['login'])); $password = sha1(($_POST['password']));
	$req = $bdd->query("SELECT * FROM Admins");
	$credentials = true;

	while($log = $req->fetch())
	{
			if($login == $log['login'])
			{
				if($password == $log['password'])
				{
					$_SESSION['login'] = $login;
					$_SESSION['password'] = $password;

					header("Location:../../index.php");
				}
				else
				{
					$credentials = false; echo "nOK";
				}
			}
			else
			{
				$credentials = false; $_SESSION['login'] = $login; echo "nOK";
			}
	}
	if($credentials == false)
	{
		echo "nOK";
		include_once('../Vues/Vue_probleme_credentials.php');
	}
	else
	{
		echo "vérifier que la base admins possede des entrees";
	}
}
else
{
	echo "problème de transmission des donnees";
}


?>