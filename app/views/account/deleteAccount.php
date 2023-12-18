<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/accountClass.php");
 require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");

if (isset($_GET['id'])){
    $accountIdToDelete = $_GET['id'];
    $account = new Account();
    $account->setId($accountIdToDelete);
    $account->deleteAccount();
    header("Location: account.php");
    exit();
} else {
    echo "invalid request";
    exit();
}
?>