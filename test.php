<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/tests.php -->
<html>
	<head>
		<title>page test</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Web/style_.css" />
	</head>
	<body>

<section>
<div class="element1A">
			<h2>Test </h2>
<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Connecte/Vues/vue_match_organiser.php -->
<html>
	<head>
		<title>Organiser un match</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Web/style_.css" />
	</head>
	<body>
	<?php include('Connecte/Vues/menu.php'); ?>
<section>

			<h1>Organiser un match</h1>

<div class="Conteneur">

		<div class="element1">
		
			<h2>Classement joueur</h2>
				<form action="Connecte/Model/module_match_validation.php" method="post">
					<select name="liste1" id="liste1">
											
					</select>
					<select name="liste2" id="liste2">
											
					</select>

					<input type="submit" valider="valider" id="valide" />
				</form>
								
							
											<?php 
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=Matchs;charset=utf8','root','');
}
catch(Exception $e)
{
	echo "Exception : ".$e->getMessage();
}

function autoload($classe)
{
	require "Connecte/".$classe."/class.".$classe.".php";
}
spl_autoload_register('autoload');

													$Gestionnaire = new Gestionnaire($bdd);
													$Competitors = $Gestionnaire->getAllCompetitors(); ?>
								
						<a id="test">test</a>
		
		</div>	
</div>

</section>
<script>

			var liste1 = document.getElementById("liste1");  
			var liste2 = document.getElementById("liste2");
		/*	var valide = document.getElementById("valide");
			var optionsListe1 = liste1.getElementsByTagName('option');
			var optionsListe2 = liste2.getElementsByTagName('option'); */

			var Competiteurs = <?php echo json_encode($Competitors); ?>;
			var tab1 = Array();
			var tab2 = Array();

var test = document.getElementById("test");

function Match(array , idATester)
{
	match = false;

	for(id in array)
	{
		if(id == idATester)
		{
			match = true;
			break;
		}
	}
	return match;
}

			index =1;

			liste1.lenght = 0; liste2.lenght = 0;

			for(id in Competiteurs)
			{
				if(id > 0)
				{
					liste1.options[index] = new Option(Competiteurs[id], id);
					liste2.options[index] = new Option(Competiteurs[id], id);

					tab2[index - 1] = id;
					tab1[index - 1] = id;  // Les listes comenceront à [1] alors que les tab à [0]

					index ++;

				}
			}




			liste1.addEventListener('change', function(){
				//	liste1.options[4].remove();
				valeurListe2 = liste2.value;
				indexInitialListe2 = liste2.selectedIndex;
				longueurInitialListe2 = liste2.lenght;

				index = 1;

				insertionAvantCible = false;
				idIdentiqueTrouve = false;
				decalageAFaire = false;	idIdentique = 0;
				variableASupprimerTrouvee = false;
				indexASupprime = 0;

				idASupprime = liste1.value;
				idSupprime = false;
				idAjoute = false;

				dejaPresente = false; // indique si un index etait dejà présent dans une liste

				liste2.length = 0;

				for(id in Competiteurs)
				{
					if(liste1.value == id)
					{
						if(indexInitialListe2 > index)
						{
							indexInitialListe2 --;
						}
					}
					else
					{
						if((!Match(tab2, id)) && (indexInitialListe2 >= index)) 
						{
						//	indexInitialListe2 ++; alert('if((tab2[id] != Competiteurs[id]) && (indexInitialListe2 >= index)) ');
						}

						liste2.options[index] = new Option(Competiteurs[id], id);
						index ++;
					}
				}
				liste2.selectedIndex = 2;
			// test.innerHTML = "valeur liste 1 : " + liste1.value + "index liste 1 : " + liste1.selectedIndex;
			test.innerHTML = "valeur liste 2 : " + liste2.value + "index liste 2: " + liste2.selectedIndex + " index init : " + indexInitialListe2;
			},true);

			liste2.addEventListener('change', function(){
				test.innerHTML = "valeur liste 2 : " + liste2.value + "index liste 2: " + liste2.selectedIndex;
			},false);

					
			
</script>



</section>
</body>


</html>
