<?php		//			module_match_validation_creneau.php  

session_start();
	include('module_de_base_pour_controller.php');

if(isset($_POST['creneau_match']) && isset($_POST['id_equipe1']) && isset($_POST['id_equipe2']))
{
	echo $_POST['creneau_match']."   ".$_POST['id_equipe1']."   ".$_POST['id_equipe2']."   <br />";
	$Gestionnaire = new Gestionnaire($bdd);

	$rencontre = $Gestionnaire->creationRencontre($_POST['id_equipe1'], $_POST['id_equipe2'], $_POST['creneau_match']) ;

	echo "sortie de creation rencontre <br />";

	$rencontre->Afficher($bdd);
	$id_rencontre = $rencontre->id();
	include("Location:../Vues/vue_rencontre.php");
}
else
{
	echo "<br />validation impossible : COntacter le staff. <a href='module_retour_accueil.php'>Retour</a><br />";	
}

?>