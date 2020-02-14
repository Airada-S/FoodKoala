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
    $bills = $conn->getBillByCid($_SESSION["id"]);
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
                <form action="check.php?s=15" method="post" ONSUBMIT="return chackFormatMony()">
                    <tr>
                        <td><h5>เลขบัตร</h5></td>
                        <td><h5>รหัส CVC</h5></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="visaID" value="<?php echo $valCus['comment_visaId']; ?>" id="passATM"></td>
                        <td><input type="text" class="form-control" name="visaPass" value="<?php echo $valCus['comment_visaPass']; ?>" id="passCVC"></td>
                    </tr>
                    <tr>
                        <td><h5>จำนวนเงิน</h5></td>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" name="wallet" id="passMonny"></td>
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
                <th>ราคารวม</th>
                <th>สถานะ</th>
            </tr>
            <?php
            while ($valbill = $bills->fetch_assoc()) {
                $order = $conn->getOrderBybid($valbill["bill_id"]);
                $sid = array();
                while ($row = $order->fetch_assoc()) {
                    $product = $conn->getProductByPid($row["product_id"]);
                    $valPro = $product->fetch_assoc();
                    array_push($sid, $valPro["seller_id"]);
                }
//                print_r($sid);
                $shop = $conn->selectSellerByAId($sid);
                $nameShop = "";
                $i = 0;
                while ($valShop = $shop->fetch_assoc()) {
                    if ($i == 0) {
                        $nameShop = $nameShop . $valShop["seller_name"];
                    } else {
                        $nameShop = $nameShop . " , " . $valShop["seller_name"];
                    }
                    $i++;
                }
                ?>
                <tr>
                    <td><?php echo $nameShop; ?></td>
                    <td><?php echo $valbill["bill_total"]; ?></td>
                    <td><?php echo $valbill["bill_deliverystatus"]; ?></td>
                    <td><a style="color: #76b852" href="Oderstatus.php?bid=<?php echo $valbill["bill_id"]; ?>"><i class="fas fa-calendar-day"></i> รายละเอียดเพิ่มเติ่ม</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>


</body>
</html>
<script>
    let statusedit = false;
    function chackFormatMony() {
        passATM1 = document.getElementById("passATM")
        passCVC1 = document.getElementById("passCVC")
        passMonny1 = document.getElementById("passMonny")
        var passATM=  /^[0-9]{16}$/;
        var passCVC=  /^[0-9]{3,4}$/;
        var passMonny=  /^[0-9]{3,5}$/;
        if(passATM1.value.match(passATM)){
            if(passCVC1.value.match(passCVC)){
                if(passMonny1.value.match(passMonny)){
                    return true
                } else{
                    alert('จำนวนเงินไม่ถูกต้อง กรุณาใส่เฉพาะตัวเลข 100-10000 บาท');
                    return false
                }
            } else{
                alert('รหัสบัตร CVC ไม่ถูกต้อง');
                return false
            }
        } else{
            alert('เลขบัตรไม่ถูกต้อง');
            return false
        }
    }
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
