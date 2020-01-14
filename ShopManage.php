<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>จัดการร้านค้า</title>
</head>
<body>
<?php
include 'header.php';
require_once './ConnectDatabase.php';

$conn = new ConnectDB();
?>
<div style="padding-top: 40px; padding-left: 150px; padding-right: 150px;">
    <div style="margin: 30px; border: 1px solid #c26f6f; width: 95%; border-radius: 5px;">
        <div style="margin: 20px;">
            <table style="margin-left: 100px; margin-right: 100px; width: 90%;">
                <tr>
                    <td rowspan="4" STYLE="width: 20%;"><img src="./img/logo.png" width="200" height="200"></td>
                    <th style="padding-left: 50px; width: 20%">
                        Username :
                    </th>
                    <td style="padding-left: 20px; border-bottom: 1px solid #E8A42A; width: 60%">
                        shop name
                    </td>
                </tr>
                <tr>
                    <th style="padding-left: 50px; width: 20%">
                        e-mail :
                    </th>
                    <td style="padding-left: 20px; border-bottom: 1px solid #E8A42A; width: 60%">
                        email
                    </td>
                </tr>
                <tr>
                    <th style="padding-left: 50px; width: 20%">
                        ชื่อร้าน :
                    </th>
                    <td style="padding-left: 20px; border-bottom: 1px solid #E8A42A; width: 60%">
                        email
                    </td>
                </tr>
                <tr>
                    <th style="padding-left: 50px; width: 20%">
                        ที่อยู่ :
                    </th>
                    <td style="padding-left: 20px; border-bottom: 1px solid #E8A42A; width: 60%">
                        address
                    </td>
                </tr>
                <tr>
                    <th style="padding-top: 50px;" colspan="3">
                        รายการอาหาร
                    </th>
                </tr>
                <tr>
                    <td colspan="3">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" style="background-color: #EA4667">
                                    <a class="card-link" data-toggle="collapse" href="#collapseOne" style="color: gold;">
                                        <strong>อาหาร</strong>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <table style="width: 90%;">
                                            <tr>
                                                <th style="width: 80%;">รายการ</th>
                                                <th style="width: 20%;">ราคา</th>
                                            </tr>
                                            <?php
                                                $product = $conn->getProduct(1);
                                                while($row = $product->fetch_assoc()) {
                                                    ?>
                                                    <tr>
                                                        <?php if($row['product_type'] == "อาหาร") {
                                                            ?>
                                                            <td style="width: 70%; padding-left: 20px;"><?php echo $row['product_name'] ?></td>
                                                            <td style="width: 30%;"><?php echo $row['product_price'] ?></td>
                                                            <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" style="background-color: #EA4667">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo" style="color: gold;">
                                        <strong>เครื่องดื่ม</strong>

                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <table style="width: 90%;">
                                            <tr>
                                                <th style="width: 80%;">รายการ</th>
                                                <th style="width: 20%;">ราคา</th>
                                            </tr>
                                            <?php
                                            $product = $conn->getProduct(1);
                                            while($row = $product->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <?php if($row['product_type'] == "เครื่องดื่ม") {
                                                        ?>
                                                        <td style="width: 70%; padding-left: 20px;"><?php echo $row['product_name'] ?></td>
                                                        <td style="width: 30%;"><?php echo $row['product_price'] ?></td>
                                                        <?php
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" style="background-color: #EA4667">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree" style="color: gold;">
                                        <strong>ขนม</strong>

                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <table style="width: 90%;">
                                            <tr>
                                                <th style="width: 80%;">รายการ</th>
                                                <th style="width: 20%;">ราคา</th>
                                            </tr>
                                            <?php
                                            $product = $conn->getProduct(1);
                                            while($row = $product->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <?php if($row['product_type'] == "ขนม") {
                                                        ?>
                                                        <td style="width: 70%; padding-left: 20px;"><?php echo $row['product_name'] ?></td>
                                                        <td style="width: 30%;"><?php echo $row['product_price'] ?></td>
                                                        <?php
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>
</html>
