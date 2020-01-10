<?php
class connectDB {
    public function connect(){
        $username = 'team';
        $password = '';
        $host = '10.160.67.98';
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
        $sql3 = "SELECT `reviews_star` FROM `reviews` WHERE `seller_id` = '".$seller_id."'";
        return $this->connect()->query($sql3);
    }
    public function getType($seller_id){
        $sql2 = "SELECT DISTINCT `product_type` FROM product WHERE `seller_id` = '".$seller_id."'";
        return $this->connect()->query($sql2);
    }
    public function getByProductType($ProductType){
        $sql = "SELECT DISTINCT `seller_id` FROM `product` WHERE `product_type` = '".$ProductType."'";
        $val = $this->connect()->query($sql);
        $sql2 = "SELECT * FROM `seller` WHERE `seller_id` = ";
        if($val->num_rows>0){
            $i = 0;
            while($row = $val->fetch_assoc()) {
                if($i == 0){
                    $sql2=$sql2."'".$row["seller_id"]."'";
                }
                else{
                    $sql2=$sql2." OR `seller_id` = '".$row["seller_id"]."'";
                }
                $i++;
            }
        }

        return $this->connect()->query($sql2);
    }
    public function getBySellerName($search){
        $sql = "SELECT * FROM `seller` WHERE `seller_name` LIKE '%".$search."%'";
        return $this->connect()->query($sql);
    }
    public function getByProductName($search){
        $sql = "SELECT `seller_id` FROM product  WHERE `product_name` LIKE '%".$search."%'";
//        echo $sql;
        $val = $this->connect()->query($sql);
        $sql2 = "SELECT * FROM `seller` WHERE `seller_id` = ";
        if($val->num_rows>0){
            $i = 0;
            while($row = $val->fetch_assoc()) {
                if($i == 0){
                    $sql2=$sql2."'".$row["seller_id"]."'";
                }
                else{
                    $sql2=$sql2." OR `seller_id` = '".$row["seller_id"]."'";
                }
                $i++;
            }
        }

        return $this->connect()->query($sql2);
    }
}