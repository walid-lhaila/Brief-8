<?php
// include("../public/datacnx.php");

    class Bank {
        private $cnx;
        private $id;
        private $nom;
        private $logo;

        public function __construct(){
            global $cnx;
            $this->cnx = $cnx;
            $this->cnx->select_db("bank");
            if($this->cnx->connect_error) {
                die("Error connecting" . mysqli_connect_error());
        }
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }
        public function setNom($nom){
            $this->nom = $nom;
        }

        public function getNom(){
            return $this->nom;
        }
        public function setLogo($logo){
            $this->logo = $logo;
        }

        public function getLogo(){
            return $this->logo;
        }

        public function generateUniqueId() {
            return uniqid('', true);  // Generates a unique ID with a prefix 'account_'
        }

        public function addBank(){
            $this->id = $this->generateUniqueId();

            $stmt = $this->cnx->prepare("INSERT INTO bank (id, nom, logo) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $this->id, $this->nom, $this->logo);
            $stmt->execute();
            $stmt->close();
        }

        public function updateBank(){
            $stmt = $this->cnx->prepare("UPDATE bank SET nom = ?, logo = ? WHERE id = ?");
            $stmt->bind_param("sss", $this->nom, $this->logo, $this->id);
            $stmt->execute();
            $stmt->close();
        }


        public function deleteBank(){
            $stmt = $this->cnx->prepare("DELETE FROM bank WHERE id = ?");
            $stmt->bind_param("s", $this->id);
            $stmt->execute();
            $stmt->close();
        }
        }

?>