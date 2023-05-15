<?php
require "../Server/config.php";
session_start();
if(@$_SESSION["mobNo"]!=""){
  header("Location: welcome.php");
}

if(isset($_POST["mobNo"])){
  // echo "POST Request";
  $mobNo= $_POST["mobNo"];
  $password= $_POST["password"];
  $sql = "select * from users where mobNo='$mobNo' AND password='$password' ";
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);

  if($num==1){
      echo "Welcome $username";
      session_start();
      $_SESSION["loggedin"]=true;
      $_SESSION["mobNo"]=$mobNo;

      header("Location: welcome.php");
  }
  else{
      echo "Enter Valid Credentials...!";
  }
  
}
else{
  // echo "Not a Post Request";
}


$query = "select * from users where mobNo = '' and password=''";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../MobDevice.css">
  <link rel="stylesheet" href="login.css" >

  <link rel="shortcut icon" href="../Assect/icon.jpg" type="image/x-icon">
  <title>MedChecker Login</title>
</head>

<body>

<div class="header">
        <ul>
            <li style="color: crimson;">
               <a href="../"> Home </a>
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

  <div class="  d-flex justify-content-center align-middle mt-3">
    <h2>Medical Login Form</h2>
  </div>



  <div class="course mx-auto  col-10 col-md-8 col-lg-6  ">

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="row mb-4">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile No.</label>
    <div class="col-sm-10">
      <input type="text" class="form-control ms-lg-3" name="mobNo" id="inputEmail3" require>
    </div>
  </div>
  <div class="row mb-4">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control ms-lg-3" id="inputPassword3" require>
    </div>
  </div>
  
  <button type="submit" class="btn btn-primary">Sign in</button>
  <a href="registration.php"><button type="button" class="btn btn-primary">Sign up</button></a>
</form>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
</body>

</html>