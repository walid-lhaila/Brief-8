<?php
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/distributeursClass.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");
if(isset($_GET['id'])){
    $distributeurIdToDelete = $_GET['id'];
    $distributeur = new Distributeur();
    $distributeur->setId($distributeurIdToDelete);
    $distributeur->deleteDistributeur();
    header("Location: distributeurs.php");
    exit();
}else{
    echo "invalid request";
    exit();
}
 ?>