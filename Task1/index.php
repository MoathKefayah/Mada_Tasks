
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https:\\stackpath.bootstrapcdn.com\bootstrap\4.2.1\css\bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link rel="stylesheet" href="css\login.css">

</head>

<body class="login">

<div class="imgcontainer">
<img  src="images\img_avatar.png" alt="Avatar" class="avatar">  
</div>

<div class="container center_div">
<div class="row">
  <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
    <div class="card card-signin my-3">
      <div class="card-body">
	<form class="form-signin" >

	  <h5 class="card-title text-center">Sign In</h5>
	  
	  <div class="form-label-group">
	    <input type="text" id="username" class="form-control" placeholder="Username"  required autofocus>
	    <label for="username">Username</label>
	  </div>

	  <div class="form-label-group">
	    <input type="password" id="password" class="form-control" placeholder="Password" required>
	    <label for="password">Password</label>
	  </div>

	  <div class="custom-control custom-checkbox mb-3">
	    <input type="checkbox" class="custom-control-input" id="customCheck">
	    <label class="custom-control-label" for="customCheck">Remember password</label>
	  </div>

	  <button id="login" class="btn btn-md btn-success btn-block text-uppercase" type="submit">Login</button>

	</div>
      </form>
    </div>
  </div>
</div>
</div>


</body>
</html>
<script src="https:\\code.jquery.com\jquery-3.3.1.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){



// check login
$("#login").click(function(){

var username = $('#username').val();
var password = $('#password').val();
$.ajax({
url: "login.php",
type: "POST",
data:{
'login': 1, // set login
'username': username,
'password': password
},

success: function(data){
    console.log(data);
    if(data  ==   "true" ){
        window.location.assign("services.php");
        }
        else{
        alert("Invaild username  or password ! ");   
        window.location.assign("index.php");
        } 
      }
    });
  });

});
  
</script>
