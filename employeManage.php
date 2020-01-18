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
?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <h3>รายการออเดอร์</h3>
                    <div style="overflow: auto; width: 100%; height: 200px; padding: 2%">
                        <table class="table">
                            <tr>
                                <th style="border-bottom: 1px solid #E8A42A; width: 30%">ที่อยู่ที่จัดส่ง</th>
                                <th style="border-bottom: 1px solid #E8A42A; width: 30%">ร้านที่สั่ง</th>
                                <th style="border-bottom: 1px solid #E8A42A; width: 20%">วิธีชำระเงิน</th>
                                <th style="border-bottom: 1px solid #E8A42A; width: 15%">ราคารวม</th>
                                <th style="border-bottom: 1px solid #E8A42A; width: 5%"></th>
                            </tr>
                            <tr>
                                <td>นัด</td>
                                <td>ชานมแท้</td>
                                <td>ชำระเงินปลายทาง</td>
                                <td>155</td>
                                <td><a href="#" style="color: #76b852;font-size: 20px"><i class="far fa-check-square"></i></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card mt-5" style="width: 100%; text-align: center">
                <div class="card-body">
                    <h3>สถานะออเดอร์ที่รับ</h3>
                    <img src="img/img-test.png" width="100%">
                    <h3>สถานะ : </h3>
                    <button type="button" class="btn btn-outline-warning float-right">อัพเดทสถานะ</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
