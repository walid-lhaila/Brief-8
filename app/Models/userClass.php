<?php
//  include("../public/datacnx.php");
    class User {
        private $cnx;
        private $id;
        private $nom;
        private $prenom;
        private $naissance;
        private $nationalite;
        private $genre;
        private $role;
        private $username;
        private $pass;
        private $agency_id;

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
        public function setNom($nom){
            $this->nom = $nom;
        }
        public function getNom(){
            return $this->nom;
        }
        public function setPrenom($prenom){
            $this->prenom = $prenom;
        }
        public function getPrenom(){
            return $this->prenom;
        }
        public function setNaissance($naissance){
            $this->naissance = $naissance;
        }
        public function getNaissance(){
            return $this->naissance;
        }
        public function setNationalite($nationalite){
            $this->nationalite = $nationalite;
        }
        public function getNationalite(){
            return $this->nationalite;
        }
        public function setGenre($genre){
            $this->genre = $genre;
        }
        public function getGenre(){
            return $this->genre;
        }
        public function setRole($role){
            $this->role = $role;
        } 
        public function  getRole(){
            return $this->role;
        }
        public function setUsername($username){
            $this->username = $username;
        }
        public function getUsername(){
            return $this->username;
        }
        public function setPassword($pass){
            $this->pass = $pass;
        }
        public function getPassword(){
            return $this->pass;
        }
        public function setAgencyId($agency_id){
            $this->agency_id = $agency_id;
        }
        public function getAgencyId(){
            return $this->agency_id;
        }
        public function generateUniqueId() {
            return uniqid("", true);
        }
        public function addUser(){
            $this->id = $this->generateUniqueId();
            $stmt = $this->cnx->prepare("INSERT INTO user (id, nom, prenom, naissance, nationalite, genre, role, username, pass, agency_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssss", $this->id, $this->nom, $this->prenom, $this->naissance, $this->nationalite, $this->genre, $this->role, $this->username, $this->pass, $this->agency_id);
            $stmt->execute();
            $stmt->close();
        }
        public function updateUser(){
            $stmt = $this->cnx->prepare("UPDATE user SET nom=?, prenom=?, naissance=?, nationalite=?, genre=?, role=?, username=?, pass=?, agency_id=? WHERE id=?");
            $stmt->bind_param("ssssssssss", $this->nom, $this->prenom, $this->naissance, $this->nationalite, $this->genre, $this->role, $this->username, $this->pass, $this->agency_id, $this->id);
            $stmt->execute();
            $stmt->close();
        }
        public function deleteUser(){
            $stmt = $this->cnx->prepare("DELETE FROM user WHERE id = ?");
            $stmt->bind_param("s", $this->id);
            $stmt->execute();
            $stmt->close();
        }
    }
?>