<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
    include 'header.php';
    require_once './ConnectDatabase.php';
    $conn = new ConnectDB();
    $bills = $conn->getBill();
    if(!isset($_SESSION['bid'])){
        $_SESSION['bid'] = 'null';
    }
?>
<!--<div class="container">-->
<div STYLE="margin-right: 15%;margin-left: 15%">
    <div class="row">
        <div class="col-8">
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <h3>รายการออเดอร์</h3>
                    <div style="overflow: auto; width: 100%; padding: 2%">
                        <table>
                            <tr>
                                <th style="border-bottom: 1px solid #E8A42A; width: 30%;padding: 2px">ที่อยู่ที่จัดส่ง</th>
                                <th style="border-bottom: 1px solid #E8A42A; width: 30%;padding: 2px">ร้านที่สั่ง</th>
                                <th style="border-bottom: 1px solid #E8A42A; width: 20%;padding: 2px">วิธีชำระเงิน</th>
                                <th style="border-bottom: 1px solid #E8A42A; width: 12%;padding: 2px">ราคารวม</th>
                                <th style="border-bottom: 1px solid #E8A42A; width: 8%;padding: 2px"></th>
                            </tr>
                            <?php
                            while ($detBill = $bills->fetch_assoc()){
                                $customer = $conn->getCustomer($detBill["customer_id"]);
                                $detCus = $customer->fetch_assoc();
                                $order = $conn->getOrderBybid($detBill["bill_id"]);
                                $sid = array();
                                while($row = $order->fetch_assoc()) {
                                    $product = $conn->getProductByPid($row["product_id"]);
                                    $valPro = $product->fetch_assoc();
                                    array_push($sid,$valPro["seller_id"]);
                                }
                                $shop = $conn->selectSellerByAId($sid);
                                $nameShop = "";
                                $i=0;
                                while($varShop = $shop->fetch_assoc()) {
                                    if($i == 0){
//                                        echo $varShop["seller_name"].$i;
                                        $nameShop = $nameShop.$varShop["seller_name"];
//                                        echo "<br>".$nameShop;
                                    }else{
                                        $nameShop = $nameShop." , ".$varShop["seller_name"];
                                    }
                                    $i+=1;
                                }
                            ?>
                            <tr>
                                <td style="border-bottom: 1px solid #E8A42A;padding: 3px"><?php echo $detCus["customer_address"]; ?></td>
                                <td style="border-bottom: 1px solid #E8A42A;padding: 3px"><?php echo $nameShop; ?></td>
                                <td style="border-bottom: 1px solid #E8A42A;padding: 3px"><?php echo $detBill["bill_pay"]; ?></td>
                                <td style="border-bottom: 1px solid #E8A42A;text-align: right;padding: 3px"><?php echo $detBill["bill_total"]; ?></td>
                                <td style="border-bottom: 1px solid #E8A42A;text-align: right;padding: 3px">
                                    <?php if($_SESSION['bid'] == 'null') {?>
                                    <a href="check.php?s=20&bid=<?php echo $detBill["bill_id"]; ?>" style="color: #76b852;font-size: 20px"><i class="far fa-check-square"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if($_SESSION['bid'] == 'null'){
                $img = "img-test.png";
                $_SESSION['bt'] = 'อัพเดทสถานะ';
            }else{
                $bill = $conn->getBillBybid($_SESSION["bid"]);
                $val = $bill->fetch_assoc();
                if($val["bill_deliverystatus"] == "ได้รับออเดอร์แล้ว"){
                    $img = "illu-received-or-preorder.gif";
                    $_SESSION['bt'] = 'กำลังรออาหาร';
                }elseif($val["bill_deliverystatus"] == "กำลังรออาหาร"){
                    $img = "illu-preparing.gif";
                    $_SESSION['bt'] = 'กำลังส่ง';
                }elseif($val["bill_deliverystatus"] == "กำลังส่ง"){
                    $img = "illu-picked-up.gif";
                    $_SESSION['bt'] = 'ส่งสำเร็จ';
                }elseif($val["bill_deliverystatus"] == "ส่งสำเร็จ"){
                    $img = "illu-delivered.gif";
                    $_SESSION['bt'] = 'รับออเดอร์ใหม่';
                }

            }
        ?>
        <div class="col-4">
            <div class="card mt-5" style="width: 100%; text-align: center">
                <div class="card-body">
                    <h3>สถานะออเดอร์ที่รับ</h3>
                    <img src="img/<?php echo $img; ?>" width="100%">
                    <?php
                    if($_SESSION['bid'] != 'null'){
                        $cus = $conn->getCustomer($val["customer_id"]);
                        $valCus = $cus->fetch_assoc();
                        ?>
                        <h3>สถานะ : <?php echo $val["bill_deliverystatus"]; ?></h3>
                        <h5 style="text-align: left;margin-left: 10px;margin-top: 20px">
                            ผู้รับ : <?php echo $valCus["customer_name"]; ?><br>
                            โทร : <?php echo $valCus["customer_tel"]; ?><br>
                            จัดส่งที่ : <?php echo $valCus["customer_address"]; ?>
                        </h5>
                        <?php
                    }
                    ?>
                    <form action="check.php?s=21" method="post">
                    <button type="submit" class="btn btn-outline-warning float-right"><?php echo $_SESSION["bt"]; ?></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
