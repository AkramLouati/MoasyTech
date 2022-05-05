<?php
	include_once '../../config.php';
	include_once '../Model/Produit.php';

	class ProduitC {
		function afficherProduit(){
			$sql="SELECT * FROM Produit";
			$db = config::getConnexion();
			try{
				$listec = $db->query($sql);
				return $listec;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerProduit($Id){
			$sql="DELETE FROM Produit WHERE Id=:Id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':Id', $Id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function ajouterProduit($Produit){
			$sql="INSERT INTO Produit(Nom) 
			VALUES (:Nom)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'Nom' => $Produit->getNom(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}


		
		function recupererProduit($Id){
			$sql="SELECT * from Produit where Id=$Id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$Produit=$query->fetch();
				return $Produit;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierProduit($Produit, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					"UPDATE Produit SET Nom=:Nom where Id=$id"
				);
				$query->execute([
				
					'Nom' =>$Produit->getNom(),
				]);
				echo $query->rowCount() ;
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
