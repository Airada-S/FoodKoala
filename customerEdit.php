<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
    include 'header.php';
    require_once './ConnectDatabase.php';
    $conn = new ConnectDB();
    $customer = $conn->getCustomer($_SESSION["id"]);
    $row = $customer->fetch_assoc();
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
                            <th scope="row">ชื่อ : </th>
                            <td><input type="text" name="name" class="form-control" style="border: none" placeholder="name" value="<?php echo $row["customer_name"]; ?>"></td>

                        </tr>
                        <tr>
                            <th scope="row">Username : </th>
                            <td><input type="text" name="username" class="form-control" style="border: none" placeholder="Username" value="<?php echo $row["customer_username"]; ?>"></td>

                        </tr>
                        <tr>
                            <th scope="row">Password : </th>
                            <td><input type="text" name="password" class="form-control" style="border: none" placeholder="Password" value="<?php echo $row["customer_password"]; ?>"></td>

                        </tr>
                        <tr>
                            <th scope="row">ที่อยู่ : </th>
                            <td><input type="text" name="address" class="form-control" style="border: none" placeholder="Address" value="<?php echo $row["customer_address"]; ?>"></td>

                        </tr>
                        <tr>
                            <th scope="row">เบอร์โทร : </th>
                            <td><input type="text" name="tel" class="form-control" style="border: none" PLACEHOLDER="Tel" value="<?php echo $row["customer_tel"]; ?>"></td>
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
