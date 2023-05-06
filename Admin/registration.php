<?php
require "../Server/config.php";
$status = false;
$registerStatus = false;
if (isset($_POST['submit'])) {
  $fname = $_POST['fName'];
  $lName = $_POST['lName'];
  $medicalName = $_POST['medicalName'];
  $mobNo = $_POST['mobNo'];
  $password = $_POST['password'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zipCode = $_POST['zipCode'];

  $query = "select * from users where mobNo='$mobNo' ";
  $result = mysqli_query($conn, $query);
  $num = mysqli_num_rows($result);
  if ($num > 0) {
    // echo "Mobile Number Already Registered! ";
    $registerStatus = true;
  } else {



    $query = "INSERT INTO `users`( `fname`, `lName`, `medicalName`, `mobNo`, `password`, `city`, `state`, `zipCode`) VALUES ('$fname','$lName','$medicalName','$mobNo','$password','$city','$state','$zipCode')";

    $result = mysqli_query($conn, $query);

    if ($result) {
      $status = true;

      // Create Database Code Here
      $table_name = $mobNo;
      $query = "SHOW TABLES LIKE '".$table_name ."'";
      $result = mysqli_query($conn, $query);
      if($result->num_rows == 1){
          echo "Table  Exists";
      }
      else{
          echo "Table not exists";
          $tbName =  $mobNo;
  
          $table1 = "CREATE TABLE `$table_name` (sno INT(250) UNSIGNED AUTO_INCREMENT PRIMARY KEY , medName VARCHAR(200), images VARCHAR(250), descriptions VARCHAR(250), category VARCHAR(250), price VARCHAR(250))";
          $result1 = mysqli_query($conn,$table1);
          echo "Table Created Successfully...";
      }
      //DB code ends here

    } else {
      echo "Registreation Can't Successful";
    }
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
  <link rel="stylesheet" href="login.css" .css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../MobDevice.css">

  <link rel="shortcut icon" href="../Assect/icon.jpg" type="image/x-icon">
  <title>MedChecker</title>
</head>

<body>
<div class="header">
        <ul>
            <li style="color: crimson;">
               <a href="../"> Home </a>
            </li>
           
        </ul>
    </div>

  <div class="title  d-flex justify-content-center align-middle mt-3">
    <h2>Medical Registration Form</h2>
  </div>


  <?php

  if ($status == true) {
      echo '<div class=" alert alert-success alert-dismissible fade show" role="alert">
      Congratulations ' ?><?php echo $_POST['fName']  ?><?php echo '! Registration is Successful.. <a href="./login.php" >Click here to Login</a>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
  if ($registerStatus == true) {
      echo '<div class=" alert alert-danger text-center alert-dismissible fade show" role="alert">
      Mobile number already register! 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
  ?>


  <div class="container mx-auto  col-10 col-md-8 col-lg-6 mb-3 ">

    <form class="row g-3 d-flex " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
      <div class="col-md-4">
        <label for="validationDefault01" class="form-label">First name</label>
        <input type="text" class="form-control" id="validationDefault01"  name="fName" required>
      </div>
      <div class="col-md-4">
        <label for="validationDefault02" class="form-label">Last name</label>
        <input type="text" class="form-control" id="validationDefault02"  name="lName" required>
      </div>
      <div class="col-md-4">
        <label for="validationDefault03" class="form-label">Medical name</label>
        <input autocomplete="off" type="text" class="form-control" id="validationDefault03" value="" name="medicalName" required>
      </div>
      <div class="col-md-4">
        <label for="validationDefaultUsername" class="form-label">Mobile Number</label>
        <div class="input-group">
          <span class="input-group-text" id="inputGroupPrepend2">+91</span>
          <input type="text" class="form-control" id="validationDefaultUsername" name="mobNo" aria-describedby="inputGroupPrepend2"  required>
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationDefaultUsername" class="form-label">Password</label>
        <div class="input-group">
          <input type="text" class="form-control" id="validationDefaultUsername" name="password" aria-describedby="inputGroupPrepend2"  required>
        </div>
      </div>
      <div class="col-md-6">
        <label for="validationDefault03" class="form-label">City</label>
        <input type="text" class="form-control" id="validationDefault03" name="city" required>
      </div>
      <div class="col-md-3">
        <label for="validationDefault04" class="form-label">State</label>
        <select class="form-select" id="validationDefault04" name="state" required>
          <option selected disabled value="">Choose...</option>
          <option>Maharashtra</option>
          <option>Gujrat</option>
          <option>Punjab</option>
          <option>Delhi</option>
        </select>
      </div>
      <div class="col-md-3">
        <label for="validationDefault05" class="form-label">Zip</label>
        <input type="text" class="form-control" id="validationDefault05" name="zipCode" required>
      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
          <label class="form-check-label" for="invalidCheck2">
            Agree to terms and conditions
          </label>
        </div>
      </div>
      <div class="col-12">
        <input class="btn btn-primary" type="submit" name="submit"></input>
      </div>
    </form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>