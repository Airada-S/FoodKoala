
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>สมัครสมาชิก</title>
    <link rel="stylesheet" type="text/css" href="loginCSS.css" title="style1">

</head>
<body>
<?php
include 'header.php';
require("SetSessionStatus.php");
?>

<div class="container">
    <div class="">
        <table bgcolor="#CCCCCC" style="margin-top: 25px" cellpadding="10" border="4" bordercolor="red">


            <thead >
            <tr align="center">
                <th align="center" width="250" bgcolor="#FFFFCC">รูปร้านค้า</th>
                <th align="center" width="250" bgcolor="#FFCCCC">ชื่อร้านค้า</th>
                <th align="center" width="250" bgcolor="#99CCFF">เบอร์โทร</th>
                <th align="center" width="250" bgcolor="#7AF67A">เวลาเปิด - ปิด</th>
                <th align="center" width="250" bgcolor="#D29953">ที่อยู่ร้านค้า</th>
                <th align="center" width="250" bgcolor="#D29953">อนุมัติ</th>
            </tr>
            </thead>
            <?php
            $con = new ConnectDB();
            $sql = "SELECT * FROM `seller`";
            $result = mysqli_query($con->connect(),$sql);

            ?>
            <?php

            while($show = mysqli_fetch_array($result)){
            ?>
            <tbody>
            <tr  align="center">

                <td><?=$show['seller_img']?></td>
                <td><?=$show['seller_name']?></td>
                <td><?=$show['seller_tel']?></td>
                <td><?=$show['seller_time']?></td>
                <td><?=$show['seller_address']?></td>
                <td><button class="button button3">ยืนยัน</button></td>

            </tr><?php } ?>

            </tbody>

        </table>

        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                <th scope="col">Handle</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@twitter</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>@twitter</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>@twitter</td>
            </tr>

            </tbody>
        </table>
    </div>


</div>

</body>
</html>