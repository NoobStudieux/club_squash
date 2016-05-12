<?php   // module_Fonctions.php

function ConnectedStatus(PDO $db)
{
	if(isset($_SESSION["login"]) && isset($_SESSION["password"]))
	{
		$donnees = $db->query("SELECT * FROM Admins");
		while($logs = $donnees->fetch())
		{
			$login = $logs['login']; $password = $logs['password'];

			if($login == $_SESSION["login"] && $password == ($_SESSION["password"]))
			{
				$ConnectedStatus = "connecte";
				
			}
			elseif(isset($_SESSION["login"]) && (!isset($_SESSION["password"])))
			{
				$ConnectedStatus = "login";
			}
			else
			{
				$ConnectedStatus = "pas_connecte";
			}
		}
	}
	else
	{
			$ConnectedStatus = "pas_connecte";
	}
		return $ConnectedStatus;
}

function GetLogin()
{
	if(isset($_SESSION['login']))
	{
		$login = $_SESSION['login'];
	}
	else
	{
		$login = "pasdelogin";
	}

	return $login;
}

?>