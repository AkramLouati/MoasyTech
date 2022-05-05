<?php
include './../../../Models/.php';
include './../../../Controllers/EmployeC.php';
private string $username;  
private string $prenom;  
private string $nom;
private string $email;  
private string $mdp;  
private string $adresse;  
private string $rolee; 

 
$username= '';
$prenom='';
$nom='';
$email='';
$mdp='';
$adresse='';
$rolee='';
if(isset($_POST['ADD'])){

    $username=$_POST['username'];
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom']; 
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    $adresse=$_POST['adresse'];
    $rolee=$_POST['rolee'];

    // $rolee=$_POST['image[]'];

   
    $utilisateur = new utilisateur($username,$prenom,$nom,$email,$mdp,$adresse,$rolee);
    $empC= new user();
    $empC->inscription($utilisateur);
        

  header('location: Liste_Hotels.php');
         
}
//echo "not isset userlogin"
?>