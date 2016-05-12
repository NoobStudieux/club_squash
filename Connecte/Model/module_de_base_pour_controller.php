<?php		//		module_de_base_pour_controller.php

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=Matchs;charset=utf8','root','');
	}
	catch(Exception $e)
	{
		echo "Exception : ".$e->getMessage();
	}
	function autoload($classe)
	{
		require "../".$classe."/class.".$classe.".php";
	}
	spl_autoload_register('autoload');

?>