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
   
  //check login
  if(isset($_POST['login'])){
   
	  $username = $_POST['username'];
	  $password = sha1($_POST['password']);
	  $sql = "SELECT * FROM  loginaccess WHERE username = '$username' AND password = '$password' ";
	  $result = $con->query($sql);

	  $exists = $result->num_rows;

	  $userexist = "true" ;
	  
	 
	  if ($exists <= 0) {

	  	$userexist = "false" ; 
	  }

          $_SESSION['usere'] = $userexist ; 
        echo $_SESSION['usere'];
 }

?>
