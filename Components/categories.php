<?php
//  require "../Server/config.php";  //comment if use use comp in other comp

 $query="show tables";
 $result=mysqli_query($conn,$query);
 //Creating Table_name array
 $table;  //getting all table name using array below
 $i=1;
 // echo "$result";
 while($row=mysqli_fetch_array($result)){
    //  echo 
     $row['Tables_in_medstore']." ||  ";
     $table[$i]=$row['Tables_in_medstore'];
     $i=$i+1;
 }


 $i=0;
 for($i=1 ; $i<count($table); $i++){
     $table[$i] ="`"."$table[$i]"."`";
 }
//  echo "</br></br>";
  $tables = join(",",$table); //JOin the table with ,
     $abc = trim($tables,",users");    //Removing users from table
    $array_count= count($table);
    for($i=1;$i<$array_count;$i++){
         $raw[$i] = " select * from $table[$i] where category = 'Capsules' ";
    }

    // echo "</br>".$raw[1]."</br>";
      $query1 = join(" union all ",$raw); //

    $query = $query1;
    // echo $query = "select * from  ". $tables ." where category = 'Capsules'";

//  $query = "select * from `7028309740` where category = 'Capsules' union all select * from `9168930093`  where category = 'Capsules' union all select * from `9766879536` where category = 'Capsules'";
    $result = mysqli_query($conn,$query);
    // echo "</br>";



?>
    <h2 style="text-align: center; margin-top: 10px; background-color: whitesmoke; border-radius: 12px;">Categories</h2>
    <div class="medDisplay developer">
      <h4 style="font-size: 25px; text-align: left;">Capsules</h4>
      <div class="medicines" >
    <?php 
    while($row = mysqli_fetch_array($result)){
      ?>
      <a href="viewDetails.php?sno=<?php echo$row['sno']?>&id=<?php echo$row['id']?>" style="color: black; text-decoration: none;">
      <div class="boxx" >
      <img src=" <?php echo "Admin/Photos/".$row['images']; ?>" width="200px" height="150px"  style="border-radius: 12px; border: 1px solid black;"/></br>
      <?php
        // echo  $row['images'];
        echo "<h5>".$row['medName']."</h5>";
        echo "<h4> Price: ".$row['price']."</h4>";
        echo "<p>". $row['descriptions']."</p>";
       ?>
      </div>
      </a>
      
       </br>
       <?php
    }?>
    </div>
    </div>


    <?php
    for($i=1;$i<$array_count;$i++){
      $raw[$i] = " select * from $table[$i] where category = 'Gel' ";
 }
 $query2 = join(" union all ",$raw);
 $query = $query2;
 $result = mysqli_query($conn,$query);
    ?>

    <div class="medDisplay developer">
      <h4 style="font-size: 25px; text-align: left;">Gel</h4>
      <div class="medicines">
    <?php
    while($row = mysqli_fetch_array($result)){
      ?>
      <a href="viewDetails.php?sno=<?php echo$row['sno']?>&id=<?php echo$row['id']?>" style="text-decoration: none; color: black;">
      <div class="boxx">
      <img src=" <?php echo "Admin/Photos/".$row['images']; ?>" width="200px" height="150px"  style="border-radius: 12px; border: 1px solid black;"/></br>
      <?php
        // echo  $row['images'];
        echo "<h5>".$row['medName']."</h5>";
        echo "<h4> Price: ".$row['price']."</h4>";
        echo "<p>". $row['descriptions']."</p>";
       ?>
      </div>
      </a>
      
       </br>
       <?php
    }?>
    </div>
    </div>


    <?php
    for($i=1;$i<$array_count;$i++){
      $raw[$i] = " select * from $table[$i] where category = 'Drops' ";
 }
 $query2 = join(" union all ",$raw);
 $query = $query2;
 $result = mysqli_query($conn,$query);
    ?>
    <div class="medDisplay developer">
      <h4 style="font-size: 25px; text-align: left;">Drops</h4>
      <div class="medicines">
    <?php
    while($row = mysqli_fetch_array($result)){
      ?>
      <a href="viewDetails.php?sno=<?php echo$row['sno']?>&id=<?php echo$row['id']?>" style="text-decoration: none; color: black;">
      <div class="boxx">
      <img src=" <?php echo "Admin/Photos/".$row['images']; ?>" width="200px" height="150px"  style="border-radius: 12px; border: 1px solid black;"/></br>
      <?php
        // echo  $row['images'];
        echo "<h5>".$row['medName']."</h5>";
        echo "<h4> Price: ".$row['price']."</h4>";
        echo "<p>". $row['descriptions']."</p>";
       ?>
      </div>
      </a>
      
       </br>
       <?php
    }?>
    </div>
    </div>
    


    <?php
    for($i=1;$i<$array_count;$i++){
      $raw[$i] = " select * from $table[$i] where category = 'Injections' ";
 }
 $query2 = join(" union all ",$raw);
 $query = $query2;
 $result = mysqli_query($conn,$query);
    ?>
    <div class="medDisplay developer">
      <h4 style="font-size: 25px; text-align: left;">Injections</h4>
      <div class="medicines">
    <?php
    while($row = mysqli_fetch_array($result)){
      ?>
      <a href="viewDetails.php?sno=<?php echo$row['sno']?>&id=<?php echo$row['id']?>" style="text-decoration: none; color: black;">
      <div class="boxx">
      <img src=" <?php echo "Admin/Photos/".$row['images']; ?>" width="200px" height="150px"  style="border-radius: 12px; border: 1px solid black;"/></br>
      <?php
        // echo  $row['images'];
        echo "<h5>".$row['medName']."</h5>";
        echo "<h4> Price: ".$row['price']."</h4>";
        echo "<p>". $row['descriptions']."</p>";
       ?>
      </div>
      </a>
      
       </br>
       <?php
    }?>
    </div>
    </div>
