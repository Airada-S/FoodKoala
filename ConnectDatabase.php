<?php
class connectDB {
    public function connect(){
        $username = 'team';
        $password = '';
        $host = '10.31.2.10';
        $database = "foodkoala2";
        $port = 3306;
        $conn = new mysqli($host.':'.$port, $username, $password,$database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    public function getAll(){
        $sql = "SELECT * FROM seller";
        return $this->connect()->query($sql);
    }
    public function getStar($seller_id){
        $sql3 = "SELECT `reviews_start` FROM `reviews` WHERE `seller_id` = '".$seller_id."'";
        return $this->connect()->query($sql3);
    }
    public function getType($seller_id){
        $sql2 = "SELECT DISTINCT `product_type` FROM product WHERE `seller_id` = '".$seller_id."'";
        return $this->connect()->query($sql2);
    }
}