<?php		//		index_connexion.php


if(isset($_SESSION['login'])) { $login = $_SESSION['login']; } else {$login = '';}


include_once('Vues/Vue_connexion.php');

?>