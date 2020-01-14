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
                                <p class="font-weight-normal" id="name1">Ottot</p>
                                <input type="text" hidden value="Ottot" id="name2">
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top-width: 0px;">เบอร์โทร:</td>
                            <td style="border-top-width: 0px;">
                                <p class="font-weight-normal" id="tel1">096-xxxxxxx</p>
                                <input type="text" hidden value="096-xxxxxxx" id="tel2">
                            </td>
                        </tr>
                        <tr>
                            <td style="border-top-width: 0px;">ที่อยู่:</td>
                            <td style="border-top-width: 0px;">
                                <p class="font-weight-normal" id="add1">15/5 หมู่.2 ต.ในเมือง อ.เมือง จ.ชัยภูมิ</p>
                                <textarea type="text" hidden id="add2">15/5 หมู่.2 ต.ในเมือง อ.เมือง จ.ชัยภูมิ</textarea>
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
                        <p class="font-weight-normal" id="add1">ยอดเงินในบัญชี : </p>
                    </li>
                </ul>


                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <i class="fab fa-cc-visa" style="font-size: 40px"></i>
                        <ul class="list-inline">
                            <li class="list-inline-item" style="width: 47%">
                                <input type="text"placeholder=" เลขบัตรวิชา" style="width: 100%">
                            </li>
                            <li class="list-inline-item" style="width: 47%">
                                <input type="text"placeholder=" รหัสบัตรวิชา" style="width: 100%">
                            </li>
                        </ul>
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
