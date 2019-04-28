<head>
<title>Applicant List</title>
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

 if(isset($_POST['search'])){
    $col_selected = $_POST['col_selected'];
    $input_txt = $_POST['input_txt'];

    $sql->QueryRow("SELECT  *  from applicant_info where $col_selected='$input_txt'");
   
    $listtable = '  
                <div class="row justify-content-center" style="margin:30px 0px 30px 0px ;">
                    <strong class="title">Applicant List</strong>
                </div>

                <div class="row justify-content-center">      
                    <div class="col-lg-6 ">
                        <div class="container">
                          <table  class="table table-hover"> ';

      
      if($sql->rows != 0){

         for ($i = 0; $i < $sql->rows; $i++){

                $sql->Fetch($i);
  
                $listtable .= 
                                    '<tr><td>'. $sql->data[0] .'</td>'
                        .'<td align="right"><button type="submit"  class="btn btn-sm btn-primary" name="showpdf" id='.$sql->data[10].' onClick="sendapplicant_id(this.id)"> show pdf </button></td></tr>'

                          
                            ;
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
         echo "<h2 align='center'>No applicants !!</h2>";

        }



       
        
    }


?>

<script src="https:\\code.jquery.com\jquery-3.3.1.min.js"></script>

<script type="text/javascript">

function sendapplicant_id(clicked_id)
{
     window.location.assign("showpdf.php?id=" + clicked_id);
}
</script>


