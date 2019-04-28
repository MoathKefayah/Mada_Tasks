<!DOCTYPE html>
<html>
<head>
        <title>Task2</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https:\\stackpath.bootstrapcdn.com\bootstrap\4.2.1\css\bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        
        <link rel="stylesheet" href="css\index.css">

</head>
<body>


         <div class="container">
            <br/>
            <br/>
            <br/>
            <div class="row">

              <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">

                    <div class="form-label-group">
                        <input type="text" id="ip" class="form-control" placeholder="Enter Your IP"  required autofocus>
                    </div>
                    <br/>
                    <button id="check" class="btn btn-md btn-success btn-block text-uppercase" type="submit">check</button>

              </div>

            </div>

         </div>

</body>
</html>

<script src="https:\\code.jquery.com\jquery-3.3.1.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){


       $("#check").click(function(){

        var ip = $("#ip").val();
        


        $.ajax({
          url: "check.php",
          type: "POST",
          data:{
            'checkbtn': 1,
            'ip' : ip      
          },

          success: function(data){

            if(data == true){
                
                window.location.assign("http://www.kooora.com/");

            }
            
            else{

                window.location.assign("http://www.beinsports.com");

            }
 
          }
        });
      });


   });


</script>
