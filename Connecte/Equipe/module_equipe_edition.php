<?php			//				module_equipe_edition.php
session_start();


echo "welcome to module";

if(isset($_POST['id_equipe']))
{
	
	
		echo "post id equipe = ".$_POST['id_equipe'];  $_SESSION['courante']= $_POST['id_equipe'];
		
	$_SESSION['courante'] = $_POST['id_equipe'];
	$_SESSION['page']='editionEquipe';
}

 header('Location:../../index.php');

?>