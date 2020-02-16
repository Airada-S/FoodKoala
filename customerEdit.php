<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="ISO-8859-1">
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
                    <form action="check.php?s=24" method="post" onsubmit="return phonenumber()">
                        <table class="table mt-4" style="margin-bottom: 0px">
                        <tbody>
                            <tr>
                                <th scope="row" style="border-top: none">ชื่อ : </th>
                                <td style="border-top: none;border-bottom: solid #E8A42A;"><input type="text" name="name" id="name" class="form-control" style="border: none" placeholder="Name" value="<?php echo $row["customer_name"]; ?>"></td>

                            </tr>
                            <tr>
                                <th scope="row" style="border-top: none">Username : </th>
                                <td style="border-top: none;border-bottom: solid #E8A42A;"><input type="text" name="username" id="username" class="form-control" style="border: none" placeholder="Username" value="<?php echo $row["customer_username"]; ?>"></td>

                            </tr>
                            <tr>
                                <th scope="row" style="border-top: none">Password : </th>
                                <td style="border-top: none;border-bottom: solid #E8A42A;"><input type="text" name="password" id="password" class="form-control" style="border: none" placeholder="Password" value="<?php echo $row["customer_password"]; ?>"></td>

                            </tr>
                            <tr>
                                <th scope="row" style="border-top: none">ที่อยู่ : </th>
                                <td style="border-top: none;border-bottom: solid #E8A42A;"><input type="text" name="address" class="form-control" style="border: none" placeholder="Address" value="<?php echo $row["customer_address"]; ?>"></td>

                            </tr>
                            <tr>
                                <th scope="row" style="border-top: none">เบอร์โทร : </th>
                                <td style="border-top: none;border-bottom: solid #E8A42A;"><input type="text" id="phonnumber" name="tel" class="form-control" style="border: none" PLACEHOLDER="Tel" value="<?php echo $row["customer_tel"]; ?>"></td>
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
