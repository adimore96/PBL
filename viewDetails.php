<?php
    require "./Server/config.php";
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="MobDevice.css">
    <link rel="shortcut icon" href="/Assect/icon.jpg" type="image/x-icon">
    <title>MedChecker View Details</title>
</head>

<body>

    <div class="header">
        <ul>
           
            <li >
            <a href="search_med.php" style="color: crimson !important;">   Go Back! </a>
            </li>
        </ul>
    </div>

    <div class="container">
    <?php
    require "./Server/config.php";
    if(isset($_GET['sno'])){
        // echo "Get Request </br>";
        $sno = $_GET['sno'];
        $tbName = $_GET['id'];

       $query = "select * from `".$tbName."` where sno =".$sno;
        $result = mysqli_query($conn,$query);
        $query1 = "select * from users where mobNo = ".$tbName;
        $result1 = mysqli_query($conn, $query1);

        ?>

        <div class="medDisplay  developer" >
      <h4 class="catHead" style="font-size: 25px; text-align: left; ">Details</h4>
      <div class="medicines1" style="align-items: center; justify-items: center; display: flex;
    flex-direction: column; ">
        <?php
        while($row = mysqli_fetch_array($result)){
            ?>
            <div class="boxx" >
      <img src=" <?php echo "Admin/Photos/".$row['images']; ?>" width="200px" height="150px"/></br>
      <?php
           echo "<h3>".$row['medName']."</h3></br>";
           echo "<h5>".$row['descriptions']."</h5></br>";
           echo "<h4> ".$row['category']."</h4>";
           echo "<h4>Mobile No ".$row['id']."</h4>";
           echo "<h3> Price: ".$row['price']."</h3>";
           while($row1 = mysqli_fetch_array($result1)){
           echo "<h3> Medical Name: ".$row1['medicalName']."</h3>";
           }
        }
    }
    ?>

    </div>
    

</body>

</html>