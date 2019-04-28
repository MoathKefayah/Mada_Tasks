<?php

$servername = "localhost";
$username = "moath";
$password = "moath1130492,";
$dbname = "taskdb";

$speedoptions = "" ;

  //create connection
  $con = new mysqli($servername,$username,$password,$dbname);
  

  //check connection
  if($con->connect_error){
   	die("Connection Faild: " . $con->connect_error);
   }
   
  //check login
  if(isset($_POST['speedhandle'])){
   
	  $csbundle = $_POST['csbundle'];
	  $csperiod = $_POST['csperiod'];

	  $sql = "SELECT distinct speed FROM bundle WHERE name='$csbundle' AND period='$csperiod' ";
	  $result = $con->query($sql);

	  $exists = $result->num_rows;

	  $userexist = true;
	  
	 
	  if( $exists > 0 ){
	  	while($row = mysqli_fetch_assoc($result)){
	  		echo $speedoptions = "<option id ='".$row['speed']."'>".$row['speed']."</option>";
	  		  	}
	  }
	  else{
	  	echo $speedoptions .= "<option>"."No speeds"."</option>";
	  }
	  
	  

 }

?>
