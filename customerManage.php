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
    $valCus = $customer->fetch_assoc();
?>
<div style="padding-top: 40px; padding-left: 300px; padding-right: 300px;">
    <div style="margin: 30px; border: 1px solid #c26f6f; width: 95%; border-radius: 5px; padding: 20px">
        <table class="table" style="margin-bottom: 0px">
            <tbody>
            <tr >
                <td colspan="2" style="border-top: none">
                    <h3>
                        <i class="fas fa-address-card"></i> ข้อมูลส่วนตัว  <a href="customerEdit.php" class="float-right"><button type="button" class="btn btn-outline-warning">แก้ไขข้อมูลผู้ใช้</button></a>
                    </h3>
                </td>
            </tr>
            <tr>
                <th style="width: 20%; border-top: none">
                            Username :
                </th>
                <td style="padding-left: 20px;border-bottom: solid #E8A42A; width: 60%; border-top: none"><?php echo $valCus["customer_username"] ?>
                </td>
            </tr>
            <tr>
                <th style="width: 20%; border-top: none">
                    ชื่อผู้ใช้ :
                </th>
                <td style="padding-left: 20px;border-bottom: solid #E8A42A; width: 60%; border-top: none">
                    <?php echo $valCus["customer_name"] ?>
                </td>
            </tr>
            <tr>
                <th style="width: 20%; border-top: none">
                           เบอร์โทร :
                </th>
                <td style="padding-left: 20px;border-bottom: solid #E8A42A; width: 60%; border-top: none">
                    <?php echo $valCus['customer_tel'] ?>
                </td>
            </tr>
            <tr>
                <th style="width: 20%; border-top: none">
                    ยอดเงินในบัญชี :
                </th>
                <td style="padding-left: 20px; border-bottom: solid #E8A42A; width: 60%; border-top: none">
                    <?php echo $valCus['customer_wallet']." บาท" ?>
                </td>
                   </tr>
            <tr>
                <td colspan="2" style="border-top: none">
                    <a class="btn btn-outline-danger btn-block mt-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        เติมเงิน
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="collapse" id="collapseExample">
            <table class="table">
                <form action="check.php?s=15" method="post">
                    <tr>
                        <td><h5>เลขบัตร</h5></td>
                        <td><h5>รหัส CVC</h5></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="visaID" value="<?php echo $valCus['comment_visaId']; ?>"></td>
                        <td><input type="text" class="form-control" name="visaPass" value="<?php echo $valCus['comment_visaPass']; ?>"></td>
                    </tr>
                    <tr>
                        <td><h5>จำนวนเงิน</h5></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="wallet"></td>
                        <td>บาท</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center"><button type="submit" class="btn btn-outline-warning">ยืนยันการเติมเงิน</button></td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
</div>
<div style="padding-left: 300px; padding-right: 300px;">
    <div style="margin: 30px; border: 1px solid #c26f6f; width: 95%; border-radius: 5px; padding: 20px">
        <table style="width: 100%;" class="table">
            <tr>
                <td colspan="3">
                    <h3><i class="fas fa-history"></i> ประวัติการสั่งซื้อ</h3>
                </td>
            </tr>
            <tr>
                <th>ร้านค้า</th>
                <th>ราคา</th>
                <th>สถานะ</th>
            </tr>
            <tr>
                <td>Name Shop</td>
                <td>3055 บ.</td>
                <td>ทำรายการเสร็จสิ้น</td>
                <td style="color: #76b852"><i class="fas fa-calendar-day"></i> รายละเอียดเพิ่มเติ่ม</td>
            </tr>
            <tr>
                <td>Name Shop</td>
                <td>3055 บ.</td>
                <td>ทำรายการเสร็จสิ้น</td>
                <td style="color: #76b852"><i class="fas fa-calendar-day"></i> รายละเอียดเพิ่มเติ่ม</td>
            </tr>
        </table>
    </div>
</div>


</body>
</html>
<script>
    let statusedit = false;
    function editC() {
        const name1 = document.getElementById("name1");
        const name2 = document.getElementById("name2");
        const tel1 = document.getElementById("tel1");
        const tel2 = document.getElementById("tel2");
        const add1 = document.getElementById("add1");
        const add2 = document.getElementById("add2");
        const edit1 = document.getElementById("edit1");
        const edit2 = document.getElementById("edit2");

        if (statusedit == true) {
            name1.hidden = false;
            name2.hidden = true;
            tel1.hidden = false;
            tel2.hidden = true;
            add1.hidden = false;
            add2.hidden = true;
            edit1.hidden = false;
            edit2.hidden = true;
            statusedit = false;
        } else {
            name1.hidden = true;
            name2.hidden = false;
            tel1.hidden = true;
            tel2.hidden = false;
            add1.hidden = true;
            add2.hidden = false;
            edit1.hidden = true;
            edit2.hidden = false;
            statusedit = true;
        }
    }
</script>
