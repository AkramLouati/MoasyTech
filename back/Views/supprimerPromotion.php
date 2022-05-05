<?php
	include '../Controller/PromotionC.php';
	$PromotionC=new PromotionC();
	$PromotionC->supprimerPromotion($_GET["Id"]);
	header('Location:gestion des promotions.php');
