<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include 'header.php';
?>
<div class="container" >
    <div class="row d-flex justify-content-center" >
        <div class="col-6" >
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <h2 style="text-align: center">ข้อมูลส่วนตัว</h2>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>ชื่อ: </td>
                            <td><input type="text" value="นัด"></td>
                        </tr>
                        <tr>
                            <td>เบอร์โทร: </td>
                            <td><input type="text" value="096-0971701"></td>
                        </tr>
                        <tr>
                            <td>ที่อยู่: </td>
                            <td><textarea>15/5 หม.1</textarea></td>
                        </tr>
                        </tbody>
                    </table>
                    <a href="employeEdit.php"  type="button" class="btn btn-outline-success float-right">บันถึกข้อมูล</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
