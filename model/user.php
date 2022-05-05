<?php  
class utilisateur 
{  
    // table fields  
   
    private string $prenom;  
    private string $nom;
    private string $email;  
    private string $mdp;  
    private string $adresse;  
    private string $rolee; 
    private string $username;  
    


    function __construct(string $prenom,string $nom,string $email,string $mdp,string $adresse,string $rolee,string $username )  
    {  
        
        $this->prenom = $prenom;  
        $this->nom = $nom;  
        $this->email= $email; 
        $this->mdp = $mdp;  
        $this->adresse = $adresse;  
        $this->rolee= $rolee; 
        $this->username=$username;  
    }  
  
    

public function setprenom($p) {
    $this->prenom = $p;
}
 public function getprenom() {
    return $this->prenom;
}
public function setnom($n) {
    $this->nom = $n;
}
 public function getnom() {
    return $this->nom;
}
public function setemail($e) {
    $this->email = $e;
}
 public function getemail() {
    return $this->email;
}
public function setmdp($m) {
    $this->mdp = $m;
}
 public function getmdp() {
    return $this->mdp;
}
public function setadresse($a) {
    $this->adresse = $a;
}
 public function getadresse() {
    return $this->adresse;
}
public function setrole($r) {
    $this->rolee= $r;
}
 public function getrolee() {
    return $this->rolee;
}
public function setusername($u) {
    $this->username = $u;
}
 public function getusername() {
    return $this->username;
}



}
?>