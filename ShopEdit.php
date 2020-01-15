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

$conn = new ConnectDB();

$shop = $conn->getSeller($_SESSION['id']);
$det = $shop->fetch_assoc();
?>
<div style="padding-top: 40px; padding-left: 150px; padding-right: 150px;">
    <div style="margin: 30px; border: 1px solid #c26f6f; width: 95%; border-radius: 5px;">
        <div style="margin: 20px;">
            <form action="check.php?s=14" method="post" enctype="multipart/form-data">
                <table style="margin-left: 100px; margin-right: 100px; width: 90%;">

                    <tr>
                        <td rowspan="3" STYLE="width: 20%; text-align: center;">

                            <div class="image-area mt-4"><img id="imageResult" name="img" src="./img/<?php echo $det['seller_img'] ?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                        </td>
                        <th style="padding-left: 50px; width: 20%">
                            Username :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <input type="text" style="border: none; border-bottom: 1px solid #E8A42A; width: 90%;" name="seller_username" value="<?php echo $det['seller_username'] ?>" >
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left: 50px; width: 20%">
                            Password :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <input type="text" style="border: none; border-bottom: 1px solid #E8A42A; width: 90%;" name="seller_password" value="<?php echo $det['seller_password'] ?>" >
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left: 50px; width: 20%">
                            ชื่อร้าน :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <input type="text" style="border: none; border-bottom: 1px solid #E8A42A; width: 90%;" name="seller_name" value="<?php echo $det['seller_name'] ?>" >
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 50px; text-align: center;">
                            <!-- Upload image input-->
                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                <input id="upload" type="file" onchange="readURL(this);" class="form-control border-0" name="seller_img">
                                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                                <div class="input-group-append">
                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                </div>
                            </div>
                        </td>
                        <th style="padding-left: 50px; width: 20%">
                            ที่อยู่ :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <input type="text" style="border: none; border-bottom: 1px solid #E8A42A; width: 90%;" name="seller_address" value="<?php echo $det['seller_address'] ?>" >
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 50px;"></td>
                        <th style="padding-left: 50px; width: 20%">
                            เบอร์โทรศัพท์่ :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <input type="text" style="border: none; border-bottom: 1px solid #E8A42A; width: 90%;" name="seller_tel" value="<?php echo $det['seller_tel'] ?>" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center; padding-top: 10px;"><button type="submit" class="btn btn-outline-warning">บันทึก</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<script>
    /*  ==========================================
        SHOW UPLOADED IMAGE
    * ========================================== */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageResult')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(function () {
        $('#upload').on('change', function () {
            readURL(input);
        });
    });
    var input = document.getElementById( 'upload' );
    var infoArea = document.getElementById( 'upload-label' );

    input.addEventListener( 'change', showFileName );
    function showFileName( event ) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
    }
</script>
</body>
</html>
