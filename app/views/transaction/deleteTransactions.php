<?php
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/transactionsClass.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");
    if(isset($_GET['id'])){
        $transactionIdToDelete = $_GET['id'];
        $transaction = new Transactions();
        $transaction->setId($transactionIdToDelete);
        $transaction->deleteTransactions();
        header("Location:transactions.php");
        exit();
    }else{
        echo "invalid request";
        exit();
    }

 ?>