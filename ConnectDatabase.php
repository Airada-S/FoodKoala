<?php
//require_once 'header.php';
class connectDB {
    public function connect(){
        $username = 'team';
        $password = '';
        $host = '10.31.2.17';
        $database = "foodkoala2";
        $port = 3306;
        $conn = new mysqli($host.':'.$port, $username, $password,$database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    public function login($username, $password){
        $sql = "SELECT * FROM `customer`WHERE customer_username = '".$username."' AND customer_password = '".$password."'";
        $result = $this->connect()->query($sql);
        if($result->num_rows>0){
            $_SESSION['status'] = 'customer';
            $val = $result->fetch_assoc();
            $_SESSION['id'] = $val["customer_id"];
            return $result;
        }else{
            $sql = "SELECT * FROM `employee`WHERE employee_username = '".$username."' AND employee_password = '".$password."'";
            $result = $this->connect()->query($sql);
            if($result->num_rows>0){
                $_SESSION['status'] = 'employee';
                $val = $result->fetch_assoc();
                $_SESSION['id'] = $val["employee_id"];
                return $result;
            }else{
                $sql = "SELECT * FROM `seller`WHERE seller_username = '".$username."' AND seller_password = '".$password."'";
                $result = $this->connect()->query($sql);
                if($result->num_rows>0){
                    $_SESSION['status'] = 'seller';
                    $val = $result->fetch_assoc();
                    $_SESSION['id'] = $val["seller_id"];
                    return $result;
                }else{
                    header("Location:login.php");
                }
            }
        }


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
    public function getProduct($id){
        $sql = "SELECT * FROM product WHERE `seller_id` = '".$id."'";
        return $this->connect()->query($sql);
    }
    public function getSeller($id){
        $sql = "SELECT * FROM seller WHERE `seller_id` = '".$id."'";
        return $this->connect()->query($sql);
    }
    public function getProductByPid($pid){
        $sql = "SELECT * FROM product WHERE `product_id` = '".$pid."'";
        return $this->connect()->query($sql);
    }
    public function Insert1($user,$pass,$name,$tel,$address){
        $sql = "INSERT INTO `customer`(`customer_name`, `customer_address`, `customer_wallet`, `customer_tel`, `customer_username`, `customer_password`) VALUES ('".$name."','".$address."','0','".$tel."','".$user."','".$pass."')";
        echo $sql;
        if(mysqli_query($this->connect(), $sql)){
            header("Location:Login.php");
        } else {
            echo 'Insert Incomplete';
        }
    }
    public function Insert2($user,$pass,$name,$tel,$address,$time,$img){
        $sql = "INSERT INTO `seller`(`seller_name`, `seller_tel`, `seller_status`, `seller_img`, `seller_time`, `seller_address`, `seller_username`, `seller_password`) VALUES ('".$name."','".$tel."','0','".$img."','".$time."','".$address."','".$user."','".$pass."')";
        echo $sql;
        if(mysqli_query($this->connect(), $sql)){
            header("Location:Login.php");
        } else {
            echo 'Insert Incomplete';
        }
    }

}