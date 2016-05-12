<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Connecte/Vues/vue_rencontre_annulation.php -->
<html>
	<head>
		<title>annuler une rencontre</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Web/style_.css" />
	</head>
	<body>

	<?php include('Connecte/Vues/menu.php'); ?>
	<a id="testB"></a>
<section>

<?php
	$rencontre = $Gestionnaire->rencontreFromId($_SESSION['courante']);
	$team1 = $Gestionnaire->equipeFromId($rencontre->idEquipe1());
	$team2 = $Gestionnaire->equipeFromId($rencontre->idEquipe2());


?>

<div class="Conteneur">

	<div class="element">
		<h2>Etes Vous Sur ..</h2>
			<div>
			<?php 
					$dateA = date_create($rencontre->dateRencontre());
					$date = date_format($dateA, "l d Y");
					$heure = date_format($dateA, "H:i");	?>
		de vouloir annuler la rencontre n° <?php 	echo $rencontre->id(); ?>, prévue le <strong><?php 	echo $date." à ".$heure. " h ?"; ?></strong><br />
		de <?php 	echo $team1->nom()." contre ".$team2->nom(); ?>
									<form action="Connecte/Rencontre/module_rencontre_annulation.php" method="post">
											<input type="hidden" name="idRencontre" value=<?php 	echo $rencontre->id(); ?> />
											<input type="submit" value="annuler" />
									</form>
			</div>
	</div>
</div>



</section>
	</body>
</html>