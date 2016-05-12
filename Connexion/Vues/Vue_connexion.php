<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Vues/Vue_connexion.php -->
<html>
	<head>
		<title>Connexion Admin</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../Web/style_.css" />
	</head>
  <?php // include('menu.php'); ?>
	<body>
<section>
<div class="titrePrincipal">
			<h1>Connexion Admin</h1>
		</div>

<div class="Conteneur">
	<form action="Model/module_connexion_POST.php" method="post">
		<label for="login">login : </label><input type="text" name="login" <?php echo "value='$login'" ;?> autofocus />
		<label for="password">password : </label><input type="password" name="password" />
		<input type="submit" value="connexion" />
	</form>
</div>

<div class="affichAdmin">
	<a href="index.php">Section Admin</a> <br />
	<a href="../Model/module_creer_table_Admins.php">Créer table Admin</a> 

</div>

</section>
	</body>


</html>
