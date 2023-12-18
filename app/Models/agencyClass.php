<?php 
// include("../public/datacnx.php");


    class Agency {
    private $cnx;
    private $id;
    private $longitude;
    private $latitude;
    private $adress;
    private $bank_id;

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
    public function setBankId($bank_id){
        $this->bank_id = $bank_id;
    }
    public function getBankId(){
        return $this->bank_id;
    }

    public function generateUniqueId(){
        return uniqid('', true); 
    }

    public function addAgency(){
        $this->id = $this->generateUniqueId();
        $stmt = $this->cnx->prepare("INSERT INTO agency (id, longitude, latitude, adress, bank_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $this->id, $this->longitude, $this->latitude, $this->adress, $this->bank_id);
        $stmt->execute();
        $stmt->close();
    }

    public function updateAgency(){
        $stmt = $this->cnx->prepare("UPDATE agency SET id=?, longitude=?, latitude=?, adress=?, bank_id=?");
        $stmt->bind_param("sssss", $this->id, $this->longitude, $this->latitude, $this->adress, $this->bank_id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteAgency(){
        $stmt = $this->cnx->prepare("DELETE FROM agency WHERE id=?");
        $stmt->bind_param("s", $this->id);
        $stmt->execute();
        $stmt->close();
    }
}

?>