<?php

class invoice{
 
    // database connection and table name
    private $conn;
    private $table_name = "bill";

    public $startdate;
    public $enddate;
    public $username;
    public $issuedate;
    public $totalbill;
    public $payment;
 
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
  
    // read invoices
	function get($username){
	 
	    // select all query
	    $query = "SELECT
	                b.serialnumber, b.startdate, b.enddate, b.username, b.issuedate, b.totalbill , b.payment
	            FROM
	                " .$this->table_name. " b

                    WHERE
                       b.username = ".$username."
                    
	                ";
	 
	    // prepare query statement
	    $stmt = $this->conn->prepare($query);
	    
        
	    // execute query
	    $stmt->execute();
          
        return $stmt ;
    }


    function create_invoice(){

        // query to insert record
	    $query = "INSERT INTO
	                " . $this->table_name . "
	            SET
	                startdate=:startdate, enddate=:enddate, username=:username, issuedate=:issuedate, totalbill=:totalbill , payment=:payment";
	 
	    // prepare query
	    $stmt = $this->conn->prepare($query);
	 
	    // sanitize
	    $this->startdate=htmlspecialchars(strip_tags($this->startdate));
	    $this->enddate=htmlspecialchars(strip_tags($this->enddate));
	    $this->username=htmlspecialchars(strip_tags($this->username));
	    $this->issuedate=htmlspecialchars(strip_tags($this->issuedate));
	    $this->totalbill=htmlspecialchars(strip_tags($this->totalbill));
	    $this->payment=htmlspecialchars(strip_tags($this->payment));

	 
	    // bind values
	    $stmt->bindParam(":startdate", $this->startdate);
	    $stmt->bindParam(":enddate", $this->enddate);
	    $stmt->bindParam(":username", $this->username);
	    $stmt->bindParam(":issuedate", $this->issuedate);
	    $stmt->bindParam(":totalbill", $this->totalbill);
	    $stmt->bindParam(":payment", $this->payment);

	 
	    // execute query
	    if($stmt->execute()){
	        return true;
	    }
	 
	    return false;



    }


}

?>


