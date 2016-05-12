<?php				//				module_vers_rencontre_edition.php
session_start();

$_SESSION['page'] = "editionRencontre";

if(isset($_POST['idRencontre']))
{
	$_SESSION['courante'] = $_POST['idRencontre'];

}

header('Location:../../index.php');


?>