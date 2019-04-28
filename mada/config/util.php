
<?php



/*

 * Utility routines for MySQL.

 */



class MySQL_class {



    var $db, $id, $result, $rows, $data, $a_rows,$r;
    var $arrayData = array();

    var $user, $pass, $host;



    /* Make sure you change the USERNAME and PASSWORD to your name and

     * password for the DB

     */



    function __construct($dbname) {

        if ($dbname == 'mada_db') {

            //configuration for connection with cv_form database

            $this->host = "localhost";

            $this->user = "moath";

            $this->pass = "moath1130492,";

            $this->db = "mada_db";

            $this->Create("mada_db");


        } 

    }



    function Setup($user, $pass, $host, $db) {

        $this->user = $user;

        $this->pass = $pass;

        $this->host = $host;

        $this->db = $db;

    }

    function Create($db) {

        if (!$this->user) {

            # Set this to your default username

            $this->user = "moath";

        }

        if (!$this->pass) {

            # Set this to your default password

            $this->pass = "moath1130492,";

        }

        if (!$this->host) {

            # Set this to your default database host

            $this->host = "localhost";

        }

        if (!$this->db && !$db) {

            # Set this to your default database

            $this->db = "mada_db";

        } else {

            $this->db = $db;

        }

        try 
        {    
            $this->id = new PDO('mysql:host='.$this->host.';dbname='.$this->db , $this->user, $this->pass ,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
             $this->id->exec("SET CHARACTER SET UTF8");
            $this->id->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            
        } 
        catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }


    } //Done to PDO


    public function MySQL_ErrorMsg($msg) {

            # Close out a bunch of HTML constructs which might prevent

            # the HTML page from displaying the error text.

            echo("</ul></dl></ol>\n");

            echo("</table></script>\n");



            # Display the error message

            $msg = " <br><br>

            <table width= 78% border= 0 align= center bgcolor= #FFFFFF >

             <tr>

                <th width= 46% scope= col ><h1><font color=\"#990099\" size=+3><p> No Records Availble ! </h1></th>

            </tr>

            </table>

            " . $msg;

            $text = " $msg <br> ";

            $text .= print_r($this->id->errorInfo());

            $text .= "</font>\n";

            die($text);

    }



    # Use this function is the query will return multiple rows.  Use the Fetch

    # routine to loop through those rows.

    function Query($query) {
        try{
            $this->stmt = $this->id->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));                
            $this->result = $this->stmt->execute() or
                    $this->MySQL_ErrorMsg("Unable to perform query: $query");
            $this->rows = $this->stmt->rowCount();
            $this->a_rows = $this->stmt->rowCount();
            

        }
        catch(PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
       

    } //Done to PDO



    # Use this function if the query will only return a

    # single data element of row.



    function QueryItem($query) {

        try{
     
            $this->stmt = $this->id->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                   
            $this->result = $this->stmt->execute() or

                    $this->MySQL_ErrorMsg("Unable to perform query: $query");

            $this->rows = $this->stmt->rowCount();

            $this->a_rows = $this->stmt->rowCount();

            if ($this->rows == 0) {

            return $this->data[0] = "";

            }

            $this->data = $this->stmt->fetch(PDO::FETCH_BOTH) ;
                    
                    return($this->data[0]);

        }catch(PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();

        }

    } //Done to PDO



    # This function is useful if the query will only return a

    # single row.



    function QueryRow($query) {

        try{
                $this->stmt = $this->id->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));           
                $this->result = $this->stmt->execute() or
                                $this->MySQL_ErrorMsg("Unable to perform query: $query");
                $this->rows = $this->stmt->rowCount();
                $this->a_rows = $this->stmt->rowCount();

                if ($this->rows == 0) {

                        return $this->data = "";

                }

        }catch(PDOException $e) {

                print "Error!: " . $e->getMessage() .  "<br/>";
                die();

        }


    } //Done to PDO



    function Fetch($row) {


        try{
                $this->data = $this->stmt->fetch(PDO::FETCH_BOTH);
        return $this->data;
        }catch(PDOException $e) {

                print "Error!: " . $e->getMessage() .  "<br/>";
                die();

        }


    } //Done to PDO


    function Insert($query) {
                
                try{
                        $this->stmt = $this->id->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));                    
                        $this->result = $this->stmt->execute();
                        $this->rows = $this->stmt->rowCount();    
                        $this->a_rows = $this->stmt->rowCount();
                        
                }catch(PDOException $e) {

                        print "Error!: " . $e->getMessage() . "<br/>";
                        die();
                }


    } //Done to PDO



    function InsertID() {

        return $this->id->lastInsertId();

    } //Done to PDO



    function Update($query) {

        try{
            $this->stmt = $this->id->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $this->result = $this->stmt->execute() or
                 $this->MySQL_ErrorMsg("Unable to perform Update: $query");
            $this->rows = $this->stmt->rowCount();
            $this->a_rows = $this->stmt->rowCount();
        }catch(PDOException $e) {

                print "Error!: " . $e->getMessage() . "<br/>";
                die();
        }

    } //Done to PDO

    function Delete($query) {

        try{
                $this->stmt = $this->id->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                $this->result = $this->stmt->execute() or
                    $this->MySQL_ErrorMsg("Unable to perform Delete: $query");
                $this->rows = $this->stmt->rowCount();
                $this->a_rows = $this->stmt->rowCount();
        }catch(PDOException $e) {

                print "Error!: " . $e->getMessage() . "<br/>";
                die();
        }

    }



    public function Select($items, $table, $where = null) {

        if ($where == null) {

            $query = "select " . $items . " from " . $table;

        } else {

            $query = "select " . $items . " from " . $table . " where " . $where;

        }

        try{
           
            $this->stmt = $this->id->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            $this->result = $this->stmt->execute() or
                     $this->MySQL_ErrorMsg("Unable to perform insert: $query");
            $this->rows = $this->stmt->rowCount();
            $this->a_rows = $this->stmt->rowCount();

        
            while($data = $this->stmt->fetch(PDO::FETCH_NUM)){
                array_push($this->arrayData, $data);
            }

            //$this->r = $this->stmt->fetchAll();
            
            // if(sizeof($r) > 1 )
            //         return $r ;
            // else
            //         return 0;

        }catch(PDOException $e) {

                print "Error!: " . $e->getMessage() . "<br/>";
                return 0;
        }


    } //Done to PDO



    public function SelectRow($items, $table, $where = null) {

        if ($where == null) {

            $query = "select " . $items . " from " . $table;

        } else {

            $query = "select " . $items . " from " . $table . " where " . $where;

        }

        $this->QueryRow($query);
        $this->fetch(1);
     
        return $this->data;

    } //Done to PDO



    public function SelectItem($item, $table, $where = null) {

        if ($where == null) {

            $query = "select " . $item . " from " . $table;

        } else {

            $query = "select " . $item . " from " . $table . " where " . $where;

        }

        return $this->QueryItem($query);

    } //Done to PDO



    //function to insert direct to database no need to write insert query

    //on success will return the inserted row number

    //on failure will return 0

    public function insertData($items, $values, $table) {

        $query = "insert into " . $table . "(" . $items . ")" . " values " . "(" . $values . ")";

                try{
                    $this->stmt = $this->id->prepare($query,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
                    $this->result = $this->stmt->execute();
                    $this->rows = $this->stmt->rowCount();
                    $this->a_rows = $this->stmt->rowCount();
                     return $this->id->lastInsertId();

                }catch(PDOException $e) {
                    print "Error!: " . $e->getMessage() . "<br/>";
                    return 0;
                }

    }

    public function UpdateData($set, $table, $where) {

        $query = "update " . $table . " set " . $set . " where " . $where;

        $this->Query($query);

            if ($this->a_rows >= 1) 
                return 0;
            else
                return 1;

    }//Done to PDO



    //function to start transactions

    public function startTransaction() {

        try{

            return $this->id->beginTransaction();

        }catch(PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                return 0;
        }
    }



    public function commit() {

        try{
            return $this->id->commit();
        }catch(PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                return 0;
        }

    }



    public function rollback() {

        try{
            return $this->id->rollback();
        }catch(PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                return 0;
        }

    }


}



?>
