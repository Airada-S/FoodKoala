<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
    include 'headerEmployee.php';
?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <h3>รายการออเดอร์</h3>
                    <div style="overflow: auto; width: 100%; height: 200px; padding: 2%">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ลูกค้า</th>
                                <th>ร้านค้า</th>
                                <th>ราคา</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>นัด</td>
                                <td>ชานมแท้</td>
                                <td>60</td>
                                <td><a href="#" style="color: #76b852;font-size: 20px"><i class="far fa-check-square"></i></a></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
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
