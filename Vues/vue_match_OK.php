<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Connecte/Vues/vue_match_OK.php -->
<html>
	<head>
		<title>Match OK</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../Web/style_.css" />
	</head>
	<body>
<section>



<div class="Conteneur">

	<div class="element">

	Le match de <a class='affichEquipe'><?php echo $team1->id()." - ".$team1->nom()."</a> contre <a class='affichEquipe'>".$team2->id()." - ".$team2->nom()."</a>"; ?>
	va bien avoir lieu ! <br /> <a class="italique"></a>

	<form action="POST_match_trouver_creneau.php" method="post">

		<input type="hidden" name="idEquipe1" value=<?php echo $team1->id(); ?> />
		<input type="hidden" name="idEquipe2" value=<?php echo $team2->id(); ?> />
		<input type="submit" value="trouver un créneau" />
	</form>

	

	</div>

</div>

<div class="affichAdmin">
	<a href="module_deconnexion.php">Deconnexion</a>
</div>

<div class="affichCreerTables">

		<ul>
				<li><a href="Model/module_table_Joueurs_remplir.php">Réinit tables</a> <br /></li>
		</ul>
	
</div>

</section>
	</body>


</html>
