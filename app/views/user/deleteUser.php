<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/userClass.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");

 if(isset($_GET['id'])){
    $userIdToDelete = $_GET['id'];
    $user = new User();
    $user->setId($userIdToDelete);
    $user->deleteUser();

    header("Location: user.php");
    exit();
 }else{
    echo "invalid request";
    exit();
 }