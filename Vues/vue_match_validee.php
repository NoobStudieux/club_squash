

<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Vues/vue_match_validee.php?id_rencontre=$id_rencontre -->
<html>
	<head>
		<title>Match programmé !</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../Web/style_.css" />
	</head>
	<body>
<section>



<div class="Conteneur">

	<div class="element">
	<?php

	include('../Model/module_de_base_pour_controller.php');
	if(isset($_GET['id_rencontre'] ))
	{echo "youpi";
			$Gestionnaire = new Gestionnaire($bdd);
			$rencontre = $Gestionnaire->rencontreFromId($_GET['id_rencontre']);
			$team1 = $Gestionnaire->equipeFromId($rencontre->idEquipe1());
			$team2 = $Gestionnaire->equipeFromId($rencontre->idEquipe2());

		}
	?>

	Le match de <a class='affichEquipe'><?php echo $team1->id()." - ".$team1->nom()."</a> contre <a class='affichEquipe'>".$team2->id()." - ".$team2->nom()."</a>"; ?>
	 <a class="italique"></a>

	 $rencontre->Afficher($bdd);

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
