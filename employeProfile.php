<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include 'headerEmployee.php';
require_once './ConnectDatabase.php';

$conn = new ConnectDB();
$ems = $conn->getEmployeeById($_SESSION['id']);
$em = $ems->fetch_assoc();

$bills = $conn->getBillById($_SESSION['id']);

?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mt-5" style="width: 100%;">
                <div class="card--body" style="text-align: center;">
                    <img src="img/koala.png" style="width: 80%">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <h2 style="color: #EF3B3A">ข้อมูลส่วนตัว</h2>
                    <table class="table">
                        <tbody>
                        <tr>
                            <th style="width: 30%;">ชื่อ: </th>
                            <td><?php echo $em['employee_name'] ?></td>
                        </tr>
                        <tr>
                            <th>เบอร์โทร: </th>
                            <td><?php echo $em['employee_tell'] ?></td>
                        </tr>
                        <tr>
                            <th>ที่อยู่: </th>
                            <td><?php echo $em['employee_address'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="employeEdit.php"  type="button" class="btn btn-outline-warning float-right">แก้ไขข้อมูล</a>
                </div>
            </div>
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <h2 style="color: #EF3B3A;">ประวัติการจัดส่ง</h2>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ลูกค้า</th>
                            <th>ราคา</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            while($row = $bills->fetch_assoc()) {
                                $cuss = $conn->getCustomer($row['customer_id']);
                                $cus = $cuss->fetch_assoc();
                            ?>

                        <tr>
                            <td><?php echo $cus['customer_name'] ?></td>
                            <td><?php echo $row['bill_total'] ?></td>
                            <td><a href="#" style="color: #76b852;font-size: 20px"><i class="far fa-check-square"></i></a></td>
                        </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
