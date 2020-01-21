<?php
include 'header.php';
//require("SetSessionStatus.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="button.css">

</head>
<body>

<?php
require './ConnectDatabase.php';
$con = new connectDB();
if($con->connect()){
    $sql = "SELECT * FROM `employee` where employee_status = '1'";
    $objquery = mysqli_query($con->connect(), $sql);

}else{
    echo 'Connect Failed:'. mysqli_error($con->connect());
}
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<!--    <ul class="navbar-nav">-->
<!--        <li class="nav-item active">-->
<!--            <a class="nav-link" href="#">--><?php //echo $_SESSION['employee_name']; ?><!--</a>-->
<!---->
<!--        </li>-->
<!--        <li class="nav-item active">-->
<!--            <a class="nav-link" href="#">--><?php //echo "pan"?><!--</a>-->
<!---->
<!--        </li>-->
<!--        <li class="nav-item active">-->
<!--            <a class="nav-link" href="#">--><?php //echo $_SESSION['employee_address']; ?><!--</a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link" href="#">--><?php //echo $_SESSION['employee_tell']; ?><!--</a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link disabled" href="#">--><?php //echo $_SESSION['email']; ?><!--</a>-->
<!--        </li>-->
<!--    </ul>-->
</nav>
<form method="POST">
    <table>
        <tr>

            <th>ชื่อ</th>
            <th>ที่อยู่</th>
            <th>เบอร์โทร</th>
            <th>ลบพนักงาน</th>

        </tr>

        <?php
        error_reporting(~E_NOTICE );

        while ($row= mysqli_fetch_array($objquery)){


                echo "<tr>";
                echo "<td>".$row['employee_name']."</td>";
                echo "<td>".$row['employee_address']."</td>";
                echo "<td>".$row['employee_tell']."</td>";
                echo "<td><a href='check.php?s=25&user=".$row['employee_username']."'>ลบ</a></td>";
                echo "</tr>";

        }
        ?>
    </table>
    <center>
        <button class="button button1"><a href="AddEmployee.php">เพิ่มข้อมูล</a></button>
</form>
    </center>
</body>
</html>


