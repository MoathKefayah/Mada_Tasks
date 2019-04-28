<?php
//include database configuration file

require("config/util.php");

$sql = new MySQL_class("mada_db");

$col_selected = $_GET['col_selected'];
$input_txt = $_GET['input_txt'];


//get records from database
$sql->QueryRow("SELECT  *  from userstb where initialcode=$col_selected AND (landline like '$input_txt%') ");


if($sql->rows > 0){

    $filename = "users_" . date('Y_m_d_h_i_s_A').".csv";
    $handle = fopen("exportedfiles/".$filename, 'w') or die('Cannot open file:  '.$filename);

    $fields = array('ID,','Username,', 'Mobile,', 'Initialcode,', 'Landline,', 'Add Date,', 'Add time'."\n");

    file_put_contents('exportedfiles/'.$filename,$fields,FILE_APPEND);

   for ($i = 0; $i < $sql->rows; $i++){

        $data=$sql->Fetch($i);

        //$username = mb_convert_encoding($data[0], 'UTF-8');
        $lineData = array($data[6].',', $data[0].',',$data[1].',', $data[2].',', $data[3].',',$data[4].',', $data[5]."\n" );

        file_put_contents('exportedfiles/'.$filename,$lineData,FILE_APPEND);
    }

    //header('Content-Type: application/csv; charset="utf-8"');
    header('Content-Disposition: attachment; filename='.basename('exportedfiles/'.$filename));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('exportedfiles/'.$filename));
    readfile('exportedfiles/'.$filename);


}




?>
