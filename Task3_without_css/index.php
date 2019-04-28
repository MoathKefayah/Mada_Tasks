<!DOCTYPE html>
<html>
<head>
        <title>Range Divider</title>
   
</head>
<body>


<div >
        <div >
            <div >
            </br>
            </br>
           
            </br>
            <div>
              <div>
                <label for="city"></label>
                <select id="cityselect">
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
                      <div  id="cblist"></div>
                      </br>
                      </br>
                      </br>
                     <div >

                      <button type="submit" id="submit">Submit</button>
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
     var div = $('<div>');

     $('<input />', { type: 'checkbox', name:"prefix[]" , id: 'cb'+id, value: name }).appendTo(div);
     $('<label />', { 'for': 'cb'+id, text: name }).appendTo(div);
     $('</br>').appendTo(div);

     div.appendTo(container)
  }

</script>


