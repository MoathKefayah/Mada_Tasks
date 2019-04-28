<head>
<title>Users List</title>
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

 if(isset($_POST['search'])){
    $col_selected = $_POST['col_selected'];
    $input_txt = $_POST['input_txt'];

    $sql->QueryRow("SELECT  *  from userstb where initialcode='$col_selected' AND (landline like '$input_txt%') ");
   
    $listtable = '  
                <div class="row justify-content-center" style="margin:30px 0px 30px 0px ;">
                    <strong class="title">Users List</strong>
                </div>

                <div class="container">
				    <div class="panel panel-default">
				        <div style="text-align:center" class="panel-heading">
				            <a  href="exportData.php?col_selected='.$col_selected.'&input_txt='.$input_txt.'" style="margin-bottom:20px;" class="btn btn-primary">Export Users</a>
				        </div>
				    </div>
				</div>

                <div class="row justify-content-center">      
                    <div class="col-lg-6 ">
                        <div class="container">
                          <table  class="table table-hover" style="border:1px solid #dee2e6;"> ';

                 
 	if($sql->rows != 0){

        for ($i = 0; $i < $sql->rows; $i++){

                $sql->Fetch($i);
  
                $listtable .= 
                                    '<tr><td>'. $sql->data[0] .'</td>'
                        .'<td align="right"><button type="submit"  class="btn btn-sm btn-primary" name="showinfo" id='.$sql->data[6].' onClick="senduser_id(this.id)"> show info </button></td></tr>'

                          
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
         echo "<h2 align='center'>No Users !!</h2>";
        }
    }


?>

<script src="https:\\code.jquery.com\jquery-3.3.1.min.js"></script>

<script type="text/javascript">

function senduser_id(clicked_id)
{
     window.location.assign("showinfo.php?id=" + clicked_id);
}

</script>


