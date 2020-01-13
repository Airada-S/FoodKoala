<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show</title>
</head>
<body >
<?php
    require_once './ConnectDatabase.php';
    include 'header.php';
?>
<div style="padding-top: 3%; padding-left: 20%; margin-right: 20%">
    <div class="card p-5">
    <table class="table">
        <thead>
        <tr>
            <th >จำนวน</th>
            <th >รายการ</th>
            <th style="text-align: center">ราคาต่อชิ้น</th>
            <th style="text-align: center">ราคารวม</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($_SESSION["listProduct"] as $key => $value){
               $conn = new ConnectDB();
               $product = $conn->getProductByPid($key);
               $row = $product->fetch_assoc();
        ?>
                <tr>
                    <td rowspan="2" >
                        <a  href="check.php?s=8&pid=--><?php echo $key ?>" >
                         <i class="far fa-minus-square" style="font-size: 25px;color: gold"></i>
                        </a>
                        <?php echo $value ?>
                        <a  href="check.php?s=9&pid=--><?php //echo $key ?><!--" >
                            <i class="far fa-plus-square" style="font-size: 25px;color: gold"></i>
                        </a>
                    </td>
                    <td>
                        <?php
                        echo $row["product_name"];
                        ?>
                    </td>

                    <td rowspan="2" style="text-align: center">
                        <a class="mr-1"><?php echo $row["product_price"] ?></a>
                    </td>
                    <td rowspan="2" style="text-align: center">
                        <a ><?php echo $row["product_price"]*$value ?></a>
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 0px;">
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
        </tbody>
    </table>
    </div>
</div>
<!--<div class="card m-4">-->
<!--    <div class="card-body">-->
<!--        <p class="card-text">-->
<?php
//    foreach ($_SESSION["listProduct"] as $key => $value){
//        $conn = new ConnectDB();
//        $product = $conn->getProductByPid($key);
//        $row = $product->fetch_assoc();
//
//?>
<!--    <div class="card mt-2">-->
<!--        <div class="card-body" style="font-size: 25px;">-->
<!--            <a  href="check.php?s=8&pid=--><?php //echo $key ?><!--" >-->
<!--                <i class="far fa-minus-square" style="font-size: 25px;color: gold"></i>-->
<!--            </a>-->
<!--            --><?php //echo $value ?>
<!--            <a  href="check.php?s=9&pid=--><?php //echo $key ?><!--" >-->
<!--                <i class="far fa-plus-square" style="font-size: 25px;color: gold"></i>-->
<!--            </a>-->
<!--            --><?php
//                echo $row["product_name"];
//            ?>
<!--            <div  class="float-right" href="" style="font-size: 25px;">-->
<!--                <a class="mr-1">--><?php //echo $row["product_price"] ?><!--</a>-->
<!--                <a >--><?php //echo $row["product_price"]*$value ?><!--</a>-->
<!--            </div>-->
<!--            <br>-->
<!--            --><?php
//                $seller = $conn->getSeller($row["seller_id"]);
//                $row2 = $seller->fetch_assoc();
//                echo "จากร้าน : ".$row2["seller_name"];
//            ?>
<!--        </div>-->
<!--    </div>-->
<?php
//    }
//?>
<!--        </p>-->
<!--    </div>-->
<!--</div>-->
</body>