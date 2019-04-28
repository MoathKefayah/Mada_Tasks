<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/customer.php';

// instantiate database
$database = new Database();
$db = $database->getConnection();

// initialize object
$customer = new Customer($db);
 
 if(isset($_POST['submit'])){
    $col_selected = $_POST['col_selected'];
    $input_txt = $_POST['input_txt'];

    $stmt = $customer->search($col_selected,$input_txt);
    $num = $stmt->rowCount();

    // check if more than 0 record found
    if($num>0){

        // customers array
        $customers_arr=array();
        $customers_arr["records"]=array();

        // retrieve our table contents
        // fetch() is faster than fetchAll()

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            $customer_item=array(
                "username" => $row['username'],
                "bundle" => $row['bundle'],
                "period" => $row['period'],
                "adddate" => $row['adddate'],
                "speed" => $row['speed']

            );

            array_push($customers_arr["records"], $customer_item);
        }

        // set response code - 200 OK
        http_response_code(200);

        // show customer data in json format
        echo json_encode($customers_arr);
    }

    else{

        // set response code - 404 Not found
        http_response_code(404);

        // tell the user no customer found
        echo json_encode(
            array("message" => "No customers found.")
        );
    }


    }


?>

