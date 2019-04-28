<?php
session_start();

$servername = "localhost";
$username = "moath";
$password = "moath1130492,";
$dbname = "taskdb";

  //create connection
  $con = new mysqli($servername,$username,$password,$dbname);
  

  //check connection
  if($con->connect_error){
    die("Connection Faild: " . $con->connect_error);
   }
   
  if(isset($_POST['searchcustomer'])){
   
    $username = $_POST['customerusername'];
    
    $sql = "SELECT * FROM  customer WHERE username = '$username' ";
    $result = $con->query($sql);

    $exists = $result->num_rows;

   $userexist = false;
    
   
  if ($exists > 0) {
      
      $userexist = true ;
      
      while ($row = mysqli_fetch_assoc($result)) {
         
        $_SESSION['currentusername']= $username;
        $_SESSION['currentbundle'] = $row['bundle'];
        $_SESSION['currentperiod'] = $row['period'];
        $_SESSION['currentadddate'] = $row['adddate'];
        $_SESSION['currentspeed'] = $row['speed'];
      }
      
    } 
   
    
    echo $userexist;    

 }

?>
