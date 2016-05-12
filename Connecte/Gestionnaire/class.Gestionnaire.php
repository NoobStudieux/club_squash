<?php		//			class.Gestionnaire.php

class Gestionnaire
{
	private $db;

	public function __construct(PDO $bdd)
	{
		$this->db = $bdd;
	}
	public function InscriptionJoueur($nom)
	{

				$joueur = new Joueur($nom);

		if($this->isNomJoueurLibre($nom))
		{
				$req = $this->db->prepare("INSERT INTO Joueurs(nom, validite, classement, points, date_creation)
														VALUES (:nom, :validite, :classement, :points, :date_creation)");
				$req->bindValue(':nom', $joueur->nom());
				$req->bindValue(':validite', $joueur->validite());
				$req->bindValue(':classement', $joueur->classement());
				$req->bindValue(':points', $joueur->points()); 
				$req->bindValue(':date_creation', $joueur->dateCreation());

				$req->execute();
				$req->closeCursor();

				$nom = $joueur->nom();

				$req = $this->db->query("SELECT ID FROM Joueurs WHERE nom='$nom'");
				$id = $req->fetch();
				$joueur->setId($id['ID']);
				$joueur->Afficher();

				return $joueur;
				echo "requete insertion <br />";
				
		}

		else {echo "Joueur existant déjà dans la base <br />"; return false;}

	}
	public function isNomJoueurLibre($nom)
	{
		$listing = $this->db->query("SELECT nom FROM Joueurs");
		$uniciteNom = true; 
		while($list = $listing->fetch())
		{
			if($list['nom'] == $nom)
			{
				$uniciteNom = false;
			}
		}
		$listing->closeCursor();

		return $uniciteNom;
	}
	public function isNomEquipeLibre($nom)
	{
		$listing = $this->db->query("SELECT nom FROM Equipes");
		$uniciteNom = true; 
		while($list = $listing->fetch())
		{
			if($list['nom'] == $nom)
			{
				$uniciteNom = false;
			}
		}
		$listing->closeCursor();

		return $uniciteNom;
	}
	public function joueurFromId($id_joueur)
	{
		$req = $this->db->query("SELECT * FROM Joueurs WHERE ID=$id_joueur");
		$donn = $req->fetch();
		$joueur = new Joueur($donn['nom']);
		$idEquipes = [$donn['id_equipe1'], $donn['id_equipe2'], $donn['id_equipe3'], $donn['id_equipe4']]; 
		$joueur->setId($donn['ID']);
		$joueur->setIdEquipes($idEquipes); 
		$joueur->setPoints($donn['points']);
		$joueur->setClassement($donn['classement']);
		$joueur->setValidite($donn['validite']);
		$joueur->setDateCreation($donn['date_creation']); 

		return $joueur;
	}
	public function equipeFromId($id_equipe)
	{
		$req = $this->db->query("SELECT * FROM Equipes WHERE ID=$id_equipe");
		$donn = $req->fetch();
		$team = new Equipe($donn['nom']);
		$team->setId($donn['ID']);
		$idJoueurs = [$donn['idJ1'], $donn['idJ2'], $donn['idJ3'], $donn['idJ4'], $donn['idJ5']]; 
		$team->setIdJoueurs($idJoueurs);
		$team->setPoints($donn['points']);
		$team->setClassement($donn['classement']);
		$team->setPrete($this->db);
		$team->setDateCreation($donn['date_creation']);

		return $team;
	}
	public function rencontreFromId($id_rencontre)
	{
		$req = $this->db->query("SELECT * FROM Rencontres WHERE ID=$id_rencontre");
		$donnees = $req->fetch();

		$date_rencontre = $donnees['date_rencontre'];
		$team1 = $this->equipeFromId($donnees['id_equipe1']);
		$team2 = $this->equipeFromId($donnees['id_equipe2']);

		$rencontre = new Rencontre($team1, $team2, $date_rencontre);

		$rencontre->setId($donnees['ID']);
		$rencontre->setNom($donnees['nom']);
		$rencontre->setJoueeOuNon($donnees['jouee_ou_non']);

		if($rencontre->joueeOuNon() == 0)
		{
		}
		else
		{
			$rencontre->setIdVainqueur($donnees['id_vainqueur']);
			$rencontre->setScoreEquipeGagnante($donnees['score_equipe_gagnante']);
			$rencontre->setScoreEquipePerdante($donnees['score_equipe_perdante']);
		}

		return $rencontre;
	}
	public function InscriptionEquipe($nom)
	{
			$req = $this->db->query("SELECT nom FROM Equipes"); $uniciteEquipe = true;
			while($donnees = $req->fetch())
			{
				if($nom == $donnees['nom'])
				{
					$uniciteEquipe = false;
				}
			}
			if($uniciteEquipe == true)
			{
				$team = new Equipe($nom);

				$req = $this->db->prepare("INSERT INTO Equipes(nom, classement, date_creation)
														VALUES (:nom, :classement, :date_creation)");
				$req->bindValue(':nom', $nom);
				$req->bindValue(':classement', $team->classement()); 
				$req->bindValue(':date_creation', $team->dateCreation()); 

				$req->execute();
				$req->closeCursor();

				$req = $this->db->query("SELECT ID FROM Equipes WHERE nom = '$nom'");
				$don = $req->fetch();
				$team->setId($don['ID']);

				return $team;
			}
			else
			{
				echo "<br /> ce nom d'équipe est déjà pris<br />"; return false;
			}
	}
	public function ajoutJoueur(Equipe $team, Joueur $joueur)
	{
		$id_equipe = (int)$team->id();
		$equipe = $this->db->query("SELECT * FROM Equipes WHERE ID=$id_equipe");
		$joueurDejaInscrit = false;
		while($eq = $equipe->fetch())
		{
			if(($joueur->id() == $eq['idJ1']) || ($joueur->id() == $eq['idJ2']) || ($joueur->id() == $eq['idJ3']) || ($joueur->id() == $eq['idJ4']) ||($joueur->id() == $eq['idJ5']))
			{
				$joueurDejaInscrit = true;
			}

		}
		if(($joueurDejaInscrit == false))
		{
		
			if(($joueur->idEquipeDispo() !=0))
			{
				if(($team->idJoueurDispo() !=0))
				{
					$id_equip = (string)("id_equipe". $joueur->idEquipeDispo());
					$id_joueur = (int)$joueur->id();
					$req = $this->db->prepare("UPDATE Joueurs SET $id_equip = $id_equipe WHERE ID=$id_joueur");
					$joueur->setIdEquipe($team->id(), $joueur->idEquipeDispo());

					$req->execute();	
					$req->closeCursor();

					$id_jr = (string)("idJ". $team->idJoueurDispo());
					$req = $this->db->prepare("UPDATE Equipes SET $id_jr = $id_joueur WHERE ID=$id_equipe");
					$team->setIdj($joueur->id(), $team->idJoueurDispo());
					$team->setPrete($this->db);

					$req->execute();	
					$req->closeCursor();

					return $team;
				}
				else
				{
					echo "<br />Ajout du joueur impossible : Déjà 5 joueurs dans cette équipe<br />";
				}
				
			}
			else
			{
				echo "<br />Ajout du joueur impossible : Déjà dans 4 équipes<br />";
			}
		}
		else
		{
			echo "<br />Ajout du joueur impossible : Joueur déjà inscrit dans cette équipe !<br />";
		}
	}
	public function joueurDansEquipe(Equipe $team, Joueur $joueur)
	{
		$idJoueursEquipe = [$team->idJ1(), $team->idJ2(), $team->idJ3(), $team->idJ4(), $team->idJ5()];
		$idEquipesDuJoueur = [$joueur->Ideq1(), $joueur->Ideq2(), $joueur->Ideq3(), $joueur->Ideq4()];
		$joueurPresentDansEquipe = false;
		$equipeAppartientAuJoueur = false;

		foreach($idJoueursEquipe as $id_joueur)
		{
		 	if($joueur->id() == $id_joueur)
		 	{
		 		$joueurPresentDansEquipe = true;		
		 								echo "<br />le joueur est bien inscris dans l'équipe (dans IdJ de l'equipe) ...<br />";
		 	}
		}
		 if($joueurPresentDansEquipe == true)
		{
		 	foreach($idEquipesDuJoueur as $idEquipe)
		 	{
		 		if($team->id() == $idEquipe)
		 		{		
		 								echo "<br />l'équipe appartient bien au joueur (inscris dans le id_equipe du joueur...<br />";
		 			$equipeAppartientAuJoueur = true;
		 		}
		 	}
		 	if($equipeAppartientAuJoueur == true)
		 	{
		 		echo "l'appartenance est validée et la jointure vérifiée <br />";
		 		return true;
		 	}
		 	else
		 	{
		 		echo "l'équipe n'appartient pas au joueur (non inscris dans le id_equipe du joueur... <br />PROBLEME DE JOINTURE ! <br />";
		 		return false;
		 	}
		}
		else
		{
			return false;
		}
		 
	}
	public function retraitJoueur(Equipe $team, Joueur $joueur)
	{
		$id_joueur = $joueur->id(); $id_team = $team->id();
		if($this->joueurDansEquipe($team, $joueur))
		{
			for($i=1; $i < 6; $i++)
			{
				$id_eq = (string)("id_equipe". $i);
				try
				{
					$req = $this->db->prepare("UPDATE Joueurs SET $id_eq=NULL WHERE $id_eq=$id_team AND ID=$id_joueur;");
					$req ->execute();
					$req ->closeCursor();

					if($i == 1){$team->setIdJ1(0);}elseif($i == 2){$team->setIdJ2(0);}elseif($i == 3){$team->setIdJ3(0);}
					elseif($i == 4){$team->setIdJ4(0);}elseif($i == 5){$team->setIdJ5(0);}

					echo "unset id_equipe".$i." pour joueur ".$joueur->nom().'<br />';
				}
				catch(Exception $e)
				{
					echo "exception : ".$e->getMessage();
				}
			
			}
			for($i=1; $i < 6; $i++)
			{
				$id_jr = (string)("idJ". $i);
				$req = $this->db->prepare("UPDATE Equipes SET $id_jr=NULL WHERE $id_jr=$id_joueur AND ID=$id_team;");
				$req ->execute();
				$req ->closeCursor();
			}
			$team->setPrete($this->db);
		}
		else
		{
			echo "<br />Ce joueur ".$joueur->nom()." n'appartient pas à l'équipe ".$team->nom()." <br /> ";
		}
	}
	public function creationRencontre($idTteam1,$idTteam2, $creneau)
	{
		$team1 = $this->equipeFromId($idTteam1);
		$team2 = $this->equipeFromId($idTteam2);

		$rencontre = new Rencontre($team1, $team2, $creneau);

		$req = $this->db->prepare("INSERT INTO Rencontres(id_equipe1, id_equipe2, date_rencontre,jouee_ou_non) 
																VALUES (:id_equipe1,:id_equipe2,:date_rencontre, :jouee_ou_non)");
		$req->bindValue(":id_equipe1", $rencontre->idEquipe1());
		$req->bindValue(":id_equipe2", $rencontre->idEquipe2());
		$req->bindValue(":date_rencontre", $rencontre->dateRencontre());
		$req->bindValue(":jouee_ou_non", $rencontre->joueeOuNon());
		$req->execute();
		$req->closeCursor();

		$dateRencontre = $rencontre->dateRencontre();

		$i = $this->db->query("SELECT ID FROM Rencontres WHERE date_rencontre='$dateRencontre'");
		$ii = $i->fetch();
		$idRencontre = $ii['ID'];
		$rencontre->setId($idRencontre);

		echo "<br /> fonction création rencontre ! <br />";
		$rencontre->Afficher($this->db);

		return $rencontre;
	}
	public function supprimerRencontre(Rencontre $rencontre)
	{
		$idRencontre = $rencontre->id();

		$req = $this->db->prepare("DELETE FROM Rencontres WHERE ID=$idRencontre");
		$req->execute();
		$req->closeCursor();
	}

	public function declarerJoueurBlesse(Joueur $joueur)
	{
		$joueur->setValidite('blesse');
		$id_joueur = $joueur->id();
		$req = $this->db->prepare("UPDATE Joueurs SET validite='blesse' WHERE ID=$id_joueur");
		$req->execute();
		$req ->closeCursor();

		return false;
	}
	public function declarerJoueurValide(Joueur $joueur)
	{
		$joueur->setValidite('valide');
		$id_joueur = $joueur->id();
		$req = $this->db->prepare("UPDATE Joueurs SET validite='valide' WHERE ID=$id_joueur");
		$req->execute();
		$req ->closeCursor();

		return true;
	}
	public function changementNomJoueur(Joueur $joueur, $nouveau_nom)
	{
		if($this->isNomJoueurLibre($nouveau_nom))
		{
			$joueur->setNom($nouveau_nom); echo "nom is libre";
			$id_joueur = $joueur->id();
			$req = $this->db->prepare("UPDATE Joueurs SET nom='$nouveau_nom' WHERE ID=$id_joueur");
			$req->execute();
			$req ->closeCursor();
			return true;
		}
		else{ return false; }
	}
	public function changementNomEquipe(Equipe $team, $nouveau_nom)
	{
		if($this->isNomEquipeLibre($nouveau_nom))
		{
			$team->setNom($nouveau_nom);
			$id_equipe = $team->id();
			$req = $this->db->prepare("UPDATE Equipes SET nom='$nouveau_nom' WHERE ID=$id_equipe");
			$req->execute();
			$req ->closeCursor();

			return true;
		}
		else{ return false; }
	}

	public function nbrJoueursValides($team)
	{
		$joueurs = [$team->idJ1(), $team->idJ2(), $team->idJ3(), $team->idJ4(), $team->idJ5()];
		$nbre_joueurs_valides = 0;
		foreach($joueurs as $id_joueur)
		{	
			if($id_joueur != 0 && $id_joueur != NULL)
			{
				$joueur = $this->joueurFromId($id_joueur);
				if($joueur->validite() == 'valide')
				{
					$nbre_joueurs_valides ++;
				}
			}
			
		}
		return $nbre_joueurs_valides;
	}
	public function getNbJoueursDansEquipe(Equipe $team)
	{
			$nb_joueurs =0;
			$idJoueurs = [$team->idJ1(), $team->idJ2(), $team->idJ3(), $team->idJ4(), $team->idJ5()];

			foreach ($idJoueurs as $idJoueur)
			{
				if($idJoueur >0 )
				{
					$nb_joueurs ++;
				}
			}
			return $nb_joueurs;
	}
	public function getNomJoueurFromId($id_joueur)
	{
		$req = $this->db->query("SELECT nom FROM Joueurs WHERE ID=$id_joueur");
		$donn = $req->fetch();

		return $donn['nom'];
	}
	public function restePlaceDansEquipe(Equipe $team)
	{
		$inscriptible = false;
		if($this->getNbJoueursDansEquipe($team) > 4)
		{

		}
		else
		{
			$inscriptible = true;
		}
		return $inscriptible;
	}
	public function joueurInscriptible(Joueur $joueur)
	{
		$inscriptible = false;

		if($this->getNombresEquipesDunJoueur($joueur) < 4)
		{
			$inscriptible = true;
		}

		return $inscriptible;
	}
	public function getNombresEquipesDunJoueur(Joueur $joueur)
	{
		$equipes = [$joueur->Ideq1(), $joueur->Ideq2(), $joueur->Ideq3(), $joueur->Ideq4()];
		$nb_equipes = 0;

		foreach($equipes as $equipe)
		{
			if($equipe !=0 && $equipe!= NULL)
			{
				$nb_equipes ++;
			}
		}

		return $nb_equipes;
	}
	public function getNombreJoueursDansEquipe($team)
	{
		$joueurs = [$team->idJ1(), $team->idJ2(), $team->idJ3(), $team->idJ4(), $team->idJ5()];
		$nbJoueurs = 0;

		foreach($joueurs as $joueur)
		{
			if(($joueur != 0) && ($joueur != NULL))
			{
				$nbJoueurs ++;
			}
		}
		return $nbJoueurs;
	}
	public function nbJoueursValidesDansEquipe(Equipe $team)
	{
		$joueurs = [$team->idJ1(), $team->idJ2(), $team->idJ3(), $team->idJ4(), $team->idJ5()];
		$nbJoueursValides = 0;

		foreach($joueurs as $joueur)
		{
			$myPlayer = $this->joueurFromId($joueur);
			if($myPlayer->isValide())
			{
				$nbJoueursValides ++;
			}
		}

		return $nbJoueursValides;
	}
	
	public function getClassementJoueurs()		// tous ces gets sont plutot des affichs (ne retournent rien)
	{
		$joueurs = $this->db->query("SELECT * FROM Joueurs ORDER BY classement ASC");
		while($j = $joueurs->fetch())
		{
			$joueur = $this->joueurFromId($j['ID']);
			$joueur->Afficher();
		}
	}
	public function getClassementEquipes()
	{
		$teams = $this->db->query("SELECT * FROM Equipes ORDER BY classement ASC");
		while($t = $teams->fetch())
		{
			$team = $this->equipeFromId($t['ID']);
			$team->Afficher($this->db);
		}
	}
	public function affich1JoueurFromId($idJoueur)
	{
			$joueur = $this->joueurFromId($idJoueur);

			echo "<div class='nomDiscretJoueur'>
						<form method='post' action='Connecte/Joueur/module_joueur_edition.php'>".$idJoueur." - ".$joueur->nom()."  
													<input type='hidden' value=$idJoueur name='id_joueur' /><input type='submit' value='Manager' />";
					if($joueur->isValide())
					{
						echo " <a class='changementOK'>   On</a>";
					}
					else
					{	
						echo " <a class='changementKO'>   Off</a>";
					}
					
			echo "		</form>
					</div> <br />";
		
	}
	public function affichJoueursParIds()
	{
		$joueurs = $this->db->query("SELECT * FROM Joueurs ORDER BY ID ASC");
		while($j = $joueurs->fetch())
		{
			$this->affich1JoueurFromId($j['ID']);
		}
	}
	public function affich1EquipeFromId($idTeam)
	{
			$equipe = $this->equipeFromId($idTeam);
			$id_equipe = $equipe->id();
			echo "<div class='nomDiscretEquipe'>
						<form method='post' action='Connecte/Equipe/module_equipe_edition.php'>
													".$id_equipe." - ".$equipe->nom()."  
													<input type='hidden' value=$id_equipe name='id_equipe' /><input type='submit' value='Gérer' />";
						
			if($equipe->isPrete())
					{
						echo " <a class='changementOK'>   On</a>";
					}
					else
					{	
						echo " <a class='changementKO'>   Off</a>";
					}
			echo "</form> <br />
					</div>";

	}
	public function affichEquipesParIds()
	{
		$teams = $this->db->query("SELECT * FROM Equipes ORDER BY ID ASC");
		while($t = $teams->fetch())
		{
			$this->affich1EquipeFromId($t['ID']);
		}
	}
	public function afficherEquipesdUnJoueur(Joueur $joueur)
	{
		$equipesId = [$joueur->Ideq1(), $joueur->Ideq2(), $joueur->Ideq3(), $joueur->Ideq4()];

		foreach($equipesId as $equipeId)
		{
			if($equipeId !=0)
			{
				$team = $this->equipeFromId($equipeId);
				$team->Afficher($this->db); ?>
				<form action="Connecte/Joueur/module_joueur_desinscription.php" method="post">
					<input type="hidden" name="id_equip" value=<?php echo $equipeId; ?> />
					<input type="submit"  value="se désinscrire" />

				</form>
		<?php

			}
		}
	}
	public function afficherEquipesLibresPourUnJoueur(Joueur $joueur) 
	{
		$equipesId = [$joueur->Ideq1(), $joueur->Ideq2(), $joueur->Ideq3(), $joueur->Ideq4()];
		$teams = $this->db->query("SELECT * FROM Equipes ORDER BY nom");

		if(!$this->joueurInscriptible($joueur))
		{
							?>		<div class="sousElement">
										<a class='note'>Joueur déjà inscris dans 4 équipes</a><br />
									</div>
							<?php
		}

		while($t = $teams->fetch())
		{

			if( $joueur->Ideq1() != $t['ID'] && $joueur->Ideq2() != $t['ID'] 
				&& $joueur->Ideq3() != $t['ID'] &&  $joueur->Ideq4() != $t['ID'])	// si mon joueur n'appartient pas à l'équipe...
			{
					$team = $this->equipeFromId($t['ID']);

					if($this->restePlaceDansEquipe($team) && ($this->joueurInscriptible($joueur)))
					{
		?>

							<div>
							<?php 

									$team->Afficher($this->db);
								  		
							?>
									<form action="Connecte/Joueur/module_joueur_inscription.php" method="post">
										<input type="hidden" name="id_equip" value=<?php echo $team->id(); ?> />
										<input type="submit"  value="inscrire ici" />
									</form>

							</div>
		<?php
					}
					else
					{
		?>							
							<div>
							<?php 

									$team->Afficher($this->db);
							
						if(!$this->restePlaceDansEquipe($team))
						{
							?>
									<a class='italique'>Cette équipe est pleine</a><br /><br />
							<?php
						}
							?>

							</div>
		<?php 		}

				 
			}
		}	
	}
	public function afficherAutresJoueursQueTeam(Equipe $team)
	{
		$I = $this->db->query("SELECT ID FROM Joueurs ORDER BY ID");

		if($this->getNombreJoueursDansEquipe($team) == 5)
		{
			?>
					<div class="italique">
							Déjà 5 joueurs dans cette équipe.
					</div>
			<?php
		}
		while($Ids = $I->fetch())
		{
			if($team->IdJ1() != $Ids['ID'] && $team->IdJ2() != $Ids['ID'] && $team->IdJ3() != $Ids['ID'] &&
			 $team->IdJ4() != $Ids['ID'] && $team->IdJ5() != $Ids['ID'])
			{
				$joueur = $this->joueurFromId($Ids['ID']);
				$joueur->Afficher();

				if($this->getNombresEquipesDunJoueur($joueur) < 4)
				{
						if($this->getNombreJoueursDansEquipe($team) < 5)
						{
			?>										<form action="Connecte/Joueur/module_joueur_inscription.php" method="post">
														<input type='hidden' name='id_joueur' value=<?php echo $joueur->id();?> />
														<input type="submit" value="inscrire" />
													</form>



			<?php 		}
				}
				else
				{
			?>
						<a class='italique'>Ce joueur est déjà dans 4 équipes</a><br /><br />
			<?php
				}
			}
		}
	}
	public function ajoutPointsJoueurSuiteVICTOIREMatch(Joueur $joueur, $scoreEquipe)
	{
		$pointsTotauxJoueur = $joueur->points() + 3 + $scoreEquipe*2;
		$idJoueur = $joueur->id();
		$joueur->setPoints($pointsTotauxJoueur);

		$req = $this->db->prepare("UPDATE Joueurs SET points =$pointsTotauxJoueur WHERE ID=$idJoueur");
		$req->execute();
		$req->closeCursor();
	}
	public function ajoutPointsJoueurSuiteDEFAITEMatch(Joueur $joueur, $scoreEquipe)
	{
		$pointsTotauxJoueur = $joueur->points() + $scoreEquipe;
		$idJoueur = $joueur->id();
		$joueur->setPoints($pointsTotauxJoueur);

		$req = $this->db->prepare("UPDATE Joueurs SET points =$pointsTotauxJoueur WHERE ID=$idJoueur");
		$req->execute();
		$req->closeCursor();
	}
	public function ajoutPointsEquipeSuiteVICTOIREMatch(Equipe $team, $scoreEquipe)
	{
		$pointsTotauxEquipe = $team->points() + 20 + $scoreEquipe*5 ;
		$idEquipe = $team->id();
		$joueursEquipe =  [$team->idJ1(), $team->idJ2(), $team->idJ3(), $team->idJ4(), $team->idJ5()];
		$team->setPoints($pointsTotauxEquipe);

		$req = $this->db->prepare("UPDATE Equipes SET points =$pointsTotauxEquipe WHERE ID=$idEquipe");
		$req->execute();
		$req->closeCursor();

		foreach($joueursEquipe as $joueurEquipe)
		{
			if(($joueurEquipe != 0) || ($joueurEquipe != NULL))
			{
				$joueur = $this->joueurFromId($joueurEquipe);
				$this->ajoutPointsJoueurSuiteVICTOIREMatch($joueur, $scoreEquipe);
			}
		}
	}
	public function ajoutPointsEquipeSuiteDEFAITEMatch(Equipe $team, $scoreEquipe)
	{
		$pointsTotauxEquipe = $team->points() + $scoreEquipe*3 ;
		$idEquipe = $team->id();
		$joueursEquipe =  [$team->idJ1(), $team->idJ2(), $team->idJ3(), $team->idJ4(), $team->idJ5()];
		$team->setPoints($pointsTotauxEquipe);

		$req = $this->db->prepare("UPDATE Equipes SET points =$pointsTotauxEquipe WHERE ID=$idEquipe");
		$req->execute();
		$req->closeCursor();

		foreach($joueursEquipe as $joueurEquipe)
		{
			if(($joueurEquipe != 0) || ($joueurEquipe != NULL))
			{
				$joueur = $this->joueurFromId($joueurEquipe);
				$this->ajoutPointsJoueurSuiteDEFAITEMatch($joueur, $scoreEquipe);
			}
		}
	}
	public function upDateClassementGeneral()
	{
		$this->upDateClassementJoueurs();
		$this->upDateClassementEquipes();

	}
	public function upDateClassementJoueurs()
	{
		$j = $this->db->query("SELECT ID,points, classement FROM Joueurs ORDER BY points DESC");
		$classement = 0;
		$pointsJoueursPrecedent = NULL;

		while($joueurs = $j->fetch())
		{
			$idJoueur = $joueurs['ID'];

			if($pointsJoueursPrecedent != $joueurs['points'])
			{
				$classement ++;	

				echo "!=  ";
			}
			elseif($pointsJoueursPrecedent == $joueurs['points'])
			{
				
				echo "== ";
			}
			if($classement != $joueurs['classement'])
			{	
					$req = $this->db->prepare("UPDATE Joueurs SET classement =$classement WHERE ID=$idJoueur");
					$req->execute();
					$req->closeCursor();
			}
		/*	echo "Id joueur : ".$idJoueur." points: ".$joueurs['points']." classement actuel : ".$joueurs['classement'].
			" recalculé : ".$classement." Points joueur précédent :".$pointsJoueursPrecedent."<br />";  */
		$pointsJoueursPrecedent = $joueurs['points'];
		}
	}
	public function upDateClassementEquipes()
	{
		$eq = $this->db->query("SELECT ID,points, classement FROM Equipes ORDER BY points DESC");
		$classement = 0;
		$pointsEquipePrecedente = NULL;

		while($equipes = $eq->fetch())
		{
			$idEquipe = $equipes['ID'];

			if($pointsEquipePrecedente != $equipes['points'])
			{
				$classement ++;	
			}
			elseif($pointsEquipePrecedente == $equipes['points'])
			{
				
			}
			if($classement != $equipes['classement'])
			{
					$req = $this->db->prepare("UPDATE Equipes SET classement =$classement WHERE ID=$idEquipe");
					$req->execute();
					$req->closeCursor();	
			}
			

			$pointsEquipePrecedente = $equipes['points'];
		}
	}
	public function listeDeroulanteEquipes4Match()   // il faudra encadrer cette fonction d'un select et /select
	{
			
			for($i= 1; $i<3; $i++)
			{
				$equipes = $this->db->query("SELECT ID,nom FROM Equipes WHERE en_jeu = 'en jeu'  ORDER BY ID");
				$optionAffich = (string)("equipe" + (string)$i)
										?>
									<form action="Connecte/Model/module_match_validation.php" method="post">
										 <select name=<?php if($i == 1 ){echo "equipe1"; }else{echo "equipe2";}?> > <?php
				while($e = $equipes->fetch())
				{
					$team = $this->equipeFromId($e['ID']);

	?>										
						<option value=<?php echo $team->id(); ?>><?php echo $team->id()." - ".$team->nom(); ?></option>
												
	<?php
				}
										?> </select> <?php if($i ==1){ echo " VS ";}
															else
															{
																	?><input type="submit" value="soumettre" /> </form> <?php
															}
			}
	}
	public function getAllCompetitors()   // il faudra encadrer cette fonction d'un select et /select
	{
				$equipes = $this->db->query("SELECT ID,nom FROM Equipes WHERE en_jeu = 'en jeu'  ORDER BY ID");

				$myTab[] =  Array();

				while($e = $equipes->fetch())
				{
					$team = $this->equipeFromId($e['ID']);
					$myTab[$team->id()] = $team->nom();
				}
										
			return $myTab;
	}
	public function testEquipesMatch(Equipe $team1, Equipe $team2)
	{
		$matchOK  = false;

		if($team2->id() != $team1->id())
		{
			$joueurCommun = $this->isJoueurCommun($team1, $team2);

			$nbJoueurValidesTeam1 = $this->nbJoueursValidesDansEquipe($team1);
			$nbJoueurValidesTeam2 = $this->nbJoueursValidesDansEquipe($team2);
			if($joueurCommun['0'] == true)
			{
				if(($nbJoueurValidesTeam1 < 5) &&  ($nbJoueurValidesTeam2 < 5))// IF les 2 teams ont besoin de ce joueur pour être en jeu !!
				{
					$matchOK  = false;
					$raison = "les 2 équipes ont besoin du joueur <a class='nomJoueur'>".$joueurCommun['1']."</a> pour être en jeu !";
					$action = "pas de match";				
				}
				elseif(($nbJoueurValidesTeam1 == 5) &&  ($nbJoueurValidesTeam2 == 5))
				{
					$matchOK  = true;
					$raison = "les 2 équipes peuvent jouer sans <a class='nomJoueur'>".$joueurCommun['1']."</a>, à lui de choisir son camp !";
					$action = "choix au joueur";	
				}
				elseif(($nbJoueurValidesTeam1 == 5) &&  ($nbJoueurValidesTeam2 < 5)) // le joueur doit aller dans equipe 2
				{
					$matchOK  = true;
					$raison = "<a class='nomJoueur'>".$joueurCommun['1']."</a> doit joueur dans 2 !";
					$action = "dans equipe1";
				}
				elseif(($nbJoueurValidesTeam2 == 5) &&  ($nbJoueurValidesTeam1 < 5)) // le joueur doit aller dans equipe 2
				{
					$matchOK  = true;
					$raison = "les 2 équipes peuvent jouer sans <a class='nomJoueur'>".$joueurCommun['1']."</a> doit joueur dans 1 !";
					$action = "dans equipe2";
				}
				else
				{
					$matchOK  = false;
					$raison = "inconnue ... ";
					$action = "pas de match";
				}				
			}
			elseif(($nbJoueurValidesTeam1 >3) &&  ($nbJoueurValidesTeam2 >3)) //pas de joueur commun les 2 équipes ont assez de joueurs pour jouer
			{
				$matchOK  = true;
				$raison = "inconnue ... ";
				$action = "ya match !!";
			}
			elseif(($team1->nbJoueursValides() < 4) ||  ($team2->nbJoueursValides() < 4))
			{
				$matchOK  = false;
				$action = "pas de match";

				if($team1->nbJoueursValides() < 4)
				{
					$raison = "pas assez de joueur dans l'équipe ".$team1->id()." - ".$team1->nom();
				}
				else
				{
					$raison = "pas assez de joueur dans l'équipe ".$team2->id()." - ".$team2->nom();
				}
			}
			else
			{
				$matchOK  = false;
				$raison = "ce ELSE n'a pas de raison d'être ";
				$action = "pas de match";
			}

		}
		else
		{
			$matchOK  = false;
			$raison = "la même équipe a été sélectionnée deux fois pour jouer contre elle même";
			$action = "pas de match";
		}

		$retour = [ $matchOK, $raison, $action];
		return $retour;
	}
	public function isJoueurCommun(Equipe $team1, Equipe $team2)
	{
		$idJoueurs1 = [$team1->idJ1(), $team1->idJ2(), $team1->idJ3(), $team1->idJ4(), $team1->idJ5()];
		$idJoueurs2 = [$team2->idJ1(), $team2->idJ2(), $team2->idJ3(), $team2->idJ4(), $team2->idJ5()];

		$redondance = false;

		foreach($idJoueurs1 as $idJoueur1)
		{
			foreach($idJoueurs2 as $idJoueur2)
			{
				if($idJoueur1 == $idJoueur2)
				{
					$redondance = true;	
					$agentK = $this->joueurFromId($idJoueur1);
					$joueurCommun = (string)$agentK->nom();
				}
			}
		}

		if($redondance == true)
		{
			$retour = [true, $joueurCommun];
			echo "function isJoueurCommun = true".(string)$agentK->nom();
			return $retour;			
		}
		else
		{
			echo "function isJoueurCommun = falseaa";
			return false;	
		}
	}
	public function isCreneauDispo()
	{
		$date = "2007-10-21 12:03";

		echo $date;

		$maintenant = date("Y-m-j H");
		$jourCourant = date("Y-m-j H");
	

		echo $maintenant."<br />";
	}
	public  function affichageRencontresAVenir()
	{		
		$maintenant = date('Y-m-d h:i:i');		

		$maintenant=(string)$maintenant;

		$req = $this->db->query("SELECT ID, date_rencontre FROM Rencontres WHERE date_rencontre>\"$maintenant\" ORDER BY date_rencontre ASC");

		while($rencontres = $req->fetch())
		{
		?>
									<div>

		<?php
			$rencontre = $this->rencontreFromId($rencontres['ID']);
			$rencontre->Afficher($this->db);
		?>
											<form action="Connecte/Model/module_vers_rencontre_annulation.php" method="post">
													
													<input type="hidden" name="idRencontre" value=<?php  echo $rencontre->id(); ?> />
													<input type="submit" value="Annuler" />

											</form>
									</div>

		<?php
		}
	}
	public  function affichageRencontresPassees()
	{
		$maintenant = date('Y-m-d h:i:i');		

		$maintenant=(string)$maintenant;

		$req = $this->db->query("SELECT ID, date_rencontre FROM Rencontres WHERE date_rencontre<\"$maintenant\" ORDER BY date_rencontre DESC");

		while($rencontres = $req->fetch())
		{
		?>
									<div>

		<?php
			$rencontre = $this->rencontreFromId($rencontres['ID']);
			$rencontre->Afficher($this->db);

					if($rencontre->idVainqueur() == NULL)
					{
		?>
					
											<form action="Connecte/Model/module_vers_rencontre_edition.php" method="post">
													
													<input type="hidden" name="idRencontre" value=<?php  echo $rencontre->id(); ?> />
													<input type="submit" value="rentrer les scores" />

											</form>
									

		<?php
					}
					else
					{

						$vainqueur = $this->equipeFromId($rencontre->idVainqueur());
						if($rencontre->idVainqueur() == $rencontre->idEquipe1())
						{
							$perdant = $this->equipeFromId($rencontre->idEquipe2());
						}
						else
						{
							$perdant = $this->equipeFromId($rencontre->idEquipe1());
						} 
						
		?>
											<div class='score'> Vainqueur : <a class='affichEquipe'><?php echo $vainqueur->nom(); ?></a>, 
											avec <strong><?php $rencontre->scoreEquipeGagnante(); ?> points</strong>, <br />
											contre <?php echo $perdant->nom(); ?>, <strong><?php $rencontre->scoreEquipePerdante(); ?> points</strong>. <br />

											</div>
		<?php
					} 
			?>
								</div>
			<?php

		}
	}
	public function getAllRencontresCreneaux()
	{
		$req = $this->db->query("SELECT ID, date_rencontre FROM Rencontres ORDER BY date_rencontre ASC");
		$i = 1;
		while($rencontres = $req->fetch())
		{
			$id = $rencontres['ID'];
			$allRencontresCreneaux[$i] =  $rencontres['date_rencontre'];
		//	echo $allRencontresCreneaux[$i]."  ..  " .$rencontres['date_rencontre'] ." <br />";
			$i++;
		} 

		$req->closeCursor();

		return $allRencontresCreneaux;
	}
	public function listeCreneauxPourRencontreAVenir()		// la solution JS est A FAIRE !! avec getAllRencontresCreneaux et ensoncode
	{
			$heuresPossibles = [8, 10, 12, 14, 16, 18, 20, 22];

			$dateCible = date_create('now',timezone_open("Europe/Oslo"));
			
			$nomJour = date_format($dateCible, "l");
			
			$nomMois = date_format($dateCible, "F");
			$mois = date_format($dateCible,"m");
			$jour = date_format($dateCible,"d");
			$heure = date_format($dateCible,"G");

			if($heure>22){$heure=8;}elseif($heure>20 && $heure < 22){$heure=22;}elseif($heure>=18 && $heure < 20){$heure=20;}
			elseif($heure>=16 && $heure < 18){$heure=18;}elseif($heure>=14 && $heure < 16){$heure=16;}
			elseif($heure>=12 && $heure < 14){$heure=14;}elseif($heure>=10 && $heure < 12){$heure=12;}
			elseif($heure>=8 && $heure < 10){$heure=10;}elseif($heure <= 8){$heure=8;}

			$test = date_format($dateCible, "Y-m-d ");

			echo $test." -- ".$nomJour.$mois.$jour.$heure;

			?>
																<form action="" method="post">
																	<select name="creneau_match">
			<?php

		//	$creneauxPris = $this->getAllRencontresCreneaux();
			$premiereFois = true;

			for($i=0; $i<=35; $i++)	// la liste déroulante contiendra (35 jours de propositions) - (matchs en bdd)
			{
				for($j=8; $j <= 22; $j+2)
				{
				/*	if($premiereFois)
					{
						$j = $heure;
					}

					if($j >=22)
					{
						$dateCible = date_add($dateCible,date_interval_create_from_date_string("1 days"));
						$nomJour = date_format($dateCible, "l");
						$annee = date_format($dateCible, "Y");
			
						$nomMois = date_format($dateCible, "F");
						$mois = date_format($dateCible,"m");
						$jour = date_format($dateCible,"d");

						$dateATesterPatron = date_format($dateCible, "Y-m-d ");

						$j=23;

					//$dateCible = date_format($dateCible, "Y-m-d H");
					}
					else
					{
						$dateATester = (string)($dateATesterPatron.$j.":00:00");
						
						foreach($creneauxPris as $IdCreneauReserve => $dateCreneauReserve)
						{
							if($dateCreneauReserve == $dateATester) // if creneauPris
							{
								//on affiche pas
							}
							else
							{
			?>
								<option value=<?php echo $dateATester.">".$annee."-".$nomJour." ".$jour." ".$nomMois." ".$j." h."; ?></option>
			<?php
							}
						}

					}
					$premiereFois = false;*/ 
				
			?>
							<option value=0>agadou</option>
			<?php

				} 	
			}
	?>
																		</select>
																</form>
	<?php
	}

	public function inscrireScoreRencontre(Rencontre $rencontre, $scoreA, $scoreB)
	{
		$teamA = $this->equipeFromId($rencontre->idEquipe1());
		$teamB = $this->equipeFromId($rencontre->idEquipe2());

		$gagnant = NULL;

		if($scoreA == $scoreB)
		{
			$idGagnant = NULL;
			$this->ajoutPointsEquipeSuiteDEFAITEMatch($teamA, $scoreA);
			$this->ajoutPointsEquipeSuiteDEFAITEMatch($teamB ,$scoreB);
			$scoreGagnant = $scoreA;
			$scorePerdant = $scoreA;
		}
		elseif($scoreA < $scoreB)
		{
			$this->ajoutPointsEquipeSuiteVICTOIREMatch($teamB , $scoreB);
			$this->ajoutPointsEquipeSuiteDEFAITEMatch($teamA, $scoreA);
			$idGagnant = $teamB->id();
			$idPerdant = $teamA->id();
			$scoreGagnant = $scoreB;
			$scorePerdant = $scoreA;
		}
		elseif(($scoreA > $scoreB))
		{
			$this->ajoutPointsEquipeSuiteVICTOIREMatch($teamA , $scoreA);
			$this->ajoutPointsEquipeSuiteDEFAITEMatch($teamB ,$scoreB);
			$idGagnant = $teamA->id();
			$idPerdant = $teamB->id();

			$scoreGagnant = $scoreA;
			$scorePerdant = $scoreB;
		}
//  				*****     SetScoresObjets     *****

		$rencontre->setIdVainqueur($idGagnant);
		$rencontre->setScoreEquipeGagnante($scoreGagnant);
		$rencontre->setScoreEquipePerdante($scorePerdant);
		$idRencontre = $rencontre->id();

//  				*****     SetScoresBDD     *****
		

		$req = $this->db->prepare("UPDATE Rencontres SET jouee_ou_non=:jouee_ou_non,
														 id_vainqueur=:idVainqueur,
														 score_equipe_gagnante=:scoreEquipeGagnante,
														 score_equipe_perdante=:scoreEquipePerdante WHERE ID=$idRencontre"); 

		$req->bindValue(":jouee_ou_non", 1);
		$req->bindValue(':idVainqueur', $idGagnant);
		$req->bindValue(':scoreEquipeGagnante', $scoreGagnant);
		$req->bindValue(':scoreEquipePerdante', $scorePerdant);
		$req->execute();
		$req->closeCursor(); 

		$this->upDateClassementGeneral();

		return $rencontre;
	}
	public function afficherScore(Rencontre $rencontre)
	{
		$joursSemaine = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];
		$joursMois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
		if($rencontre->idVainqueur() != NULL)
		{
			$teamGagnante = $this->equipeFromId($rencontre->idVainqueur());

			if($rencontre->idVainqueur() == $rencontre->idEquipe1())
			{
				$teamPerdante = $this->equipeFromId($rencontre->idEquipe2());
			}
			elseif($rencontre->idVainqueur() == $rencontre->idEquipe2())
			{
				$teamPerdante = $this->equipeFromId($rencontre->idEquipe1());
			}
			else
			{
				echo "erreur 203";
				return false; // ERREUR
			}
		}
		else
		{
			$teamGagnante = $this->equipeFromId($rencontre->idEquipe1());
			$teamPerdante = $this->equipeFromId($rencontre->idEquipe2());
		}
		

		$dateRencontre = date_create($rencontre->dateRencontre());
		$dateHeures = date_format($dateRencontre, 'H');
		$dateJourSemaine = date_format($dateRencontre, 'w');
		$dateAnnee = date_format($dateRencontre, 'Y');
		$dateMois = (int)date_format($dateRencontre, 'm');
		$dateJour = (int)date_format($dateRencontre, 'd');

		
		?>
				<div class="affichScore">
						Ce match a eu lieu le <?php echo $joursSemaine[$dateJourSemaine]." ".$dateJour." ".$joursMois[$dateMois]." ".$dateAnnee." à ".$dateHeures." H.  <br />";

			if($rencontre->idVainqueur() != NULL)
			{
				echo "<mark>Le vaiqueur est :</mark> <br /> <br />"; 
		?> 
						<a class="affichEquipe"> 
		<?php 
				echo $teamGagnante->nom()." (n° ".$teamGagnante->id().")</a> avec <strong>".$rencontre->scoreEquipeGagnante(); 

		?>							</strong> points.

		<?php echo " <br /> <br />Contre : <br /> <br />"; ?> <a class="affichEquipe"> <?php echo $teamPerdante->nom()." (n° ".$teamPerdante->id().")</a> qui a <strong>".$rencontre->scoreEquipePerdante()."</strong> points.";
			}
			else
			{
				echo "<br /><mark>Match nul !!</mark><br /><br /><a class='affichEquipe'>".$teamGagnante->nom()." (n° ".$teamGagnante->id().")</a> avec <strong>".$rencontre->scoreEquipeGagnante()." points <br /> <br />Contre : <br /> <br />"; ?> <a class="affichEquipe"> <?php echo $teamPerdante->nom()." (n° ".$teamPerdante->id().")</a> qui a <strong>".$rencontre->scoreEquipePerdante()."</strong> points.";
			}
		?>



				</div>
		<?php
		
	}
	public function getCreneauPasse4Rencontre()
	{

	}


}
?>