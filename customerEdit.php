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
        <div class="col-8" >
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <h3 style="text-align: center">แก้ไขข้อมูลลูกค้า</h3>
                        <table class="table mt-5">
                        <tbody>
                        <tr>
                            <th scope="row">Username</th>
                            <td><input type="text" class="form-control" style="border: none" placeholder="Username"></td>

                        </tr>
                        <tr>
                            <th scope="row">Password</th>
                            <td><input type="text" class="form-control" style="border: none" placeholder="Password"></td>

                        </tr>
                        <tr>
                            <th scope="row">Addres</th>
                            <td><input type="text" class="form-control" style="border: none" placeholder="Addre"></td>

                        </tr>
                        <tr>
                            <th scope="row">Tel</th>
                            <td><input type="text" class="form-control" style="border: none" PLACEHOLDER="Tel"></td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-outline-warning" style="text-align: center">บันทึกข้อมูล</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
