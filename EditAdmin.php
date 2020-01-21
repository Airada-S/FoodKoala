<?php
include 'header.php';
//require("SetSessionStatus.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
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
<div style="padding-right: 20%; padding-left: 20%; padding-top: 5%">
    <h3><i class="fas fa-list-ul"></i> รายชื่อพนักงาน</h3>
    <form method="POST" style="margin-top: 20px">
        <table class="table">
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
        <div style="text-align: center">
            <button class="btn btn-outline-warning" type="button" style="width: 20%"><a href="AddEmployee.php" ><i class="far fa-plus-square"></i> เพิ่มพนักงาน</a></button>
        </div>
    </form>
</div>
</body>
</html>


