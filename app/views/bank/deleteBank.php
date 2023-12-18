<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/bankClass.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");

if(isset($_GET['id'])){
    $bankIdToDelete = $_GET['id'];

    $bank = new Bank();
    $bank->setId($bankIdToDelete);
    $bank->deleteBank();

    header("Location: bank.php");
    exit();
}else{
    echo "invalid request";
    exit();
}

?>