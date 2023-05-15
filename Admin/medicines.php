<?php
require "../Server/config.php";
session_start();
if ($_SESSION["mobNo"] == "") {
    header("Location: login.php");
}


// echo "Welcome " ,$_SESSION["mobNo"];
$mobNo = $_SESSION["mobNo"];
$query = "select * from `".$mobNo."`";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../MobDevice.css">

    <link rel="shortcut icon" href="/Assect/icon.jpg" type="image/x-icon">
    <title>MedChecker</title>
</head>

<body>

    <div class="header">
        <ul>
            <li >
            <a href="welcome.php">   Home </a>
            </li>
            <li >
            <a href="#"  style="color: crimson;">    Medicines </a>
            </li>
            <li>
                <a href="logout.php"> Logout </a>
            </li>
        </ul>
    </div>



    <div class="container">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sr No</th>
      <th scope="col" >Image</th>
      <th scope="col">Medicine Name</th>
      <th scope="col">Price</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <tr>

    <?php
    if ($row > 0) {
        $i=1;
    while ($row = mysqli_fetch_assoc($result)) {
        
   ?> 
   <th scope="row"> <?php echo    $i ?> </th>
   <td > <img class="image" src="<?php  echo "../Admin/Photos/". $row['images']; ?>" width="80px" style="border-radius: 12px; border: 1px solid black;"/>  </td>
   <td > <?php echo    $medName = $row['medName']; ?> </td>
   <td> <?php echo  $price = $row['price']."</br>"; ?> </td> 
   <td> <a href="deleteMed.php?sno=<?php echo $row['sno'] ?>"> <button type="button" class="btn btn-danger">  Delete  </button> </a> </td> 

    </tr>
   
   <?php
   $i++;
    }
}
?>
    
      
       
    
   
  </tbody>
</table>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous" />
</body>

</html>