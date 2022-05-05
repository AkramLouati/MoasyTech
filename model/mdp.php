<?php
class ResetPassword{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function deleteEmail($email){
        $this->db->query('DELETE FROM resetmdp WHERE reemail=:email');
        $this->db->bind(':email',$email);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function insertToken($email, $selector, $hashedToken, $expires){
        $this->db->query('INSERT INTO resetmdp (reemail, reselector, retoken, 
        reexpires) VALUES (:email, :selector, :token, :expires)');
        $this->db->bind(':email', $email);
        $this->db->bind(':selector', $selector);
        $this->db->bind(':token', $hashedToken);
        $this->db->bind(':expires', $expires);
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function resetPassword($selector, $currentDate){
        $this->db->query('SELECT * FROM resetmdp WHERE  reselector=:selector AND reexpires >= :currentDate');
        $this->db->bind(':selector',$selector);
        $this->db->bind(':currentDate',$currentDate);
        //Execute
        $row = $this->db->single();

        //Check row
        if($this->db->rowCount() > 0){
            return $row;
        }else{
            return false;
        }
    }
}