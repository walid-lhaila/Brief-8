<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/bankClass.php");
 require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");
 require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/views/includeFile/sideBar.php");

 if(isset($_POST['submit'])){
  $bank = new Bank();
  $bank->setNom($_POST['nom']);
  $bank->setLogo($_POST['logo']);

  $bank->addBank();
 }

 $banks = [];

 $sql = "SELECT id, nom, logo FROM bank";
 $result = $cnx->query($sql);
 
 if($result->num_rows > 0){
     // Fetch all rows using fetch_assoc in a loop
     while ($row = $result->fetch_assoc()) {
         $banks[] = $row;
     }
 }
  
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#bank').dataTable();

        });
    </script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="overflow-x-hidden">
<div class="container ml-[150px]">
    <a href="bankForm.php"><button id="cardbank" class="font-bold mt-10 ml-10 px-5 py-1 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-orange-600 text-gray-200  font-serif ">+ Add Bank</button></a>

<div class="relative ml-[40px] w-[1250px] top-10">
    <table id="bank" class="w-[900px] text-center text-sm text-left rtl:text-right text-gray-200 dark:text-gray-200">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-cyan-900 dark:text-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">NOM</th>
                <th scope="col" class="px-6 py-3">LOGO</th>
                <th scope="col" class="px-6 py-3">ACTION</th>
            </tr>
        </thead>
        <tbody class="text-black dark:bg-gray-200">
          <?php foreach ($banks as $bank): ?>
            <tr>
              <td><?= $bank['id']; ?></td>
              <td><?= $bank['nom']; ?></td>
              <td><?= $bank['logo']; ?></td>
              <td>
                <a href="deleteBank.php?id=<?=$bank['id'];?>"><svg class="w-[28px] h-[28px] text-gray-600 hover:text-red-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
    <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
  </svg></a>
                <a href="editBank.php?id=<?=$bank['id'];?>" class="bg-gray-400">UPDATE</a>

              </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>