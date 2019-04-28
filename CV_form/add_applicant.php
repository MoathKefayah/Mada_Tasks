<?php

require("configure/util.php");

$sql = new MySQL_class("cv_form");
session_start();


$flag1 = "f1";
$flag2 = "t2";
$flag3 = "f3";


	  $milliseconds = round(microtime(true) * 1000);

      $current_date = $_SESSION['currentdate'];
      $applicant_name   = $_POST['applicant_name'];
      $university_name   = $_POST['university_name'];
      $specialization  = $_POST['spec'];
      $grad_school    = $_POST['gradschool'];
      $gpa   = $_POST['gpa'];
      $landline  = $_POST['landline'];
      $position    = $_POST['positionselect'];

      $have_experience = $_POST['experiencelevel'];

      $applicantname = preg_replace('/\s+/', '_', $applicant_name);

      $resume_path = "resumes/".$applicantname."-".$milliseconds."-".$_FILES["file"]["name"];

      $resume_path =  preg_replace('/\s+/', '_', $resume_path);


       move_uploaded_file($_FILES["file"]["tmp_name"],$resume_path);

       $experience_companies = array();
       $experience_postitles = array();
       $experience_years = array();


      

       if ($have_experience == "yes"){

            foreach ($_POST as $key => $val){  

                if(startsWith($key,'company_')){
                array_push($experience_companies, $val);
                   
                } 
                if(startsWith($key,'postitle_')){
                    array_push($experience_postitles, $val);
                   
                }       
                if(startsWith($key,'years_')){
                    array_push($experience_years, $val);
                   
                }
                  }                

       }

      
      $companies   = $experience_companies;
      $postitles  = $experience_postitles;
      $years    = $experience_years;



      if(!empty($current_date) &&
         !empty($applicant_name) &&
         !empty($university_name) &&
         !empty($specialization) &&
         !empty($grad_school) &&
         !empty($gpa) &&
         !empty($landline) &&
         !empty($position) &&
         !empty($have_experience) &&
         !empty($resume_path)
         
        ){

        $query = "INSERT INTO `applicant_info`(`applicant_name`,`university_name`,`grad_school`,`gpa`,`landline`,`current_date`,`position`,`have_experience`,`specialization`,`resume_path`) VALUES ('$applicant_name','$university_name','$grad_school','$gpa','$landline','$current_date','$position','$have_experience','$specialization','$resume_path')";

        $sql->Insert($query);


         if ($sql->result == 1){
           $flag1 = "t1";
               

            if($have_experience == "yes" && !empty($companies) && !empty($postitles) && !empty($years)){
             
              $query2 = "INSERT INTO `applicant_experience`(`applicant_name`,`company`,`position_title`,`years`) VALUES ";

              $N = count($companies);
              for($i=0 ; $i < $N-1 ; $i++){

                $vaules .= "('$applicant_name','$companies[$i]','$postitles[$i]','$years[$i]'),";

              }

               $vaules.= "('$applicant_name','".$companies[$N-1]."','".$postitles[$N-1]."','".$years[$N-1]."') ";
               
               $query2 .= $vaules ;
               
               $sql->Insert($query2);

                   if ($sql->result == 1){
                     $flag3 = "t3";
                          
                   }
                 

             }

            



         }

      

 }
 else{
  $flag2 = "f2" ;
 
 }


 if($flag1 == "t1"){
  echo "New applicant added successfuly" ;
 }

 else if($flag2 == "f2"){
  echo "Please fill all fields !!" ;
 }
 else if($flag3 == "f3"){
  echo "adding experience error !!";
 }

 else {
  echo "Error !!" ;
 }


 function insert($arr,$data){
 	array_push($arr,$data);
 }

 function startsWith ($string, $startString)
           {
            $len = strlen($startString);
            return (substr($string, 0, $len) === $startString);
           }
 

?>
