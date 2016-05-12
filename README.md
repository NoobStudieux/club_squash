# club_squash
Gestion d'équipes et de rencontres


Bonjour, si vous voulez tester le projet, qui normalement fonctionne, suivez ces étapes.. Il vous faut un serveur Php MySql (tourne sous LAMPP ici).

	1 - cloner ce dossier
	2 - créer une DATABASE  'Matchs' (ex : sur phpmyadmin), puis importer le fichier.sql dans BDD/ (en se positionnant sur votre nouvelle table Matchs)
	3 - modifiez les fichiers de config   Model/module_de_base.php &  Model/module_de_base_local.php pour modifier localhost, Login (moi : 'root'), mot de passe (moi 'toor') pour gérer la connexion SQL via PDO
	4 - lancer votre serveur et allez sur la racine (localhost/[votre chemin]/club_squash/index.php)

Normalement ça marche. Bon , tout n'est pas finalisé ..