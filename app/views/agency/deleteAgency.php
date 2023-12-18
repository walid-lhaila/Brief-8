<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/agencyClass.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");

if(isset($_GET['id'])){
    $agencyIdToDelete = $_GET['id'];
    $agency = new  Agency();
    $agency->setId($agencyIdToDelete);
    $agency->deleteAgency();

    header("Location: agency.php");
    exit();
}else{
    echo "invalid request";
    exit();
}
?>