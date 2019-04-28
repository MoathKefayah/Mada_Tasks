<!DOCTYPE html>
<html>
<head>
        <title>Range Divider</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https:\\stackpath.bootstrapcdn.com\bootstrap\4.2.1\css\bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <link rel="stylesheet" href="css\index.css">


</head>
<body>


<div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-6 mx-auto">
            </br>
            </br>
            <div class="row  justify-content-center align-items-center " >
              <img src="images\sinatra-logo.png" width="200" height="90">
            </div>
            </br>
            </br>
            <div class="row  justify-content-center align-items-center " >
              <div class="form-group">
                <label for="city" class="control-label"></label>
                <select id="cityselect" class="form-control">
                              <option>--  select city  --</option>
                              <option id="Ramallah">    Ramallah   </option>
                              <option id="Nablus">     Nablus   </option>
                              <option id="Gaza">      Gaza     </option>
                              <option id="Jinin">     Jinin     </option>
                </select>
              </div>
            </div>
            </br>
                    <form action="prefix-form.php" method="post">
                      <div class="funkyradio" id="cblist"></div>
                      </br>
                      </br>
                      </br>
                     <div class=" row justify-content-center align-items-center ">

                      <button type="submit" class="btn btn-success  btn-md  btn-block text-uppercase" id="submit">Submit</button>
                   </div>
                    </form>
        </div>
    </div>
</div>


</body>
</html>

<script src="https:\\code.jquery.com\jquery-3.3.1.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

    $("#cityselect").change(function() {
      $('#cblist').empty();
      city = $(this).children(":selected").attr("id");
       $.ajax({
        url: "handlecity.php",
        type: "POST",
        data:{
          'handlecity': 1,
          'city' : city
        },
        success: function(data){
        var pre_city = JSON.parse(data);
          for($i = 0 ; $i < pre_city.length ; $i++){
            addcheckbox(pre_city[$i]);
          }


        }
      });

    });




});


  function addcheckbox(name) {
     var container = $('#cblist');
     var inputs = container.find('input');
     var id = inputs.length+1;
     var div = $('<div>', { class: 'funkyradio-primary'});

     $('<input />', { type: 'checkbox', name:"prefix[]" , id: 'cb'+id, value: name }).appendTo(div);
     $('<label />', { 'for': 'cb'+id, text: name }).appendTo(div);
     $('</br>').appendTo(div);

     div.appendTo(container)
  }

</script>

