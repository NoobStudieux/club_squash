<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Vues/vue_choix_d_un_creneau_test.php -->
<html>
	<head>
		<title>Match OK</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../Web/style_.css" />
	</head>
	<body>
	<a id="testB"></a>
<section>

<div class="Conteneur">

	<div class="element">

<?php
	
	include('module_de_base_pour_controller.php');

	$Gestionnaire = new Gestionnaire($bdd);

?>
				


			choisir un créneau à venir
			<form action="module_match_validation_creneau.php" method="post">
						<select id="creneau_match" name="creneau_match">

						</select>
			
						<input type="submit" value="valider" />
			</form>
			

			<?php 



			$creneauxPris = $Gestionnaire->getAllRencontresCreneaux();
			echo 'voil à <br />';


			 ?>
			 <a id="testA">d</a>
<script>
			var creneau_match = document.getElementById("creneau_match"); 
			var creneau_match_dans_le_passe = document.getElementById("creneau_match_dans_le_passe");
			var creneauxDejaPris = <?php echo json_encode($creneauxPris); ?>;
			var MySTring = "";
			var testA = document.getElementById("testA"); 
			var testB = document.getElementById("testB"); 
			var affichage;


			var dateCourante = new Date();

			dateCourante = new Date(dateCourante.getFullYear(), dateCourante.getMonth(), dateCourante.getDate(), dateCourante.getHours(), 0,0);


			var dateCourantePourSensInverse = new Date();
			var annee, mois, jours, heures, dateAAfficher, compteur = 0;
			var premiereFois = true;
			var nomDesMois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
			var nomDesJours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

			function reInit(){				
				dateAAfficher = dateCourante.getFullYear() + "-" + dateCourante.getMonth() + "-" + dateCourante.getDate() + " " + 
				dateCourante.getHours() + ":00:00";
				
			}
			reInit(); 
			function add2Hours(uneDate){

				var newDate = new Date(uneDate.getTime() + 120);

				return newDate;
			}

			heures = dateCourante.getHours();   

			if(heures >= 8 && heures <10 ){dateCourante.setHours(10);}
			else if(heures >= 10 && heures <12 ){dateCourante.setHours(12);}
			else if(heures >= 12 && heures <14 ){dateCourante.setHours(14);}
			else if(heures >= 14 && heures <16 ){dateCourante.setHours(16);}
			else if(heures >= 16 && heures <18 ){dateCourante.setHours(18);}
			else if(heures >= 18 && heures <20 ){dateCourante.setHours(20);}
			else if(heures >= 20 && heures <22 ){dateCourante.setHours(22);}
			else if(heures >= 22){dateCourante.setHours(8); dateCourante.setDate(dateCourante.getDate() + 1);} 
			
			for(i=0; i<=3; i++)	// la liste déroulante contiendra (35 jours de propositions) - (matchs en bdd)
			{
				for(j=8; j <= 22; j = j+2)
				{
					if(premiereFois)
					{
						j = dateCourante.getHours();
						premiereFois = false;
					}
					
					dateValeur = dateCourante.getFullYear() + "-" + dateCourante.getMonth() + "-" + dateCourante.getDate() + " " + 
				dateCourante.getHours() + ":00:00";

					dateAAffichage = dateCourante.getFullYear() + ". " + nomDesJours[dateCourante.getDate()]
					+ " " + dateCourante.getDate() + " " + nomDesMois[dateCourante.getMonth()] + "     " + dateCourante.getHours() + " - "
					+ (dateCourante.getHours() + 2) + " h  ";

				
					matchedInBdd = false; // cette var passera à true si le créneau est deja pris

					for (creneauDejaPris in creneauxDejaPris){


						anneeString_creneauDejaPris = creneauxDejaPris[creneauDejaPris].substr(0,4);  // l'année sur 2 chiffres
						moisString_creneauDejaPris = creneauxDejaPris[creneauDejaPris].substr(5,2);
						jourString_creneauDejaPris = creneauxDejaPris[creneauDejaPris].substr(8,2);

						annee_creneauDejaPris = parseInt(anneeString_creneauDejaPris);
						mois_creneauDejaPris = parseInt(moisString_creneauDejaPris);
						jour_creneauDejaPris = parseInt(jourString_creneauDejaPris);

						Time_creneauDejaPris = new Date(annee_creneauDejaPris, mois_creneauDejaPris, jour_creneauDejaPris
							, j, 0, 0); 



						//	Time_creneauDejaPris = new Date(2016, 04, 04, j, 0, 0); 

					/*	testB.innerHTML = testB.innerHTML+  "courante : " + dateCourante + " \ncreneau testé : " + Time_creneauDejaPris + " \n";
*/
					/*	if(dateCourante.getTime() == Time_creneauDejaPris.getTime())
						{
							alert('match !');
							matchedInBdd = true;
							break;
						}
						else
						{										
								creneau_match.options[compteur] = new Option(dateAAffichage, dateValeur);	
								compteur ++;					
						}*/
						
								/*testB.innerHTML = testB.innerHTML + "date courante : " + dateCourante + " creneau deja pris : " + Time_creneauDejaPris + "/n";  */

		/*						affichage = dateCourante + "   --  time creneaudejapris :  " +  Time_creneauDejaPris + "  time date courante : " + dateCourante; */
			/*		if(dateCourante == Time_creneauDejaPris)
					{
						creneau_match.options[compteur] = new Option( "   MEME DATE !!   "	, dateValeur);  
						compteur ++;
					}
					else
					{
						creneau_match.options[compteur] = new Option(affichage, dateValeur);// new Option(dateAAffichage, dateValeur);
						compteur ++;  
			//		testB.innerHTML = testB.innerHTML + "  i: " + i + " j: " + j +"\n";
					} */
				} // fin for

		//            **********************************			

					if(j == 22)
					{
						dateCourante.setHours(8); dateCourante.setDate(dateCourante.getDate() + 1); 
					}
					else{
						dateCourante.setHours(dateCourante.getHours() + 2);
					}
				
				}creneau_match.options[0] = new Option(affichage, dateValeur);


				/*	for (creneauDejaPris in creneauxDejaPris){




						if(creneauxDejaPris == dateValeur)
						{
							creneau_match.options[compteur] = new Option("dans le if !", dateValeur);
							compteur ++;
						}
						else
						{
							creneau_match.options[compteur] = new Option(dateAAffichage, dateValeur);
							compteur ++;
						}


					}					

					
					

					
					
					

					
				} */
			}  


/*

**
*///creneau_match.options[compteur] = new Option("test", dateValeur);// new Option(dateAAffichage, dateValeur);


		/*	heures = dateCourantePourSensInverse.getHours();
	
			if(heures >= 12 && heures <14 ){dateCourantePourSensInverse.setHours(10);}      
			else if(heures >= 14 && heures <16 ){dateCourantePourSensInverse.setHours(12);}
			else if(heures >= 16 && heures <18 ){dateCourantePourSensInverse.setHours(14);}
			else if(heures >= 18 && heures <20 ){dateCourantePourSensInverse.setHours(16);}  
		/*	else if(heures >= 20 && heures <22 ){dateCourantePourSensInverse.setHours(18);}  
			else if(heures >= 22 && heures <24 ){dateCourantePourSensInverse.setHours(20);} 
			else if(heures >= 24 && heures <10 ){dateCourantePourSensInverse.setHours(22);} 

	/*		else if(heures >= 10 && heures <12 ){dateCourantePourSensInverse.setHours(8); dateCourantePourSensInverse.setDate(dateCourantePourSensInverse.getDate() - 2);} 
			/* reInit(); */
			//creneau_match.options[0] = new Option(dateAAfficher, "564564654");

	/*	premiereFois = true;
			compteur = 0;

			for(i=0; i<=35; i++)	// la liste déroulante contiendra (35 jours de propositions) - (matchs en bdd)
			{
				for(j=22, j>=8, j = j -2)
				{
					if(premiereFois)
					{
						j = dateCourantePourSensInverse.getHours();
						premiereFois = false;
					}
					/*dateAAfficher = dateCourante.getFullYear() + "-" + dateCourante.getMonth() + "-" + dateCourante.getDate() + " " + 
				dateCourante.getHours() + ":00:00";
					creneau_match.options[compteur] = new Option(dateAAfficher, "564564654"); */
				//	dateCourante = new Date(dateAAfficher.getTime() + 120); 

					
				/*	dateValeurInverse = dateCourantePourSensInverse.getFullYear() + "-" + dateCourantePourSensInverse.getMonth() + "-" 
					+ dateCourantePourSensInverse.getDate() + " " + dateCourantePourSensInverse.getHours() + ":00:00";

					dateAAffichageInverse = dateCourantePourSensInverse.getFullYear() + ". " + nomDesJours[dateCourantePourSensInverse.getDate()]
					+ " " + dateCourantePourSensInverse.getDate() + " " + nomDesMois[dateCourantePourSensInverse.getMonth()] 
					+ "     " + dateCourantePourSensInverse.getHours() + " - "
					+ (dateCourantePourSensInverse.getHours() + 2) + " h  ";

			
					creneau_match_dans_le_passe.options[compteur] = new Option(dateAAffichageInverse, dateValeurInverse);

					dateCourantePourSensInverse.setHours(dateCourante.getHours() - 2);

					if(j == 8)
					{
						dateCourantePourSensInverse.setHours(22); 
						 dateCourantePourSensInverse.setDate(dateCourantePourSensInverse.getDate() - 2);
					}

					compteur ++;
				} 
			}  */
			
</script>
	

	</div>
	<div class="element">
						<?php 
							   // $Gestionnaire->affichageRencontresAVenir();
						?>


	</div>
	<div class="element">
						<?php // $Gestionnaire->affichageRencontresPassees();
						
						?>


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
