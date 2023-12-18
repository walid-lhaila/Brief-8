<?php
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/distributeursClass.php");
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");

if (isset($_GET['id'])) {
    $distributeurIdToUpdate = $_GET['id'];

    $sql = "SELECT id, longitude, latitude, adress, agency_id FROM distributeur WHERE id = ?";
    $stmt = $cnx->prepare($sql);
    $stmt->bind_param("s", $distributeurIdToUpdate);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $distributeurData = $result->fetch_assoc();
    } else {
        echo "Distributeur not found";
        exit();
    }

    if (isset($_POST['updateDistributeur'])) {
        // Validate and sanitize user inputs
        $longitude = isset($_POST['longitude']) ? trim($_POST['longitude']) : '';
        $latitude = isset($_POST['latitude']) ? trim($_POST['latitude']) : '';
        $adress = isset($_POST['adress']) ? trim($_POST['adress']) : '';
        $agency_id = isset($_POST['agency_id']) ? trim($_POST['agency_id']) : '';

        // Validate inputs further if needed...

        // Update the Distributeur
        $updateDistributeur = new Distributeur();
        $updateDistributeur->setId($distributeurIdToUpdate);
        $updateDistributeur->setLongitude($longitude);
        $updateDistributeur->setLatitude($latitude);
        $updateDistributeur->setAdress($adress);
        $updateDistributeur->setAgencyId($agency_id);

        $updateDistributeur->updateDistributeur();

        header('Location: distributeurs.php');
        exit();
    } else {
        echo "Invalid coordinates";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Distributeur</title>
</head>

<body>
    <div class="flex flex-row gap-10 mx-auto fixed top-48 left-[600px] z-10 justify-between p-10 items-center bg-black border border-gray-500 rounded-md max-w-screen-lg transition duration-700 ease-in-out" id="formdistributeurs">
        <form method="POST" action="editDistributeur.php?id=<?= $distributeurIdToUpdate; ?>" class="max-w-md mx-auto">
            <div class="flex justify-end">
                <a href="distributeurs.php"><img class="h-[20px]" src="icons8-close-50.png" alt=""></a>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="longitude" id="longitude" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="longitude" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">LONGITUDE</label>
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="latitude" id="latitude" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="latitude" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">LATITUDE</label>
            </div>

            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="adress" id="adress" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="adress" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ADRESSE</label>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <select value="<?= $distributeurData['agency_id']; ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        name="agency_id" id="">
                        <option disabled selected value="">SELECT AGENCY</option>
                        <?php
                        $distributeurQuery = "SELECT id, adress FROM agency";
                        $distributeurResult = $cnx->query($distributeurQuery);
                        if ($distributeurResult->num_rows > 0) {
                            while ($distributeur = $distributeurResult->fetch_assoc()) {
                                echo "<option value='{$distributeur['id']}'>{$distributeur['adress']}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="flex justify-center">
               
            <button type="submit" name="updateDistributeur" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          </div>
        </form>
      </div>

</div>
</body>
</html>