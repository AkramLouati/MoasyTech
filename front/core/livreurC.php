<?PHP
include "../config.php";
class livreurC {
function afficherlivreur ($livreur){
	    echo "login: ".$livreur->getLogin()."<br>";
		echo "cin: ".$livreur->getCin()."<br>";
		echo "nom: ".$livreur->getNom()."<br>";
		echo "prenom: ".$livreur->getPrenom()."<br>";
		echo "dispo: ".$livreur->getDispo()."<br>";
		echo "secteur: ".$livreur->getSecteur()."<br>";
		echo "tel: ".$livreur->getTel()."<br>";
		echo "date_naiss: ".$livreur->getDate_naiss()."<br>";
		echo "mail ".$livreur->getMail()."<br>";
	    echo "adresse ".$livreur->getAdresse()."<br>";
	    echo "mdp ".$livreur->getMdp()."<br>";
	    echo "num_permis ".$livreur->getNum_permis()."<br>";
        echo "id ".$livreur->getId_livreur()."<br>";



	}
	function ajouterlivreur($livreur){
		$sql="insert into livreur ( login,cin,nom,prenom,dispo,secteur,tel,date_naiss,mail,adresse,mdp,num_permis,id) values (:login,:cin, :nom,:prenom,:dispo,:secteur,:tel,:date_naiss,:mail,:adresse,:mdp,:num_permis,:id)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		$login=$livreur->getLogin();
        $cin=$livreur->getCin();
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
        $dispo=$livreur->getDispo();
        $secteur=$livreur->getSecteur();
        $tel=$livreur->getTel();
        $date_naiss=$livreur->getDate_naiss();
        $mail=$livreur->getMail();
        $adresse=$livreur->getAdresse();
        $mdp=$livreur->getMdp();
        $num_permis=$livreur->getNum_permis();
        $id=$livreur->getId_livreur();






        $req->bindValue(':login',$login);
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':dispo',$dispo);
		$req->bindValue(':secteur',$secteur);
		$req->bindValue(':tel',$tel);
		$req->bindValue(':date_naiss',$date_naiss);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':mdp',$mdp);
		$req->bindValue(':num_permis',$num_permis);
		$req->bindValue(':id',$id);

		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	function getOrderPromotionT($regrouper){
	
		$sql="SELECT * FROM livreur ORDER BY secteur  ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }





	function getAllLivreurS($keywords){
		$sql="SELECT * FROM livreur WHERE CONCAT(`login`,`cin`, `nom`, `prenom`,`dispo`,`secteur`,`tel`,`date_naiss`,`mail`,`adresse`,`mdp`,`num_permis`,`id`) LIKE '%".$keywords."%'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
    }
	
	function afficherlivreurs(){
		//$sql="SElECT * From livreur e inner join formationphp.livreur a on e.cin= a.cin";
		$sql="SElECT * From livreur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerlivreur($cin){
		$sql="DELETE FROM livreur where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':cin',$cin);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierlivreur($livreur,$cin){
		$sql="UPDATE livreur SET cin=:cinn, nom=:nom,prenom=:prenom,secteur=:secteur WHERE cin=:cin";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$cinn=$livreur->getCin();
        $nom=$livreur->getNom();
        $prenom=$livreur->getPrenom();
        $secteur=$livreur->getSecteur();
		$datas = array(':cinn'=>$cinn, ':cin'=>$cin, ':nom'=>$nom,':prenom'=>$prenom,':secteur'=>$secteur);
		$req->bindValue(':cinn',$cinn);
		$req->bindValue(':cin',$cin);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':secteur',$secteur);		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererlivreur($cin){
		$sql="SELECT * from livreur where cin=$cin";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	
	function rechercherListelivreurs($secteur){
		$sql="SELECT * from livreur where secteur=$secteur";
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