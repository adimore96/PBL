<?php
require "./Server/config.php";

$query = "show tables";
$result = mysqli_query($conn, $query);
$table;  //getting all table name using array below
$i = 1;
while ($row = mysqli_fetch_array($result)) {
    //  echo 
    $row['Tables_in_medstore'] . " ||  ";
    $table[$i] = $row['Tables_in_medstore'];
    $i = $i + 1;
}
$i = 0;
for ($i = 1; $i < count($table); $i++) {
    $table[$i] = "`" . "$table[$i]" . "`";
}
$tables = join(",", $table); //JOin the table with ,
$abc = trim($tables, ",users");    //Removing users from table
$array_count = count($table);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="MobDevice.css">
    <link rel="shortcut icon" href="/Assect/icon.jpg" type="image/x-icon">
    <title>MedChecker</title>
</head>

<body>

    <div class="header" style="z-index: 100;">
        <ul>
            <li>
                <a href="/pbl"> Home </a>
            </li>
            <li>
                <a href="#" style="color: crimson !important;"> Search Medicine </a>
            </li>
            <li>
                <a href="develop_by.html"> Developed By </a>
            </li>
            <li>
                <a href="develop_by.html"> Report Bug </a>
            </li>
            <li class="admin">
                <a href="Admin/login.php"> Store_Login </a>
            </li>
        </ul>
    </div>

    <div class="container">
        <?php
        if (isset($_GET['submit'])) {
            $medName = $_GET['medName']; ?>
            <!-- Search Bar -->
            <div class="input-group mb-3 mt-3">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" class="d-flex">
                    <div class="search_med ">
                        <input autocomplete="off" type="text" name="medName" value="<?php echo $medName ?>" class="form-control" placeholder="Search Medicine" required />
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Search" />
                </form>
            </div>
            <!-- end of Search Bar -->

            <div class="col-md-12">
                <div class="card mt-4">

                    <?php
                    $filterValues = $_GET['medName'];
                    for ($i = 1; $i < $array_count; $i++) {
                        $raw[$i] = " select * from $table[$i] where CONCAT(medName,descriptions) like '%$filterValues%' ";
                    }
                    $query1 = join(" union all ", $raw);
                    $query = $query1;
                    $result = mysqli_query($conn, $query);
                    ?>

                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        foreach ($result as $items) {
                    ?>
                            <div class="container">
                                <a href="viewDetails.php?sno=<?php echo $items['sno'] ?>&id=<?php echo $items['id'] ?>" style="text-decoration: none; color: black;">
                                    <div class="medData d-flex align-items-center gap-5" style="background-color: antiquewhite; padding: 8px; border-radius: 12px; margin-top: 12px; margin-bottom: 12px;">
                                        <div class="image">
                                            <img src="<?php echo "Admin/Photos/" . $items['images']; ?>" alt="" srcset="" style="width: 150px; height: 150px;  border-radius: 12px;border: 1px solid black;" />
                                        </div>
                                        <div class="descriptions">
                                            <h6><?php echo $items['medName']; ?></h6>
                                            <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 50vw;">
                                                <?php echo $items['descriptions']; ?>
                                            </p>
                                            <h5><?php echo "Rs. " . $items['price']; ?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    } else {
                        echo "<h3>No Record Found</h3>";
                    }
                    ?>

                </div>
            </div>



        <?php
        } else {
        ?>
            <div class="input-group mb-3 mt-3">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" class="d-flex">
                    <div class="search_med ">
                        <input autocomplete="off" type="text" name="medName" class="form-control" placeholder="Search Medicine" required />
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Search" />
                </form>

            </div>
        <?php
            require "./Components/categories.php";
        }
        ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>