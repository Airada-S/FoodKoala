<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bill</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
    include 'header.php';
    require_once './ConnectDatabase.php';
    $conn = new ConnectDB();
    $customer = $conn->getCustomer($_SESSION["id"]);
    $row = $customer->fetch_assoc();
?>
<div class="container">
    <div class="row" style="margin-top: 10%" >
        <div class="col-6" >
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h1 style="width: 3rem; height: 3rem; background-color: #b87070; text-align: center">1</h1>
                        </li>
                        <li class="list-inline-item">
                            <h2 class="card-title">รายละเอียดการจัดส่ง</h2>
                        </li>
                    </ul>
                    <h5 class="card-title">เลือกเวลาส่งอาหาร</h5>
                    <select id="date">
                        <option></option>
                    </select>
                    <input type="time" style="width: 45%;">
                    <h5 class="card-title mt-5">ที่อยู่สำหรับจัดส่ง</h5>
                    <div class="card" style="width: 75%; border-color: #e06c6c;padding: 5%">

                        <div class="card-body" style="padding: 5px 10px 10px;">
                            <?php echo $row["customer_address"]; ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h1 style="width: 3rem; height: 3rem; background-color: #b87070; text-align: center">2</h1>
                        </li>
                        <li class="list-inline-item" style="margin-right: 40%">
                            <h2 class="card-title">ข้อมูลส่วนตัว</h2>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" style="color: #e06c6c; margin-right: "></a>
                        </li>
                    </ul>
                    <?php echo $row["customer_name"]."<br>".$row["customer_tel"]; ?>
                </div>
            </div>
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h1 style="width: 3rem; height: 3rem; background-color: #b87070; text-align: center">3</h1>
                        </li>
                        <li class="list-inline-item">
                            <h2 class="card-title">การชำระเงิน</h2>
                        </li>
                    </ul>
                    <a style="margin-bottom: 100px">
                        ยอดเงินคงเหลือใน Wallet ของคุณ :
                        <a id="yourWallet"><?php echo $row["customer_wallet"]; ?></a>
                         บาท
                    </a>
                    <ul class="list-inline" style="text-align: center;margin-top: 10px">
                        <li class="list-inline-item">
                            <button class="btn btn-outline-danger" onclick="money()">
                                <a  id = "bt"><img src="img/money.png" style="width: 10rem; height: 10rem;" ></a>
                                <p class="font-weight-normal mt-3">ชำระด้วยเงินสด</p>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            <button class="btn btn-outline-danger" onclick="return wallet()">
                            <a><img src="img/coin.png" style="width: 10rem; height: 10rem;" ></a>
                            <p class="font-weight-normal mt-3">ชำระด้วยเงิน Wallet</p>
                            </button>
                        </li>
                    </ul>
                    <form action="check.php?s=13" method="post" onsubmit="setBillValue()">
                        <input type="hidden" id="Cpay" name="Cpay"value=""/>
                        <input type="hidden" id="bTotal" name="bTotal"value=""/>
                        <input type="hidden" id="bPromo" name="bPromo"value=""/>
                        <input type="hidden" id="bCost" name="bCost"value=""/>
                        <button class="btn btn-outline-danger btn-lg btn-block" type="submit">สั่งอาหาร</button >
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6" >
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="font-weight-normal" style="text-align: center">รายการออเดอร์ของคุณ</h5>
                    <?php
                    $sid = array();
                    foreach ($_SESSION["listProduct"] as $key => $value) {
                        $product = $conn->getProductByPid($key);
                        $valPro = $product->fetch_assoc();
                        $arr = array($valPro["seller_id"] => 0);
                        $sid = $sid+$arr;
                    }
                    //print_r($sid);
                    ?>
                    <table class="table" >
                        <tbody >
                    <?php

                        foreach ($_SESSION["listProduct"] as $key => $value) {
                            $conn = new ConnectDB();
                            $product = $conn->getProductByPid($key);
                            $row = $product->fetch_assoc();
                            $sid[$row["seller_id"]] = $sid[$row["seller_id"]]+($row["product_price"] * $value);


                    ?>
                            <tr>
                                <td rowspan="2" style="border: 0px;padding: 0px;padding-top: 12px">
                                    <?php echo $value."    x"; ?>
                                </td>
                                <td style="border: 0px;padding-left: 0px;padding-bottom: 0px">
                                    <?php echo $row["product_name"]; ?>
                                </td>
                                <td rowspan="2" style="border: 0px" class="float-right">
                                    <?php echo $row["product_price"]*$value." บาท"; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="border: 0px;padding: 0px">
                                    <?php
                                    $seller = $conn->getSeller($row["seller_id"]);
                                    $row2 = $seller->fetch_assoc();
                                    echo "จากร้าน : ".$row2["seller_name"];
                                    ?>
                                </td>
                            </tr>

                    <?php
                        }
                    ?>

                            <tr>
                                <td colspan="2">ยอดรวม</td>
                                <td class="float-right"><?php echo array_sum($sid)." บาท"; ?></td>
                            </tr>
                            <tr>
                                <td colspan="3" style="padding-bottom: 0px">ส่วนลด</td>
                            </tr>
                    <?php
                    $discount = 0;
                    foreach ($sid as $key => $value) {
                        $sells = $conn->getSeller($key);
                        $sell = $sells->fetch_assoc();
                        $discount = $discount+($value*$sell["seller_Promotion"]/100);
                        ?>
                            <tr>
                                <td style="border: 0px;padding: 0px"></td>
                                <td style="border: 0px;padding: 0px">
                                    <?php echo "จากร้าน : ".$sell["seller_name"]; ?>
                                </td>
                                <td class="float-right" style="border: 0px;padding-bottom: 0px;padding-top: 0px"><?php echo ($value*$sell["seller_Promotion"]/100)." บาท"; ?></td>
                            </tr>
                    <?php } ?>
                    <input type="hidden" id="sumPromo" name="sumPromo" value="<?php echo $discount; ?>"/>
                            <tr>
                                <td colspan="2" style="border: 0px;padding-top: 0px">ค่าจัดส่ง</td>
                                <td style="border: 0px;padding-top: 0px" class="float-right">
                                    <a id = "cost">
                                    <?php
                                    $cost = 0;
                                        if(array_sum($sid)-$discount < 500){
                                            $cost = 50;
                                        }
                                        echo $cost;
                                    ?>
                                    </a>
                                     บาท
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">ยอดสุทธิ</td>
                                <td class="float-right"><a id = "sum"><?php echo $cost+array_sum($sid)-$discount ?></a> บาท</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $("#bt").click();
    });
    let tomorrow = new Date();
    const x = document.getElementById("date");
    let date;
    var months = ["January", "February", "March", "April", "May", "June", "July",
        "August", "September", "October", "November", "December"];
    const option = document.createElement("option");
    date = tomorrow.getDate()+"/"+months[tomorrow.getMonth()]+"/"+tomorrow.getFullYear();
    option.text = date;
    x.add(option);
    for (let i = 1; i < 5; i++) {
        const option = document.createElement("option");
        tomorrow.setDate(tomorrow.getDate() + 1);
        date = tomorrow.getDate()+"/"+months[tomorrow.getMonth()]+"/"+tomorrow.getFullYear();
        option.text = date;
        x.add(option);
    }
    document.getElementById("date").selectedIndex = "1";
    var cp = document.getElementById("Cpay");
    var pay="";
    function money() {
        pay = 'cash';
        cp.value = 'ชำระเงินปลายทาง';
    }
    function wallet() {
        var yourWallet = document.getElementById("yourWallet").textContent;
        var sum = document.getElementById("sum").textContent;
        // window.alert(yourWallet-sum);
        if(yourWallet-sum < 0){
            window.alert("ยอดเงินของตุณไม่พอสำหรับการใช้บริการกรุณาเติมเงินก่อนทำรายการ");
            return false;
        }else {
            pay = 'wallet';
            cp.value = 'ชำระเงินผ่าน wallet';
            return true;
        }
    }
    function setBillValue(){
        var bt = document.getElementById("bTotal");
        var sum = document.getElementById("sum").textContent;
        bt.value = sum;
        var bp = document.getElementById("bPromo");
        var sumPro = document.getElementById("sumPromo");
        bp.value = sumPro.value;
        var bc = document.getElementById("bCost");
        var cost = document.getElementById("cost").textContent;
        if(cost == 50){
            bc.value = 1;
        }else {
            bc.value = 0;
        }

    }
</script>
</body>
</html>