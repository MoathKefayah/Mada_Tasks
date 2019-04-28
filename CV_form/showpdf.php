
<?php

// Include the main TCPDF library (search for installation path).
	require_once('config/tcpdf_config.php');
	require_once('tcpdf.php');
	require("configure/util.php");
// extend TCPF with custom functions
class MYPDF extends TCPDF {
	
	public  function fetch_data()  
	 {  
	      
		  $sql = new MySQL_class("cv_form");
		  $applicant_id = $_GET['id'];
		  $sql->QueryRow("SELECT  *  from applicant_info where id='$applicant_id'");	
		  $sql->Fetch(1);
		  $data = $sql->data;
	   
	      return $data;  
	 }

	 public  function fetch_data2($applicantname)  
	 {  
	      
		  $sql = new MySQL_class("cv_form");

		  $output= '';
		  $sql->QueryRow("SELECT  *  from applicant_experience where applicant_name='$applicantname'");	
		  for ($i = 0; $i < $sql->rows; $i++){

                $sql->Fetch($i);
                $data = $sql->data;
                $j= $i+1 ;
                $output .= '<tr><td>Company '.$j.'</td><td>'.$data[1].'</td></tr>
	                      <tr><td>Position title</td><td>'.$data[2].'</td></tr> 
	                      <tr><td>Years</td><td>'.$data[3].'</td></tr>';
	                      


            }
		  
		  
	   
	      return $output;  
	 }


}

		// create new PDF document
		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetTitle('Applicant CV');
		// set default header data
		$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		// set font
		//$pdf->SetFont('helvetica', '', 12);
		$pdf->SetFont('aealarabiya', '', 18);
		// add a page
		$pdf->AddPage();

		$data = $pdf->fetch_data();
		$content = '';  
        $content .= ' 
				      <table border="1" cellspacing="0" cellpadding="3">';  
        

        $content .= '<tr><td>Applicant Name</td><td>'.$data[0].'</td></tr>
	                      <tr><td>University</td><td>'.$data[1].'</td></tr> 
	                      <tr><td>Graduated School</td><td>'.$data[2].'</td></tr>
	                      <tr><td>GPA</td><td>'.$data[3].'</td></tr>
	                      <tr><td>Landline</td><td>'.$data[4].'</td></tr>
	                      <tr><td>Add Date</td><td>'.$data[5].'</td></tr>
	                      <tr><td>Position</td><td>'.$data[6].'</td></tr>
	                      <tr><td>Have Experience</td><td>'.$data[7].'</td></tr>
	                      <tr><td>Specialization</td><td>'.$data[8].'</td></tr>';  
	        
        $content .= '</table>';

        $content .= '<br />';
        $content .= '<br />';

        if($data[7]=="yes"){

        	$content .= '<p align="center"><strong>Experience</strong></p>';

	        $content .= '<table border="1" cellspacing="0" cellpadding="3">';  
	        

	        $content .= $pdf->fetch_data2($data[0]); 
		        
	        $content .= '</table>';
        }
       
        

        $content .= '<p>CV : <a href="showcv.php?filepath='.$data[9].'"> Show CV </a></p>';  

        $pdf->writeHTML($content); 

        //$data = $pdf->fetch_data();
		//print_r($data) ; exit ;

		ob_end_clean();
		// ---------------------------------------------------------
		// close and output PDF document
		$pdf->Output($_GET['id'].'_'.'CV.pdf', 'I');
		//============================================================+
		// END OF FILE
		//============================================================+


?>