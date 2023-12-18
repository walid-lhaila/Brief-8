<?php 
//  include("../public/datacnx.php");

    class Transactions {
        private $cnx;
        private $id;
        private $montant;
        private $type;
        private $account_id;

        public function __construct(){
            global $cnx;
            $this->cnx = $cnx;
            $this->cnx->select_db("bank");
        }

        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }
        public function setMontant($montant){
            $this->montant = $montant;
        }
        public function getMontant(){
            return $this->montant;
        }
        public function setType($type){
            $this->type = $type;
        }
        public function getType(){
            return $this->type;
        }
        public function setAccountId($account_id){
                $this->account_id = $account_id;
        }
        public function getAccountId(){
            return $this->account_id;
        }
        
        public function generateUniqueId(){
            return uniqid("", true);
        }
        public function addTransactions(){
            $this->id = $this->generateUniqueId();
            $stmt = $this->cnx->prepare("INSERT INTO transactions (id, montant, type, account_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $this->id, $this->montant, $this->type, $this->account_id);
            $stmt->execute();
            $stmt->close();
        }
        public function updateTransactions() {
            $stmt = $this->cnx->prepare("UPDATE transactions SET montant=?, type=?, account_id=? WHERE id=?");
            $stmt->bind_param("ssss", $this->montant, $this->type, $this->account_id, $this->id);
            
            if ($stmt->execute()) {
                return true; // Success
            } else {
                return false; // Failure
            }
        }
        public function deleteTransactions(){
            $stmt = $this->cnx->prepare("DELETE FROM transactions WHERE id = ?");
            $stmt->bind_param("s", $this->id);
            $stmt->execute();
            $stmt->close();
        }
    }





?>