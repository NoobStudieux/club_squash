<?php		//		localhost/www/Php_MySql/Php_PoO/poo_2.9_TP_Matchs/Connecte/Model/module_tables_reinit.php


	include('module_de_base_pour_controller.php');


$req = $bdd->prepare("DROP TABLE Equipes ;");
$req->execute();
$req->closeCursor();

$req = $bdd->prepare("DROP TABLE Rencontres ;");
$req->execute();
$req->closeCursor();

$req = $bdd->prepare("DROP TABLE Joueurs ;");
$req->execute();
$req->closeCursor();

$req = $bdd->prepare("DROP TABLE Admins ;");
$req->execute();
$req->closeCursor();


$req = $bdd->exec("CREATE TABLE IF NOT EXISTS Joueurs(
						ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
						nom VARCHAR(10) NOT NULL,
						id_equipe1 SMALLINT UNSIGNED,
						id_equipe2 SMALLINT UNSIGNED,
						id_equipe3 SMALLINT UNSIGNED,
						id_equipe4 SMALLINT UNSIGNED,
						points SMALLINT UNSIGNED,
						classement SMALLINT UNSIGNED,
						validite VARCHAR(6),
						date_creation DATETIME NOT NULL,
						PRIMARY KEY (ID)
	)
	ENGINE=INNODB;");

	$req = $bdd->exec("CREATE TABLE IF NOT EXISTS Admins(
						ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
						login VARCHAR(10) NOT NULL,
						password VARCHAR(40) NOT NULL,
						date_creation DATETIME NOT NULL,
						PRIMARY KEY (ID)
	)
	ENGINE=INNODB;");

	$req = $bdd->exec("CREATE TABLE IF NOT EXISTS Equipes(
						ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
						nom VARCHAR(10) NOT NULL UNIQUE,
						idJ1 SMALLINT UNSIGNED NOT NULL,
						idJ2 SMALLINT UNSIGNED NOT NULL,
						idJ3 SMALLINT UNSIGNED NOT NULL,
						idJ4 SMALLINT UNSIGNED NOT NULL,
						idJ5 SMALLINT UNSIGNED NOT NULL,
						points SMALLINT UNSIGNED NOT NULL,
						classement SMALLINT UNSIGNED NOT NULL,
						en_jeu VARCHAR(7) NOT NULL,
						date_creation DATETIME NOT NULL,
						PRIMARY KEY (ID)
	)
	ENGINE=INNODB;");

	$req = $bdd->exec("CREATE TABLE IF NOT EXISTS Rencontres(
						ID SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
						id_equipe1 SMALLINT UNSIGNED,
						id_equipe2 SMALLINT UNSIGNED,
						date_rencontre DATETIME,
						nom VARCHAR(15),
						jouee_ou_non BOOLEAN NOT NULL,
						id_vainqueur SMALLINT UNSIGNED,
						score_equipe_gagnante SMALLINT UNSIGNED,
						score_equipe_perdante SMALLINT UNSIGNED,
						PRIMARY KEY (ID)
	)
	ENGINE=INNODB;");

	$mdp = sha1('admin');

	$req = $bdd->prepare("INSERT INTO Admins(login, password, date_creation) VALUES(:login, :password, NOW())");
	$req->bindValue(':login', 'admin');
	$req->bindValue(':password', $mdp);
	$req->execute();
	$req->closeCursor();



	$Gestionnaire = new Gestionnaire($bdd);	

	$joueurs[] = $Gestionnaire->InscriptionJoueur('Michou'); $joueurs[] = $Gestionnaire->InscriptionJoueur('José'); 
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Josephine'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Thierry');
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Dupond'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Milou'); 
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Alphonse'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Georgia');
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Matou'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Tex'); 
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Albert'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Noémie');
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Raoul'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Gaston'); 
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Alex'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Gégé');
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Renaud'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Coco'); 
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Phiphi'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Filou');
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Paulette'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Yoyo'); 
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Mohamed'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Mireille');
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Patou'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Malette');
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Simone'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Pulo'); 
	$joueurs[] = $Gestionnaire->InscriptionJoueur('Cici'); $joueurs[] = $Gestionnaire->InscriptionJoueur('Goulard');

	$equipes[] = $Gestionnaire->InscriptionEquipe('Uno'); 
	$Gestionnaire->ajoutJoueur($equipes[0], $joueurs[2]); $Gestionnaire->ajoutJoueur($equipes[0], $joueurs[1]);
	$Gestionnaire->ajoutJoueur($equipes[0], $joueurs[3]); $Gestionnaire->ajoutJoueur($equipes[0], $joueurs[0]);

	$equipes[] = $Gestionnaire->InscriptionEquipe('la deuze'); 
	$Gestionnaire->ajoutJoueur($equipes[1], $joueurs[2]); $Gestionnaire->ajoutJoueur($equipes[1], $joueurs[4]);
	$Gestionnaire->ajoutJoueur($equipes[1], $joueurs[0]); $Gestionnaire->ajoutJoueur($equipes[1], $joueurs[21]); 
	$Gestionnaire->ajoutJoueur($equipes[1], $joueurs[1]); 

	$equipes[] = $Gestionnaire->InscriptionEquipe('la troize'); 
	$Gestionnaire->ajoutJoueur($equipes[2], $joueurs[0]); $Gestionnaire->ajoutJoueur($equipes[2], $joueurs[14]); 
	$Gestionnaire->ajoutJoueur($equipes[2], $joueurs[2]); 

	$equipes[] = $Gestionnaire->InscriptionEquipe('Quatro'); 
	$Gestionnaire->ajoutJoueur($equipes[3], $joueurs[6]); $Gestionnaire->ajoutJoueur($equipes[3], $joueurs[10]);
	$Gestionnaire->ajoutJoueur($equipes[3], $joueurs[22]); $Gestionnaire->ajoutJoueur($equipes[3], $joueurs[19]);
	$Gestionnaire->ajoutJoueur($equipes[3], $joueurs[3]);

	$equipes[] = $Gestionnaire->InscriptionEquipe('La cinq!'); 
	$Gestionnaire->ajoutJoueur($equipes[4], $joueurs[3]); $Gestionnaire->ajoutJoueur($equipes[4], $joueurs[10]);
	$Gestionnaire->ajoutJoueur($equipes[4], $joueurs[15]); $Gestionnaire->ajoutJoueur($equipes[4], $joueurs[23]);
	$Gestionnaire->ajoutJoueur($equipes[4], $joueurs[5]);

	$equipes[] = $Gestionnaire->InscriptionEquipe('Sixxx'); 
	$Gestionnaire->ajoutJoueur($equipes[5], $joueurs[0]); $Gestionnaire->ajoutJoueur($equipes[5], $joueurs[4]); 
	$Gestionnaire->ajoutJoueur($equipes[5], $joueurs[15]); $Gestionnaire->ajoutJoueur($equipes[5], $joueurs[2]); 

	$equipes[] = $Gestionnaire->InscriptionEquipe('Seven'); 
	$Gestionnaire->ajoutJoueur($equipes[6], $joueurs[2]); $Gestionnaire->ajoutJoueur($equipes[6], $joueurs[9]);
	$Gestionnaire->ajoutJoueur($equipes[6], $joueurs[16]); $Gestionnaire->ajoutJoueur($equipes[6], $joueurs[6]);

	$equipes[] = $Gestionnaire->InscriptionEquipe('Ouite'); 
	$Gestionnaire->ajoutJoueur($equipes[7], $joueurs[4]); $Gestionnaire->ajoutJoueur($equipes[7], $joueurs[1]);
	$Gestionnaire->ajoutJoueur($equipes[7], $joueurs[10]); $Gestionnaire->ajoutJoueur($equipes[7], $joueurs[24]);
	$Gestionnaire->ajoutJoueur($equipes[7], $joueurs[8]);

	$equipes[] = $Gestionnaire->InscriptionEquipe('noeuf'); 
	$Gestionnaire->ajoutJoueur($equipes[8], $joueurs[3]);  
	$Gestionnaire->ajoutJoueur($equipes[8], $joueurs[11]); $Gestionnaire->ajoutJoueur($equipes[8], $joueurs[17]);
	$Gestionnaire->ajoutJoueur($equipes[8], $joueurs[7]);

	$equipes[] = $Gestionnaire->InscriptionEquipe('taine'); 
	$Gestionnaire->ajoutJoueur($equipes[9], $joueurs[8]); $Gestionnaire->ajoutJoueur($equipes[9], $joueurs[7]);
	$Gestionnaire->ajoutJoueur($equipes[9], $joueurs[1]); $Gestionnaire->ajoutJoueur($equipes[9], $joueurs[18]);

	$equipes[] = $Gestionnaire->InscriptionEquipe('eleven'); 
	$Gestionnaire->ajoutJoueur($equipes[10], $joueurs[26]); $Gestionnaire->ajoutJoueur($equipes[10], $joueurs[27]);
	$Gestionnaire->ajoutJoueur($equipes[10], $joueurs[28]); $Gestionnaire->ajoutJoueur($equipes[10], $joueurs[29]); 
	$Gestionnaire->ajoutJoueur($equipes[10], $joueurs[25]); 

header('Location:module_vers_accueil.php');

?>