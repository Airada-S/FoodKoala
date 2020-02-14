<?php
//require_once 'header.php';
class connectDB {
    public function connect(){
        $username = 'team';
        $password = '';
        $host = '10.160.73.170';
//        $host = '10.160.75.88';
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
            $sql = "SELECT * FROM `employee`WHERE employee_username = '".$username."' AND employee_password = '".$password."'AND employee_status = 1";
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
                    echo "ooooooo";
//                    header("Location:login.php?cl=1");
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
    public function UPDATE3($seller_username){
        $sql = "UPDATE `seller` SET `seller_status`= true  WHERE seller_username ='".$seller_username."'";
        if(mysqli_query($this->connect(), $sql)){
            header("Location:StoreApproval.php");
        } else {
            echo 'Insert Incomplete';
        }
    }
    public function getCustomer($id){
        $sql = "SELECT * FROM `customer` WHERE `customer_id` = '".$id."'";
        return $this->connect()->query($sql);
    }
    public function insertBill($array,$cid,$pay){
        $sum = 0;
        foreach ($array as $key => $value){
            $product = $this->getProductByPid($key);
            $val = $product->fetch_assoc();
            $sum += $val["product_price"] * $value;
        }
        if($sum < 500){
            $sum+=50;
        }
        $sql = "INSERT INTO `bill`(`customer_id`, `bill_total`, `bill_deliverystatus`, `employee_id`, `bill_pay`) VALUES('".$cid."','".$sum."','ได้รับออเดอร์แล้ว','0','".$pay."')";
        echo $sql;
        if(mysqli_query($this->connect(), $sql)){
            $sql1 = "SELECT MAX(`bill_id`) as max FROM `bill`";
            $result = $this->connect()->query($sql1);
            $value1 = $result->fetch_assoc();//

            foreach ($array as $key => $value){
                $product = $this->getProductByPid($key);
                $val2 = $product->fetch_assoc();
                $sql2 = "INSERT INTO `order`( `bill_id`, `product_id`, `order_amount`, `order_sumprice`)  VALUES ('".$value1["max"]."','".$key."','".$value."','".$val2["product_price"]*$value."')";
                echo "<br>".$sql2;
                if(mysqli_query($this->connect(), $sql2)){
                    echo "true".$key;
                }else{
                    echo 'Insert Incomplete by key : '.$key;
                }
            }
            return $value1["max"];
        } else {
            echo 'Insert Incomplete';
        }
    }
    public function getBillBybid($bid){
        $sql = "SELECT * FROM `bill` WHERE `bill_id` ='".$bid."'";
        return $this->connect()->query($sql);
    }
    public function getOrderBybid($bid){
        $sql = "SELECT * FROM `order` WHERE `bill_id` ='".$bid."'";
        return $this->connect()->query($sql);
    }
    public function updateCustomerWallet($id, $wallet){
        $sql = "UPDATE `customer` SET `customer_wallet` = '".$wallet."' where customer_id='".$id."'";
        if(mysqli_query($this->connect(), $sql)){
            echo "true";
        }else{
            echo 'update Incomplete';
        }
    }
    public function updateBillDeliverystatus($bid, $status){
        $sql = "UPDATE `bill` SET `bill_deliverystatus` = '".$status."' where bill_id='".$bid."'";
        if(mysqli_query($this->connect(), $sql)){
            echo "true";
        }else{
            echo 'update Incomplete';
        }
    }
    public function updateBillEmployeeId($bid, $eid){
        $sql = "UPDATE `bill` SET `employee_id` = '".$eid."' where bill_id='".$bid."'";
        if(mysqli_query($this->connect(), $sql)){
            echo "true";
        }else{
            echo 'update Incomplete';
        }
    }
    public function updateCustomer($cid,$cname,$cuser,$cpass,$ctel,$cadd){
        $sql = "UPDATE `customer` SET `customer_name` = '".$cname."',`customer_username` = '".$cuser."',`customer_password` = '".$cpass."',`customer_tel` = '".$ctel."',`customer_address` = '".$cadd."' where customer_id = '".$cid."'";
        if(mysqli_query($this->connect(), $sql)){
            echo "true";
        }else{
            echo 'update Incomplete';
        }
    }
    public function updateCustomerVisa($cid,$cvisaID,$cvisaPass){
        $sql = "UPDATE `customer` SET `comment_visaPass` = '".$cvisaPass."',`comment_visaId` = '".$cvisaID."' where customer_id = '".$cid."'";
        if(mysqli_query($this->connect(), $sql)){
            echo "true";
        }else{
            echo 'update Incomplete';
        }
    }
    public function updateSeller($id, $user, $pass, $name, $address, $tel, $image,$status,$pro,$condition){
        $sql = "Update seller set seller_username = '".$user."', seller_password = '".$pass."', seller_name = '".$name."', seller_address = '".$address."', seller_tel='".$tel."', seller_img = '".$image."', seller_Promotion = '".$pro."', seller_StatusPromotion = '".$status."', seller_conditionPromotion='".$condition."'  where seller_id='".$id."'";
        if(mysqli_query($this->connect(), $sql)){
            echo "true";
            Header("Location:ShopManage.php");
        }else{
            echo 'update Incomplete';
            Header("Location:ShopEdit.php");
        }
    }
    public function selectSellerByUsername($username){
        $sql = "select * from seller where seller_username = '".$username."'";
        return $this->connect()->query($sql);
    }
    public function selectSellerByAId($id){
        $sql = "SELECT * FROM `seller` WHERE `seller_id`= ";
        for($i = 0 ;$i<sizeof($id);$i++){
            if($i == 0) {
                $sql = $sql . "'" . $id[$i] . "'";
            }else{
                $sql = $sql . " OR `seller_id` = '" . $id[$i] . "'";
            }
        }
        return $this->connect()->query($sql);
    }
    public function insertReviews($cid,$sid,$detail,$star){
        $sql="INSERT INTO `reviews`(`customer_id`, `seller_id`, `reviews_detail`, `reviews_star`) VALUES ('".$cid."','".$sid."','".$detail."','".$star."')";
        if(mysqli_query($this->connect(), $sql)){
            echo "true";
//            Header("Location:index.php");
        }else{
            echo 'update Incomplete';
        }
    }

    public function updateProduct($pid, $name, $price){
        $sql = "Update product set product_name = '".$name."', product_price = ".$price." where product_id = ".$pid;
        if(mysqli_query($this->connect(), $sql)){
            echo "true";
            Header("Location:addProduct.php");
        }else{
            echo 'update Incomplete';
            Header("Location:addProduct.php");
        }
    }

    public function delProduct($pid){
        $sql = "Update product set product_status = 0 where product_id = ".$pid;
        if(mysqli_query($this->connect(), $sql)){
            echo "true";
            Header("Location:addProduct.php");
        }else{
            echo 'update Incomplete';
            Header("Location:addProduct.php");
        }
    }

    public function insertProduct($sid, $name, $price, $type){
        $sql = "Insert into product(seller_id, product_name, product_price, product_type, product_status) values (".$sid.", '".$name."', ".$price.", '".$type."', 1)";
        if(mysqli_query($this->connect(), $sql)){
            echo "true";
            Header("Location:addProduct.php");
        }else{
            echo 'update Incomplete';
            Header("Location:addProduct.php");
        }
    }
    public function getBill(){
        $sql = "SELECT * FROM `bill` WHERE `employee_id` ='0'";
        return $this->connect()->query($sql);
    }

    public function getEmployeeById($id){
        $sql = "SELECT * FROM employee WHERE `employee_id` =".$id;
        return $this->connect()->query($sql);
    }
    public function getEmployeeByUsername($username){
        $sql = "SELECT * FROM employee WHERE `employee_username` =".$username;
        return $this->connect()->query($sql);
    }

    public function updateEmployee($id, $name, $user, $pass, $tel, $address){
        $sql = "update employee set employee_name = '".$name."', employee_username = '".$user."', employee_password = '".$pass."', employee_tell = '".$tel."', employee_address = '".$address."' where employee_id = ".$id;
        if(mysqli_query($this->connect(), $sql)){
            echo "true";
            Header("Location:employeProfile.php");
        }else{
            echo 'update Incomplete';
           # Header("Location:employeEdit.php");
        }
    }
    public function updateBillReviewsStatus($bid){
        $sql = "UPDATE `bill` SET `reviews_status` = '1' where `bill_id` = ".$bid;
        if(mysqli_query($this->connect(), $sql)){
            echo "true";
        }else{
            echo 'update Incomplete';
        }
    }

    public function getBillById($id){
        $sql = "SELECT * FROM `bill` WHERE `employee_id` =".$id;
        return $this->connect()->query($sql);
    }
    public function getBillByCid($cid){
        $sql = "SELECT * FROM `bill` WHERE `customer_id` =".$cid;
        return $this->connect()->query($sql);
    }

    public function InsertEmployee($user,$pass,$name,$tell,$address){
        $sql = "INSERT INTO `employee`(`employee_tell`, `employee_name`, `employee_address`, `employee_username`, `employee_password`,  `employee_status`) VALUES ('".$tell."','".$name."','".$address."','".$user."','".$pass."','1')";
        echo $sql;
        if(mysqli_query($this->connect(), $sql)){
            header("Location:EditAdmin.php");
        } else {
            echo 'Insert Incomplete';
        }
    }
    public function EmployeeStatus($employee_username){
        $sql = "UPDATE `employee` SET `employee_status`= 0 WHERE employee_username ='".$employee_username."'";
        if(mysqli_query($this->connect(), $sql)){
            header("Location:EditAdmin.php");

        }else{
            echo 'update Incomplete';
        }
    }


}