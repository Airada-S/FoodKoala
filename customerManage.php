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
<div class="container mt-5">
    <div class="row" >
        <div class="col-sm-5"style="text-align: center">
            <div class="card" style="width: 100%;">
                <img src="img/logo.png"style="width: 100%;">
            </div>
        </div>
        <div class="col-sm-7 ">
            <div class="border border-danger" style="padding: 20px">
                <h2>ข้อมูลผู้ใช้งาน</h2>
                <table class="table" style="margin-top: 20px">
                    <tbody>
                        <tr>
                            <td style="border-top-width: 0px;">ชื่อ:</td>
                            <td style="border-top-width: 0px;">
                                <p class="font-weight-normal" id="name1"><?php echo $valCus["customer_name"] ?></p>
                                <input type="text" hidden value="<?php echo $valCus["customer_name"] ?>" id="name2">
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top-width: 0px;">เบอร์โทร:</td>
                            <td style="border-top-width: 0px;">
                                <p class="font-weight-normal" id="tel1"><?php echo $valCus["customer_tel"] ?></p>
                                <input type="text" hidden value="<?php echo $valCus["customer_tel"] ?>" id="tel2">
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top-width: 0px;">ที่อยู่:</td>
                            <td style="border-top-width: 0px;">
                                <p class="font-weight-normal" id="add1"><?php echo $valCus["customer_address"] ?></p>
                                <textarea type="text" hidden id="add2"><?php echo $valCus["customer_address"] ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top-width: 0px;"></td>
                            <td style="border-top-width: 0px;" class="float-right">
                                <button id="edit1" type="button" class="btn btn-outline-danger" onclick="editC()" > แก้ไข <i class="far fa-edit"></i></button>
                                <button id="edit2" type="button" class="btn btn-outline-success" onclick="editC()" hidden>บันทึก <i class="far fa-save"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a class="btn btn-primary " data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            เติมเงิน
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <p class="font-weight-normal" id="add1">ยอดเงินในบัญชี : <?php echo $valCus["customer_wallet"]." บาท"; ?></p>
                    </li>
                </ul>


                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form action="check.php?s=15" method="post">
                        <i class="fab fa-cc-visa" style="font-size: 40px"></i>
                        <ul class="list-inline mt-3">
                            <li class="list-inline-item" style="width: 49%">
                                <input name="visaId" type="text"placeholder=" เลขบัตร visa" style="width: 100%" value="<?php echo $valCus["comment_visaId"]; ?>">
                            </li>
                            <li class="list-inline-item" style="width: 48%">
                                <input name="visaPass" type="password" placeholder=" รหัสบัตร visa" style="width: 100%" value="<?php echo $valCus["comment_visaPass"]; ?>">
                            </li>
                        </ul>
                        <input type="text"placeholder=" จำนวนเงิน" style="width: 100%" name="wallet">
                        <button id="edit1" type="submit" class="btn btn-outline-danger mt-4"  > เติมเงิน </button>
                        </form>
                    </div>
                </div>
            </div>
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
