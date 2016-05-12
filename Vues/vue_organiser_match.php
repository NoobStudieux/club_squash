<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Vues/Vues/vue_organiser_match.php -->
<html>
	<head>
		<title>Organiser un match</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Web/style_.css" />
	</head>
	<body>
<section>

			<h1>Organiser un match</h1>
	<a href="Connecte/Model/module_retour_accueil.php">retour accueil</a> 
<div class="Conteneur">

		<div class="element">
		
			<h2>Classement joueur</h2>


								
							
											<?php $Gestionnaire->listeDeroulanteEquipes4Match(); ?>
								
							
		
		</div>	
</div>

</section>
	</body>


</html>
