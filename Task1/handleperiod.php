<?php

$servername = "localhost";
$username = "moath";
$password = "moath1130492,";
$dbname = "taskdb";

$periodoptions = "" ;

  //create connection
  $con = new mysqli($servername,$username,$password,$dbname);
  

  //check connection
  if($con->connect_error){
   	die("Connection Faild: " . $con->connect_error);
   }
   
  //check login
  if(isset($_POST['handleperiod'])){
   
	  $csbundle = $_POST['csbundle'];
	  
	  $sql = "SELECT distinct period FROM bundle WHERE name='$csbundle'";
	  $result = $con->query($sql);

	  $exists = $result->num_rows;

	 
	  if( $exists > 0 ){
	  	while($row = mysqli_fetch_assoc($result)){
	  		echo $periodoptions = "<option id ='".$row['period']."'>".$row['period']."</option>";
	  		  	}
	  }
	  else{
	  	echo $periodoptions .= "<option>"."No periods"."</option>";
	  }
	  
	  

 }

?>
