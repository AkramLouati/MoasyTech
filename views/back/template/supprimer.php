<?php

include './../../../model/user.php';
include './../../../controller/usercontroller.php';
$empC = new user();

if(isset($_GET['ee'])){
$empC->delete($_GET['ee']);
header('location: gestion_des_clients.php');

}
?>