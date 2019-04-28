<!-- STYLE -->
<link href="css/uikit-rtl.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


<?php

require("config/util.php");

$sql = new MySQL_class("mada_db");


if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $secretKey = "6LcB850UAAAAAPqZhWsfmViINiU-E2z4sHTKrvNc";
        $ip = $_SERVER['REMOTE_ADDR'];
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        if($responseKeys["success"]) {
                
            $flag1 = "f1";
            $flag2 = "t2";
            

            $username = $_POST['full_name'];
            $mobile   = $_POST['mobile'];
            $initialcode = $_POST['intialcode'];
            $landline   = $_POST['phone'];
            $add_time = date("h:i:s A");
            $add_day = date("d-m-Y");   

            if(!empty($username) &&
               !empty($mobile) &&
               !empty($initialcode) &&
               !empty($landline) &&
               !empty($add_time) &&
               !empty($add_day)   
              ){

              $query = "INSERT INTO `userstb`(`username`,`mobile`,`initialcode`,`landline`,`Add_day`,`Add_time`) VALUES ('$username','$mobile','$initialcode','$landline','$add_day','$add_time')";

              $sql->Insert($query);


               if ($sql->result == 1){
                 $flag1 = "t1";          
               }
       }
       else{
        $flag2 = "f2" ;
       
       }

       if ($flag1 == "t1" && $flag2 == "t2"){

        echo '
           <div class="uk-margin-top uk-text-left" id="success">

              <div  class="uk-grid uk-text-center">

                <div class="uk-width-1-1">

                  <img src="images/everybody.logo.png" style="width:430px;">
                  <div>

                    <br>
                    <h1 style="color: #0eb48d;"><b>تهانينا</b></h1>
                    <h2>ﺗﻤﺖ إﺿﺎﻓﺔ اﻟﻤﻌﻠﻮﻣﺎت ﺑﻨﺠﺎح </h2>
                    <h2>سيدخل اسمك في السحوبات </h2>
                    
                    <br><br><br><br>

                  </div>
                </div>
              </div>
            </div>' ;

       }
       else{
              echo '<h2>You have an error </h2>';
       }
           
      

        } else {
                echo '<h2>You are spammer !! Getout</h2>';
        }






?>



