<?php

    class Search {
        
        private $db;

        function __construct($db) {
            $this->con = $db;
        }


        public function searchProducts($search) {
            $stmt = $this->con->prepare("SELECT * FROM market.product WHERE item_name LIKE :search
            OR item_brand LIKE :search OR item_price LIKE :search");
            $stmt->bindValue(':search', '%'.$search.'%');
            $data = $stmt->execute();
            $result = $stmt->rowCount();
            $resultArray = array();
            
            if($result > 0) {
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $resultArray[] = $row;
                    echo "<prev>" .print_r($row, true). "</prev>";
                }
                return $resultArray;
            }
        }
    }