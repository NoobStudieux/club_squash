<?php		//			class.Equipe.php

class Equipe
{
	protected $id; protected $nom; protected $idJ1; protected $idJ2; protected $idJ3; protected $idJ4; protected $idJ5; protected $idCapitaine;
	protected $points; protected $classement; protected $prete; // peut jouer ou non
	protected $date_creation;

	public function __construct($nom, $idJ1 = NULL)
	{
		$this->nom = $nom;
		$this->classement = 999;
		$this->points = 0;
		$this->date_creation = date('Y-m-d H:i:i');
		$this->idJ1 = $idJ1;
		$this->prete = 'repos';
	}
	public function Afficher(PDO $db)
	{
		$Gestionnaire = new Gestionnaire($db);
		echo "<div class='affichEquipe'><div class='nomEquipe'><a class='place'>";
		if($this->classement == 1)
		{
			echo $this->classement." er. ";
		}
		elseif($this->classement <999)
		{
			echo $this->classement." eme. ";
		}
		else
		{
			echo "n.c.";
		}
		echo "</a>".$this->nom." (n° ".$this->id.") ,</div> <br /><a class='petit'> joueurs : </a><a class='syntaxe'>".
				$Gestionnaire->getNbJoueursDansEquipe($this)."</a><br /><a class='petit'> ";
		if(($this->idJ1 != NULL) && ($this->idJ1 != 0)){ echo $this->idJ1." : ".$Gestionnaire->getNomJoueurFromId($this->idJ1).", "; };
		if(($this->idJ2 != NULL) &&  ($this->idJ2 != 0)){ echo $this->idJ2." : ".$Gestionnaire->getNomJoueurFromId($this->idJ2).", "; };
		if(($this->idJ3 != NULL) && ($this->idJ3 != 0)){ echo $this->idJ3." : ".$Gestionnaire->getNomJoueurFromId($this->idJ3).", "; };
		if(($this->idJ4 != NULL) && ($this->idJ4 != 0)){ echo $this->idJ4." : ".$Gestionnaire->getNomJoueurFromId($this->idJ4).", "; };
		if(($this->idJ5 != NULL) && ($this->idJ5 !=0)){ echo $this->idJ5." : ".$Gestionnaire->getNomJoueurFromId($this->idJ5).", "; };
		echo "</a><br />".$this->points." points,";
		if($this->prete != NULL)
		{ 
			
			if($this->prete == "en jeu"){ echo " <a class='enJeu'> ".$this->prete.".</a></div> "; }
			else{ echo " <a class='horsJeu'> ".$this->prete.".</a></div> "; }
		}		
		
	}
	public function idJoueurDispo()
	{
		if(($this->idJ1 == 0) || ($this->idJ1 == NULL))
		{
			return 1;
		}
		elseif(($this->idJ2 == 0) || ($this->idJ2 == NULL))
		{
			return 2;
		}
		elseif(($this->idJ3 == 0) || ($this->idJ3 == NULL))
		{
			return 3;
		}
		elseif(($this->idJ4 == 0) || ($this->idJ4 == NULL))
		{
			return 4;
		}
		elseif(($this->idJ5 == 0) || ($this->idJ5 == NULL))
		{
			return 5;
		}
		else
		{
			return 0;
		}
	}
	public function id()
	{
		return $this->id;
	}
	public function nom()
	{
		return $this->nom;
	}
	public function dateCreation()
	{
		return $this->date_creation;
	}
	public function classement()
	{
		return $this->classement;
	}
	public function points()
	{
		return $this->points;
	}
	public function idJ1()
	{
		return $this->idJ1;
	}
	public function idJ2()
	{
		return $this->idJ2;
	}
	public function idJ3()
	{
		return $this->idJ3;
	}
	public function idJ4()
	{
		return $this->idJ4;
	}
	public function idJ5()
	{
		return $this->idJ5;
	}
	public function prete()
	{
		return $this->prete;
	}
	public function setIdJ1($idj1)
	{
		$this->idJ1 = $idj1;
	}
	public function setIdJ2($idj2)
	{
		$this->idJ2 = $idj2;
	}
	public function setIdJ3($idj3)
	{
		$this->idJ3 = $idj3;
	}
	public function setIdJ4($idj4)
	{
		$this->idJ4 = $idj4;
	}
	public function setIdJ5($idj5)
	{
		$this->idJ5 = $idj5;
	}


	public function setDateCreation($date_creation)
	{
		$this->date_creation = $date_creation;
	}
	public function setValidite($validite)
	{
		$this->validite = $validite;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function setNom($nom)
	{
		$this->nom = $nom;
	}
	public function setIdJoueurs(array $idJoueurs)
	{
		$total = count($idJoueurs);
		for($i =0; $i < $total; $i++)
		{
			if($i ==0)
			{
				$this->idJ1 = $idJoueurs[$i];
			}
			elseif($i ==1)
			{
				$this->idJ2 = $idJoueurs[$i];
			}
			elseif($i ==2)
			{
				$this->idJ3 = $idJoueurs[$i];
			}
			elseif($i ==3)
			{
				$this->idJ4 = $idJoueurs[$i];
			}
			elseif($i ==4)
			{
				$this->idJ5 = $idJoueurs[$i];
			}
		}
	}
	public function setIdj($id_joueur, $idJDispo)		// cette fonction modifie les rangs idJ1 => 5 de l'objet (pas bdd)
	{
			echo "fonction setIdj, id joueuur : ".$id_joueur." idjdispo = ".$idJDispo."<br />";
		if($idJDispo == 1)
		{
			$this->idJ1 = $id_joueur;
		}
		elseif($idJDispo == 2)
		{
			$this->idJ2 = $id_joueur;
		}
		elseif($idJDispo == 3)
		{
			$this->idJ3 = $id_joueur;
		}
		elseif($idJDispo == 4)
		{
			$this->idJ4 = $id_joueur;
		}
		elseif($idJDispo == 5)
		{
			$this->idJ5= $id_joueur;
		}
		else
		{
			echo "Aucun IdJ dispo sur la table Equipes !<br />"; 
		}
		
	}
	public function setPoints($points)
	{
		$this->points = $points;
	}
	public function setClassement($classement)
	{
		$this->classement = $classement;
	}
	public function setPrete(PDO $bdd)
	{
		$Gestionnaire = new Gestionnaire($bdd);
		$nbrJoueursValides = $Gestionnaire->nbrJoueursValides($this);
		$id_equipe = $this->id();

		if($nbrJoueursValides > 3)  // pas très bon puisque vient réecrire systèmatiquement ... 
		{
			$this->prete = 'en jeu';
			$req = $bdd->prepare("UPDATE Equipes SET en_jeu='en jeu' WHERE ID=$id_equipe");
			$req->execute();
			$req->closeCursor();
		}
		else
		{
			$this->prete = 'repos';
			$req = $bdd->prepare("UPDATE Equipes SET en_jeu='repos' WHERE ID=$id_equipe");
			$req->execute();
			$req->closeCursor();
		}
	}
	public function isPrete()
	{
		if($this->prete == 'en jeu') 
			{return true;}
		else{return false;}
	}
}
?>