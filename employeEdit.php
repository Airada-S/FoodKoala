<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขข้อมูลส่วนตัว</title>
    <link rel="stylesheet" type="text/css" href="loginCSS.css" title="style1">
</head>
<body>
<?php
include 'header.php';

require_once './ConnectDatabase.php';

$conn = new ConnectDB();
$ems = $conn->getEmployeeById($_SESSION['id']);
$em = $ems->fetch_assoc();
?>
<div class="container" >
    <div class="row d-flex justify-content-center" >
        <div class="col-8" >
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <h2 style="text-align: center; color: #EF3B3A;">ข้อมูลส่วนตัว</h2>
                    <?php if($_REQUEST['ce'] == 1){ ?>
                        <div class="alert alert-danger" role="alert">
                            Username นี้ซ้ำ
                        </div>
                    <?php } ?>
                    <form action="check.php?s=22" method="post" onsubmit="return phonenumber()">
                    <table style="width: 100%;">
                        <tbody>
                        <tr>
                            <td style="width: 20%;">ชื่อ: </td>
                            <td style="padding-right: 30px; height: 70px;"><input type="text" name="e_name" value="<?php echo $em['employee_name'] ?>" style="width: 100%; border: none; background-color: #F2F2F2; height: 50px; padding: 15px; color: #555555; padding-bottom: 20px;" id="name"></td>
                        </tr>
                        <tr>
                            <td>เบอร์โทร: </td>
                            <td style="padding-right: 30px; height: 70px;"><input type="text" name="e_tel" value="<?php echo $em['employee_tell'] ?>" style="width: 100%; border: none; background-color: #F2F2F2; height: 50px; padding: 15px; color: #555555; padding-bottom: 20px;" id="phonnumber"></td>
                        </tr>
                        <tr>
                            <td>Username: </td>
                            <td style="padding-right: 30px; height: 70px;"><input type="text" name="e_user" value="<?php echo $em['employee_username'] ?>" style="width: 100%; border: none; background-color: #F2F2F2; height: 50px; padding: 15px; color: #555555; padding-bottom: 20px;" id="username"></td>
                        </tr>
                        <tr>
                            <td>Password: </td>
                            <td style="padding-right: 30px; height: 70px;"><input type="text" name="e_pass" value="<?php echo $em['employee_password'] ?>" style="width: 100%; border: none; background-color: #F2F2F2; height: 50px; padding: 15px; color: #555555; padding-bottom: 20px;" id="password"></td>
                        </tr>
                        <tr>
                            <td>ที่อยู่: </td>
                            <td style="padding-right: 30px; height: 120px;"><textarea name="e_addr" style="width: 100%; height: 100px; border: none; background-color: #F2F2F2; padding: 15px; color: #555555; padding-bottom: 20px;"><?php echo $em['employee_address'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"><button class="btn btn-outline-warning" type="submit">บันทึกขัอมูล</button> | <a href="employeProfile.php"  type="button" class="btn btn-outline-danger" style="margin-right: 20px;">ยกเลิก</a></td>
                        </tr>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function phonenumber()
    {
        inputtxt = document.getElementById("phonnumber")
        username = document.getElementById("username")
        password = document.getElementById("password")
        nameS = document.getElementById("name")
        var phoneno = /^\(?[0]([0-9]{2})\)?[-]?([0-9]{3})[-]?([0-9]{4})$/;
        var passw=  /^[a-z0-9A-Z]{7,14}$/;
        var user = /^[A-Za-z0-9_]{4,14}$/;
        var nameformat = /^[A-Za-z0-9ก-ฮ_ะาิีึืุูเะแโั ]{2,30}$/;

        if(inputtxt.value.match(phoneno)) {
            if(password.value.match(passw)) {
                if(username.value.match(user)) {
                    if(nameS.value.match(nameformat)){
                        if(ISL.value.match(SL)){
                            if(ISO.value.match(SO)){
                                return true
                            } else{
                                alert('0 - 100 เปอร์เซนเท่านั้น');
                                return false
                            }
                        } else{
                            alert('ต้องไม่เกิน 3000');
                            return false
                        }
                    } else{
                        alert('name \n1.ต้องมีขนาด 2-14 เท่านั้น และต้องไม่มีอักขระพิเศษ ');
                        return false
                    }
                } else {
                    alert('Username ไม่ถูกต้อง \n1.ต้องมีขนาด 4-14 เท่านั้น และต้องไม่มีอักขระพิเศษ ');
                    username.focus();
                    return false;
                }
            } else {
                alert('password ไม่ถูกต้อง\n1.ต้องมี 7 ตัวขึ้นไป\n2.ต้องมีอักษรอยู่ด้วย ')
                return false;
            }
        } else {
            alert("หมายเลขโทรศัพธ์ของคุณไม่ถูกต้อง ตัวอย่างเช่น 08X-XXXXXXX,08X-XXX-XXXX");
            return false;
        }
    }
</script>
</body>
</html>
