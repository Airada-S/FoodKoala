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
                    <h3 style=""><i class="far fa-edit"></i> แก้ไขข้อมูลลูกค้า</h3>
                    <form action="check.php?s=24" method="post">
                        <table class="table mt-4" style="margin-bottom: 0px">
                        <tbody>
                            <tr>
                                <th scope="row" style="border-top: none">ชื่อ : </th>
                                <td style="border-top: none;border-bottom: solid #E8A42A;"><input type="text" name="name" class="form-control" style="border: none" placeholder="Name" value="<?php echo $row["customer_name"]; ?>"></td>

                            </tr>
                            <tr>
                                <th scope="row" style="border-top: none">Username : </th>
                                <td style="border-top: none;border-bottom: solid #E8A42A;"><input type="text" name="username" class="form-control" style="border: none" placeholder="Username" value="<?php echo $row["customer_username"]; ?>"></td>

                            </tr>
                            <tr>
                                <th scope="row" style="border-top: none">Password : </th>
                                <td style="border-top: none;border-bottom: solid #E8A42A;"><input type="text" name="password" class="form-control" style="border: none" placeholder="Password" value="<?php echo $row["customer_password"]; ?>"></td>

                            </tr>
                            <tr>
                                <th scope="row" style="border-top: none">ที่อยู่ : </th>
                                <td style="border-top: none;border-bottom: solid #E8A42A;"><input type="text" name="address" class="form-control" style="border: none" placeholder="Address" value="<?php echo $row["customer_address"]; ?>"></td>

                            </tr>
                            <tr>
                                <th scope="row" style="border-top: none">เบอร์โทร : </th>
                                <td style="border-top: none;border-bottom: solid #E8A42A;"><input type="text" name="tel" class="form-control" style="border: none" PLACEHOLDER="Tel" value="<?php echo $row["customer_tel"]; ?>"></td>
                            </tr>
                        <tr>
                            <td colspan="2"style="border-top: none; margin-top:">  <button type="submit" class="btn btn-outline-success btn-block" style="text-align: center">บันทึกข้อมูล</button></td>
                        </tr>
                        </tbody>
                    </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
