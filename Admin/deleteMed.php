<?php
require "../Server/config.php";
 session_start();
    if(isset($_GET['sno'])){
        // echo "Get Method";
        $sno = $_GET['sno'];
        $tableName = $_SESSION["mobNo"];

        echo $query = "delete  from `".$tableName."` where sno = $sno ";
        $result = mysqli_query($conn,$query);

        if($result){
            header("Location: medicines.php");
        }
        else{
            echo "Error occured Cannot delete";
        }

        
    }
?>