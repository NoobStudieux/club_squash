<?php		//			class.Joueur.php

class Joueur
{
	protected $nom; protected $id; protected $id_equipe1; protected $id_equipe2; protected $id_equipe3; protected $id_equipe4;
	protected $points; protected $classement; protected $validite; protected  $date_creation; protected $nbr_equipes;

	public function __construct($nom)
	{
		$this->nom = $nom;
		$this->setValidite('valide');
		$this->points = 0;
		$this->classement = 999;
		$this->date_creation = date("Y-m-d H:i:i");
		$this->nbr_equipes = 0;
	}
	public function Afficher()
	{
		echo "<div class='affichJoueur'><div class='nomJoueur'><a class='place'>";
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
			echo " n.c. ";
		}


		echo "</a>".$this->nom." (n° ".$this->id.")</div><br /><a class='petit'> équipes : ";
		if($this->id_equipe1 != NULL){ echo $this->id_equipe1.", "; };
		if($this->id_equipe2 != NULL){ echo $this->id_equipe2.", "; };
		if($this->id_equipe3 != NULL){ echo $this->id_equipe3.", "; };
		if($this->id_equipe4 != NULL){ echo $this->id_equipe4.", "; };
		echo "</a><br />".$this->points." points, ";
		if($this->isValide())
		{
			echo "<a class='enJeu'>".$this->validite."</a>"; 
		}
		else
		{
			echo "<a class='horsJeu'>".$this->validite."</a>"; 
		}
		echo "</div>";
	}
	public function idEquipeDispo()
	{
		if(($this->id_equipe1 == 0) || ($this->id_equipe1 == NULL))
		{
			return 1;
		}
		elseif(($this->id_equipe2 == 0) || ($this->id_equipe2 == NULL))
		{
			return 2;
		}
		elseif(($this->id_equipe3 == 0) || ($this->id_equipe3 == NULL))
		{
			return 3;
		}
		elseif(($this->id_equipe4 == 0) || ($this->id_equipe4 == NULL))
		{
			return 4;
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
	public function validite()
	{
		return $this->validite;
	}
	public function Ideq1()
	{
		return $this->id_equipe1;
	}
	public function Ideq2()
	{
		return $this->id_equipe2;
	}
	public function Ideq3()
	{
		return $this->id_equipe3;
	}
	public function Ideq4()
	{
		return $this->id_equipe4;
	}
	public function classement()
	{
		return $this->classement;
	}
	public function dateCreation()
	{
		return $this->date_creation;
	}
	public function points()
	{
		return $this->points;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function setNom($nom)
	{
		$this->nom = $nom;
	}
	public function setIdEquipes(array $equipes)
	{
		$total = count($equipes);
		for($i =0; $i < $total; $i++)
		{
			if($i ==0)
			{
				$this->id_equipe1 = $equipes[$i];
			}
			elseif($i ==1)
			{
				$this->id_equipe2 = $equipes[$i];
			}
			elseif($i ==2)
			{
				$this->id_equipe3 = $equipes[$i];
			}
			elseif($i ==3)
			{
				$this->id_equipe4 = $equipes[$i];
			}
		}
	}
	public function setIdEquipe($id_team, $idEquipeDispo)
	{
		if($idEquipeDispo == 1)
		{
			$this->id_equipe1 = $id_team;
		}
		elseif($idEquipeDispo == 2)
		{
			$this->id_equipe2 = $id_team;
		}
		elseif($idEquipeDispo == 3)
		{
			$this->id_equipe3 = $id_team;
		}
		elseif($idEquipeDispo == 4)
		{
			$this->id_equipe4 = $id_team;
		}
		else
		{
			echo "Aucun Id_equipe dispo sur la table Joueurs !<br />"; 
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
	public function setDateCreation($date_creation)
	{
		$this->date_creation = $date_creation;
	}
	public function setValidite($validite)
	{
		if($validite == 'blesse')
		{
			$this->validite = $validite;
		}
		elseif($validite == 'valide')
		{
			$this->validite = 'valide';
		}
		else
		{
			$this->validite = 'nc';
		}
		
	}
	public function isValide()
	{
		if($this->validite == 'valide')
		{
			return true;
		}
		else
		{
			return false;
		}
	}


}
?>