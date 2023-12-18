<?php
session_start();
ob_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/userClass.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");

if ($cnx->connect_error) {
    die("Connection failed: " . $cnx->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '$username' AND pass = '$password'";
    $result = $cnx->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($user['role'] == 'Admin') {
            // $_SESSION['user_info'] = $user;
            header("Location: adminDashbord.php");
            exit();
        } elseif ($user['role'] == 'Client') {
            // $_SESSION['user_info'] = $user;
            header("Location: ClientDashboard.php");
            exit();
        }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-cyan-800">

<div class="flex flex-col justify-center items-center h-screen">
<form action="login.php" method="POST" class="w-[500px] h-[320px] mx-auto bg-gray-400 rounded">
<h1 class="text-3xl text-white font-bold flex flex-col justify-center mt-5 items-center">LOG IN</h1>
  <label for="login.php" class="block mb-2 px-10 text-md font-medium  text-gray-900 dark:text-white">Username</label>
        <div class="flex px-10 ">
            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
            </svg>
            </span>
            <input type="text" name="username" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
        </div>

  <label for="website-admin" class="block mb-2 px-10 text-md mt-3 font-medium text-gray-900 dark:text-white">Password</label>
        <div class="flex px-10">
            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                <path d="M14 7h-1.5V4.5a4.5 4.5 0 1 0-9 0V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-5 8a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Zm1.5-8h-5V4.5a2.5 2.5 0 1 1 5 0V7Z"/>
            </svg>
            </span>
            <input type="password" name="password" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
        </div>

        <div class="flex flex-col justify-center items-center">
                <button type="submit" name="login" class="text-white mt-4 bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  w-24 px-5 py-2.5 text-center dark:bg-orange-600  dark:focus:ring-blue-800">Login</button>
        </div>


</form>
</div>




</body>
</html>