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
    <div style="margin: 30px; border: 1px solid #c26f6f; width: 95%; border-radius: 5px;">
        <div style="margin: 20px;">
            <table style="margin-left: 100px; margin-right: 100px; width: 90%;">
                <tr>
                    <td colspan="3" style="text-align: right; padding-top: 10px;"><a href="ShopEdit.php"><button type="button" class="btn btn-outline-warning">แก้ไขข้อมูลผู้ใช้</button></a></td>
                </tr>
                <tr>
                    <td rowspan="4" STYLE="width: 20%;"><img src="./img/koala2.png" width="150" height="150"></td>
                    <th style="padding-left: 50px; width: 20%">
                        Username :
                    </th>
                    <td style="padding-left: 20px; border-bottom: 1px solid #E8A42A; width: 60%">
                        <?php echo $valCus["customer_username"] ?>
                    </td>
                </tr>
                <tr>
                    <th style="padding-left: 50px; width: 20%">
                        ชื่อผู้ใช้ :
                    </th>
                    <td style="padding-left: 20px; border-bottom: 1px solid #E8A42A; width: 60%">
                        <?php echo $valCus["customer_name"] ?>
                    </td>
                </tr>
                <tr>
                    <th style="padding-left: 50px; width: 20%">
                        เบอร์โทร :
                    </th>
                    <td style="padding-left: 20px; border-bottom: 1px solid #E8A42A; width: 60%">
                            <?php echo $valCus['customer_tel'] ?>
                    </td>
                </tr>
                <tr>
                    <th style="padding-left: 50px; width: 20%">
                        ยอดเงินในบัญชี :
                    </th>
                    <td style="padding-left: 20px; border-bottom: 1px solid #E8A42A; width: 60%">
                        <?php echo $valCus['customer_wallet']." บาท" ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>
                        <a class="btn btn-outline-danger btn-block float-right mt-2" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            เติมเงิน
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>
                        <div class="collapse" id="collapseExample">
                            <table class="table">
                                    <tr>
                                        <td><h3>เลขบัตร</h3></td>
                                        <td><h3>รหัส CNN</h3></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td><h3>จำนวนเงิน</h3></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control"></td>
                                    </tr>

                            </table>
                    </td>
                </tr>

            </table>
            <button type="button" class="btn btn-outline-warning">Warning</button>
        </div>
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
