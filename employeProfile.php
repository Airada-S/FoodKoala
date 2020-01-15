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
                <div class="card--body">
                    <img src="img/img-test.png" style="width: 100%">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <h2>ข้อมูลส่วนตัว</h2>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>ชื่อ: </td>
                            <td>นัด</td>
                        </tr>
                        <tr>
                            <td>เบอร์โทร: </td>
                            <td>096-0971701</td>
                        </tr>
                        <tr>
                            <td>ที่อยู่: </td>
                            <td>15/5 ม.2</td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="employeEdit.php"  type="button" class="btn btn-outline-warning float-right">แก้ไขข้อมูล</a>
                </div>
            </div>
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <h2>ประวัติการจัดส่ง</h2>
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
</div>
</body>
</html>
