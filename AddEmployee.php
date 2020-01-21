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
    $sql = "SELECT * FROM `employee`";
    $objquery = mysqli_query($con->connect(), $sql);

}else{
    echo 'Connect Failed:'. mysqli_error($con->connect());
}
?>

<div style="padding-left: 30%; padding-right: 30%; padding-top: 3%; padding-bottom: 3%">
    <div class="border border-danger" style="padding: 10%">
    <h3 style="text-align: center">เพิ่มพนักงาน</h3>
    <form action='check.php?s=23' method='POST' onsubmit=" return checkEmployee()">
        <div class="form-group">
            <label for="exampleFormControlInput1">ชื่อพนักงาน</label>
            <input type="text" class="form-control" id="NameLast" placeholder="Name LastName" name="employee_name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">เบอร์โทรศัพ</label>
            <input type="text" class="form-control" id="PhoneNumber" placeholder="Phone Number" name="employee_tell">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">ที่อยู่</label>
            <input type="text" class="form-control" id="Address" placeholder="Address" name="employee_add">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Username</label>
            <input type="text" class="form-control" id="username" placeholder="UserName" name="employee_user">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Password</label>
            <input type="password" class="form-control" id="Password" placeholder="Password" name="employee_pass">
        </div>
        <div style="text-align: center">
            <button type="submit" name="submit" value="Register" class="btn btn-outline-warning"><i class="far fa-plus-square"></i> เพิ่มพนักงาน</button>
        </div>
    </form>
</div>
</div>
<script>

    $(document).ready(function(){
        $("#cus").click(function(){
            $("#cus1").css({"background-color": "white"});
            $("#sell").css({"background-color": "#E8A42A"});
        });
    });

    $(document).ready(function(){
        $("#sel").click(function(){
            $("#cus1").css({"background-color": "#E8A42A"});
            $("#sell").css({"background-color": "white"});
        });
    });

    $(document).ready(function(){
        $("#cus").click();
    });
    function checkEmployee() {
        let NameLast= document.getElementById("NameLast");
        let PhoneNumber = document.getElementById("PhoneNumber");
        let Address = document.getElementById("Address");
        let username = document.getElementById("username");
        let Password = document.getElementById("Password");

        if(NameLast.value == ""){
            window.alert('กรุณากรอกข้อมูล Name')
            return false
        }
        else if(PhoneNumber .value == ""){
            window.alert('กรุณากรอกข้อมูล Phone number')
            return false
        }
        else if(Address.value == ""){
            window.alert('กรุณากรอกข้อมูล Address')
            return false
        }

        else if(username.value == ""){
            window.alert('กรุณากรอกข้อมูล Username')
            return false
        }
        else if(username.value == "admin"){
            window.alert('Username ไมสามารถใช่ได้')
            return false
        }
        else if(Password.value == ""){
            window.alert('กรุณากรอกข้อมูล Password')
            return false
        }

    }
</script>
</body>
</html>


