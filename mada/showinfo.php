<head>
<title>User Information</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https:\\stackpath.bootstrapcdn.com\bootstrap\4.2.1\css\bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<style type="text/css">
   .title{
    color: rgb(152,0,102);
    text-shadow: 2px 2px 4px #000000;
    font-size: 40px;

    }
</style>

<link rel="icon" href="images/tabimg.png">

</head>

<?php


require("config/util.php");

$sql = new MySQL_class("mada_db");

$id = $_GET['id'];
$info = "" ;

  
    $sql->QueryRow("SELECT  *  from userstb where id='$id' ");

    $data=$sql->Fetch(1);

    $info = '  
                <div class="row justify-content-center" style="margin:30px 0px 30px 0px ;">
                    <strong class="title"> User Information </strong>
                </div>

                <div class="row justify-content-center">      
                    <div class="col-lg-6 ">
                        <div class="container">
                          <table  class="table table-bordered table-hover"><tbody>';


               $info .= '<tr><td>ID </td><td>'.$data[6].'</td></tr>
                         <tr><td>Customer Name </td><td>'.$data[0].'</td></tr>
                         <tr><td>Mobile</td><td>'.$data[1].'</td></tr> 
                         <tr><td>LandLine</td><td>'.$data[2].'-'.$data[3].'</td></tr>
                         <tr><td>Add Date </td><td>'.$data[4].'</td></tr>
                         <tr><td>Add Time</td><td>'.$data[5].'</td></tr>' 
                         ;

                $info .= '</tbody>
                                 </table>
                                   </div>
                                     </div> 
                                       </div>'; 


  

        echo $info ;
        
  


?>




