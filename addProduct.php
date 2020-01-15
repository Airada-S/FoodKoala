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
                    <th style="padding-top: 50px;" colspan="3">
                        รายการอาหาร
                    </th>
                </tr>

                <!-- =============================================================== เริ่มการแก้ไข =================================================== -->

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
                                        <table style="width: 95%;">
                                            <tr>
                                                <th style="width: 55%;">รายการ</th>
                                                <th style="width: 20%;">ราคา</th>
                                                <th style="width: 25%"></th>
                                            </tr>
                                            <?php
                                            $product = $conn->getProduct($_SESSION['id']);
                                            while($row = $product->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <?php if($row['product_type'] == "อาหาร" && $row['product_status']) {
                                                        ?>
                                                        <form action="check.php?s=12&pid=<?php echo $row['product_id'] ?>" method="post">
                                                            <td style="width: 55%; padding-left: 20px; padding-top: 10px;">
                                                                <input type="text" class="form-control" name="food" value="<?php echo $row['product_name'] ?>">
                                                            </td>
                                                            <td style="width: 20%; padding-left: 20px;">
                                                                <input type="text" class="form-control" name="price" value="<?php echo $row['product_price'] ?>">
                                                            </td>
                                                            <td style="width: 25%; padding-left: 20px;">
                                                                <button type="submit" class="btn btn-outline-warning" style="width: 80px;">แก้ไข</button>
                                                                <a href="check.php?s=16&pid=<?php echo $row['product_id']?>">
                                                                    <button type="button" class="btn btn-outline-danger" style="width: 80px; padding-left: 20px;">ลบ</button>
                                                                </a>
                                                            </td>
                                                        </form>
                                                        <?php
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <form action="check.php?s=17&type=food" method="post">
                                                <tr>
                                                    <td colspan="3" style="padding-top: 20px;"> + เพิ่มรายการอาหาร</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 55%; padding-left: 20px;">
                                                        <input type="text" class="form-control" name="food">
                                                    </td>
                                                    <td style="width: 20%; padding-left: 20px;">
                                                        <input type="text" class="form-control" name="price">
                                                    </td>
                                                    <td style="width: 25%; padding-left: 20px;">
                                                        <button type="submit" class="btn btn-outline-warning" style="width: 80px;">+ เพิ่ม</button>
                                                        <a href="addProduct.php">
                                                            <button type="button" class="btn btn-outline-danger" style="width: 80px; padding-left: 20px;">ยกเลิก</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </form>
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
                                        <table style="width: 95%;">
                                            <tr>
                                                <th style="width: 50%;">รายการ</th>
                                                <th style="width: 20%;">ราคา</th>
                                                <th style="width: 25%"></th>
                                            </tr>
                                            <?php
                                            $product = $conn->getProduct($_SESSION['id']);
                                            while($row = $product->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <?php if($row['product_type'] == "เครื่องดื่ม" && $row['product_status']) {
                                                        ?>
                                                        <form action="check.php?s=12&pid=<?php echo $row['product_id'] ?>" method="post">
                                                            <td style="width: 55%; padding-left: 20px; padding-top: 10px;">
                                                                <input type="text" class="form-control" name="food" value="<?php echo $row['product_name'] ?>">
                                                            </td>
                                                            <td style="width: 20%; padding-left: 20px;">
                                                                <input type="text" class="form-control" name="price" value="<?php echo $row['product_price'] ?>">
                                                            </td>
                                                            <td style="width: 25%; padding-left: 20px;">
                                                                <button type="submit" class="btn btn-outline-warning" style="width: 80px;">แก้ไข</button>
                                                                <a href="check.php?s=16&pid=<?php echo $row['product_id']?>">
                                                                    <button type="button" class="btn btn-outline-danger" style="width: 80px; padding-left: 20px;">ลบ</button>
                                                                </a>
                                                            </td>
                                                        </form>
                                                        <?php
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <form action="check.php?s=17&type=drink" method="post">
                                                <tr>
                                                    <td colspan="3" style="padding-top: 20px;"> + เพิ่มรายการเครื่องดื่ม</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 55%; padding-left: 20px;">
                                                        <input type="text" class="form-control" name="food">
                                                    </td>
                                                    <td style="width: 20%; padding-left: 20px;">
                                                        <input type="text" class="form-control" name="price">
                                                    </td>
                                                    <td style="width: 25%; padding-left: 20px;">
                                                        <button type="submit" class="btn btn-outline-warning" style="width: 80px;">+ เพิ่ม</button>
                                                        <a href="addProduct.php">
                                                            <button type="button" class="btn btn-outline-danger" style="width: 80px; padding-left: 20px;">ยกเลิก</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </form>
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
                                        <table style="width: 95%;">
                                            <tr>
                                                <th style="width: 50%;">รายการ</th>
                                                <th style="width: 20%;">ราคา</th>
                                                <th style="width: 25%"></th>
                                            </tr>
                                            <?php
                                            $product = $conn->getProduct($_SESSION['id']);
                                            while($row = $product->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <?php if($row['product_type'] == "ขนม" && $row['product_status']) {
                                                        ?>
                                                        <form action="check.php?s=12&pid=<?php echo $row['product_id'] ?>" method="post">
                                                            <td style="width: 55%; padding-left: 20px; padding-top: 10px;">
                                                                <input type="text" class="form-control" name="food" value="<?php echo $row['product_name'] ?>">
                                                            </td>
                                                            <td style="width: 20%; padding-left: 20px;">
                                                                <input type="text" class="form-control" name="price" value="<?php echo $row['product_price'] ?>">
                                                            </td>
                                                            <td style="width: 25%; padding-left: 20px;">
                                                                <button type="submit" class="btn btn-outline-warning" style="width: 80px;">แก้ไข</button>
                                                                <a href="check.php?s=16&pid=<?php echo $row['product_id']?>">
                                                                    <button type="button" class="btn btn-outline-danger" style="width: 80px; padding-left: 20px;">ลบ</button>
                                                                </a>
                                                            </td>
                                                        </form>
                                                        <?php
                                                    }
                                                    ?>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            <form action="check.php?s=17&type=sweet" method="post">
                                                <tr>
                                                    <td colspan="3" style="padding-top: 20px;"> + เพิ่มรายการขนม</td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 55%; padding-left: 20px;">
                                                        <input type="text" class="form-control" name="food">
                                                    </td>
                                                    <td style="width: 20%; padding-left: 20px;">
                                                        <input type="text" class="form-control" name="price">
                                                    </td>
                                                    <td style="width: 25%; padding-left: 20px;">
                                                        <button type="submit" class="btn btn-outline-warning" style="width: 80px;">+ เพิ่ม</button>
                                                        <a href="addProduct.php">
                                                            <button type="button" class="btn btn-outline-danger" style="width: 80px; padding-left: 20px;">ยกเลิก</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </form>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; padding-top: 10px;">
                        <a href="ShopManage.php"><button type="button" class="btn btn-outline-warning" style="width: 100px;">บันทึก</button></a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>
</html>
