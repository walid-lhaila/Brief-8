<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/agencyClass.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    
<div class="flex flex-col justify-center items-center h-screen">
        <form action="user.php" method="POST" class="w-[500px] h-[520px] mx-auto bg-cyan-800">
        <h1 class="text-3xl text-white font-bold flex flex-col justify-center mt-5 items-center">Add User</h1>
            <div class="relative z-0 w-full px-10 mt-5 mb-5 group">
                <input type="text" name="nom" id="nom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                <label for="nom" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">LAST NAME</label>
            </div>
            <div class="relative z-0 w-full px-10 mb-5 group">
                <input type="text" name="prenom" id="prenom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                <label for="prenom" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FIRST NAME</label>
            </div>
            
            <div class="grid md:grid-cols-2">
            <div class="relative z-0 w-full px-10 mb-5 group">
                <input type="date" name="naissance" id="naissance" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                <label for="naissance" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">BIRTHDAY</label>
            </div>
            <div class="relative z-0 w-full px-10 mb-5 group">
                <input type="text" name="nationalite" id="nationalite" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                <label for="nationalite" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NATIONALITY</label>
            </div>
            </div>
            <div class="grid md:grid-cols-2 ">
            <div class="relative z-0 w-full px-10 mb-5 group">
                <label for="genre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">GENDER</label>
                <select class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" name="genre" id="genre">
                    <option class="text-gray-800" value="Homme">Homme</option>
                    <option class="text-gray-800" value="Femme">Femme</option>
                    <option class="text-gray-800" value="Other">Other</option>
                </select>
            </div>
            <div class="relative z-0 w-full px-10 mb-5 group">
                <input type="text" name="username" id="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">USERNAME</label>
            </div>
        </div>
        <div class="grid md:grid-cols-2">
        <div class="relative z-0 w-full px-10 mb-5 group">
                <input type="pass" name="pass" id="pass" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                <label for="pass" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PASSWORD</label>
            </div>
            <div class="relative z-0 w-full px-10 mb-5 group">
                <label for="role" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CHOOSE A ROLE</label>
                <select class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" name="role" id="role">
                    <option class="text-gray-800" value="Admin">Admin</option>
                    <option class="text-gray-800" value="Client">Client</option>
                </select>
            </div>
        </div>
        <div class="relative z-0 w-full px-10 mb-5 group">
            <label for="role" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SELECT AGENCY</label>
            <select id="agency_id" name="agency_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer">
                  <option class="text-gray-800 " disabled selected value="" class="bg-dark-gray-800">Select Agency</option>
                  <?php
                  $agencyQuery = "SELECT id, adress FROM agency";
                  $agencyResult = $cnx->query($agencyQuery);

                  if ($agencyResult->num_rows > 0) {
                      while ($agency = $agencyResult->fetch_assoc()) {
                        echo "<option value='{$agency['id']}'>{$agency['adress']}</option>";
                      }
                  }
                  ?>
          </select>
          </div>
            <div class="flex flex-col justify-center items-center">
                <button type="submit" name="submit" class="text-white mt-4 bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  w-24 px-5 py-2.5 text-center dark:bg-orange-600  dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
</div>
</body>
</html>