<?php 
class Account {
    private $cnx;
    private $id;
    private $balance;
    private $devise;
    private $rib;
    private $user_id;
   

    public function __construct() {
        global $cnx;
        $this->cnx = $cnx;
        $this->cnx->select_db("bank");

        if ($this->cnx->connect_error) {
            die("Database selection failed: " . $this->cnx->connect_error);
        }
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }
    public function setBalance($balance) {
        $this->balance = $balance;
    }
    public function getBalance() {
        return $this->balance;
    }
    public function setDevise($devise){
        $this->devise = $devise;
    }
    public function getDevise() {
        return $this->devise;   
    }
    public function setRib($rib){
        $this->rib = $rib;
    }
    public function getRib() {
        return $this->rib;
    }
    public function setUserId($user_id){
        $this->user_id = $user_id;
    }
    public function getUserId() {
        return $this->user_id;
    }
    public function generateUniqueId() {
        return uniqid("", true);
    }
    public function addAccount(){
        $this->id = $this->generateUniqueId();
        $stmt = $this->cnx->prepare("INSERT INTO account (id, balance, devise, rib, user_id) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $this->id, $this->balance, $this->devise, $this->rib, $this->user_id);
        $stmt->execute();
        $stmt->close();
    }

    public function updateAccount(){
        $stmt = $this->cnx->prepare("UPDATE account SET balance=?, devise=?, rib=?, user_id=? WHERE id=?");
        $stmt->bind_param("sssss", $this->balance, $this->devise, $this->rib, $this->user_id, $this->id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteAccount(){
        $stmt = $this->cnx->prepare("DELETE FROM account WHERE id = ?");
        $stmt->bind_param("s", $this->id);
        $stmt->execute();
        $stmt->close();
    }

    
}



?>