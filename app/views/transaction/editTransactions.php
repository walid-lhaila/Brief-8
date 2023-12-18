<?php
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/transactionsClass.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");

if (isset($_GET['id'])) {
    $transactionsIdToUpdate = $_GET['id'];

    $sql = "SELECT id, montant, type, account_id FROM transactions WHERE id = ?";
    $stmt = $cnx->prepare($sql);
    $stmt->bind_param("s", $transactionsIdToUpdate);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $transactionsData = $result->fetch_assoc();
    } else {
        echo "transaction not found";
        exit();
    }

    if (isset($_POST['updateTransactions'])) {
        $updateTransactions = new Transactions($cnx);
        $updateTransactions->setId($transactionsIdToUpdate);

        $updateTransactions->setMontant(isset($_POST['montant']) ? $_POST['montant'] : '');
        $updateTransactions->setType(isset($_POST['type']) ? $_POST['type'] : '');
        $updateTransactions->setAccountId(isset($_POST['account_id']) ? $_POST['account_id'] : '');

        if ($updateTransactions->updateTransactions()) {
            header("Location: transactions.php");
            exit();
        } else {
            echo "Failed to update transaction.";
        }
    }
} else {
    echo "Invalid request";
    exit();
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
<body>


    <div class="flex flex-col justify-center items-center h-screen">
        <form action="editTransactions.php?id=<?= $transactionsIdToUpdate; ?>" method="POST" class="w-[500px] h-[340px] mx-auto bg-cyan-800">
        <h1 class="text-3xl text-white font-bold flex flex-col justify-center mt-5 items-center">Add Account</h1>
            <div class="relative z-0 w-full px-10 mt-5 mb-5 group">
                <input value="<?= $transactionsData['montant']; ?>" type="text" name="montant" id="montant" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" placeholder=" " required />
                <label for="montant" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">MONTANT</label>
            </div>
            <div class="relative z-0 w-full px-10 mb-5 group">
            <label for="type" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TYPE</label>
                <select value="<?= $transactionsData['type']; ?>"  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" name="type" id="type">
                    <option class="text-gray-800" value="Credit">CREDIT</option>
                    <option class="text-gray-800" value="Debut">DEBUT</option>
                </select>
            </div>
            <div class="relative z-0 w-full px-10 mb-5 group">
            <select value="<?= $transactionsData['account_id']; ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" name="account_id" id="" >
                <option disabled selected value="">SELECT RIB OF ACCOUNT</option>
                <?php 
                $accountQuery = "SELECT id, rib FROM account";
                $accountResult = $cnx->query($accountQuery);
                if($accountResult->num_rows  > 0){
                  while($account = $accountResult->fetch_assoc()){
                    echo "<option value='{$account['id']}'>{$account['rib']}</option>";  
                  }
                }
                ?>
              </select>
            </div>
            <div class="flex flex-col justify-center items-center">
                <button type="submit" name="updateTransactions" class="text-white mt-4 bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  w-24 px-5 py-2.5 text-center dark:bg-orange-600  dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
</div>


</body>
</html>