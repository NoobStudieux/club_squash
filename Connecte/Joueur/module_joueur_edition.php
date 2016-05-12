<?php			//				module_joueur_edition.php
session_start();

echo "welcome to module";

if(isset($_POST['id_joueur']))
{
	
	
		echo "post id joueur = ".$_POST['id_joueur'];  $_SESSION['courante']= $_POST['id_joueur'];
	
	$_SESSION['page']='editionJoueur';
}

header('Location:../../index.php');

?>