<?php

class Customer{
 
    // database connection and table name
    private $conn;
    private $table_name = "customer";

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
  
    // search customer
	function search($col_selected,$inputtxt){
	 
	    // select all query
	    $query = "SELECT
	                c.username, c.bundle, c.period, c.adddate, c.speed
	            FROM
	                " .$this->table_name. " c

                    WHERE
                       c.$col_selected = '$inputtxt'
                    
	                ";
	 
	    // prepare query statement
	    $stmt = $this->conn->prepare($query);
	    
        
	    // execute query
	    $stmt->execute();
          
        return $stmt ;
    }



}

?>



