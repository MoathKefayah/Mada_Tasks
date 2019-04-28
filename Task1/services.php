<?php
 session_start();


  $time = $_SERVER['REQUEST_TIME'];

        // for a  1 minute timeout, specified in seconds

        $timeout_duration = 300;

        if (isset($_SESSION['LAST_ACTIVITY']) &&
           ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {

            unset($_SESSION['usere']);
            session_destroy();
            header('location: index.php');
        }

       $_SESSION['LAST_ACTIVITY'] = $time;



 if(empty($_SESSION['usere']) ||  $_SESSION['usere'] == "false"  ){
  
  header('location:index.php');

 }



$bundleoptions = "";

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

  $sql = "SELECT distinct name FROM  bundle";
  $result = $con->query($sql);
  $exists = $result->num_rows; 
  if( $exists > 0 ){
  	while($row = mysqli_fetch_assoc($result)){
  		$bundleoptions .= "<option id ='".$row['name']."'>".$row['name']."</option>";
  		  	}
  }
  else{
  	$bundleoptions .= "<option>"."No bundles"."</option>";
  }

?>



<!DOCTYPE html>
<html>
<head>
	<title>Services Page</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https:\\stackpath.bootstrapcdn.com\bootstrap\4.2.1\css\bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="stylesheet" href="https:\\use.fontawesome.com\releases\v5.1.0\css\all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" href="css\services.css">
</head>
<body>

	<div class="container">
	    <br/>
	    
		<div class="row ">
		
	        <div class="col-1">
                   <a href="logout.php"  class="fas fa-angle-double-left" style="font-size:50px;"  ></a>
	        </div> 

	        <div class="col-1"></div>
	        <div class="col-1"></div>
 
	        <div class="col-12 col-md-10 col-lg-6">
	            <form class="card card-sm" >
	                <div class="card-body row no-gutters align-items-center"> <!-- gutters to remove margin from row and padding from column -->
	                    <div class="col-auto">
	                        <i class="fas fa-search h4 text-body"></i>
	                    </div>
	                    <div class="col">
	                        <input class="form-control form-control-lg form-control-borderless" type="text" placeholder="Enter Customer username" id="searchcustomer">
	                    </div>
	                    <div class="col-auto">
	                        <button class="btn btn-lg btn-success" type="submit" id="searchbtn">Search</button>
	                    </div>
	                </div>
	            </form>
	        </div>
	    </div>

	</div>

	<div class="container">
		<br/>
		<br/>
        <br/>
		<div class="row justify-content-center">
	        <div class="col-xs-12">
	        	<form>
	        		<button 
					    type="button" 
					    class="btn btn-lg btn-success addbtn " 
					    title="Add Bundle"
					    id="bundleaddbtn"> Add bundle  
				    </button>

				    <button 
					    type="button" 
					    class="btn btn-lg btn-success addbtn " 
					    title="Add Customer"
					    id="customeraddbtn"> Add Customer  
				    </button>
	        	</form>
				
	        </div>
      </div>
	</div>
     

	<div class='container card' id="bundletable">
		</br>
		<form class="row justify-content-center">
		    
		    <div class="form-group col-xs-3 col-md-3">
		        <label for="name" class="control-label">Name</label>
		        <input type="text" value='' class="form-control" id="name" required autofocus>
		    </div>
		    <div class="form-group col-xs-3 col-md-3">
		        <label for="speed" class="control-label">Speed</label>
		        <input type="text" value='' class="form-control" id="speed" required autofocus>
		    </div>
		    <div class="form-group col-xs-3 col-md-3">
		        <label for="period" class="control-label">Period</label>
		        <input type="text" value='' class="form-control" id="period" required autofocus>
		    </div>
		     <div class="form-group col-xs-3 col-md-3">
		        <label for="price" class="control-label">Price</label>
		        <input type="text" value='' class="form-control" id="price" required autofocus>
		    </div>
		    
		    <button id="addbundle" class="btn btn-md addbtn btn-success " type="submit">Add</button>
		</form>	

	</div>
    </br>	
    <div class='container card' id="customertable">
        </br>
		<form class="row justify-content-center">
		    
		    <div class="form-group col-xs-2 col-md-2">
		        <label for="username" class="control-label">Username</label>
		        <input type="text" value='' class="form-control" id="username" required autofocus>
		    </div>
		    <div class="form-group col-xs-2 col-md-2">
		        <label for="bundle" class="control-label">Bundle</label>
		        <select id="bundleselect" class="form-control">
                          <option>-- select bundle --</option>
                         <?php 

                     echo  $bundleoptions

		        	?>
		        </select>

		    </div>
		    <div class="form-group col-xs-2 col-md-2">
		        <label class="control-label">Period</label>
		        <select id="periodselect"  class="form-control">
                       	<option>-- select period --</option>
		        </select>

		    </div>
		    <div class="form-group col-xs-2 col-md-2">
		        <label for="adddate" class="control-label">Add Date</label>
		        <input type="date" value='' class="form-control" id="adddate" required autofocus>
		    </div>
		     <div class="form-group col-xs-2 col-md-2">
		        <label for="cspeed" class="control-label">Speed</label>
                        <select id="speedselect" class="form-control">
                        	<option>-- select speed --</option>
		        </select>
		    </div>
		    
		    <button id="addcustomer" class="btn btn-md addbtn btn-success " type="submit">Add</button>
		</form>			        
    </div>

</body>
</html>
<script src="https:\\code.jquery.com\jquery-3.3.1.min.js"></script>

<script type="text/javascript">
  
	$(document).ready(function(){
	   
	    $( "#bundleaddbtn" ).click(function() {
			$( "#bundletable" ).toggle();
		});


	    $( "#customeraddbtn" ).click(function() {
				$( "#customertable" ).toggle();
	    });
           
           // $( "#returnbtn" ).click(function() {
		      //  window.location.assign("index.php");
	//});
 
            var csbundle = "";             
	    $("#bundleselect").change(function() {
		  csbundle = $(this).children(":selected").attr("id");
		
		  $.ajax({
	      url: "handleperiod.php",
	      type: "POST",
	      data:{
	        'handleperiod': 1,
	        'csbundle' : csbundle	      
	      },

 	      success: function(data2){
              $("#periodselect").empty();
              $("#periodselect").append("<option>-- select period --</option>"); 
             $("#periodselect").append(data2); 	          
 
	      }
	    });
		});

           var csperiod = "";
          $("#periodselect").change(function() {
			  
	             csperiod = $(this).children(":selected").attr("id");
			  
			  $.ajax({
		      url: "speedhandle.php",
		      type: "POST",
		      data:{
		        'speedhandle': 1,
		        'csbundle' : csbundle,
		        'csperiod' : csperiod	      
		      },

	 	      success: function(data3){
	             
	             $("#speedselect").empty();
                     $("#speedselect").append("<option>-- select speed --</option>"); 
	             $("#speedselect").append(data3); 	          
	 
		      }
		    });
			});
            
                 
                      var csspeed = "";

		      $("#speedselect").change(function() {
					  
		         csspeed = $(this).children(":selected").attr("id");
				}); 

	   $("#addbundle").click(function(){

	  	var name = $('#name').val();
	    var speed = $('#speed').val();
		var period = $('#period').val();
	    var price  = $('#price').val();


	    $.ajax({
	      url: "addbundle.php",
	      type: "POST",
	      data:{
	        'addbundle': 1, // set addbundle
	        'name': name,
	        'speed': speed,
	        'period' : period,
	        'price' : price	      
	      },

 	      success: function(data){

	      	if(data == true){
	      		alert("New bundle added successfuly ");
	      		window.location.assign("services.php");

	      	}
	      	else{
	      		alert("Bundle adding faild");
	            window.location.assign("services.php");
	      	}
 
	      }
	    });
	  });

         $("#addcustomer").click(function(){

	  	var customerusername = $('#username').val();
	    var customerbundle = csbundle;
	    var customerperiod = csperiod;

	    var date = new Date($('#adddate').val());
            day = date.getDate();
            month = date.getMonth() + 1;
            year = date.getFullYear();
        var customeradddate = [day, month, year].join('-');

	    var customerspeed = csspeed;


	    $.ajax({
	      url: "addcustomer.php",
	      type: "POST",
	      data:{
	        'addcustomer': 1, // set addcustomer
	        'csusername': customerusername,
	        'csbundle': customerbundle,
	        'csperiod' : customerperiod,
	        'csadddate' : customeradddate,
	        'csspeed' : customerspeed
	      },

	      success: function(data4){

	      	if(data4 == true){
	      		alert("New customer added successfuly ");
	      		window.location.assign("services.php");

	      	}
	      	else{
	      		alert("Customer adding faild");
	            window.location.assign("services.php");
	      	}

 
	      }
	    });
	  }); 

     $("#searchbtn").click(function(){

	  	var customer_username = $('#searchcustomer').val();

	  	 $.ajax({
	      url: "checkcustomer.php",
	      type: "POST",
	      data:{
	        'searchcustomer': 1, // set searchcustomer
	        'customerusername': customer_username
	      },

	      success: function(data5){

	      	if(data5 == true){
	      		window.location.assign("customer.php");

	      	}
	      	else{
	      		alert(" Customer dosn't exist");
	            window.location.assign("services.php");
	      	}
 
	      }
	    });

	  }); 

	});
  
</script>
