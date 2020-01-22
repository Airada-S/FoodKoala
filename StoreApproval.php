<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>จัดการร้านค้า</title>
    <style>
        #upload {
            opacity: 0;
        }

        #upload-label {
            position: absolute;
            top: 50%;
            left: 1rem;
            transform: translateY(-50%);
        }

        .image-area {
            border: 2px dashed rgba(255, 255, 255, 0.7);
            padding: 1rem;
            position: relative;
        }

        .image-area::before {
            content: 'Uploaded image result';
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 0.8rem;
            z-index: 1;
        }

        .image-area img {
            z-index: 2;
            position: relative;
        }
    </style>
</head>
<body>
<?php
include 'header.php';
require_once './ConnectDatabase.php';

?>
<?php
$con = new ConnectDB();
$sql = "SELECT *  FROM `seller` where seller_status = '0'";
$result = mysqli_query($con->connect(),$sql);

?>
<?php

while($show = mysqli_fetch_array($result)){
?>
<div style="padding-top: 40px; padding-left: 150px; padding-right: 150px;">
    <div style="margin: 30px; border: 1px solid #c26f6f; width: 95%; border-radius: 5px;">
        <div style="margin: 20px;">
            <form action="check.php?s=19" method="POST" enctype="multipart/form-data">
                <table style="width: 100%;">
                    <tr>
                        <td rowspan="6" STYLE="width: 20%; text-align: center;">
                            <img id="imageResult" name="img" src="./img/<?php echo $show['seller_img']?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block">
                        </td>
                        <th style="padding-left: 50px; width: 20%">
                            Username :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <input hidden name="seller_username" value="<?=$show['seller_username']?>">
                            <a><?=$show['seller_username']?></a>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left: 50px; width: 20%">
                            Password :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <a><?=$show['seller_password']?></a>
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left: 50px; width: 20%">
                            ชื่อร้าน :
                        </th>
                        <td style="padding-left: 20px; width: 60%">

                            <a ><?=$show['seller_name']?></a>
                        </td>
                    </tr>
                    <tr>

                        <th style="padding-left: 50px; width: 20%">
                            ที่อยู่ :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <a><?=$show['seller_address']?></a>
                        </td>
                    </tr>
                    <tr>

                        <th style="padding-left: 50px; width: 20%">
                            เบอร์โทรศัพท์่ :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <p><?=$show['seller_tel']?></p>
                        </td>
                    </tr>
                    <tr>

                        <th style="padding-left: 50px; width: 20%">
                            เวลา เปิด - ปิด :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <p><?=$show['seller_time']?></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center; padding-top: 10px;">
                            <button type="submit" class="btn btn-outline-warning">อนุมัติ</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php } ?>
<!--<div style="padding-top: 40px; padding-left: 150px; padding-right: 150px;">-->
<!--    <div style="margin: 30px; border: 1px solid #c26f6f; width: 95%; border-radius: 5px;">-->
<!--        <div style="margin: 20px;">-->
<!--            <form action="check.php?s=14" method="post" enctype="multipart/form-data">-->
<!--                <table style="margin-left: 100px; margin-right: 100px; width: 90%;">-->
<!--                    <div class="accordion" id="accordionExample">-->
<!--                        <div class="card">-->
<!--                            <div class="card-header" id="headingTwo" style="background-color: #EA4667">-->
<!--                                <h2 class="mb-0">-->
<!--                                    <button  class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">-->
<!--                                        <h4 style="color: orange" align = 'center'>อนุมัติร้านค้า</h4>-->
<!--                                    </button>-->
<!--                                </h2>-->
<!---->
<!--                            </div>-->
<!---->
<!--                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">-->
<!--                                <div class="card-body">-->
<!--                                    <table bgcolor="#CCCCCC" style="margin-top: 25px" cellpadding="10" border="4" bordercolor="red">-->
<!--                                        <thead >-->
<!--                                        <tr align="center">-->
<!--                                            <th align="center" width="250" bgcolor="#FFFFCC">รูปร้านค้า</th>-->
<!--                                            <th align="center" width="250" bgcolor="#FFCCCC">ชื่อร้านค้า</th>-->
<!--                                            <th align="center" width="250" bgcolor="#99CCFF">เบอร์โทร</th>-->
<!--                                            <th align="center" width="250" bgcolor="#7AF67A">เวลาเปิด - ปิด</th>-->
<!--                                            <th align="center" width="250" bgcolor="#D29953">ที่อยู่ร้านค้า</th>-->
<!--                                            <th align="center" width="250" bgcolor="#D29953">อนุมัติ</th>-->
<!--                                        </tr>-->
<!--                                        </thead>-->
<!--                                        --><?php
//                                        $con = new ConnectDB();
//                                        $sql = "SELECT * FROM `seller`";
//                                        $result = mysqli_query($con->connect(),$sql);
//
//                                        ?>
<!--                                        --><?php
//
//                                        while($show = mysqli_fetch_array($result)){
//                                        ?>
<!---->
<!--                                        <tr  align="center">-->
<!---->
<!--                                            <td>--><?//=$show['seller_img']?><!--</td>-->
<!--                                            <td>--><?//=$show['seller_name']?><!--</td>-->
<!--                                            <td>--><?//=$show['seller_tel']?><!--</td>-->
<!--                                            <td>--><?//=$show['seller_time']?><!--</td>-->
<!--                                            <td>--><?//=$show['seller_address']?><!--</td>-->
<!--                                            <td><button class="button button3">ยืนยัน</button></td>-->
<!---->
<!--                                        </tr>--><?php //} ?>
<!---->
<!---->
<!---->
<!--                                    </table>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!---->
<!--                </table>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--</body>-->
<!--</html>-->
