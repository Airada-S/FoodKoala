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
<div style="padding-top: 40px; padding-left: 150px; padding-right: 150px;">
    <div style="margin: 30px; border: 1px solid #c26f6f; width: 95%; border-radius: 5px;">
        <div style="margin: 20px;">
            <form action="check.php?s=14" method="post" enctype="multipart/form-data">
                <table style="margin-left: 100px; margin-right: 100px; width: 90%;">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button  class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">DSD
                                        <h4 style="color: red" align = 'center'>อนุมัติร้านค้า</h4>
                                    </button>
                                </h2>

                            </div>
                            <div class="card-header" style="background-color: #EA4667">
                                <a class="card-link collapsed" data-toggle="collapse" href="#collapseOne" style="color: gold;" aria-expanded="false">
                                    <strong>อาหาร</strong>
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>

                </table>
            </form>
        </div>
    </div>
</div>

</body>
</html>

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>สมัครสมาชิก</title>-->
<!--    <link rel="stylesheet" type="text/css" href="loginCSS.css" title="style1">-->
<!---->
<!--</head>-->
<!--<body>-->
<?php
//include 'header.php';
//require("SetSessionStatus.php");
//?>
<!---->
<!--<div class="container">-->
<!--    <div class="">-->
<!--        <table bgcolor="#CCCCCC" style="margin-top: 25px" cellpadding="10" border="4" bordercolor="red">-->
<!---->
<!---->
<!--            <thead >-->
<!--                    <tr align="center">-->
<!--                        <th align="center" width="250" bgcolor="#FFFFCC">รูปร้านค้า</th>-->
<!--                        <th align="center" width="250" bgcolor="#FFCCCC">ชื่อร้านค้า</th>-->
<!--                        <th align="center" width="250" bgcolor="#99CCFF">เบอร์โทร</th>-->
<!--                        <th align="center" width="250" bgcolor="#7AF67A">เวลาเปิด - ปิด</th>-->
<!--                        <th align="center" width="250" bgcolor="#D29953">ที่อยู่ร้านค้า</th>-->
<!--                        <th align="center" width="250" bgcolor="#D29953">อนุมัติ</th>-->
<!--                    </tr>-->
<!--            </thead>-->
<!--            --><?php
//            $con = new ConnectDB();
//            $sql = "SELECT * FROM `seller`";
//            $result = mysqli_query($con->connect(),$sql);
//
//            ?>
<!--            --><?php
//
//            while($show = mysqli_fetch_array($result)){
//            ?>
<!--            <tbody>-->
<!--            <tr  align="center">-->
<!---->
<!--                <td>--><?//=$show['seller_img']?><!--</td>-->
<!--                <td>--><?//=$show['seller_name']?><!--</td>-->
<!--                <td>--><?//=$show['seller_tel']?><!--</td>-->
<!--                <td>--><?//=$show['seller_time']?><!--</td>-->
<!--                <td>--><?//=$show['seller_address']?><!--</td>-->
<!--                <td><button class="button button3">ยืนยัน</button></td>-->
<!---->
<!--            </tr>--><?php //} ?>
<!---->
<!--            </tbody>-->
<!---->
<!--        </table>-->
<!---->
<!--        <table class="table table-striped table-dark">-->
<!--            <thead>-->
<!--            <tr>-->
<!--                <th scope="col">#</th>-->
<!--                <th scope="col">First</th>-->
<!--                <th scope="col">Last</th>-->
<!--                <th scope="col">Handle</th>-->
<!--                <th scope="col">Handle</th>-->
<!--            </tr>-->
<!--            </thead>-->
<!--            <tbody>-->
<!--            <tr>-->
<!--                <th scope="row">1</th>-->
<!--                <td>Mark</td>-->
<!--                <td>Otto</td>-->
<!--                <td>@mdo</td>-->
<!--                <td>@twitter</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <th scope="row">2</th>-->
<!--                <td>Jacob</td>-->
<!--                <td>Thornton</td>-->
<!--                <td>@fat</td>-->
<!--                <td>@twitter</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <th scope="row">3</th>-->
<!--                <td>Larry</td>-->
<!--                <td>the Bird</td>-->
<!--                <td>@twitter</td>-->
<!--                <td>@twitter</td>-->
<!--            </tr>-->
<!---->
<!--            </tbody>-->
<!--        </table>-->
<!--    </div>-->
<!---->
<!---->
<!--</div>-->
<!---->
<!--</body>-->
<!--</html>-->