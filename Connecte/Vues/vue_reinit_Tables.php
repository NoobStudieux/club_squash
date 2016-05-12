<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Connecte/Vues/vue_reinit_Tables.php -->
<html>
	<head>
		<title>reinit Tables</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Web/style_.css" />
	</head>
	<body>

<section>
<div class="element1A">
			<h2>reinit Tables</h2>

<input type="button" value="je veux réinitialiser les tables" id='premiereValidation' />

<div id="validationReinit" >

<form action="Connecte/Model/POST_tables_reinit.php" method="post">
<label for="checkbox">J'ai conscience que cette action est irrréversible </label><input type="checkbox" id="checkbox" name="checkbox" /> 
<input type="submit" id="validation" value="réinitialiser" /><br />

</form>

</div>
		<ul>
				<li><a href="Connecte/Model/module_vers_accueil.php">Accueil</a> <br /></li>
		</ul>

	
</div>
</div>

</section>
<script>
			var validationReinit = document.getElementById('validationReinit');
			var premiereValidation = document.getElementById('premiereValidation');
			var validation = document.getElementById('validation');
			var checkbox = document.getElementById('checkbox');

			validationReinit.style.display='none';  //validation.disabled="false";

			premiereValidation.addEventListener('click', function(){

					premiereValidation.disabled = true;
					validationReinit.style.display='block';

			},true);

			validation.disabled=true;

			checkbox.addEventListener('click', function(){
					if(checkbox.checked != true)
					{
						validation.disabled=true; 
					}
					else
					{
						validation.disabled=false;
					}
				
				
			},false);
			 
</script>
	</body>


</html>
