<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Connecte/Vues/vue_affichage_Rencontres.php -->
<html>
	<head>
		<title>Affichage Rencontres</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Web/style_.css" />
	</head>
	<body>
	<?php include('Connecte/Vues/menu.php'); ?>

<section>

<h1>Rencontres</h1>

<div class="Conteneur">

	<div class="element1A">
<h2>Rencontres passées</h2>
	
<?php $Gestionnaire->affichageRencontresPassees(); ?>
	</div>
	<div class="element1">
<h2>Rencontres à venir</h2>
	
<?php $Gestionnaire->affichageRencontresAVenir(); ?>
	</div>



	
</div>

<a href="Connecte/Model/module_vers_accueil.php">retour accueil</a> 
</section>


<script type="text/javascript" src="Web/JS/rencontre_validation_suppression.js"></script>
	</body>


</html>
