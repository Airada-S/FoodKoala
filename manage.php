
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

<div class="login-page">
    <div class="form tab-content">
                <img src="img/logo.png" width="250" height="250" class="d-inline-block align-top" alt="">
                <a href="EditAdmin.php"><button type="submit" style="margin-top: 15px" >จัดการข้อมูลพนักงาน</button></a>
                <a href="StoreApproval.php"><button style="margin-top: 15px" >อนุมัติร้านค้า</button></a>
        </div>
    </div>

</div>

</body>
</html>