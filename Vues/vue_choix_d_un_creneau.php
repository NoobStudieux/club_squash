<!DOCTYPE html>		<!-- localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Vues/vue_choix_d_un_creneau.php -->
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
		<h3>Trouver un créneau</h3>
			<form action="POST_match_trouver_creneau.php" method="post">
	Pour le match de <a class='affichEquipe'><?php echo $team1->id()." - ".$team1->nom()."</a> contre <a class='affichEquipe'>".$team2->id()." - ".$team2->nom()."</a>"; ?><br />

				<table>
						<tr><td></td><td>Lundi</td><td>Mardi</td><td>Mercredi</td><td>Jeudi</td><td>Vendredi</td><td>Samedi</td><td>Dimanche</td>
						</tr>
						<tr><td>08-10h</td><td><input type="checkbox" id="j1C1" value=1/></td><td><input type="checkbox" id="j2C1" value=8/></td><td><input type="checkbox" id="j3C1" value=15 /></td><td><input type="checkbox" id="j4C1" value=22 /></td><td><input type="checkbox" id="j5C1" value=29 /></td><td><input type="checkbox" id="j6C1" value=36 /></td><td><input type="checkbox" id="j7C1" value=42 /></td>
						</tr>
						<tr><td>10-12h</td><td><input type="checkbox" id="j1C2" value=2/></td><td><input type="checkbox" id="j2C2" value=9 /></td><td><input type="checkbox" id="j3C2" value=16 /></td><td><input type="checkbox" id="j4C2" value=23 /></td><td><input type="checkbox" id="j5C2" value=30 /></td><td><input type="checkbox" id="j6C2" value=37 checked="true" /></td><td><input type="checkbox" id="j7C2" value=44 checked="true" /></td>
						</tr>
						<tr><td>12-14h</td><td><input type="checkbox" id="j1C3" value=3/></td><td><input type="checkbox" id="j2C3" value=10 /></td><td><input type="checkbox" id="j3C3" value=17 /></td><td><input type="checkbox" id="j4C3" value=24 /></td><td><input type="checkbox" id="j5C3" value=31 /></td><td><input type="checkbox" id="j6C3" value=38 checked="true" /></td><td><input type="checkbox" id="j7C3" value=45 checked="true" /></td>
						</tr>
						<tr><td>14-16h</td><td><input type="checkbox" id="j1C4" value=4/></td><td><input type="checkbox" id="j2C4" value=11 /></td><td><input type="checkbox" id="j3C4" value=18 /></td><td><input type="checkbox" id="j4C4" value=25 /></td><td><input type="checkbox" id="j5C4" value=32 /></td><td><input type="checkbox" id="j6C4" value=39 checked="true" /></td><td><input type="checkbox" id="j7C4" value=46 checked="true" /></td>
						</tr>
						<tr><td>16-18h</td><td><input type="checkbox" id="j1C5" value=5/></td><td><input type="checkbox" id="j2C5" value=12 /></td><td><input type="checkbox" id="j3C5" value=19 /></td><td><input type="checkbox" id="j4C5" value=26 /></td><td><input type="checkbox" id="j5C5" value=33 /></td><td><input type="checkbox" id="j6C5" value=40 checked="true" /></td><td><input type="checkbox" id="j7C5" value=47 checked="true" /></td>
						</tr>
						<tr><td>18-20h</td><td><input type="checkbox" id="j1C6" value=6 checked="true" /></td><td><input type="checkbox" id="j2C6" value=13 checked="true" /></td><td><input type="checkbox" id="j3C6" value=20 checked="true" /></td><td><input type="checkbox" id="j4C6" value=27 checked="true" /></td><td><input type="checkbox" id="j5C6" value=34 checked="true"/></td><td><input type="checkbox" id="j6C6" value=41 checked="true" /></td><td><input type="checkbox" id="j7C6" value=48 checked="true" /></td>
						</tr>
						<tr><td>20-22h</td><td><input type="checkbox" id="j1C7" value=7 checked="true" /></td><td><input type="checkbox" id="j2C7" value=14 checked="true" /></td><td><input type="checkbox" id="j3C7" value=21 checked="true" /></td><td><input type="checkbox" id="j4C7" value=28 checked="true" /></td><td><input type="checkbox" id="j5C7" value=35 checked="true" /></td><td><input type="checkbox" id="j6C7" value=42 checked="true" /></td><td><input type="checkbox" id="j7C7" value=49 checked="true" /></td>
						</tr>

				</table>	

				<input type="hidden" name="idEquipe1" value=<?php echo $team1->id(); ?> />
				<input type="hidden" name="idEquipe2" value=<?php echo $team2->id(); ?> />
				<input type="submit" value="trouver un créneau" />
			</form>


			choisir un créneau à venir
			<form action="module_match_validation_creneau.php" method="post">
						<select id="creneau_match" name="creneau_match">

						</select>
						<input type="hidden" name="id_equipe1" value=<?php echo $team1->id(); ?> />
						<input type="hidden" name="id_equipe2" value=<?php echo $team2->id(); ?> />
						<input type="submit" value="valider" />
			</form>

			choisir un créneau dans le passé
			<form action="module_match_validation_creneau.php" method="post">
						<select id="creneau_match_dans_le_passe" name="creneau_match">

						</select>
						<input type="hidden" name="id_equipe1" value=<?php echo $team1->id(); ?> />
						<input type="hidden" name="id_equipe2" value=<?php echo $team2->id(); ?> />
						<input type="submit" value="valider" />
			</form>
			

			<?php 


	

			$creneauxPris = $Gestionnaire->getAllRencontresCreneaux();




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

			
			var premiereFois = true;
			var nomDesMois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
			var nomDesJours = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
			

			//    ***********************************    VAR GESTION COCHAGE CASES     ***********************************
				var j1C1 = document.getElementById("j1C1");				
				var j1C2 = document.getElementById("j1C2");				
				var j1C3 = document.getElementById("j1C3");			
				var j1C4 = document.getElementById("j1C4");				
				var j1C5 = document.getElementById("j1C5");				
				var j1C6 = document.getElementById("j1C6");				
				var j1C7 = document.getElementById("j1C7");				

				var j2C1 = document.getElementById("j2C1");				
				var j2C2 = document.getElementById("j2C2");				
				var j2C3 = document.getElementById("j2C3");
				var j2C4 = document.getElementById("j2C4");
				var j2C5 = document.getElementById("j2C5");
				var j2C6 = document.getElementById("j2C6");
				var j2C7 = document.getElementById("j2C7");

				var j3C1 = document.getElementById("j3C1");				
				var j3C2 = document.getElementById("j3C2");				
				var j3C3 = document.getElementById("j3C3");
				var j3C4 = document.getElementById("j3C4");
				var j3C5 = document.getElementById("j3C5");
				var j3C6 = document.getElementById("j3C6");
				var j3C7 = document.getElementById("j3C7");

				var j4C1 = document.getElementById("j4C1");				
				var j4C2 = document.getElementById("j4C2");				
				var j4C3 = document.getElementById("j4C3");
				var j4C4 = document.getElementById("j4C4");
				var j4C5 = document.getElementById("j4C5");
				var j4C6 = document.getElementById("j4C6");
				var j4C7 = document.getElementById("j4C7");

				var j5C1 = document.getElementById("j5C1");				
				var j5C2 = document.getElementById("j5C2");				
				var j5C3 = document.getElementById("j5C3");
				var j5C4 = document.getElementById("j5C4");
				var j5C5 = document.getElementById("j5C5");
				var j5C6 = document.getElementById("j5C6");
				var j5C7 = document.getElementById("j5C7");

				var j6C1 = document.getElementById("j6C1");				
				var j6C2 = document.getElementById("j6C2");				
				var j6C3 = document.getElementById("j6C3");
				var j6C4 = document.getElementById("j6C4");
				var j6C5 = document.getElementById("j6C5");
				var j6C6 = document.getElementById("j6C6");
				var j6C7 = document.getElementById("j6C7");

				var j7C1 = document.getElementById("j7C1");				
				var j7C2 = document.getElementById("j7C2");				
				var j7C3 = document.getElementById("j7C3");
				var j7C4 = document.getElementById("j7C4");
				var j7C5 = document.getElementById("j7C5");
				var j7C6 = document.getElementById("j7C6");
				var j7C7 = document.getElementById("j7C7");

				var Evenements = new Array();

				for(i=0; i<8; i++)  //je remplis 64 entrees car les indices 0 ne serviront pas ..
				{
					Evenements[i] =new Array();
					
					for(j=0; j<8; j++)	
					{
						Evenements[i][j] = 0;
					}
				}

				
	//  ***********************************************************

			function add2Hours(uneDate){

				var newDate = new Date(uneDate.getTime() + 120);

				return newDate;
			}
function construireListes(){
			var compteur=0; var creneau=0;

			var matchedInBdd = false; var heures; 

			var dateCourante = new Date();

			dateCourante = new Date(dateCourante.getFullYear(), dateCourante.getMonth(), dateCourante.getDate(), dateCourante.getHours(), 0,0);


			var dateCourantePourSensInverse = new Date(); 

			dateCourantePourSensInverse = new Date(dateCourante.getFullYear(), dateCourante.getMonth(), dateCourante.getDate(), dateCourante.getHours(), 0,0);


			heures = dateCourante.getHours();   

			if(heures >= 8 && heures <10 ){dateCourante.setHours(10);}
			else if(heures >= 10 && heures <12 ){dateCourante.setHours(12);}
			else if(heures >= 12 && heures <14 ){dateCourante.setHours(14);}
			else if(heures >= 14 && heures <16 ){dateCourante.setHours(16);}
			else if(heures >= 16 && heures <18 ){dateCourante.setHours(18);}
			else if(heures >= 18 && heures <20 ){dateCourante.setHours(20);}
			else if(heures >= 20 && heures <22 ){dateCourante.setHours(22);}
			else if(heures >= 22){dateCourante.setHours(8); dateCourante.setDate(dateCourante.getDate() -1);} 
			else if(heures >= 0 && heures <8){dateCourante.setHours(8); } 
			
			
			premiereFois = true; 

			for(i=0; i<=12; i++)	// la liste déroulante contiendra (35 jours de propositions) - (matchs en bdd)
			{
				for(j=8; j <= 20; j = j+2)
				{
					if(premiereFois)
					{
						j = dateCourante.getHours();
						premiereFois = false;
					}
					if(j==8){creneau=1;}if(j==10){creneau=2;}if(j==12){creneau=3;}if(j==14){creneau=4;}
					if(j==16){creneau=5;}if(j==18){creneau=6;}if(j==20){creneau=7;}

					matchedInBdd = false; // cette var passera à true si le créneau est deja pris
									
					dateValeur = dateCourante.getFullYear() + "-" + dateCourante.getMonth() + "-" + dateCourante.getDate() + " " + 
				dateCourante.getHours() + ":00:00";

					dateAAffichage = dateCourante.getFullYear() + ". " + nomDesJours[dateCourante.getDay() ]
					+ " " + dateCourante.getDate() + " " + nomDesMois[dateCourante.getMonth()] + "     " + dateCourante.getHours() + " - "
					+ (dateCourante.getHours() + 2) + " h  " +  "  evenements  " + dateCourante.getDay() +  "  . " + creneau + "  = " + Evenements[dateCourante.getDay()][creneau];

				
					

				if(Evenements[dateCourante.getDay()][creneau] == 1)
				{
				
					for (creneauDejaPris in creneauxDejaPris){


						anneeString_creneauDejaPris = creneauxDejaPris[creneauDejaPris].substr(0,4);  // l'année sur 2 chiffres
						moisString_creneauDejaPris = creneauxDejaPris[creneauDejaPris].substr(5,2);
						jourString_creneauDejaPris = creneauxDejaPris[creneauDejaPris].substr(8,2);
						heureString_creneauDejaPris = creneauxDejaPris[creneauDejaPris].substr(11,2);

						annee_creneauDejaPris = parseInt(anneeString_creneauDejaPris);
						mois_creneauDejaPris = parseInt(moisString_creneauDejaPris);
						jour_creneauDejaPris = parseInt(jourString_creneauDejaPris);
						heure_creneauDejaPris = parseInt(heureString_creneauDejaPris);

						Time_creneauDejaPris = new Date(annee_creneauDejaPris, mois_creneauDejaPris - 1, jour_creneauDejaPris
							, heure_creneauDejaPris, 0, 0);  

						testB.innerHTML = Time_creneauDejaPris.getDay();

						if(dateCourante.getTime() == Time_creneauDejaPris.getTime() )
						{
							matchedInBdd = true;
							
							break;
						}
						else
						{										
							matchedInBdd = false;
						}

					}
				
						
					if(matchedInBdd)
					{
						
					}
					else
					{
						creneau_match.options[compteur] = new Option(dateAAffichage, dateValeur);
						compteur ++;
					}
				}



					if(j == 20)
					{
						dateCourante.setHours(8); dateCourante.setDate(dateCourante.getDate() + 1); 
					}
					else{
						dateCourante.setHours(dateCourante.getHours() + 2);
					}
				}
			}			


//      *************************  SENS INVERSE

			heures = dateCourantePourSensInverse.getHours();

			if(heures >= 12 && heures <14 ){dateCourantePourSensInverse.setHours(10);}      
			else if(heures >= 14 && heures <16 ){dateCourantePourSensInverse.setHours(12);}
			else if(heures >= 16 && heures <18 ){dateCourantePourSensInverse.setHours(14);}
			else if(heures >= 18 && heures <20 ){dateCourantePourSensInverse.setHours(16);}  
			else if(heures >= 20 && heures <22 ){dateCourantePourSensInverse.setHours(18);}  
			else if(heures >= 22 && heures <10 ){dateCourantePourSensInverse.setHours(20); } 
			else if(heures >= 0 && heures <10 ){dateCourantePourSensInverse.setHours(20);  dateCourantePourSensInverse.setDate(dateCourantePourSensInverse.getDate() - 1);} 
			else if(heures >= 10 && heures <12 ){dateCourantePourSensInverse.setHours(8);} 




			compteur = 0;
			premiereFois = true;

			for(i=0; i<=55; i++)	// la liste déroulante contiendra (35 jours de propositions) - (matchs en bdd)
			{
				for(j=20 ; j >=8 ; j = j-2)
				{
					if(premiereFois)
					{
						j = dateCourantePourSensInverse.getHours();
						premiereFois = false;
					}
					if(j==8){creneau=1;}if(j==10){creneau=2;}if(j==12){creneau=3;}if(j==14){creneau=4;}
					if(j==16){creneau=5;}if(j==18){creneau=6;}if(j==20 || j==0){creneau=7;}
					
					dateValeur = dateCourantePourSensInverse.getFullYear() + "-" + dateCourantePourSensInverse.getMonth() + "-" + dateCourantePourSensInverse.getDate() + " " + 
				dateCourantePourSensInverse.getHours() + ":00:00";

					dateAAffichage = dateCourantePourSensInverse.getFullYear() + ". " + nomDesJours[dateCourantePourSensInverse.getDay() ]
					+ " " + dateCourantePourSensInverse.getDate() + " " + nomDesMois[dateCourantePourSensInverse.getMonth()] + "     " + dateCourantePourSensInverse.getHours() + " - "
					+ (dateCourantePourSensInverse.getHours() + 2) + " h  . j = " + j + "  getday : " + dateCourantePourSensInverse.getDay(); 

					matchedInBdd = false; // cette var passera à true si le créneau est deja pris

					

				if(Evenements[dateCourantePourSensInverse.getDay()][creneau] == 1)
				{
					for (creneauDejaPris in creneauxDejaPris){


						anneeString_creneauDejaPris = creneauxDejaPris[creneauDejaPris].substr(0,4);  // l'année sur 2 chiffres
						moisString_creneauDejaPris = creneauxDejaPris[creneauDejaPris].substr(5,2);
						jourString_creneauDejaPris = creneauxDejaPris[creneauDejaPris].substr(8,2);
						heureString_creneauDejaPris = creneauxDejaPris[creneauDejaPris].substr(11,2);

						annee_creneauDejaPris = parseInt(anneeString_creneauDejaPris);
						mois_creneauDejaPris = parseInt(moisString_creneauDejaPris);
						jour_creneauDejaPris = parseInt(jourString_creneauDejaPris);
						heure_creneauDejaPris = parseInt(heureString_creneauDejaPris);

						Time_creneauDejaPris = new Date(annee_creneauDejaPris, mois_creneauDejaPris - 1, jour_creneauDejaPris
							, heure_creneauDejaPris, 0, 0);  

						if(dateCourantePourSensInverse.getTime() == Time_creneauDejaPris.getTime() )
						{
							matchedInBdd = true;
							
							break;
						}
						else
						{										

						}

					}
						
					if(matchedInBdd)
					{
						
					}
					else
					{
						creneau_match_dans_le_passe.options[compteur] = new Option(dateAAffichage, dateValeur);
						compteur ++;
					} 
				}



					if(j == 8)
					{
						dateCourantePourSensInverse.setHours(20); dateCourantePourSensInverse.setDate(dateCourantePourSensInverse.getDate() -1); 
					}
					else{
						dateCourantePourSensInverse.setHours(dateCourantePourSensInverse.getHours() - 2);
					}
				}
			}		
		} // fin fonction	


				function upDateListes(){

				 	if (j1C1.checked == true)
				 	{
				 		Evenements[1][1] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[1][1] = 0;
				 	}
		
				 	if (j1C2.checked == true)
				 	{
				 		Evenements[1][2] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[1][2] = 0;
				 	}

				 	if (j1C3.checked == true)
				 	{
				 		Evenements[1][3] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[1][3] = 0;
				 	}

				 	if (j1C4.checked == true)
				 	{
				 		Evenements[1][4] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[1][4] = 0;
				 	}
				 	if (j1C5.checked == true)
				 	{
				 		Evenements[1][5] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[1][5] = 0;
				 	}
				 	if (j1C6.checked == true)
				 	{
				 		Evenements[1][6] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[1][6] = 0;
				 	}
				 	if (j1C7.checked == true)
				 	{
				 		Evenements[1][7] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[1][7] = 0;
				 	}
				 	if (j2C1.checked == true)
				 	{
				 		Evenements[2][1] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[2][1] = 0;
				 	}
				 	if (j2C2.checked == true)
				 	{
				 		Evenements[2][2] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[2][2] = 0;
				 	}
				 	if (j2C3.checked == true)
				 	{
				 		Evenements[2][3] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[2][3] = 0;
				 	}
				 	if (j2C4.checked == true)
				 	{
				 		Evenements[2][4] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[2][4] = 0;
				 	}
				 	if (j2C5.checked == true)
				 	{
				 		Evenements[2][5] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[2][5] = 0;
				 	}
				 	if (j2C6.checked == true)
				 	{
				 		Evenements[2][6] = 1;
				 	}
				 	else
				 	{
				 		Evenements[2][6] = 0;
				 	}
				 	if (j2C7.checked == true)
				 	{
				 		Evenements[2][7] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[2][7] = 0;
				 	}
				 	if (j3C1.checked == true)
				 	{
				 		Evenements[3][1] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[3][1] = 0;
				 	}
				 	if (j3C2.checked == true)
				 	{
				 		Evenements[3][2] = 1;
				 	}
				 	else
				 	{
				 		Evenements[3][2] = 0;
				 	}
				 	if (j3C3.checked == true)
				 	{
				 		Evenements[3][3] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[3][3] = 0;
				 	}
				 	if (j3C4.checked == true)
				 	{
				 		Evenements[3][4] = 1;
				 	}
				 	else
				 	{
				 		Evenements[3][4] = 0;
				 	}
				 	if (j3C5.checked == true)
				 	{
				 		Evenements[3][5] = 1;
				 	}
				 	else
				 	{
				 		Evenements[3][5] = 0;
				 	}
				 	if (j3C6.checked == true)
				 	{
				 		Evenements[3][6] = 1;
				 	}
				 	else
				 	{
				 		Evenements[3][6] = 0;
				 	}
				 	if (j3C7.checked == true)
				 	{
				 		Evenements[3][7] = 1;
				 	}
				 	else
				 	{
				 		Evenements[3][7] = 0;
				 	}
				 	if (j4C1.checked == true)
				 	{
				 		Evenements[4][1] = 1;
				 	}
				 	else
				 	{
				 		Evenements[4][1] = 0;
				 	}
				 	if (j4C2.checked == true)
				 	{
				 		Evenements[4][2] = 1;
				 	}
				 	else
				 	{
				 		Evenements[4][2] = 0;
				 	}
				 	if (j4C3.checked == true)
				 	{
				 		Evenements[4][3] = 1;
				 	}
				 	else
				 	{
				 		Evenements[4][3] = 0;
				 	}
				 	if (j4C4.checked == true)
				 	{
				 		Evenements[4][4] = 1;
				 	}
				 	else
				 	{
				 		Evenements[4][4] = 0;
				 	}
				 	if (j4C5.checked == true)
				 	{
				 		Evenements[4][5] = 1;
				 	}
				 	else
				 	{
				 		Evenements[4][5] = 0;
				 	}
				 	if (j4C6.checked == true)
				 	{
				 		Evenements[4][6] = 1;
				 	}
				 	else
				 	{
				 		Evenements[4][6] = 0;
				 	}
				 	if (j4C7.checked == true)
				 	{
				 		Evenements[4][7] = 1;
				 	}
				 	else
				 	{
				 		Evenements[4][7] = 0;
				 	}

				 	if (j5C1.checked == true)
				 	{
				 		Evenements[5][1] = 1;
				 	}
				 	else
				 	{
				 		Evenements[5][1] = 0;
				 	}
				 	if (j3C2.checked == true)
				 	{
				 		Evenements[3][2] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[3][2] = 0;
				 	}
				 	if (j5C3.checked == true)
				 	{
				 		Evenements[5][3] = 1;
				 	}
				 	else
				 	{
				 		Evenements[5][3] = 0;
				 	}
				 	if (j5C4.checked == true)
				 	{
				 		Evenements[5][4] = 1;
				 	}
				 	else
				 	{
				 		Evenements[5][4] = 0;
				 	}
				 	if (j5C5.checked == true)
				 	{
				 		Evenements[5][5] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[5][5] = 0;
				 	}
				 	if (j5C6.checked == true)
				 	{
				 		Evenements[5][6] = 1;
				 	}
				 	else
				 	{
				 		Evenements[5][6] = 0;
				 	}
				 	if (j5C7.checked == true)
				 	{
				 		Evenements[5][7] = 1;
				 	}
				 	else
				 	{
				 		Evenements[5][7] = 0;
				 	}
				 	if (j6C1.checked == true)
				 	{
				 		Evenements[6][1] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[6][1] = 0;
				 	}
				 	if (j6C2.checked == true)
				 	{
				 		Evenements[6][2] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[6][2] = 0;
				 	}
				 	if (j6C3.checked == true)
				 	{
				 		Evenements[6][3] = 1;
				 	}
				 	else
				 	{
				 		Evenements[6][3] = 0;
				 	}
				 	if (j6C4.checked == true)
				 	{
				 		Evenements[6][4] = 1;
				 	}
				 	else
				 	{
				 		Evenements[6][4] = 0;
				 	}
				 	if (j6C5.checked == true)
				 	{
				 		Evenements[6][5] = 1;
				 	}
				 	else
				 	{
				 		Evenements[6][5] = 0;
				 	}
				 	if (j6C6.checked == true)
				 	{
				 		Evenements[6][6] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[6][6] = 0;
				 	}
				 	if (j6C7.checked == true)
				 	{
				 		Evenements[6][7] = 1;
				 	}
				 	else
				 	{
				 		Evenements[6][7] = 0;
				 	}
				 	if (j7C1.checked == true)
				 	{
				 		Evenements[0][1] = 1;
				 	}
				 	else
				 	{
				 		Evenements[0][1] = 0;
				 	}
				 	if (j7C2.checked == true)
				 	{
				 		Evenements[0][2] = 1;
				 	}
				 	else
				 	{
				 		Evenements[0][2] = 0;
				 	}
				 	if (j7C3.checked == true)
				 	{
				 		Evenements[0][3] = 1;
				 	}
				 	else
				 	{
				 		Evenements[0][3] = 0;
				 	}
				 	if (j7C4.checked == true)
				 	{
				 		Evenements[0][4] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[0][4] = 0;
				 	}
				 	if (j7C5.checked == true)
				 	{
				 		Evenements[0][5] = 1;
				 	}
				 	else
				 	{
				 		Evenements[0][5] = 0;
				 	}
				 	if (j7C6.checked == true)
				 	{
				 		Evenements[0][6] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[0][6] = 0;
				 	}
				 	if (j7C7.checked == true) 
				 	{
				 		Evenements[0][7] = 1; 
				 	}
				 	else
				 	{
				 		Evenements[0][7] = 0;
				 	}

				 	construireListes();     testB.innerHTML = testB.innerHTML + " ev ";

				 	for(i=1; i<8; i++)  //je remplis 64 entrees car les indices 0 ne serviront pas ..
					{					
						for(j=1; j<8; j++)	
						{
						//	testB.innerHTML = testB.innerHTML + " ev " + i + ", " + j + " : "; // + Evenements[i][j];
						}
					}

				}

				upDateListes();
 

				

				 j1C1.addEventListener("click", function() {	upDateListes();
                },false); 

			 j1C2.addEventListener("click", function() {	upDateListes();

				 },false); 

				j1C3.addEventListener("click", function() {	 	upDateListes();

				 },false); 

				j1C4.addEventListener("click", function() {		upDateListes();

				 },false); 

				j1C5.addEventListener("click", function() {	 	upDateListes();

				 },false); 

				j1C6.addEventListener("click", function() {	 	upDateListes();

				 },false); 

				j1C7.addEventListener("click", function() {	 	upDateListes();

				 },false); 


				j2C1.addEventListener("click", function() {	 	upDateListes();

                },false); 

				 j2C2.addEventListener("click", function() { 	upDateListes();

				 },false); 

				j2C3.addEventListener("click", function() {	 	upDateListes();

				 },false); 

				j2C4.addEventListener("click", function() {	 	upDateListes();

				 },false); 

				j2C5.addEventListener("click", function() {	 	upDateListes();

				 },false); 

				j2C6.addEventListener("click", function() {	 	upDateListes();

				 },false); 

				j2C7.addEventListener("click", function() {	 	upDateListes();

				 },false); 


				j3C1.addEventListener("click", function() {	 	upDateListes();

                },false); 

				 j3C2.addEventListener("click", function() { 	upDateListes();

				 },false); 

				j3C3.addEventListener("click", function() {		upDateListes();

				 },false); 

				j3C4.addEventListener("click", function() {	 	upDateListes();

				 },false); 

				j3C5.addEventListener("click", function() {		upDateListes();

				 },false); 

				j3C6.addEventListener("click", function() {	 	upDateListes();

				 },false); 

				j3C7.addEventListener("click", function() {	 	upDateListes();

				 },false); 


				j4C1.addEventListener("click", function() {	 	upDateListes();
                },false); 

				 j4C2.addEventListener("click", function() { 	upDateListes();

				 },false); 

				j4C3.addEventListener("click", function() {	 	upDateListes();

				 },false); 

				j4C4.addEventListener("click", function() {	 	upDateListes();

				 },false); 

				j4C5.addEventListener("click", function() { 	upDateListes();

				 },false); 

				j4C6.addEventListener("click", function() {	 	upDateListes();

				 },false); 

				j4C7.addEventListener("click", function() {		upDateListes(); },false);  
			

		j5C1.addEventListener("click", function() {			upDateListes(); },false); 

			 j5C2.addEventListener("click", function() {			upDateListes(); },false); 


				j5C3.addEventListener("click", function() {			upDateListes(); },false); 


					j5C4.addEventListener("click", function() {		upDateListes(); },false); 

					j5C5.addEventListener("click", function() {	upDateListes(); },false); 

				j5C6.addEventListener("click", function(){		upDateListes(); },false); 

				j5C7.addEventListener("click", function() {			upDateListes(); },false); 

			j6C1.addEventListener("click", function() {			upDateListes(); },false); 
				 j6C2.addEventListener("click", function() {			upDateListes(); },false); 

				j6C3.addEventListener("click", function() {			upDateListes(); },false); 

				j6C4.addEventListener("click", function() {			upDateListes(); },false); 

				j6C5.addEventListener("click", function() {			upDateListes(); },false); 

				j6C6.addEventListener("click", function() {			upDateListes(); },false); 

				j6C7.addEventListener("click", function() {			upDateListes(); },false); 
			

			j7C1.addEventListener("click", function() {			upDateListes(); },false); 

				 j7C2.addEventListener("click", function() {			upDateListes(); },false); 

				j7C3.addEventListener("click", function(){			upDateListes(); },false); 

				j7C4.addEventListener("click", function() {			upDateListes(); },false); 

				j7C5.addEventListener("click", function(){		upDateListes(); },false); 

				j7C6.addEventListener("click", function() {			upDateListes(); },false); 

				j7C7.addEventListener("click", function() {		upDateListes(); },false);   


			
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
