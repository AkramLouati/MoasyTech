<?PHP
class livraison{
	

	protected $lieuLivraison;
	protected $prixLivraison;
    protected $modePaiement;
	
	function __construct($lieuLivraison,$prixLivraison,$modePaiement){

	
		$this->lieuLivraison=$lieuLivraison;
		$this->prixLivraison=$prixLivraison;
	
		$this->modePaiement=$modePaiement;
	}
	
	

	function getEtatLivraison(){
		return $this->etatLivraison;
	}
	function getLieuLivraison(){
		return $this->lieuLivraison;
	}
	function getPrixLivraison(){
		return $this->prixLivraison;
	}
	
	
	function getModePaiement(){
		return $this->modePaiement;
	}

	
	function setLieuLivraison($lieuLivraison){
		$this->lieuLivraison=$lieuLivraison;
	}
	function setPrixLivraison($prixLivraison){
		$this->prixLivraison=$prixLivraison;
	}
	

	function setModePaiement($modePaiement){
		$this->modePaiement=$modePaiement;
	}
	
}

?>