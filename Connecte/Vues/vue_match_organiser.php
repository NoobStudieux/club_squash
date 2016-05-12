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
											<option value=0>..</option>
					</select>
					<select name="liste2" id="liste2">
											<option value=0>..</option>
					</select>

					<input type="submit" valider="valider" id="valide" />
				</form>
								
							
											<?php $Competitors = $Gestionnaire->getAllCompetitors(); ?>
								
						<a id="test">test</a>
		
		</div>	
</div>

</section>
<script>

			var liste1 = document.getElementById("liste1");  
			var liste2 = document.getElementById("liste2");
			var valide = document.getElementById("valide");
			var optionsListe1 = liste1.getElementsByTagName('option');
			var optionsListe2 = liste2.getElementsByTagName('option');

			var Competiteurs = <?php echo json_encode($Competitors); ?>;

var test = document.getElementById("test");

			index =1;

			

			for(id in Competiteurs)
			{
				if(id > 0)
				{
					liste1.options[index] = new Option(Competiteurs[id], id);
					liste2.options[index] = new Option(Competiteurs[id], id);
					index ++;
				}
			}




			function upDateListe(liste, listeExistante) // je vais éditer liste en fonction de ma liste e
			{
				indexInitialListe = liste.selectedIndex;
				indexListeExistante = listeExistante.selectedIndex;

				index = 1;

				

				for(id in Competiteurs)
				{
					if(liste.selectedIndex == listeExistante.selectedIndex)
					{
					//	liste1.removeChild(optionsListe1[id]);
					//	liste.options[id] = null;
						liste.options[index].remove();
			//		alert('remove');

					}
					else if(id > 0)
					{
					//	liste.options[index] = new Option(Competiteurs[id], id);
						index ++;
						alert('add ' );

					}
					
					
				}
				liste.selectedIndex = indexInitialListe;
			}

	//		upDateListe();

			liste1.addEventListener('change', function(){
				//	liste1.options[4].remove();
				//	upDateListe(liste2, liste1);
				test.innerHTML = "valeur liste 1 : " + liste1.value + "index liste 1 : " + liste1.selectedIndex;
			},false);

			liste2.addEventListener('change', function(){
					
					indexListe1 = parseInt(liste1.selectedIndex);

					if(liste1.selectedIndex < liste2.selectedIndex)
					{
						valeurAdditionnelle = 0;
					}
					else
					{
						valeurAdditionnelle = 2;
					} 

			//		liste1.options.length = 0;

					liste1.options[0] = new Option("..", 0);

					index = 1;

					for(id in Competiteurs)
					{
						if(id == liste2.value)
						{

						}
						else
						{
							liste1.options[index] = new Option(Competiteurs[id], id);
							index ++;
						}
					}

						liste1.selectedIndex = indexListe1;
					
					

				test.innerHTML = "valeur liste 1 : " + liste1.value + "index liste 1 : " + liste1.selectedIndex;

			},false);


			
</script>


			

		
	</body>


</html>
