<?php
include '../../config.php';
include_once '../Model/Promotion.php';
class PromotionC
{
	function afficherPromotion()
	{
		$sql = "SELECT * FROM Promotion";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function supprimerPromotion($Id)
	{
		$sql = "DELETE FROM Promotion WHERE Id=:Id";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':Id', $Id);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function ajouterPromotion($Promotion)
	{
		$sql = "INSERT INTO Promotion (Id, Nom, DateD, DateF, PrixA, Remise, PrixN) 
			VALUES (:Id,:Nom,:DateD,:DateF,:PrixA,:Remise,:PrixN)";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute([
				'Id' => $Promotion->getId(),
				'Nom' => $Promotion->getNom(),
				'DateD' => $Promotion->getDateD(),
				'DateF' => $Promotion->getDateF(),
				'PrixA' => $Promotion->getPrixA(),
				'Remise' => $Promotion->getRemise(),
				'PrixN' => $Promotion->getPrixN()
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function recupererPromotion($Id)
	{
		$sql = "SELECT * from Promotion where Id=$Id";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$Promotion = $query->fetch();
			return $Promotion;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function modifierPromotion($Promotion, $numPromotion)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE Promotion SET 
						Nom= :Nom, 
						DateD= :DateD, 
						DateF= :DateF, 
						PrixA= :PrixA, 
						Remise= :Remise,
						PrixN= :PrixN
					WHERE Id= :Id'
			);
			$query->execute([
				'Nom' => $Promotion->getNom(),
				'DateD' => $Promotion->getDateD(),
				'DateF' => $Promotion->getDateF(),
				'PrixA' => $Promotion->getPrixA(),
				'Remise' => $Promotion->getRemise(),
				'PrixN' => $Promotion->getPrixN(),
				'Id' => $numPromotion
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}
}
