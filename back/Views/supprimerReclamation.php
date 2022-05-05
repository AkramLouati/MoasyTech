<?php
	include '../Controller/ReclamationC.php';
	$ReclamationC=new ReclamationC();
	$ReclamationC->supprimerReclamation($_GET["Id"]);
	header('Location:gestion des reclamations.php');
