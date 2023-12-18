<?php 
 class Distributeur {
    private $cnx;
    private $id;
    private $longitude;
    private $latitude;  
    private $adress;
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
    public function setLongitude($longitude){
        $this->longitude = $longitude;
    }
    public function getLongitude(){
        return $this->longitude;
    }
    public function setLatitude($latitude){
        $this->latitude = $latitude;
    }
    public function getLatitude(){
        return $this->latitude;
    }
    public function setAdress($adress){
        $this->adress = $adress;
    }
    public function getAdress(){
        return $this->adress;
    }
    public function setAgencyId($agency_id){
        $this->agency_id = $agency_id;
    }
    public function getAgencyId(){
        return  $this->agency_id;
    }

    public function generateUniqueId() {
        return uniqId("", true);
    }
    public function addDistributeur(){
        $this->id = $this->generateUniqueId();
        $stmt = $this->cnx->prepare("INSERT INTO distributeur (id, longitude, latitude, adress, agency_id) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $this->id, $this->longitude, $this->latitude, $this->adress, $this->agency_id);
        $stmt->execute();
        $stmt->close();
    }
    public function updateDistributeur(){
        $stmt = $this->cnx->prepare("UPDATE distributeur SET id = ?, longitude = ?, latitude = ?, adress = ?,agency_id = ?");
        $stmt->bind_param("sssss", $this->id, $this->longitude, $this->latitude, $this->adress, $this->agency_id);
        $stmt->execute();
        $stmt->close();
    }
    public function deleteDistributeur(){
        $stmt = $this->cnx->prepare("DELETE FROM distributeur WHERE id = ?");
        $stmt->bind_param("s", $this->id);
        $stmt->execute();
        $stmt->close();
    }
 }

?>