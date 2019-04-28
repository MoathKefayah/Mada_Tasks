<head>
<title>List All Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https:\\stackpath.bootstrapcdn.com\bootstrap\4.2.1\css\bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

<style type="text/css">
   .title{
    color: rgb(152,0,102);
    text-shadow: 2px 2px 4px #000000;
    font-size: 50px;

    }
</style>

</head>

<?php


require("configure/util.php");

$sql = new MySQL_class("cv_form");

 if(isset($_POST['searchall'])){
    $col_selected1 = $_POST['column_selected'];
    
    $sql->QueryRow("SELECT * from applicant_info ");

    if (preg_match('/^[a-z]+_[a-z]+$/i', $col_selected1)) {
         $col_selected2= ucwords(preg_replace('/_+/', ' ', $col_selected1));
    } 

    else{
      $col_selected2=ucwords($col_selected1);
    }

    $listtable = '  
                <div class="row justify-content-center" style="margin:30px 0px 30px 0px ;">
                    <strong class="title"> '.$col_selected2.' List</strong>
                </div>

                <div class="row justify-content-center">      
                    <div class="col-lg-6 ">
                        <div class="container">
                          <table  class="table table-hover"> ';

      
      if($sql->rows != 0){

         for ($i = 0; $i < $sql->rows; $i++){

                $sql->Fetch($i);
                if($col_selected1 == "applicant_name"){
                  $listtable .= 
                                    '<tr><td>'. $sql->data[$col_selected1] .'</td></tr>' ;
                }
                else{
                  $listtable .= 
                                    '<tr><td>'.$sql->data[0].'</td><td>'. $sql->data[$col_selected1] .'</td></tr>' ;
                }
                
        }

         $listtable .= '</tbody>
                                 </table>
                                   </div>
                                     </div> 
                                       </div>'; 


        echo $listtable ;

      }   
      else{

                $listtable .= '</tbody>
                                 </table>
                                   </div>
                                     </div> 
                                       </div>'; 


        echo $listtable ;
         echo "<br><br>";
         echo "<h2 align='center'>No ".$col_selected2." !!</h2>";

        }



       
        
    }


?>