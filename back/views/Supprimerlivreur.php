<?php
include '../../core/livreurC.php';

$livreurC=new livreurC();

$livreurC->supprimerlivreur($id);

header('Location:Afficherlivreur.php');
?>