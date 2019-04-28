<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate invoice object
include_once '../objects/invoice.php';
 
$database = new Database();
$db = $database->getConnection();
 
$invoice = new invoice($db);
 
// get posted data
$data = json_decode(file_get_contents("input.txt"));
 
// make sure data is not empty
if(
    !empty($data->startdate) &&
    !empty($data->enddate) &&
    !empty($data->username) &&
    !empty($data->issuedate) &&
    !empty($data->totalbill) &&
    !empty($data->payment) 
    
){
 
    // set invoice property values
    $invoice->startdate = $data->startdate;
    $invoice->enddate = $data->enddate;
    $invoice->username = $data->username;
    $invoice->issuedate = $data->issuedate;
    $invoice->totalbill = $data->totalbill;
    $invoice->payment = $data->payment; 
   
 
    // create the invoice
    if($invoice->create_invoice()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "Invoice was created."));
    }
 
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create invoice."));
    }
}
 
// tell the user data is incomplete
else{
 
    // set response code - 400 bad request
    http_response_code(400);
 
    // tell the user
    echo json_encode(array("message" => "Unable to create invoice. Data is incomplete."));
}
?>

