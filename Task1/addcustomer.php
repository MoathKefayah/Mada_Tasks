
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

  if(isset($_POST['addcustomer'])){

      $username = $_POST['csusername'];
      $bundle   = $_POST['csbundle'];
      $period   = $_POST['csperiod'];
      $adddate  = $_POST['csadddate'];
      $speed    = $_POST['csspeed'];
      
      $successaddcustomer = true;

      if($username != "" && $bundle != "" && $period != "" && $adddate != "" && $speed != ""){
      
        $sql = "INSERT INTO customer(username,bundle,period,adddate,speed) VALUES ('$username','$bundle','$period','$adddate','$speed')";
        if($con->query($sql) !== TRUE){
           $successaddcustomer = false ;
        }
       
       } 
       else{
        $successaddcustomer=false;
       }

       echo $successaddcustomer;

    }

?>
