 
 <?php
       session_start(); 
        if(empty($_SESSION['usere']) ||  $_SESSION['usere'] == "false"  ){
      
           header('location:index.php');
        }


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


        $username = $_SESSION['currentusername'];
	    $bundle = $_SESSION['currentbundle'];
	    $period = $_SESSION['currentperiod'];
	    $adddate = $_SESSION['currentadddate'];
	    $speed = $_SESSION['currentspeed'];
        
       
         
	list($day, $month ,$year) = explode("-", $adddate);

        switch ($period) {

		    case 1:
		        if( (int)$day < 15 ){
		        $enddate = date('d-m-Y', strtotime($adddate. ' + 1 months +1 days '));
		        }
		        else{
		        $enddate = date('d-m-Y', strtotime($adddate. ' + 2 months  -'.$day.' days + 1 days'));

		        }
		        break;

		    case 3 :
		        if( (int)$day < 15 ){
		        $enddate = date('d-m-Y', strtotime($adddate. ' + 3 months +1 days'));
		        }
		        else{
		        $enddate = date('d-m-Y', strtotime($adddate. ' + 4 months  -'.$day.'days +1 days'));

		        }	
		        break;

		    case 6 :
		        if( (int)$day < 15 ){
		        $enddate = date('d-m-Y', strtotime($adddate. ' + 6 months +1 days'));
		        }
		        else{
		        $enddate = date('d-m-Y', strtotime($adddate. ' + 7 months -'.$day.'days +1 days'));

		        }
		        break;

	        case 12 :
		        if( (int)$day < 15 ){
		        $enddate = date('d-m-Y', strtotime($adddate. ' + 12 months +1 days'));
		        }
		        else{
		        $enddate = date('d-m-Y', strtotime($adddate. ' + 13 months -'.$day.'days +1 days'));

		        }
		        break;

		} 
	        
        $issuedate = date('d-m-Y', strtotime($adddate. ' + 2 weeks')); 


        $sql = "SELECT price FROM  bundle WHERE name= '$bundle' AND period = '$period' AND speed = '$speed' ";
        $result = $con->query($sql);
        
        while ($row = mysqli_fetch_assoc($result)) {

        	$price = $row['price'];
        }

        $totalbill = $period * $price * 1.16 ; // vat=1.16
        	
       
        $sql2 = "SELECT * FROM bill WHERE username='$username' ";
        $result2 = $con->query($sql2);

        $listtable = '        <thead><tr><th scope="col">Serial number</th>
		                      <th scope="col">Start date</th>
		                      <th scope="col">End date</th>
		                      <th scope="col">Username</th>
		                      <th scope="col">Issue date</th>
		                      <th scope="col">Total bill</th>
		                      <th scope="col">Payment</th>
                              </tr></thead><tbody>' ;

        while ($row2 = mysqli_fetch_assoc($result2)) {
  
                $listtable .= 
                                    '<tr><td>'. $row2['serialnumber'] .'</td>'
		                    .'<td>'. $row2['startdate'] .'</td>'
		                    .'<td>'. $row2['enddate'] .'</td>'
		                    .'<td>'. $row2['username'] .'</td>'
		                    .'<td>'. $row2['issuedate'] .'</td>'
		                    .'<td>'. $row2['totalbill'] .'</td>'
		                    .'<td>'. $row2['payment'] .'</td></tr>'

                          
		                    ;
        }
                $listtable .= '</tbody>'; 
		


     
   ?>


<!DOCTYPE html>
<html>
  
  
<head>
  <title> Customer</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https:\\stackpath.bootstrapcdn.com\bootstrap\4.2.1\css\bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https:\\use.fontawesome.com\releases\v5.1.0\css\all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="css\customer.css">
</head>
<body>

  <div class="container">
    </br>
    </br>
    <div  class=" row justify-content-center" style=" color: white; text-shadow: 2px 2px 4px #000000; font-size: 35px;" > Welcome <?php echo $username ?> </div>
    </br>
    </br>
    </br>
    
    <div class="row justify-content-center">
      
          <div class="col-12 col-md-10 col-lg-10 infotable ">
              <table class="table table-info table-hover">
                <thead>
                  <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Bundle</th>
                    <th scope="col">Period</th>
                    <th scope="col">Add Date</th>
                    <th scope="col">Speed</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td> <?php echo $username ?> </td>
                    <td> <?php echo $bundle ?> </td>
                    <td> <?php echo $period ?> </td>
                    <td> <?php echo $adddate ?> </td>
                    <td> <?php echo $speed ?> </td>
                  </tr>
                </tbody>
              </table>
          </div>
          <div class="row justify-content-center">
              <div class="col-xs-12">
                <form  method="post">
                  <button 
                  type="button" 
                  class="btn btn-lg btn-success addbtn " 
                  title="Generate Bill"
                  id="generatebillbtn"> Generate Bill 
                </button>
                </form>
            
              </div>
          </div>

           <div class="col-12 col-md-10 col-lg-12">
              <div class='container ' id="billtable">
                </br>
                <form class="row justify-content-center">
                    
                     <div class="col-12 col-md-10 col-lg-10 infotable ">
		              <table  id="invoicetable"  class="table table-info table-hover">
		                <thead>
		                  <tr>
		                    <th scope="col">Start date</th>
		                    <th scope="col">End date</th>
		                    <th scope="col">Username</th>
		                    <th scope="col">Issue date</th>
		                    <th scope="col">Total bill</th>
		                  </tr>
		                </thead>
		                <tbody>
		                  <tr>
		                    <td> <?php echo $adddate ?> </td>
		                    <td> <?php echo $enddate ?> </td>
		                    <td> <?php echo $username ?> </td>
		                    <td> <?php echo $issuedate ?> </td>
		                    <td> <?php echo $totalbill ?> </td>
		                   
		                  </tr>
		                </tbody>
		              </table>
		          </div>
                     <div class="form-group ">
                        <label for="payment" class="control-label">Payment</label>
                        <input type="text" value='' class="form-control" id="payment" required autofocus>
                    </div>
                    
                    <button id="addbill" class="btn btn-md addbtn btn-success " type="submit">Add Bill</button>
                </form> 
              </div>
          </div>
          
         <div class="container">
	    </br>
	    </br>
  <div  class=" row justify-content-center" style=" color: white; text-shadow: 2px 2px 4px #000000; font-size: 35px;" > Your Bill List</div>
	    </br>
	    </br>
	 </div>   

    
         <div class="col-12  col-lg-12 ">
              <div class='container' >
                  <table  class="table table-info table-hover"  >
		                <?php 

                       echo $listtable ;

		              	?>
		              </table>
              </div>
          </div> 

  </div>

</body>
</html>
<script src="https:\\code.jquery.com\jquery-3.3.1.min.js"></script>


<script type="text/javascript">
  
      $(document).ready(function(){
     
      $( "#generatebillbtn" ).click(function() {
      $( "#billtable" ).toggle();
    });

      
	  $("#addbill").click(function(){

        var startdate = '<?php echo $adddate ?>';
	    var enddate =  '<?php echo $enddate ?>';
	    var username = '<?php echo $username ?>';
	    var issuedate = '<?php echo $issuedate ?>';
	    var totalbill = '<?php echo $totalbill ?>';
  
	    var payment = $('#payment').val();
	    
            $.ajax({
	      url: "billhandle.php",
	      type: "POST",
	      data:{
	        'addbill': 1, // set addbill
	        'startdate': startdate,
	        'enddate': enddate,
	        'username' : username,
	        'issuedate' : issuedate,
	        'totalbill' : totalbill,
	        'payment' : payment
	      },

	      success: function(data){

	      	if(data == true){
	      		alert("New bill added successfuly ");
	      		window.location.assign("customer.php");
	      	}
	      	else{
	      		alert("Bill adding faild");
	            window.location.assign("customer.php");
	      	}

 
	      }
	    });
	  });



  })
 


</script>

