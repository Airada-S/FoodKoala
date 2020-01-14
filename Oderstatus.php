<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>จัดการร้านค้า</title>
</head>
<body>
<?php
    include 'header.php';
    $bid = $_REQUEST["bid"];
    require_once './ConnectDatabase.php';
    $conn = new ConnectDB();
    $bill = $conn->getBillBybid($bid);
    $val = $bill->fetch_assoc();
    $img = "";
    if($val["bill_deliverystatus"] == "ได้รับออเดอร์แล้ว"){
        $img = "illu-received-or-preorder.gif";
    }elseif($val["bill_deliverystatus"] == "กำลังรออาหาร"){
        $img = "illu-preparing.gif";
    }elseif($val["bill_deliverystatus"] == "กำลังส่ง"){
        $img = "illu-picked-up.gif";
    }elseif($val["bill_deliverystatus"] == "ส่งสำเร็จ"){
        $img = "illu-delivered.gif";
    }
    $oder = $conn->getOrderBybid($bid);
?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mt-5" style="width: 100%; padding: 25px">
                <div class="card-body" style="text-align: center">
                    <p class="font-weight-light">สถานะคำสั่งซื้อของคุณ</p>
                    <h2><?php echo $val["bill_deliverystatus"]; ?></h2>
                    <img src="img/<?php echo $img; ?>" style="width: 20rem" class="mt-3">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mt-5" style="width: 100%; padding: 25px">
                <div class="card-body" style="">
                    <h3>รายละเอียดออเดอร์</h3>
                    <hr>
                    <p class="font-weight-light">
                        ออเดอร์ของคุณจาก:<br>
                    <table class="table" >
                        <tbody>
                        <?php
                            $sumall = 0;
                            while($row = $oder->fetch_assoc()) {
                                $sumall += $row["order_sumprice"];
                                $product = $conn->getProductByPid($row["product_id"]);
                                $val2 = $product->fetch_assoc();
                        ?>
                        <tr>
                            <td rowspan="2" style="border: 0px;padding: 0px;padding-top: 12px">
                                <?php echo $row["order_amount"]."    x"; ?>
                            </td>
                            <td style="border: 0px;padding-left: 0px;padding-bottom: 0px">
                                <?php echo $val2["product_name"]; ?>
                            </td>
                            <td rowspan="2" style="border: 0px" class="float-right">
                                <?php echo $row["order_sumprice"]." บาท"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 0px;padding: 0px">
                                <?php
                                $seller = $conn->getSeller($val2["seller_id"]);
                                $row2 = $seller->fetch_assoc();
                                echo "จากร้าน : ".$row2["seller_name"];
                                ?>
                            </td>
                        <?php
                            }
                        ?>
                        <tr>
                            <td colspan="2">ยอดรวม</td>
                            <td class="float-right"><?php echo $val["bill_total"]." บาท"; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    </p>
                    <p class="font-weight-light">
                        ที่อยู่สำหรับจัดส่ง:<br>
                        <?php
                            $customer = $conn->getCustomer($_SESSION["id"]);
                            $val3 = $customer->fetch_assoc();
                            echo $val3["customer_address"];
                        ?>
                    </p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
