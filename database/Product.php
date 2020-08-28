<?php

class Product {

    public $db;

    function __construct($db) {
        $this->con = $db;
    } 

    public function getData($table = 'market.product') {
        
        /*$result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;*/
        $sql = "SELECT * FROM $table";
        //echo $sql;
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        //print_r($stmt->execute());
        $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$resultArray = array();
        /*while($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $resultArray[] = $item;*/
        
        return $resultArray;
    }
    

    public function getProduct($item_id = null, $table = 'market.product') {
        if(isset($item_id)) {
            $stmt = $this->con->prepare("SELECT * FROM $table WHERE item_id = :item_id");
            //var_dump($stmt);
            $stmt->bindParam(':item_id', $item_id);
            $stmt->execute();
            $resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // $resultArray = array();
            
            // while($table = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //     $resultArray[] = $table;
            // }

            return $resultArray;
        }
    }

    // fetch product data using getData Method
    /*public function getData($table = 'market.product'){
        $result = $this->con->query("SELECT * FROM $table LIMIT 16") or die(mysqli_error($db));
     
        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
            
        }

        return $resultArray;
        $this->con->close();
    }

    // get product using item id
    public function getProduct($item_id = null, $table= 'market.product'){
        if (isset($item_id)){
            $result = $this->con->query("SELECT * FROM {$table} WHERE item_id=$item_id");

            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }*/

}













