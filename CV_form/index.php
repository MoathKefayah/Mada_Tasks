<?php

  
  
  // Function to get the client IP address
  function get_client_ip() {
      $ipaddress = '';
      if (getenv('HTTP_CLIENT_IP'))
          $ipaddress = getenv('HTTP_CLIENT_IP');
      else if(getenv('HTTP_X_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
      else if(getenv('HTTP_X_FORWARDED'))
          $ipaddress = getenv('HTTP_X_FORWARDED');
      else if(getenv('HTTP_FORWARDED_FOR'))
          $ipaddress = getenv('HTTP_FORWARDED_FOR');
      else if(getenv('HTTP_FORWARDED'))
         $ipaddress = getenv('HTTP_FORWARDED');
      else if(getenv('REMOTE_ADDR'))
          $ipaddress = getenv('REMOTE_ADDR');
      else
          $ipaddress = 'UNKNOWN';
      return $ipaddress;
  }



 $positions_file = file_get_contents('positions.txt');
 
 $positions = preg_split("/[\s]+/", $positions_file);
 $positions_options = "";
  foreach($positions as $pos) {
      $positions_options .= "<option id ='".$pos."'>".$pos."</option>";
  }



?>


<!DOCTYPE html>
<html>
<head>
<title>CV Form</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https:\\stackpath.bootstrapcdn.com\bootstrap\4.2.1\css\bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link rel="stylesheet" href="https:\\use.fontawesome.com\releases\v5.1.0\css\all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<link rel="stylesheet" href="css\index.css">


</head>

<body>

<div class="container mainpage" >

  <div class="row" style="margin-left:-85px; margin-right: -40px; ">
        <div style="float: left;" class="col-lg-5">
          <!-- <button type="submit" class="btn btn-sm btn-primary" name="reference" id="reference">Reference</button>   -->
      <span class="font1">Current date: </span>
      <?php

          $currentdate = date("d/m/Y");
          session_start();
          $_SESSION['currentdate'] = $currentdate ;
          echo '<span id="currentdate">' . $currentdate . '</span>';
      ?>
      <span class="font1"> , </span>
      <span class="font1">IP: </span>
      <?php
          echo '<span id="ip" style="padding: 0px 5px 0px ;" >' . get_client_ip() . '</span>';
      ?>
        </div>

        <div style="text-align: center;" class="col-lg-3"></div>

  </div>

  <div class="row">

    <div class="col-lg-4"></div>
    <div align="center" class="col-lg-4">
      <strong class="title">CV Form</strong>
    </div>
    <div class="col-lg-4"></div>


  </div>


  <form action="add_applicant.php" method="post" enctype="multipart/form-data" id="uploadform" >
        <div class="row form_container row-centered">

            <div align="left" class="col-lg-6">

                            <div align="center" class="col-lg-6">
                              <div class="form-label-group">
                                <input type="text" id="applicant_name" name="applicant_name" class="form-control"  pattern="[أ-ي A-Za-z\s]{1,50}"  placeholder="Name" required>
                                <label for="applicant_name">Your name</label>
                              </div>
                              <div class="form-label-group">
                                <input type="text" id="university_name" name="university_name" class="form-control" pattern="[أ-ي A-Za-z\s]{1,50}" placeholder="University" required>
                                <label for="university_name">University name</label>
                              </div>
                              <div class="form-label-group">
                                <input type="text" id="spec" name="spec" class="form-control" placeholder="Specialization" pattern="[أ-ي A-Za-z\s]{1,50}"  required>
                                <label for="spec">Specialization</label>
                              </div>
                              <div class="form-label-group">
                                <input type="text" id="gradschool" name="gradschool" pattern="[أ-ي A-Za-z\s]{1,50}" class="form-control" placeholder="Graduated School" required>
                                <label for="gradschool">Graduated School</label>
                              </div>
                              <div class="form-label-group">
                                <input type="text" id="gpa"  name="gpa" class="form-control" placeholder="GPA" pattern="[0-9\.]{3,6}" required>
                                <label for="gpa">GPA</label>
                              </div>
                              <div class="form-label-group">
                                <input type="text" id="landline" name="landline" class="form-control" placeholder="Landline" pattern="[0-9]{9}" title="Nine numbers landline includes initial code" required>
                                <label for="landline">Landline</label>
                              </div>
                              
                            </div>

          </div>

          <div align="center" class="col-lg-6">

              <div class="form-label-group">
                <select  id="positionselect" name="positionselect" class="form-control" >
                  <option>-- Select Position --</option>
                   <?php
                      echo $positions_options;
                   ?>
                </select>

              </div>

              <div align="center">
                  <h1 class="font2"> Old Experience</h1>
              </div>

              <div class="options">
                    <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="experiencelevel" id="inlineRadio1" value="no">
                              <label class="form-check-label" for="inlineRadio1">I'm fresh Graduated</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="experiencelevel" id="inlineRadio2" value="yes" >
                              <label class="form-check-label" for="inlineRadio2">I've experience</label>
                            </div>
              </div>

              <div class="addexperiencefield">

              </div>

              <div class="form">


              </div>
         
              <div style="margin-top: 50px;">  
                    <input type="file" name="file" accept="application/pdf">
              </div>
               




       </div>



    </div>

    <div class="center">

                    <button type="submit" class="btn btn-md btn-primary text-uppercase"  id="save">submit</button>

    </div>

  </form>

  


</div>

</body>
</html>
<script src="https:\\code.jquery.com\jquery-3.3.1.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
        
        var $count = 0 ;
        var $experience ;

        $("input[name=experiencelevel]").click(function(){

                $experience = "false";

                var option = $('input[name=experiencelevel]:checked').val();

                var exp_adder ='<i class="fas fa-plus expicon" style="font-size:30px;color:rgb(0,123,255);margin-bottom: 10px;"></i>';

                if(option == "yes"){

                         $experience = "true" ;
                        $(".addexperiencefield").empty();
                        $(".addexperiencefield").append(exp_adder);

                        $(".expicon").click(function(ev){
                        $count = $count + 1;
                        var exp_form =
                                        '<div class="form-label-group">'+
                                          '<input type="text" id="company_'+$count+'" name="company_'+$count+'" pattern="[أ-ي A-Za-z0-9][أ-ي A-Za-z0-9 ]{1,50}" class="form-control" placeholder="Company" required>' +
                                          '<label for="company_'+$count+'">Company</label></div>' +

                                        '<div class="form-label-group">' +
                                          '<input type="text" id="postitle_'+$count+'" name="postitle_'+$count+'"  pattern="[أ-ي A-Za-z0-9][A-Za-z0-9 ]{1,50}" class="form-control" placeholder="Position Title" required>' +
                                          '<label for="postitle_'+$count+'">Position title</label> </div>' +

                                        '<div class="form-label-group">' +
                                          '<input type="text" id="years_'+$count+'" name="years_'+$count+'" pattern="[0-9]{1,2}" class="form-control" placeholder="Years" required>' +
                                          '<label for="years_'+$count+'">Years</label> </div>' ;


                        $(".form").append(exp_form);

                    });


                }
                else if(option == "no"){
                        $(".addexperiencefield").empty();
                        $(".form").empty();
                        $count = 0 ;


                }

        });

    
});

</script>
