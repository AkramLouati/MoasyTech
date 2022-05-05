<?php
include '../../config.php';
include_once '../Model/Reclamation.php';
class ReclamationC
{
	function afficherReclamation()
	{
		$sql = "SELECT * FROM Reclamation";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function supprimerReclamation($Id)
	{
		$sql = "DELETE FROM Reclamation WHERE Id=:Id";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':Id', $Id);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function ajouterReclamation($Reclamation)
	{
		$sql = "INSERT INTO Reclamation (Id, Nom, Prenom, TexteR, Email, DateR) 
			VALUES (:Id,:Nom,:Prenom, :TexteR,:Email, :DateR)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'Id' => $Reclamation->getId(),
				'Nom' => $Reclamation->getNom(),
				'Prenom' => $Reclamation->getPrenom(),
				'TexteR' => $Reclamation->getTexteR(),
				'Email' => $Reclamation->getEmail(),
				'DateR' => $Reclamation->getDateR()
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function recupererReclamation($Id)
	{
		$sql = "SELECT * from Reclamation where Id=$Id";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$Reclamation = $query->fetch();
			return $Reclamation;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function modifierReclamation($Reclamation, $numReclamation)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE Reclamation SET 
						Nom= :Nom, 
						Prenom= :Prenom, 
						TexteR= :TexteR, 
						Email= :Email, 
						DateR= :DateR
					WHERE Id= :Id'
			);
			$query->execute([
				'Nom' => $Reclamation->getNom(),
				'Prenom' => $Reclamation->getPrenom(),
				'TexteR' => $Reclamation->getTexteR(),
				'Email' => $Reclamation->getEmail(),
				'DateR' => $Reclamation->getDateR(),
				'Id' => $numReclamation
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}
