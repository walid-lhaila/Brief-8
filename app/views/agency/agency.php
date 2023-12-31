<?php
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/agencyClass.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/views/includeFile/sideBar.php");


  if(isset($_POST['submit'])){
    $agency = new Agency();
    $agency->setLongitude($_POST['longitude']);
    $agency->setLatitude($_POST['latitude']);
    $agency->setAdress($_POST['adress']);
    $agency->setBankId($_POST['bank_id']);
    $agency->addAgency();
  }


  $agencys = [];
  $sql = "SELECT id, longitude, latitude, adress, bank_id FROM agency";
  $result = $cnx->query($sql);
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $agencys[]  = $row;
    }
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#agency').dataTable();

        });
    </script>
    <title>Document</title>
</head>
<body class="overflow-x-hidden">



<div class="container ml-[150px]">
    <a href="agencyForm.php"><button id="cardagency" class="font-bold mt-10 ml-10 px-5 py-1 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-orange-600 text-gray-200  font-serif ">+ Add Agency</button></a>

<div class="relative ml-[40px] w-[1250px] top-10">
    <table id="agency" class="w-[1200px] text-center text-sm text-left rtl:text-right text-gray-200 dark:text-gray-200">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-900  dark:text-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    LONGITUDE
                </th>
                <th scope="col" class="px-6 py-3">
                    LATITUDE
                </th>
                <th scope="col" class="px-6 py-3">
                    ADRESS
                </th>
                <th scope="col" class="px-6 py-3">
                    BANK ID
                </th>
                <th scope="col" class="px-6 py-3">
                    ACTION 
                  </th>
            </tr>
            </thead>
        <tbody class="text-black dark:bg-gray-200">
          <?php foreach ($agencys as $agency): ?>
            <tr>
              <td><?=$agency['id']; ?></td>
              <td><?=$agency['longitude']; ?></td>
              <td><?=$agency['latitude']; ?></td>
              <td><?=$agency['adress']; ?></td>
              <td><?=$agency['bank_id']; ?></td>
              <td class="flex gap-1">
              <a href="editagency.php?id=<?=$user['id'];?>"><svg class="w-[28px] h-[28px] text-gray-600 hover:text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
    <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
    <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
  </svg></a>
                <a href="deleteAgency.php?id=<?=$agency['id'];?>"><svg class="w-[28px] h-[28px] text-gray-600 hover:text-red-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
    <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
  </svg></a>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
</div>

</body>
</html>