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
$bill = $conn->getbillBybid($bid);
$val = $bill->fetch_assoc();
echo "<br>".$val["bill_deliverystatus"];
?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mt-5" style="width: 100%; padding: 25px">
                <div class="card-body" style="text-align: center">
                    <p class="font-weight-light">สถานะคำสั่งซื้อของคุณ</p>
                    <h1></h1>
                    <img src="img/img-test.png" style="width: 20rem" class="mt-3">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mt-5" style="width: 100%; padding: 25px">
                <div class="card-body" style="">
                    <h3>รายละเอียดออเดอร์</h3>
                    <hr>
                    <p class="font-weight-light">ออเดอร์ของคุณจาก:</p>
                    <p class="font-weight-light">ที่อยู่สำหรับจัดส่ง:</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
