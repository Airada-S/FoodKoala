<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
    include 'header.php';
    $bid = $_REQUEST["bid"];
    require_once './ConnectDatabase.php';
    $conn = new ConnectDB();
    $bill = $conn->getBillBybid($bid);
    $val = $bill->fetch_assoc();
    $img = "";
    if($val["bill_deliverystatus"] == "ได้รับออเดอร์แล้ว"){
        $img = "illu-received-or-preorder.gif";
    }elseif($val["bill_deliverystatus"] == "กำลังรออาหาร"){
        $img = "illu-preparing.gif";
    }elseif($val["bill_deliverystatus"] == "กำลังส่ง"){
        $img = "illu-picked-up.gif";
    }elseif($val["bill_deliverystatus"] == "ส่งสำเร็จ"){
        $img = "illu-delivered.gif";
    }
    $oder = $conn->getOrderBybid($bid);
    $sid = array();
    while($row = $oder->fetch_assoc()) {
        $product = $conn->getProductByPid($row["product_id"]);
        $valPro = $product->fetch_assoc();
        $shop = $conn->getSeller($valPro["seller_id"]);
        $valShop = $shop->fetch_assoc();
        array_push($sid,$valShop["seller_id"]);
    }
//    print_r($sid);
    $shop = $conn->selectSellerByAId($sid);
    $oder = $conn->getOrderBybid($bid);
?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card mt-5" style="width: 100%; padding: 25px">
                <div class="card-body" style="text-align: center">
                    <p class="font-weight-light">สถานะคำสั่งซื้อของคุณ</p>
                    <h2><?php echo $val["bill_deliverystatus"]; ?></h2>
                    <img src="img/<?php echo $img; ?>" style="width: 20rem" class="mt-3">
                </div>
            </div>
            <?php
            if($val["bill_deliverystatus"] == "ส่งสำเร็จ") {
                ?>
                <div class="card mt-2" style="width: 100%; padding: 25px">
                    <div class="card-body" >
                        <form action="check.php?s=18" method="post">
                        <h3 class="font-weight-light " style="text-align: center">รีวิวร้าน</h3>
                        <?php
                        $j=0;
                        while($row2 = $shop->fetch_assoc()) {
                            ?>
                        <div class="card mt-2" style="width: 100%;">
                            <div class="card-body" >

                            <h5 class="mt-2"><?php echo "ร้าน : ".$row2["seller_name"]; ?></h5>
                            <input type="hidden" name = "sid<?php echo $j; ?>" value="<?php echo $row2["seller_id"]?>">
                            <input type="hidden" id = "star<?php echo $j; ?>" value="0" name = "star<?php echo $j; ?>">
                            <?php
                            for($i=1 ; $i<=5 ; $i++) {
                                ?>
                                <a onclick="clickStar( <?php echo $i ?> , <?php echo $j ?> )"><i class="far fa-star" style="font-size: 25px;color: gold" id="<?php echo $j ?>star<?php echo $i ?>"></i></a>
                                <?php
                            }
                            ?>
                                <textarea name="detail<?php echo $j; ?>" class="form-control mb-1 mt-2" style="border-color: #b85252" placeholder="ตัวอย่างเช่น : อาหารอร่อยมาก"></textarea>
                            </div>
                        </div>
                            <?php
                        $j++;
                        }
                            ?><input type="hidden" value="<?php echo $j; ?>" name="j">
                            <button type="submit" class="btn btn-outline-danger float-right mt-2" style="width: 20%">รีวิว</button>
                        </form>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="col-6">
            <div class="card mt-5" style="width: 100%; padding: 25px">
                <div class="card-body" style="">
                    <h3>รายละเอียดออเดอร์</h3>
                    <hr>
                    <p class="font-weight-light">
                        ออเดอร์ของคุณจาก:<br>
                    <table class="table" >
                        <tbody>
                        <?php
//                            $sumall = 0;
                            while($row = $oder->fetch_assoc()) {
//                                $sumall += $row["order_sumprice"];
                                $product = $conn->getProductByPid($row["product_id"]);
                                $val2 = $product->fetch_assoc();
                        ?>
                        <tr>
                            <td rowspan="2" style="border: 0px;padding: 0px;padding-top: 12px">
                                <?php echo $row["order_amount"]."    x"; ?>
                            </td>
                            <td style="border: 0px;padding-left: 0px;padding-bottom: 0px">
                                <?php echo $val2["product_name"]; ?>
                            </td>
                            <td rowspan="2" style="border: 0px" class="float-right">
                                <?php echo $row["order_sumprice"]." บาท"; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 0px;padding: 0px">
                                <?php
                                $seller = $conn->getSeller($val2["seller_id"]);
                                $row2 = $seller->fetch_assoc();
                                echo "จากร้าน : ".$row2["seller_name"];
                                ?>
                            </td>
                        <?php
                            }
                        ?>
                        <tr>
                            <td colspan="2">ยอดรวม</td>
                            <td class="float-right"><?php echo $val["bill_total"]." บาท"; ?></td>
                        </tr>
                        </tbody>
                    </table>
                    </p>
                    <p class="font-weight-light">
                        ที่อยู่สำหรับจัดส่ง:<br>
                        <?php
                            $customer = $conn->getCustomer($_SESSION["id"]);
                            $val3 = $customer->fetch_assoc();
                            echo $val3["customer_address"];
                        ?>
                    </p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function clickStar(n,j) {
        document.getElementById(j+"star1").className = "far fa-star";
        document.getElementById(j+"star2").className = "far fa-star";
        document.getElementById(j+"star3").className = "far fa-star";
        document.getElementById(j+"star4").className = "far fa-star";
        document.getElementById(j+"star5").className = "far fa-star";
        document.getElementById("star"+j).value = n;
        for(var i=1;i<=n;i++){
            document.getElementById(j+"star"+i).className = "fas fa-star";
        }
    }

</script>
</body>
</html>
