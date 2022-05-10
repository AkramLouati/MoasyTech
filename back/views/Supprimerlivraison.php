<?php
	include '../../core/livraisonC.php';
    
	$livraisonC=new livraisonC();
	$livraisonC->supprimerlivraison($id);
	header('Location:Afficherlivraison.php');
?>