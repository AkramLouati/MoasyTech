<?php
include '../Controller/ReclamationC.php';
$ReclamationC = new ReclamationC();
$ReclamationC->validerReclamation($_GET["Id"]);
header('Location:gestion des reclamations.php');
