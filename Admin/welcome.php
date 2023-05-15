<?php
require "../Server/config.php";
session_start();
if ($_SESSION["mobNo"] == "") {
    header("Location: login.php");
}


// echo "Welcome " ,$_SESSION["mobNo"];
$mobNo = $_SESSION["mobNo"];
$query = "select * from users where mobNo='$mobNo'";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);

if ($row > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['fname'];
        $medicalName = $row['medicalName'];
        $city = $row['city'];
        $memberSince = $row['memberSince'];
    }
}

//After Submit Form
if (isset($_POST['submit'])) {
    echo "POST Request";
    $medName = $_POST['medName'];
    $id = $_SESSION['mobNo'];
    $images = $_FILES['images']['name'];
    $descriptions = $_POST['descriptions'];
    $category = $_POST['category'];
    $price = $_POST['price'];

    $mobNo = $_SESSION["mobNo"];

    $query = "INSERT INTO `$mobNo` ( `medName`,`id`, `images`, `descriptions`, `category`, `price`) VALUES ('$medName','$id','$images','$descriptions','$category','$price')";
    $result = mysqli_query($conn,$query);

    if($result){
        echo "Data inserted Successfully";

        // Returns the Image name
        echo $_FILES['images']['name'];
        $target_dir = "Photos/";
        $target_file = $target_dir . basename($_FILES["images"]["name"]);
        //Image Moved Successfully
        move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
    }
    else{
        echo "Cant insert data in table";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../MobDevice.css">

    <link rel="shortcut icon" href="/Assect/icon.jpg" type="image/x-icon">
    <title>MedChecker</title>
</head>

<body>

    <div class="header">
        <ul>
            <li style="color: crimson;">
                Home
            </li>
            <li>
            <a href="medicines.php">   Medicines </a>
            </li>
            <li>
                <a href="logout.php"> Logout </a>
            </li>
        </ul>
    </div>

    <div class=" container  ">
        <div class="main">

            <?php echo "<h5>Welcome " . $name . "!</h5>" ?>
        </div>
        <div class="rest1">


            <div class="rest">

                <?php echo "<h6>Store Name : </h6> . " .  $medicalName ?></br>
            </div>
            <div class="rest">
                <?php echo "<h6>Place:</h6>.  " . $city ?></br>
            </div>
            <div class="rest">
                <?php echo "<h6>Member Since: </h6>.   " . $memberSince ?>
            </div>
        </div>
    </div>
    <h4 class="text-white text-center mt-2">Add new medicine</h4>
    <div class="container  col-10 col-md-8 col-lg-6 mb-3 p-5 ">

        <form class="row row1 g-3 d-flex " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="col-md-4 ms-2">
                <label for="validationDefault01" class="form-label me-5 ">Name </label>
                <input type="text" name="medName" id="validationDefault01" autocomplete="off" required />
            </div>

            <div class="col-md-4 ms-2">
                <label for="validationDefault02" class="form-label ms-2"> Image </label>
                <input type="file" name="images" id="validationDefault02" accept="image/*" required />
            </div>
            <div class="col-md-4 ms-2">
                <label for="validationDefault03" class="form-label ms-2"> Description </label>
                <input type="text" name="descriptions" id="validationDefault03" autocomplete="off" required />
            </div>
            <div class="col-md-4 ms-2">
                <label for="validationDefault04" class="form-label ms-2">Category</label>
                <!-- <input type="text" name="username" id="validationDefault04" autocomplete="off"/> -->
                <select class="form-select " id="validationDefault04" name="category" required>
                    <option selected disabled value="">Choose...</option>
                    <option>Capsules</option>
                    <option>Drops</option>
                    <option>Gel</option>
                    <option>Inhalers</option>
                    <option>Injections</option>
                </select>
            </div>
            <div class="col-md-4 ms-2">
                <label for="validationDefault05" class="form-label ms-2 me-5"> Price </label>
                <input type="text" name="price" id="validationDefault05" autocomplete="off" required />
            </div>
            <div class="col-md-12 ms-2 ">
                <input class="submit" type="submit" name="submit" />
            </div>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" />
</body>

</html>