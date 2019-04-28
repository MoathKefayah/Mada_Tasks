<!DOCTYPE html>
<html>
<head>
<title>Search Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https:\\stackpath.bootstrapcdn.com\bootstrap\4.2.1\css\bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<link rel="stylesheet" href="https:\\use.fontawesome.com\releases\v5.1.0\css\all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<link rel="stylesheet" href="css\index.css">

<link rel="icon" href="images/tabimg.png">

</head>

<body style="background-color: #f5f5f5;">

<form action="search_handle.php" method="post">
  <div class="container mainpage" >
    
    </br>
    
    <div class="row">
      <div style="float: left;" class="col-lg-4"></div>
      <div style="text-align: center;" class="col-lg-4">
        <img style="width: 50%;" src="images/logo-v.png">
      </div>
      <div style="float: right;" class="col-lg-4"></div>
    </div>

    </br>
    </b>
    <div class="row">
          

          <div style="float: left;" class="col-lg-2"></div>

          <div style="text-align: center;" class="col-lg-8">
                   <table id="searchtable">
                  <tbody>
                    <tr>
                      <th> </th>
                      <th> </th>
                      <th> </th>
                      <th> </th>
                      <th> </th>
                      <th> </th>
                      <th> </th>
                      <th> </th>
                      <th style="margin-left: 20" width="260" scope="col"><input  type="text" name="input_txt" size="45" placeholder="Enter first 3 numbers of landline ..." required></th>
                      <th> </th>
                      <th scope="col"  width="150">
                          <span>

                                  <select  name="col_selected"  style="width: 150px;  text-align: center;">

                                    <option selected id="02">02</option>

                                    <option id="04">04</option>

                                    <option id="08">08</option>

                                    <option id="09">09</option>
                                    
                                  </select>

                                  

                              </span>
                      </th>

                      

                    </tr>

                  </tbody>
            </table>

          </div>

          <div style="float: right;" class="col-lg-2"></div>

    </div>


    <div class="row" style="margin-top: 30px; ">
      <div  class="col-lg-4"></div>
      <div  style="margin-left: 40%; " class="col-lg-4">
        <button type="submit" style="width:50%;" align="center" class="btn btn-md btn-block btn-primary" name="search" id="search" >Search</button>
      </div>
      <div  class="col-lg-4"></div>
    </div>
  </div>
</form>


</body>

</html>

<script src="https:\\code.jquery.com\jquery-3.3.1.min.js"></script>

<script type="text/javascript">
  $('input').focus(function() {
    $(this).attr('placeholder', '')
  });

  $('input').blur(function(){
    $(this).attr('placeholder','Enter first 3 numbers of landline ...')
  });

</script>

