<?PHP
class livreur{
	private $login;
	private $cin;
	private $nom;
	private $prenom;
	private $dispo;
	private $secteur;
	private $tel;
	private $date_naiss;
	private $mail;
	private $adresse;
	private $mdp;
	private $num_permis;
	private $id;
	
	
	
	
	

	function __construct($login,$cin,$nom,$prenom,$dispo,$secteur,$tel,$date_naiss,$mail,$adresse,$mdp,$num_permis,$id){
		$this->login=$login;
		$this->cin=$cin;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->dispo=$dispo;
		$this->secteur=$secteur;
		$this->tel=$tel;
		$this->date_naiss=$date_naiss;
		$this->mail=$mail;
		$this->adresse=$adresse;
		$this->mdp=$mdp;
		$this->num_permis=$num_permis;
		$this->id=$id;
		
		
	}
	function getLogin(){
		return $this->login;
	}
	
	function getCin(){
		return $this->cin;
	}
	function getNom(){
		return $this->nom;
	}
	function getDispo(){
		return $this->dispo;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getSecteur(){
		return $this->secteur;
	}
	function getTel(){
		return $this->tel;
	}
	function getDate_naiss(){
		return $this->date_naiss;
	}
	function getMail(){
		return $this->mail;
	}
	function getAdresse(){
		return $this->adresse;
	}
	function getMdp(){
		return $this->mdp;
	}
	function getNum_permis(){
		return $this->num_permis;
	}
	function getId_livreur(){
		return $this->id;
	}
	function setLogin($login){
		$this->login=$login;
	}

     function setCin($cin){
		$this->cin=$cin;
	}
	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom=$prenom;
	}
	function setDispo($dispo){
		$this->dispo=$dispo;
	}
	function setSecteur($secteur){
		$this->secteur=$secteur;
	}
	function setTel($tel){
		$this->tel=$tel;
	}
	function setDate_naiss($date_naiss){
		$this->date_naiss=$date_naiss;
	}
	function setMail($mai){
		$this->mail=$mail;
	}
	function setAdresse($adresse){
		$this->adresse=$adresse;
	}
	function setMdp($mdp){
		$this->mdp=$mdp;
	}
	function setNum_permi($num_permis){
		$this->num_permis=$num_permis;
	}
	function setId_livreur($id){
		$this->id=$id;
	}
}

?>