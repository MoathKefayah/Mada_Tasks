<?php

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

  if(isset($_POST['addbill'])){
   
      $startdate = $_POST['startdate'];
      $enddate = $_POST['enddate'];
      $username = $_POST['username'];
      $issuedate = $_POST['issuedate'];
      $totalbill = $_POST['totalbill'];
      $payment = $_POST['payment'];

      $successaddbill = true;

      if($startdate != "" && $enddate != "" && $username != "" && $issuedate != "" && $totalbill != "" && $payment != ""){
             
          $sql = "INSERT INTO bill(startdate,enddate,username,issuedate,totalbill,payment) VALUES ('$startdate','$enddate','$username','$issuedate' , '$totalbill' , '$payment')";

          if($con->query($sql) !== TRUE){
             $successaddbill = false ;
          }
       } 
       else{
        $successaddbill=false;
       }


       echo $successaddbill;


    }

?>
