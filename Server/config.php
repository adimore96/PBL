<?php
    $server= "localhost";
    $user = "root";
    $pass = "";
    $dbname = "medStore";

    $conn = mysqli_connect($server,$user,$pass,$dbname);

    if($conn){
        // echo "Connection Successful";
    }
    else{
        echo mysqli_connect_error();
    }
?>