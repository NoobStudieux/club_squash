<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Vues/vue_connecte_edition_joueur.php -->
<html>
	<head>
		<title>Admin connecte : edition joueur</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Web/style_.css" />
	</head>
	<body>
	<?php
		$joueur = $Gestionnaire->joueurFromId($_SESSION['courante']);

	?>
<section>
<div class="titrePrincipal">
			<h1>edition joueur : <?php echo $joueur->nom(); ?></h1>
		</div>

		
<div class="Conteneur">

	<div class="element">
		
			<h2>Modif Joueur</h2>
			<div>
		
				<form action="Model/POST_edition_nom_Joueur.php" method="post">
					<label for="nom">nom : </label><input type="text" name="nom" value=<?php echo $joueur->nom(); ?> /><br />
					<input type="submit" "enregistrer nom" />
				</form>
									<?php
											if(isset($_SESSION['changementNomJoueur']))
											{
												if($_SESSION['changementNomJoueur'] == true)
												{
									?>
												<a class="changementOK">Le nom du joueur a bien été changé : <?php echo $joueur->nom(); ?></a><br />
									<?php
												}
												else
												{
									?>
												<a class="changementKO">Le nom du joueur n'a pas pu être changé car c'est celui d'un autre joueur !</a><br />
									<?php
												}
											}


									?>

					<label for="validite">validité : </label><input type="text" name="validite" disabled="true" value=<?php echo $joueur->validite(); ?> />
									<?php 	
												if($joueur->isValide())
												{
									?>
														<form action="Model/POST_edition_Joueur_se_blesse.php" method="post">
															<input type="submit" value="Déclarer blessé" />
														</form>
									<?php
												}else
												{
									?>
														<form action="Model/POST_edition_Joueur_redevient_valide.php" method="post">
															<input type="submit" value="Déclarer Valide" />
														</form>
									<?php
												}
												if(isset($_SESSION['changementEtatJoueur']))
												{
													if($_SESSION['changementEtatJoueur'] == true)
													{
									?>				<br />
													<a class="changementOK">Le joueur <?php echo $joueur->nom(); ?> a bien été porté : Valide</a><br />
									<?php
													}
													else
													{
									?>				<br />
													<a class="changementKO">Le joueur <?php echo $joueur->nom(); ?> a bien été porté : blessé</a><br />
									<?php
													}
												}
												else
												{
													echo "changement etat joueur Ko";
												}

									?>


					
			</div><br /><br /><div>

				<?php $joueur->Afficher(); ?>
				<a class="italique">Inscris le : <?php echo $joueur->dateCreation(); ?> </a>
			</div>
	</div>


	
	<div class="element">
		
			<h2>Ses Equipes</h2>
			
				<?php $Gestionnaire->afficherEquipesdUnJoueur($joueur); ?>
	
		
	</div>

	

	<div class="element2">
		
			<h2>D'autres équipes : </h2>
			
		
				<?php $Gestionnaire->afficherEquipesLibresPourUnJoueur($joueur); ?>
		
	</div>
	
</div>

<div class="paragrapheImportant">			
		<form action="" method="post">
		<input type="submit" class="boutonSupprimer" value="Supprimer <?php echo $joueur->nom(); ?>" />
		</form>
	
		
	</div>

<div class="affichAdmin">
	<a href="Model/module_deconnexion.php">Deconnexion</a>
</div>

<div class="affichCreerTables">

		<ul>
				<li><a href="Model/module_retour_accueil.php">retour accueil</a> <br /></li>
		</ul>
	
</div>

</section>
	</body>


</html>
