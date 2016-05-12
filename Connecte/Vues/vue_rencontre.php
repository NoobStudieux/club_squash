<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Connecte/Vues/vue_rencontre.php?id_rencontre='$id_rencontre -->
<html>
	<head>
	<?php
				$rencontre = $Gestionnaire->rencontreFromId($_SESSION['courante']);
				$team1 = $Gestionnaire->equipeFromId($rencontre->idEquipe1());
				$team2 = $Gestionnaire->equipeFromId($rencontre->idEquipe2());
			
	?>
		<title>Rencontre <?php echo $rencontre->idEquipe2()."  ".$team1->nom()."   contre   ".$team2->nom(); ?></title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Web/style_.css" />
	</head>
	<body>
	<?php include('Connecte/Vues/menu.php'); ?>
<section>



<div class="Conteneur">
	<div class="element1A">
<h2>Rencontre <?php echo $rencontre->id()."  ".$team1->nom()."   contre   ".$team2->nom(); ?></h2>
	

	Le match de <a class='affichEquipe'><?php echo $team1->id()." - ".$team1->nom()."</a> contre <a class='affichEquipe'>".$team2->id()." - ".$team2->nom()."</a>"; ?>
	va bien avoir lieu ! <br /> <a class="italique"></a>


	<?php echo $rencontre->Afficher($bdd); ?>

	</div>


<div class="element1">
<?php
		if($rencontre->dateRencontre() < date("Y-m-d H:i:i"))
		{
			if($rencontre->joueeOuNon() == 0)
			{
?>
		<h2>Valider Scores</h2>
			<form action="Connecte/Equipe/module_equipe_inscrire_score.php" method="post">

				<input type="hidden" name="idRencontre" value=<?php echo $rencontre->id(); ?> />
					<table>

					<tr>
					<td>	<label for="valider_score" >Score équipe : <a class="nomEquipe"><?php echo $team1->nom(); ?></a></label></td>
						<td><select name="scoreTeam1">
								<option value=-1>saisir</option>
		<?php
							for($i = 0; $i < 10; $i++ )
							{
		?>
								<option value=<?php echo $i; ?> > <?php echo $i."  points"; ?></option>
		<?php
							}

		?>

							</select>
					<br /></td>
					</tr>
					<tr>

						<td><label for="valider_score" >Score équipe : <a class="nomEquipe"><?php echo $team2->nom(); ?></a></label></td>
						<td><select name="scoreTeam2">
								<option value=-1>saisir</option>

		<?php
							for($i = 0; $i < 10; $i++ )
							{
		?>
								<option value=<?php echo $i; ?> > <?php echo $i."  points"; ?></option>
		<?php
							}

		?>

							</select><br /></td>
					</tr>
					<tr><td></td>
						<td><input type="submit" value="valider score" /></td>
					</tr>
					</table>

			</form>
<?php
			}
			else // =>  rencontreJouee ==1
			{
				$Gestionnaire->afficherScore($rencontre);
			}

		}
		else
		{
			echo "<h2>Match à venir </h2>Ce match aura lieu le : <br />".$rencontre->dateRencontre();
		}

?>
</div>

	</div>


</section>
	</body>


</html>
