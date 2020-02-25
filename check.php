<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
require_once './ConnectDatabase.php';
$s = $_REQUEST["s"];
//echo $s;
if($s==1){
    if($_POST['username'] == 'admin' && $_POST['password'] == '1234'){
        $_SESSION['user'] = $_POST['username'];
        $_SESSION['status'] = 'admin';
    }else {
        $conn = new ConnectDB();
        $user = $conn->login($_POST['username'], $_POST['password']);
        $_SESSION['user'] = $_POST['username'];
    }
    if($_SESSION['status'] == 'employee'){
        header("Location:employeManage.php");
    }elseif($_SESSION['status'] == 'admin' || $_SESSION['status'] == 'customer' || $_SESSION['status'] == 'seller'){
        header("Location:index.php");
    }else{
        header("Location:login.php?cl=1");
    }
}elseif($s == 2){
    $pt = $_REQUEST["pt"];
    $_SESSION['page'] = 'searchByType';
    header("Location:index.php?pt=".$pt);
} elseif ($s == 3){
    $search = $_POST["Search"];
    $choice = $_POST["choice"];
    $_SESSION['page'] = $choice;
    header("Location:index.php?search=".$search);
//    echo "<br>". $_POST["choice"];

}elseif($s == 4){
    session_destroy();
    header("Location:index.php");
}elseif($s == 5){
    $id = $_REQUEST["id"];
    header("Location:seller.php?id=".$id);
}elseif($s == 6){
    $pid = $_REQUEST["pid"];
    $id = $_REQUEST["id"];

    if (array_key_exists($pid, $_SESSION["listProduct"])) {
        $_SESSION["listProduct"][$pid] += 1;
    } else {
        $_SESSION["listProduct"][$pid] = 1;
    }
//    $_SESSION["pid"] = $_SESSION["pid"].$pid."|";

    header("Location:seller.php?id=".$id);
}elseif($s == 7){
    echo $_SESSION["pid"];
//    $id = $_REQUEST["id"];
    header("Location:showProductList.php");
}elseif($s == 8){
    $pid = $_REQUEST["pid"];
    if($_SESSION["listProduct"][$pid]>=1){
        $_SESSION["listProduct"][$pid] -= 1;
    }
    if($_SESSION["listProduct"][$pid] == 0){
        unset($_SESSION["listProduct"][$pid]);
    }
    header("Location:showProductList.php");
}elseif($s == 9){
    $pid = $_REQUEST["pid"];
    $_SESSION["listProduct"][$pid] += 1;
    header("Location:showProductList.php");
}elseif ($s == 10){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];

    $con = new ConnectDB();
    $con->connect();
    $sql = "SELECT `customer_username` FROM `customer` where customer_username = '".$user."'";
    $sql2 = "SELECT `seller_username` FROM `seller` where seller_username = '".$user."' ";
    $sql3 = "SELECT `employee_username` FROM `employee` where employee_username = '".$user."' ";
    $result = mysqli_query($con->connect(),$sql);
    $result2 = mysqli_query($con->connect(),$sql2);
    $result3 = mysqli_query($con->connect(),$sql3);
    if( $result->num_rows == 0 && $result2->num_rows == 0 && $result3->num_rows == 0 ){
        $con->Insert1($user,$pass,$name,$tel,$address);
    }else{
        header("Location:register.php?cl=1");

    }
}elseif ($s == 11){
    $file = $_FILES['img2'];
    $place = "img2";
    if(move_uploaded_file($file[tmp_name],"$place/".$file[name])){

    }
    $user = $_POST['user2'];
    $pass = $_POST['pass2'];
    $name = $_POST['name2'];
    $email = $_POST['email2'];
    $tel = $_POST['tel2'];
    $address = $_POST['address2'];
    $time = $_POST['time2'];
    $img = $_POST['img2'];
    $con = new ConnectDB();
    $con->connect();
    $sql = "SELECT `customer_username` FROM `customer` where customer_username = '".$user."'";
    $sql2 = "SELECT `seller_username` FROM `seller` where seller_username = '".$user."' ";
    $sql3 = "SELECT `employee_username` FROM `employee` where employee_username = '".$user."' ";
    $result = mysqli_query($con->connect(),$sql);
    $result2 = mysqli_query($con->connect(),$sql2);
    $result3 = mysqli_query($con->connect(),$sql3);
    if( $result->num_rows == 0 && $result2->num_rows == 0 && $result3->num_rows == 0 ){
        $con->Insert2($user,$pass,$name,$tel,$address,$time,$file[name]);
    }else{
        header("Location:register.php?cl=1");
    }

}elseif ($s == 12){
    $pid = $_REQUEST['pid'];

    $name = $_POST['food'];
    $price = $_POST['price'];

    $conn = new ConnectDB();
    $conn->updateProduct($pid, $name, $price);

}elseif ($s == 13){
//    echo $_POST["bTotal"];
//    echo "<br>".$_POST["bPromo"];
//    echo "<br>".$_POST["bCost"];
    $conn = new ConnectDB();
    $bid = $conn->insertBill($_SESSION["listProduct"],$_SESSION["id"],$_POST['Cpay'],$_POST["bTotal"],$_POST["bPromo"],$_POST["bCost"]);
    if($_POST['Cpay'] == "ชำระเงินผ่าน wallet"){
        $bill = $conn->getBillBybid($bid);
        $val1 = $bill->fetch_assoc();
        $customer = $conn->getCustomer($_SESSION["id"]);
        $val2 = $customer->fetch_assoc();
        $wallet = $val2["customer_wallet"]-$val1["bill_total"];
        $conn->updateCustomerWallet($_SESSION["id"],$wallet);
    }
    $_SESSION["listProduct"] = array();
    header("Location:Oderstatus.php?bid=".$bid);
}elseif ($s == 14){
    $user = $_POST['seller_username'];
    $pass = $_POST['seller_password'];
    $name = $_POST['seller_name'];
    $addr = $_POST['seller_address'];
    $tel = $_POST['seller_tel'];
    $condition = $_POST['seller_condition'];
    $status = $_POST['seller_Promotion1'];
    $pro = $_POST['seller_pinput'];
    if($status == "เปิด"){
        $status = true;
    }else{
        $status = false;
    }
    $place = "img";
    $image = $_FILES["seller_img"];

    $conn = new ConnectDB();
    $username = $conn->selectSellerByUsername($user);
    $Img = $conn->getSeller($_SESSION['id']);
    $selImg = $Img->fetch_assoc();
    if($username->num_rows == 0 || $user == $selImg['seller_username']){
        echo 'yes';
        if($image['name'] == ""){
            $conn->updateSeller($_SESSION['id'], $user, $pass, $name, $addr, $tel, $selImg['seller_img'],$status,$pro,$condition);
        }else{
            if(move_uploaded_file($image['tmp_name'],$place.'/'.$image['name'])){
                $conn->updateSeller($_SESSION['id'], $user, $pass, $name, $addr, $tel, $image['name'],$status,$pro,$condition);

            }else{
                echo "NO compleate";
            }
        }
    }
}elseif ($s == 15){
//    echo "edit wallet<br>".$_POST["wallet"];
    $conn = new ConnectDB();
    $customer = $conn->getCustomer($_SESSION["id"]);
    $val = $customer->fetch_assoc();
    $wallet = $val["customer_wallet"]+$_POST["wallet"];
    $conn->updateCustomerWallet($_SESSION["id"],$wallet);
    $conn->updateCustomerVisa($_SESSION["id"],$_POST["visaID"],$_POST["visaPass"]);
    header("Location:customerManage.php");
}elseif ($s == 16){
    $pid = $_REQUEST['pid'];

    $conn = new ConnectDB();
    $conn->delProduct($pid);

}elseif ($s == 17){
    $pid = $_REQUEST['pid'];
    $name = $_POST['food'];
    $price = $_POST['price'];
    $type = "";
    $t = $_REQUEST['type'];
    if ($t == "food"){
        $type = "อาหาร";
    }elseif ($t == "drink"){
        $type = "เครื่องดื่ม";
    }else{
        $type = "ขนม";
    }

    $conn = new ConnectDB();
    $conn->insertProduct($_SESSION['id'], $name, $price, $type);
}elseif ($s == 18){
    $j = $_REQUEST["j"];
    echo $_REQUEST["bid"];
    $conn = new ConnectDB();
    for ($i = 0 ; $i<$j ; $i++){
        echo "<br>".$_POST["sid".$i]."<br>".$_POST["star".$i]."<br>".$_POST["detail".$i];
        $conn->insertReviews($_SESSION["id"],$_POST["sid".$i],$_POST["detail".$i],$_POST["star".$i]);
    }
    $conn->updateBillReviewsStatus($_REQUEST["bid"]);
    Header("Location:index.php");


}
elseif ($s == 19){
    $seller_username = $_POST['seller_username'];
    echo $seller_username;
    $con = new ConnectDB();
    $con->connect();
    $con->UPDATE3($seller_username);
}elseif ($s == 20){
    $_SESSION["bid"] = $_REQUEST["bid"];
    $con = new ConnectDB();
    $con->updateBillEmployeeId($_SESSION["bid"],$_SESSION["id"]);
    Header("Location:employeManage.php");
}elseif ($s == 21){
    echo $_SESSION['bt']." ".$_SESSION['bid'];
    if($_SESSION["bt"] == 'รับออเดอร์ใหม่'){
        $_SESSION['bid'] = 'null';
    }else{
        $con = new ConnectDB();
        $con->updateBillDeliverystatus($_SESSION["bid"],$_SESSION["bt"]);
    }
    echo $_SESSION['bt']." ".$_SESSION['bid'];
    Header("Location:employeManage.php");
}elseif ($s == 22){
    $name = $_POST['e_name'];
    $tel = $_POST['e_tel'];
    $user = $_POST['e_user'];
    $pass = $_POST['e_pass'];
    $addr = $_POST['e_addr'];

    $con = new ConnectDB();
    $sql = "SELECT `customer_username` FROM `customer` where customer_username = '".$user."'";
    $sql2 = "SELECT `seller_username` FROM `seller` where seller_username = '".$user."' ";
    $sql3 = "SELECT `employee_username` FROM `employee` where employee_username = '".$user."' ";
    $em = $con->getEmployeeById($_SESSION['id']);
    $valEm = $em->fetch_assoc();
    $result = mysqli_query($con->connect(),$sql);
    $result2 = mysqli_query($con->connect(),$sql2);
    $result3 = mysqli_query($con->connect(),$sql3);
    if( ($result->num_rows == 0 && $result2->num_rows == 0 && $result3->num_rows == 0 ) || $user == $valEm["employee_username"]){
        $con->updateEmployee($_SESSION['id'], $name, $user, $pass, $tel, $addr);
    }else{
        header("Location:employeEdit.php?ce=1");
    }
}
elseif ($s == 23){
    $user = $_POST['employee_user'];
    $pass = $_POST['employee_pass'];
    $name = $_POST['employee_name'];
    $tell = $_POST['employee_tell'];
    $address = $_POST['employee_add'];
    $employee_status =  1;


    $con = new ConnectDB();
    $con->connect();
    $con->EmployeeStatus($_REQUEST['user']);

    $sql = "SELECT `customer_username` FROM `customer` where customer_username = '".$user."'";
    $sql2 = "SELECT `seller_username` FROM `seller` where seller_username = '".$user."' ";
    $sql3 = "SELECT `employee_username` FROM `employee` where employee_username = '".$user."' ";
    $result = mysqli_query($con->connect(),$sql);
    $result2 = mysqli_query($con->connect(),$sql2);
    $result3 = mysqli_query($con->connect(),$sql3);
    if( $result->num_rows == 0 && $result2->num_rows == 0 && $result3->num_rows == 0 ){

        $con->InsertEmployee($user,$pass,$name,$tell,$address);
    }


}elseif ($s == 24){
    $con = new ConnectDB();
    $con->updateCustomer($_SESSION["id"],$_POST["name"],$_POST["username"],$_POST["password"],$_POST["tel"],$_POST["address"]);
    header("Location:customerManage.php");
}
elseif ($s == 25){
    echo $s;
    $con = new ConnectDB();
    $con->EmployeeStatus($_REQUEST['user']);
    header("Location:EditAdmin.php");
    }
?>
