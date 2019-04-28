<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here

// include database and object files
include_once '../config/database.php';
include_once '../objects/invoice.php';
 
// instantiate database and invoice object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$invoice = new invoice($db);
 
 // set ID property of record to read
$username = isset($_GET['username']) ? $_GET['username'] : die();
 
$stmt = $invoice->get($username);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // invoices array
    $invoices_arr=array();
    $invoices_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
   
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
     
        $invoice_item=array(
            "serialnumber" => $row['serialnumber'],
            "startdate" => $row['startdate'],
            "enddate" => $row['enddate'],
            "username" => $row['username'],
            "issuedate" => $row['issuedate'],
            "totalbill" => $row['totalbill'],
            "payment" => $row['payment']
        );
 
        array_push($invoices_arr["records"], $invoice_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($invoices_arr);
}
 
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No invoices found.")
    );
}

?>
