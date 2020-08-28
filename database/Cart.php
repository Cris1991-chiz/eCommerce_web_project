<?php
// php CART Class
Class Cart {

    private $db;

    public function __construct($db) {
        $this->con = $db;
    }

    // Get cart Id

    public function insertIntoCart($params = null, $table = 'market.cart') {
        if($this->con != null) {
            if($params != null) {

                $columns = implode(',', array_keys($params));
                //print_r($columns);
                $itemValue = implode(',', array_values($params));
                //print_r($itemValue);
                //create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $itemValue);
                //echo $query_string;
                // execute query
                $result = $this->con->query($query_string);
                return $result;
                /*$sql = ("INSERT INTO $table (userid, item_id) VALUES (:itemValue)");
                //echo $query_string;
                $stmt = $this->con->prepare($sql);
                $stmt->bindValue(':colums', $columns, PDO::PARAM_STR);
                $stmt->bindValue(':itemValue', $itemValue, PDO::PARAM_STR);
                $stmt->execute();
                var_dump($stmt);
                //$result = $stmt->execute();*/
            
                return true;
            }
        }
    }

    public function addToCart($userid, $itemid) {
        if(isset($userid) && isset($itemid)) {
            $params = array(
                "userid" => $userid,
                "item_id" => $itemid
            );
            $result = $this->insertIntoCart($params);
        
            if($result) {

                header("Location:" . $_SERVER['PHP_SELF']);
            }
        }    
    }

    //delete cart item using item_id
    public function deleteCartItem($item_id = null, $table = 'market.cart') {
        if($item_id != null) {
            $stmt = $this->con->prepare("DELETE FROM $table WHERE item_id = $item_id");
            //$stmt->bindParam('item_id', $item_id);
            $result = $stmt->execute();

            if($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }   
    }

    // calculate sub total
    public function getSum($arr) {
        if(isset($arr)) {
            $sum = 0;
            foreach($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        } 
    }

    // get item_id from the cart list

    public function getCartId($cartArray = null, $key = "item_id") {
        if($cartArray != null) {
            $cart_id = array_map(function($values) use($key) {
                return $values[$key];

            }, $cartArray);
        return $cart_id;
        }
    }


    // Save fo later the Item in the cart

    public function saveForLater($item_id = null, $saveTable = 'market.wishlist', $fromTable = 'market.cart') {
        if($item_id != null) {
            $sql = "
            INSERT INTO $saveTable SELECT * FROM $fromTable WHERE item_id = $item_id;
            DELETE FROM $fromTable WHERE item_id = $item_id;
            ";
            //$stmt = $this->con->prepare($sql);
            $stmt = $this->con->prepare($sql);
            $result = $stmt->execute();
            if($result) {
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

      // insert into cart table
    /*public  function insertIntoCart($params = null, $table = "market.cart"){
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into cart(user_id) values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user_id and item_id and insert into cart table
    public  function addToCart($userid, $itemid){
        if (isset($userid) && isset($itemid)){
            $params = array(
                "user_id" => $userid,
                "item_id" => $itemid
            );

            // insert data into cart
            $result = $this->insertIntoCart($params);
            if ($result){
                // Reload Page
                header("Location:" . $_SERVER['PHP_SELF']);
            }
        }
    }

    // delete cart item using cart item id
    public function deleteCartItem($item_id = null, $table = 'market.cart'){
        if($item_id != null){
            $result = $this->db->con->query("DELETE FROM {$table} WHERE item_id=$item_id");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
    }

    // get item_id of shopping cart list
    public function getCartId($cartArray = null, $key = "item_id"){
        if ($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            }, $cartArray);
            return $cart_id;
        }
    }

    // Save for later
    public function saveForLater($item_id = null, $saveTable = "market.wishlist", $fromTable = "market.cart"){
        if ($item_id != null){
            $query = "INSERT INTO $saveTable SELECT * FROM $fromTable WHERE item_id=$item_id;";
            $query .= "DELETE FROM $fromTable WHERE item_id=$item_id;";
            //echo $query; use to debug
            // execute multiple query
            $result = $this->db->con->multi_query($query);

            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }*/
}






