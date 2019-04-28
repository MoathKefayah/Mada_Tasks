<?php

require("configure/util.php");

$sql = new MySQL_class("cv_form");

############################################################


$landline  = $_POST["landline"];
// $landline = $_GET['landline'];


#upload resume_file

//$fileExistsFlag = 0;
$file="resumes/".$landline."-".$_FILES["file"]["name"];
 /*
 *  Checking whether the file already exists in the destination folder
 */

// if($sql->Select("resume_path","applicant_info", "resume_path='$file'") != 0){
//   $fileExistsFlag = 1;
//   echo "This resume is exist  !! " ;
//   //header("Location: index.php");
// }
/*
 * If file is not present in the destination folder
 */

//if($fileExistsFlag == 0) {
  move_uploaded_file($_FILES["file"]["tmp_name"],"resumes/".$landline."-".$_FILES["file"]["name"]);
   session_start();
   $_SESSION['filepath'] = $file ;
   $_SESSION['landline'] = $landline ;

   //echo $_SESSION['filepath'];
   //echo $_SESSION['landline'];
   header("Location: index.php");
//}

############################################################
?>
