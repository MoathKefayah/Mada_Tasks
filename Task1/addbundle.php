
<?php

$servername= "localhost";
$username = "moath";
$password = "moath1130492,";
$dbname = "taskdb";

  //create connection
  $con = new mysqli($servername,$username,$password,$dbname);
  
  //check connection
  if($con->connect_error){
    die("Connection Faild: " . $con->connect_error);
   }

  if(isset($_POST['addbundle'])){
   
      $name = $_POST['name'];
      $speed = $_POST['speed'];
      $period = $_POST['period'];
      $price = $_POST['price'];

      $successaddbundle = true;

      if($name != "" && $speed != "" && $period != "" && $price != ""){
             
          $sql = "INSERT INTO bundle(name,speed,period,price) VALUES ('$name','$speed','$period','$price')";
          if($con->query($sql) !== TRUE){
             $successaddbundle = false ;
          }
       } 
       else{
        $successaddbundle=false;
       }


       echo $successaddbundle;


    }

?>
