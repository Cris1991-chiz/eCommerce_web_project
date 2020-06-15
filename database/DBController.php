<?php

class DBController {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbName = 'market';
    private $port = 3306;
    private $charset = 'utf8mb4';
    private $con;
    //public $errors = array();

    public function connect() {
        
        // Connect to database
        /*$this->con = mysqli_connect($this->host, $this->user, $this->password, $this->dbName);
        if ($this->con->connect_error){
            echo "Fail " . $this->con->connect_error;
        $this->con = null;*/

        try {
        $this->con = new PDO('mysql:host=' . $this->host . ';dbname' . $this->dbName,
        $this->user, $this->password);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        } catch (PDOException $e) {
            $errors[] = 'Connection Error: ' . $e->getMessage();
        }

        return $this->con;
    
    }

    /*public function __destruct() {
        $this->closeConnection();
    }
        
    protected function closeConnection() {
        if($this->con != null) {
            $this->con = close();
            $this->con = null;
        }
    }*/
}

