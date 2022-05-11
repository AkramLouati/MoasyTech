<?php
	include '../core/livraisonC.php';
    
	$livraisonC=new livraisonC();
	$livraisonC->supprimerlivraison($_GET["id"]);
	header('Location:Afficherlivraison.php');
?>