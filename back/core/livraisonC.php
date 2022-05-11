<?PHP
include "../config.php";
class livraisonC {
function afficherlivraison ($livraison){
		echo "id: ".$livraison->getId()."<br>";
		echo "etatLivraison: ".$livraison->getEtatLivraison()."<br>";
		echo "lieuLivraison: ".$livraison->getLieuLivraison()."<br>";
		echo "prixLivraison: ".$livraison->getPrixLivraison()."<br>";
        echo "modePaiement: ".$livraison->getModePaiement()."<br>";
		echo "idL: ".$livraison->getidL()."<br>";

	}
	function ajouterlivraison($livraison){
		//$sql="insert into livraison (lieuLivraison,prixLivraison,modePaiement) values (:lieuLivraison,:prixLivraison,:modePaiement)";
		$sql="INSERT INTO `livraison` (`id`, `etatLivraison`, `lieuLivraison`, `prixLivraison`, `modePaiement`, `idL`) 
		VALUES (:id, :etatLivraison, :lieuLivraison, :prixLivraison, :modePaiement, :idL)";


		

		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
	


        $lieuLivraison=$livraison->getLieuLivraison();
		$prixLivraison=$livraison->getPrixLivraison();
		//$idLivreur=$livraison->getIdLivreur();
		
		$modePaiement=$livraison->getModePaiement();

		//$req->bindValue(':etatLivraison',$etatLivraison);
		$req->bindValue(':lieuLivraison',$lieuLivraison);
        $req->bindValue(':prixLivraison',$prixLivraison);
        //$req->bindValue(':idLivreur',$idLivreur);
        $req->bindValue(':modePaiement',$modePaiement);				
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	function getAllLivraisonS($keywords){
		$sql="SELECT * FROM livraison WHERE CONCAT(`id`,  `etatLivraison`,`etatLivraison`, `lieuLivraison` ,`prixLivraison`,`modePaiement`,`idL`) LIKE '%".$keywords."%'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function afficherlivraisons(){
		//$sql="SElECT * From livraison e inner join formationphp.livraison a on e.idclient= a.idclient";
		$sql="SElECT * From livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerlivraison($id){
		$sql="DELETE FROM livraison where id=:id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierlivraison($livraison,$id){
		$sql="UPDATE livraison SET id=:id, etatLivraison=:etatLivraison, lieuLivraison=:lieuLivraison, prixLivraison=:prixLivraison, modePaiement=:modePaiement, idL=:idL WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $etatLivraison=$livraison->getetatLivraison();
        $lieuLivraison=$livraison->getlieuLivraison();
        $prixLivraison=$livraison->getprixLivraison();
		$modePaiement=$livraison->getmodePaiement();
		$datas = array(':id'=>$id, ':id'=>$id, ':etatLivraison'=>$etatLivraison,':lieuLivraison'=>$lieuLivraison,':prixLivraison'=>$prixLivraison,':modePaiement'=>$modePaiement,':idL'=>$idL);
		$req->bindValue(':id',$id);
		$req->bindValue(':etatLivraison',$etatLivraison);
		$req->bindValue(':lieuLivraison',$lieuLivraison);
		$req->bindValue(':prixLivraison',$prixLivraison);	
        $req->bindValue(':modePaiement',$modePaiement);	
		$req->bindValue(':idL',$idL);			
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}


	function trie(){
		$sql="SELECT * from livraison order by prixLivraison asc ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());;
		}
	}
	function recupererlivraisons(){
		$sql="SELECT * from livraison";
		$db = config::getConnexion();
		
		try
		{
		$liste=$db->query($sql);
		$liste->execute();
		return $liste;
		}
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
        }
	
	


function recupererlivraison($id){
		$sql="SELECT * from livraison where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListelivraisons($id){
		$sql="SELECT * from livraison where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
}


?>