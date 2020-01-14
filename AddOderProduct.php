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
                    <div class="card" style="width: 50%; border-color: #e06c6c;">
                        <div STYLE="text-align: end;padding-top: 10px;padding-left: 10px;padding-right: 10px;">
                              <a href="#" style="color: #e06c6c"><i class="far fa-edit"></i></a>
<!--                              <a href="#" style="color: #e06c6c"><i class="far fa-trash-alt"></i></a>-->
                        </div>
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
                            <a href="#" style="color: #e06c6c; margin-right: ">แก้ไข  <i class="far fa-edit"></i></a>
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
                        <?php echo $row["customer_wallet"]; ?>
                         บาท
                    </a>
                    <ul class="list-inline" style="text-align: center;margin-top: 10px">
                        <li class="list-inline-item">
                            <button class="btn btn-outline-danger" onclick="money()">
                                <a ><img src="img/logo.png" style="width: 10rem; height: 10rem;" ></a>
                                <p class="font-weight-normal mt-3">ชำระด้วยเงินสด</p>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            <button class="btn btn-outline-danger" onclick="wallet()">
                            <a><img src="img/coin.png" style="width: 10rem; height: 10rem;" ></a>
                            <p class="font-weight-normal mt-3">ชำระด้วยเงิน Wallet</p>
                            </button>
                        </li>
                    </ul>

                    <button type="button" class="btn btn-outline-danger btn-lg btn-block">สั่งอาหาร</button>
                </div>
            </div>
        </div>
        <div class="col-6" >
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="font-weight-normal" style="text-align: center">รายการออเดอร์ของคุณ</h5>
                    <table class="table" >
                        <tbody >
                    <?php
                        $sumall = 0;
                        foreach ($_SESSION["listProduct"] as $key => $value) {
                            $conn = new ConnectDB();
                            $product = $conn->getProductByPid($key);
                            $row = $product->fetch_assoc();
                            $sumall += $row["product_price"] * $value;

                    ?>
                            <tr>
                                <td rowspan="2" style="border: 0px;padding: 0px;padding-top: 12px">
                                    <?php echo $value."    x"; ?>
                                </td>
                                <td style="border: 0px;padding-left: 0px;padding-bottom: 0px">
                                    <?php echo $row["product_name"]; ?>
                                </td>
                                <td rowspan="2" style="border: 0px">
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
                                <td><?php echo $sumall." บาท"; ?></td>
                            </tr>
                            <th>

                            </th>
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
    var pay="";
    function money() {
        pay = 'money';
    }
    function wallet() {
        pay = 'wallet';
    }

</script>
</body>
</html>