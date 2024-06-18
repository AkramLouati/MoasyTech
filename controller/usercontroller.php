<?php
require 'C:\xampp\htdocs\user\connexion.php';
class user{
 
        function inscription($ee){  
        try{
             
            $sql="INSERT INTO utilisateur (prenom,nom,email,mdp,adresse,rolee,username)
            VALUES (:prenom,:nom,:email,:mdp,:adresse,:rolee,:username)";
           $db=config::getConnexion();
        
          $query=$db->prepare ($sql);
            
           
                 
        
                $query->bindValue(':prenom',$ee->getprenom());  
                $query->bindValue(':nom',$ee->getnom()); 
                $query->bindValue(':email',$ee->getemail());  
                $query->bindValue(':mdp',$ee->getmdp());  
                $query->bindValue(':adresse',$ee->getadresse());   
                $query->bindValue(':rolee',$ee->getrolee());  
                $query->bindValue(':username',$ee->getusername()); 
          
              $query->execute();
              echo"\n success";
              //header('location:affichage.php');
        
                }
                catch(PDOException $e){
                $e->getMessage();
                    echo"faild";
                    echo $e->getMessage();
            }
        }
        
        // MY CRUD
        ///___ ____________________________ FONCTION AFFICHER______________________________
        function afficher(){  
            try{
                $sql="SELECT * FROM utilisateur ";
                $db=config::getConnexion();
               return $db->query($sql);
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        
        }
        function recherche($id){  
            try{
                $sql="SELECT * FROM utilisateur WHERE id = '$id' ";
                $db=config::getConnexion();
               return $db->query($sql);
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        
        }


        function finduser($email){  
            try{
                $sql="SELECT * FROM utilisateur WHERE email = '$email' ";
                $db=config::getConnexion();
               return $db->query($sql);
            }
            catch(PDOException $e){
                $e->getMessage();
            }
        
        }
        function triuserAsc()
        {
            $db = config::getConnexion();
            $sql = "SELECT * FROM utilisateur ORDER BY username ASC";
            
            try{
                return $db->query($sql);
            }
               catch (Exception $e)
               {
                   die('Erreur:'.$e->getMessage());
               }
        
        }
        function triuserdesc()
        {
            $db = config::getConnexion();
            $sql = "SELECT * FROM utilisateur ORDER BY username DESC";
            
            try{
                return $db->query($sql);
            }
               catch (Exception $e)
               {
                   die('Erreur:'.$e->getMessage());
               }
        
        }
    
          ///___ ____________________________ FONCTION find__________________________________
        
        // function find_utilisateur($q){  
        //     try{
        //     $sql = "SELECT * FROM utilisateur WHERE nom LIKE '%$q%' ";
        //     $db=config::getConnexion();
        //     return $db->query($sql);
        //  }
        //  catch(PDOException $e){
        //      $e->getMessage();
        //  }
        
        // }
        
        
        
        ///___ ____________________________ FONCTION DELETE________________________________
        
        function delete($ee) {
        
            $sql=" DELETE FROM utilisateur  WHERE  id=:ee";
           
            $db=config::getConnexion();
            $query=$db->prepare ($sql);
            $query->bindValue(':ee',$ee); 
            $query->execute();
        }
         ///___ ____________________________ FONCTION MOFusernameIER________________________________
        
        // function updateutilisateur($username_utilisateur,$prenom,$nom,$mdp,$adresse,$piscine,$)
        // { try
        //     {
        //     $sql= " UPDATE utilisateur SET  prenom = '$prenom', nom = '$nom', mdp = '$mdp', adresse = '$adresse',
        //     rolee = '$rolee',  = '$' = '  WHERE username='$username_utilisateur '";
        //     $db=config::getConnexion();
           
        //         $db->query($sql);
                
        //     }
        //     catch (Exception $e)
        //     {
        //         die('Erreur: '.$e->getMessage());
        //     }
        // }
        
       
        // function tri()
        // {
        
        //     $sql="SELECT * from utilisateur ORDER BY mdp  DESC";
        
        //     $db = config::getConnexion();
        //     try
        //     {
        //         $list=$db->query($sql);
        //         return $list;
        //     }
        //     catch (Exception $e)
        //     {
        //         die('Erreur: '.$e->getMessage());
        //     }
        function modifierutilisateur($utilisateur, $id)
        {
            $sql = "UPDATE utilisateur SET  prenom=:prenom,nom=:nom,email=:email,mdp=:mdp ,adresse=:adresse,rolee=:rolee ,username=:username WHERE id=:id";
    
            $db = config::getConnexion();
            //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
            try {
                $req = $db->prepare($sql);
                $prenom = $utilisateur->getprenom();
                $nom = $utilisateur->getNom();
                $email = $utilisateur->getEmail();
                $mdp = $utilisateur->getmdp();
                $adresse = $utilisateur->getAdresse();
                $rolee = $utilisateur->getrolee();
                $username = $utilisateur->getusername();
    
    
                $req->bindValue(':id', $id);
                $req->bindValue(':prenom', $prenom);
                $req->bindValue(':nom', $nom);
                $req->bindValue(':email', $email);
                $req->bindValue(':mdp', $mdp);
                $req->bindValue(':adresse', $adresse);
                $req->bindValue(':rolee', $rolee);
                $req->bindValue(':username', $username);
    
    
    
                $s = $req->execute();
    
                // header('Location: index.php');
            } catch (Exception $e) {
                echo " Erreur ! " . $e->getMessage();
                echo " Les datas : ";
            }
        
		} 
        function login($username, $mdp)
        {
            $toConnectUser = null;
    
            $db = config::getConnexion();
            $sql = "SELECT * FROM utilisateur WHERE username='$username' AND mdp='$mdp'";
    
    
            try {
                //$liste = $db->query($sql);
                $liste = $db->query($sql);
    
                $arrayUsers = array();
                foreach ($liste as $row) {
                    $utilisateur= new user($row['username'], $row['email'], $row['mdp']);
               
                    $utilisateur->rolee = ($row['rolee']);
                    array_push($arrayUsers, $utilisateur);
                }
                if (count($arrayUsers) > 0) {
                    $toConnectUser = $arrayUsers[0];
                }
                return $toConnectUser;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
    
    
    }
    
    

        
?>






