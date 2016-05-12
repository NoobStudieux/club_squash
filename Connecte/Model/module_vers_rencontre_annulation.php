<?php				//				module_vers_rencontre_annulation.php
session_start();

$_SESSION['page'] = "rencontreAnnulation";

if(isset($_POST['idRencontre']))
{
	$_SESSION['courante'] = $_POST['idRencontre'];

}

header('Location:../../index.php');


?>