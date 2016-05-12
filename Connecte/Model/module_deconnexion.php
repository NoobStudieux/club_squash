<?php		//		module_deconnexion.php

session_start();
session_destroy();

header("Location:../../index.php");
?>