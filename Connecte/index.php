<?php		//		index_connecte.php

	$Gestionnaire = new Gestionnaire($bdd);

	if(isset($_SESSION['courante']))
	{
		echo "session courante : " .$_SESSION['courante']."<br />";
	}
	if(isset($_SESSION['page']))
	{
		if($_SESSION['page'] == 'editionJoueur' && isset($_SESSION['courante']))
		{
			include('Connecte/Vues/vue_joueur_edition.php');
		}
		elseif($_SESSION['page'] == 'editionEquipe' && isset($_SESSION['courante']))
		{
			include('Connecte/Vues/vue_equipe_edition.php');
		}
		elseif($_SESSION['page'] == 'editionRencontre' && isset($_SESSION['courante']))
		{
			include('Connecte/Vues/vue_rencontre.php');
		}
		elseif($_SESSION['page'] == 'affichageRencontres')
		{
			include('Connecte/Vues/vue_affichage_Rencontres.php');
		}

		elseif($_SESSION['page'] == 'organiserMatch')
		{
			include('Connecte/Vues/vue_match_organiser.php');
		}
		elseif($_SESSION['page'] == 'reinitTables')
		{
			include('Vues/vue_reinit_Tables.php');
		}
		elseif($_SESSION['page'] == 'rencontreAnnulation' && (isset($_SESSION['courante'])))
		{
			include('Connecte/Vues/vue_rencontre_annulation.php');
		}
		else
		{
			include('Connecte/Vues/Vue_connecte.php');
		}

	}
	else
	{
		include('Vues/Vue_connecte.php');
	}

