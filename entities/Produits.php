<?PHP
class Produits{
	private $id;
	private $nomproduit;
	private $description;
	private $prix;
	private $qt;
	private $image;
	private $categorie;
	private $idcat;

		
		function __construct($id,$nomproduit,$description,$prix,$qt,$categorie,$image,$idcat){
		$this->id=$id;
		$this->nomproduit=$nomproduit;
		$this->description=$description;
		$this->prix=$prix;
		$this->qt=$qt;
		$this->image=$image;
		$this->categorie=$categorie;
        $this->idcat=$idcat;
	}
	
	function getid(){
		return $this->id;
	}
	function getidcat(){
		return $this->idcat;
	}
	function getnomproduit(){
		return $this->nomproduit;
	}

	function getdescription(){
		return $this->description;
	}

	function getqt(){
		return $this->qt;
	}
	function getimage(){
		return $this->image;
	}

	function getprix(){
		return $this->prix;
	}
	function getcategorie(){
		return $this->categorie;
	}
	function setcategorie($categorie){
		$this->categorie=$categorie;
	}
	function setnomproduit($nomproduit){
		$this->nomproduit=$nomproduit;
	}
	function setdescription($description){
		$this->description;
	}
	function setqt($qt){
		$this->qt=$qt;
	}
	function setprix($prix){
		$this->prix=$prix;
	}
	function setimage($image){
		$this->image=$image;
	}
	function setidcat($idcat){
		$this->idcat=$idcat;
	}
	
}

?>