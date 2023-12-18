<?php
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/userClass.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");

if (isset($_GET['id'])) {
    $UserIdToEdit = $_GET['id'];

    // Fetch the account data from the database
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $cnx->prepare($sql);
    $stmt->bind_param("s", $UserIdToEdit); 
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the account exists
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
    } else {
        echo "Account not found!";
        exit();
    }
    // Handle form submission to update the account
    if (isset($_POST['updateUser'])) {
        $updatedUser = new User();
        $updatedUser->setId($UserIdToEdit);

        // Check if $accountData is set before accessing its elements
        $updatedUser->setNom(isset($_POST['nom']) ? $_POST['nom'] : '');
        $updatedUser->setPrenom(isset($_POST['prenom']) ? $_POST['prenom'] : '');
        $updatedUser->setNaissance(isset($_POST['naissance']) ? $_POST['naissance'] : ''); 
        $updatedUser->setNationalite(isset($_POST['nationalite']) ? $_POST['nationalite'] : '');
        $updatedUser->setGenre(isset($_POST['genre']) ? $_POST['genre'] : '');
        $updatedUser->setRole(isset($_POST['role']) ? $_POST['role'] : '');
        $updatedUser->setUsername(isset($_POST['username']) ? $_POST['username'] : '');
        $updatedUser->setPassword(isset($_POST['pass']) ? $_POST['pass'] : '');
        $updatedUser->setAgencyId(isset($_POST['agency_id']) ? $_POST['agency_id'] : '');  

        $updatedUser->updateUser();

        // Redirect back to dashboard.php after update
        header("Location: user.php");
        exit();
    }
} else {
    echo "Invalid request!";
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
<!-- <div class="flex flex-row gap-10 mx-auto fixed top-44 left-[600px]  z-10  justify-between p-10 items-center bg-black border border-gray-500 rounded-md max-w-screen-lg   transition duration-700 ease-in-out" id="formclient">
        <form method="POST" action="editUser.php?id=<?= $UserIdToEdit; ?>" class="max-w-md mx-auto">
          <div class="flex justify-end">
          <a href="client.php"><img class="h-[20px]" src="icons8-close-50.png" alt="" ></a>
          </div>
          
          <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nom" id="nom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= $userData['nom']; ?>" placeholder=" " required />
            <label for="nom" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NOM</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="prenom" id="prenome" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= $userData['prenom']; ?>" placeholder=" " required />
            <label for="prenome" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PRENOME</label>
          </div>
          <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
              <input type="date" name="naissance" id="naissance" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= $userData['naissance']; ?>" placeholder=" " required />
              <label for="naissance" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE NAISSANCE</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="nationalite" id="nationalite" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= $userData['nationalite']; ?>" placeholder=" " required />
              <label for="nationalite" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NATIONALITE</label>
            </div>
          </div>
          <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="genre" id="genre" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= $userData['genre']; ?>" placeholder=" " required />
              <label for="genre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">GENRE</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="username" id="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= $userData['username']; ?>" placeholder=" " required />
              <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">USERNAME</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="pass" id="pass" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= $userData['pass']; ?>" placeholder=" " required />
              <label for="pass" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PASSWORD</label>
            </div>
            
            <div class="relative z-0 w-full mb-5 group">
              <label for="role" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CHOOSE A ROLE</label>
              <select class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="<?= $userData['role']; ?>" name="role" id="role">
                <option class="text-gray-800" value="admin">admin</option>
                <option class="text-gray-800" value="clinet">client</option>
              </select>
            </div>
            <div class="relative z-0 w-full mb-5 group">
            <label for="role" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">SELECT AGENCY</label>
            <select id="agency_id" name="agency_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                  <option class="text-gray-800 " disabled selected value="" class="bg-dark-gray-800">Select Agency</option>
                  <?php
                  // $agencyQuery = "SELECT id, adress FROM agency";
                  // $agencyResult = $cnx->query($agencyQuery);

                  // if ($agencyResult->num_rows > 0) {
                  //     while ($agency = $agencyResult->fetch_assoc()) {
                  //       echo "<option value='{$agency['id']}'>{$agency['adress']}</option>";
                  //     }
                  // }
                  ?>
          </select>
          </div>

          </div>
          <div class="flex justify-center">
                <input type="submit" value="Update user" name="updateUser" class="block bg-blue-500 text-white p-3 rounded">
            </div>
        </form>
      </div> -->




      <div class="flex flex-col justify-center items-center h-screen">
        <form method="POST" action="editUser.php?id=<?= $UserIdToEdit; ?>" class="w-[500px] h-[520px] mx-auto bg-cyan-800">
        <h1 class="text-3xl text-white font-bold flex flex-col justify-center mt-5 items-center">Update User</h1>
            <div class="relative z-0 w-full px-10 mt-5 mb-5 group">
                <input type="text" name="nom" id="nom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" value="<?= $userData['nom']; ?>" placeholder=" " required />
                <label for="nom" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">LAST NAME</label>
            </div>
            <div class="relative z-0 w-full px-10 mb-5 group">
                <input type="text" name="prenom" id="prenom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" value="<?= $userData['prenom']; ?>" placeholder=" " required />
                <label for="prenom" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">FIRST NAME</label>
            </div>
            
            <div class="grid md:grid-cols-2">
            <div class="relative z-0 w-full px-10 mb-5 group">
                <input type="date" name="naissance" id="naissance" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer"  value="<?= $userData['naissance']; ?>" placeholder=" " required />
                <label for="naissance" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">BIRTHDAY</label>
            </div>
            <div class="relative z-0 w-full px-10 mb-5 group">
                <input type="text" name="nationalite" id="nationalite" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer"  value="<?= $userData['nationalite']; ?>" placeholder=" " required />
                <label for="nationalite" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NATIONALITY</label>
            </div>
            </div>
            <div class="grid md:grid-cols-2 ">
            <div class="relative z-0 w-full px-10 mb-5 group">
                <label for="genre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">GENDER</label>
                <select class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" value="<?= $userData['genre']; ?>" name="genre" id="genre">
                    <option class="text-gray-800" value="Homme">Homme</option>
                    <option class="text-gray-800" value="Femme">Femme</option>
                    <option class="text-gray-800" value="Other">Other</option>
                </select>
            </div>
            <div class="relative z-0 w-full px-10 mb-5 group">
                <input type="text" name="username" id="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" value="<?= $userData['username']; ?>" placeholder=" " required />
                <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">USERNAME</label>
            </div>
        </div>
        <div class="grid md:grid-cols-2">
        <div class="relative z-0 w-full px-10 mb-5 group">
                <input type="pass" name="pass" id="pass" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" value="<?= $userData['pass']; ?>" placeholder=" " required />
                <label for="pass" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PASSWORD</label>
            </div>
            <div class="relative z-0 w-full px-10 mb-5 group">
                <label for="role" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]  rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-orange-600 peer-focus:dark:orange-orange-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CHOOSE A ROLE</label>
                <select class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-400 dark:focus:border-orange-600 focus:outline-none focus:ring-0 focus:border-orange-600 peer" value="<?= $userData['role']; ?>" name="role" id="role">
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
                <button type="submit" name="updateUser" class="text-white mt-4 bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  w-24 px-5 py-2.5 text-center dark:bg-orange-600  dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
</div>
</body>
</html>