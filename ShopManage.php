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

$shop = $conn->getSeller($_SESSION['id']);
$det = $shop->fetch_assoc();
?>
<div style="padding-top: 40px; padding-left: 150px; padding-right: 150px;">
    <div style="margin: 30px; border: 1px solid #c26f6f; width: 95%; border-radius: 5px;">
        <div style="margin: 20px;">
            <table style="margin-left: 100px; margin-right: 100px; width: 90%;">
                <tr>
                    <td colspan="3" style="text-align: right; padding-top: 10px;"><a href="ShopEdit.php"><button type="button" class="btn btn-outline-warning">แก้ไขข้อมูลร้านค้า</button></a></td>
                </tr>
                <tr>
                    <td rowspan="3" STYLE="width: 20%;"><img src="./img/<?php echo $det['seller_img'] ?>" width="150" height="150"></td>
                    <th style="padding-left: 50px; width: 20%">
                        Username :
                    </th>
                    <td style="padding-left: 20px; border-bottom: 1px solid #E8A42A; width: 60%">
                        <?php echo $det['seller_username'] ?>
                    </td>
                </tr>
                <tr>
                    <th style="padding-left: 50px; width: 20%">
                        ชื่อร้าน :
                    </th>
                    <td style="padding-left: 20px; border-bottom: 1px solid #E8A42A; width: 60%">
                        <?php echo $det['seller_name'] ?>
                    </td>
                </tr>
                <tr>
                    <th style="padding-left: 50px; width: 20%">
                        ที่อยู่ :
                    </th>
                    <td style="padding-left: 20px; border-bottom: 1px solid #E8A42A; width: 60%">
                        <?php echo $det['seller_address'] ?>
                    </td>
                </tr>
                <tr>
                    <th style="padding-top: 50px;" colspan="2">
                        รายการอาหาร
                    </th>
                    <td style="text-align: right; padding-top: 35px;">
                        <button type="button" class="btn btn-outline-warning">+ เพิ่มรายการ</button>
                    </td>
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
                                                $product = $conn->getProduct($_SESSION['id']);
                                                while($row = $product->fetch_assoc()) {
                                                    ?>
                                                    <tr>
                                                        <?php if($row['product_type'] == "อาหาร") {
                                                            ?>
                                                            <td style="width: 70%; padding-left: 20px;"><?php echo $row['product_name'] ?></td>
                                                            <td style="width: 15%;"><?php echo $row['product_price'] ?></td>
                                                            <td style="width: 15%;"><a href="check.php?s=12&pid=<?php echo $row['product_id']?>">แก้ไข</a></td>
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
                                            $product = $conn->getProduct($_SESSION['id']);
                                            while($row = $product->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <?php if($row['product_type'] == "เครื่องดื่ม") {
                                                        ?>
                                                        <td style="width: 70%; padding-left: 20px;"><?php echo $row['product_name'] ?></td>
                                                        <td style="width: 30%;"><?php echo $row['product_price'] ?></td>
                                                        <td style="width: 15%;"><a href="check.php?s=12&pid=<?php echo $row['product_id']?>">แก้ไข</a></td>
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
                                            $product = $conn->getProduct($_SESSION['id']);
                                            while($row = $product->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <?php if($row['product_type'] == "ขนม") {
                                                        ?>
                                                        <td style="width: 70%; padding-left: 20px;"><?php echo $row['product_name'] ?></td>
                                                        <td style="width: 30%;"><?php echo $row['product_price'] ?></td>
                                                        <td style="width: 15%;"><a href="check.php?s=12&pid=<?php echo $row['product_id']?>">แก้ไข</a></td>
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
