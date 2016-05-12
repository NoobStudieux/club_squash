<?php			//		class.Rencontre.php

class Rencontre
{
	protected $id, 
	$id_equipe1, 
	$id_equipe2, 
	$date_rencontre, 
	$nom, 
	$jouee_ou_non, 
	$id_vainqueur, 
	$score_equipe_gagnante, 
	$score_equipe_perdante;

	public function __construct($team1, $team2, $date_rencontre)
	{
		$this->id_equipe1 = $team1->id();
		$this->id_equipe2 = $team2->id();
		$this->date_rencontre = $date_rencontre;
		$this->jouee_ou_non = 0;
		$this->id_vainqueur = NULL;
		$this->score_equipe_gagnante = NULL;
		$this->score_equipe_perdante = NULL;
	}
	public function Afficher(PDO $db)
	{
		$Gestionnaire = new Gestionnaire($db);
		$team1 = $Gestionnaire->equipeFromId($this->id_equipe1);
		$team2 = $Gestionnaire->equipeFromId($this->id_equipe2);
		?>
							<div class="affichRencontre">




									<?php echo "<strong>".date('Y-m-d h', strtotime($this->date_rencontre))."</strong>  (<a class='italique'>n° ";  echo $this->id."</a>)<br /><a class='affichEquipe'>".$team1->nom()."</a> (n°".$team1->id().")"; ?>
									<strong>VS</strong> <br /><br /> <a class="affichEquipe">

		<?php 
				echo $team2->nom()."</a> (n°".$team2->id().")"; 
		
	

			?></a><br /> 
							</div>

		<?php
	}
	public function id()
	{
		return $this->id;
	}
	public function idEquipe1()
	{
		return $this->id_equipe1;
	}
	public function idEquipe2()
	{
		return $this->id_equipe2;
	}
	public function dateRencontre()
	{
		return $this->date_rencontre;
	}
	public function joueeOuNon()
	{
		return $this->jouee_ou_non;
	}
	public function idVainqueur()
	{
		return $this->id_vainqueur;
	}
	public function scoreEquipeGagnante()
	{
		return $this->score_equipe_gagnante;
	}
	public function scoreEquipePerdante()
	{
		return $this->score_equipe_perdante;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function setIdEquipe1($idEquipe1)
	{
		$this->idEquipe1 = $idEquipe1;
	}
	public function setIdEquipe2($idEquipe2)
	{
		$this->idEquipe2 = $idEquipe2;
	}
	public function setDateRencontre($date_rencontre) 
	{
		$this->date_rencontre = $date_rencontre;
	}
	public function setNom($nom)
	{
		$this->nom = $nom;
	}
	public function setJoueeOuNon($jouee_ou_non)  
	{
		$this->jouee_ou_non = $jouee_ou_non;
	}
	public function setIdVainqueur($id_vainqueur)	
	{
		$this->id_vainqueur = $id_vainqueur;
	}
	public function setScoreEquipeGagnante($score_equipe_gagnante)
	{
		$this->score_equipe_gagnante = $score_equipe_gagnante;
	}
	public function setScoreEquipePerdante($score_equipe_perdante)
	{
		$this->score_equipe_perdante = $score_equipe_perdante;
	}


}


?>