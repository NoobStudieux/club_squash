<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Connecte/Vues/Vue_connecte.php -->
<html>
	<head>
		<title>Admin connecte</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Web/style_.css" />
	</head>
	<body>
<?php include('Connecte/Vues/menu.php'); ?>

<section>

			<h1>Admin connecte</h1>
<div class="Conteneur">

	<div class="element1">
		
			<h2>Classement joueur</h2>
		
		
		<?php $Gestionnaire->getClassementJoueurs(); ?>
				<label for="nom">nom : </label><input type="text" name="nom" />
		
	</div>


	
	<div class="element1A">
		
			<h2>Classement équipes</h2>
			
		
		<?php $Gestionnaire->getClassementEquipes(); ?>
		
	</div>

	<div class="elementGestion">
		
			<h2>Gestion</h2>
		
		<div class="boiteAjout">
		Ajouter un joueur : 
		<form action="Connecte/Joueur/module_joueur_ajout.php" method="post">
		<input type="text" name="nom" id="name" />
		<input type="submit" value="enregistrer" />

		</form>
		</div>
<?php
		if(isset($_SESSION['idNouveauJoueurs']) && (!empty($_SESSION['idNouveauJoueurs'])))
		{
			$listeJoueurs = $_SESSION['idNouveauJoueurs'];
			for($i=count($_SESSION['idNouveauJoueurs']); $i >= 1; $i--)
			{
				$Gestionnaire->affich1JoueurFromId($listeJoueurs[$i-1]);
				
			}
		}
?>
		<div class="boiteAjout">
		Ajouter une équipe : 
		<form action="Connecte/Equipe/module_equipe_ajout.php" method="post">
			<input type="text" name="nom" id="name" />
			<input type="submit" value="enregistrer" />
		</form>
		</div>
<?php
		if(isset($_SESSION['idNouvelleEquipe']) && (!empty($_SESSION['idNouvelleEquipe'])))
		{
			foreach($_SESSION['idNouvelleEquipe'] as $id_eq1)
			{
				$Gestionnaire->affich1EquipeFromId($id_eq1);
			}
		}

?>		
	</div>

	<div class="elementTableau">
		
			<h2>Joueurs : </h2>
			
		
		<?php $Gestionnaire->affichJoueursParIds(); ?>
		
	</div>
	<div class="elementTableau">
		
			<h2>Equipe : </h2>
			
		
		<?php $Gestionnaire->affichEquipesParIds(); ?>
		
	</div>

</div>



	
</div>

</section>
	</body>


</html>
