<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Connecte/Vues/vue_equipe_edition.php  -->
<html>
	<head>
		<title>Admin connecte : edition equipe</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Web/style_.css" />
	</head>
	<body>
	<?php include('Connecte/Vues/menu.php'); ?>
<section>

			<h1>edition equipe</h1>

<?php

	$team = $Gestionnaire->equipeFromId($_SESSION['courante']);

?>
		
<div class="Conteneur">

	<div class="elementGestion">
		
			<h2>Détail équipe</h2>
			<?php $team->Afficher($bdd); ?>
								<form action="Connecte/Equipe/module_equipe_edition_nom.php" method="post">
									<label for="nom">nom : </label><input type="text" name="nom" value=<?php echo $team->nom(); ?> />
									<input type="submit" "enregistrer nom" /><br />
								</form>

								<?php
											if(isset($_SESSION['changementNomEquipe']))
											{
												if($_SESSION['changementNomEquipe'] == true)
												{
									?>
												<a class="changementOK">Le nom de l'équipe a bien été changé : <?php echo $team->nom(); ?></a><br />
									<?php
												}
												else
												{
									?>
												<a class="changementKO">Le nom de l'équipe n'a pas pu être changé car c'est celui d'une autre équipe !</a><br />
									<?php
												}
											}				

					$listeIdJoueurs = [$team->idJ1(), $team->idJ2(), $team->idJ3(), $team->idJ4(), $team->idJ5()];

					foreach($listeIdJoueurs as $idJoueurDeLaListe)
					{
						if($idJoueurDeLaListe != 0)
						{
							$playerA = $Gestionnaire->joueurFromId($idJoueurDeLaListe);
							$playerA->Afficher();
			?>

								<form action="Connecte/Joueur/module_joueur_desinscription.php" method="post">
									<input type="hidden" name="id_joueur" value=<?php echo $playerA->id(); ?> /> <input type="submit" value="désinscrire" /><br />

								</form>
			<?php
						}
						
					}
			?>
	</div>


	
	<div class="element1A">
		
			<h2>Autres Joueurs</h2>
			
		<?php
							$Gestionnaire->afficherAutresJoueursQueTeam($team);


		?>
	
		
	</div>

	

	
</div>


</section>
	</body>


</html>
