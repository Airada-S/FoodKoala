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
            <form action="check.php?s=14" method="post" enctype="multipart/form-data" onsubmit="return phonenumber()">
                <table style="margin-left: 100px; margin-right: 100px; width: 90%;">

                    <tr>
                        <td rowspan="3" STYLE="width: 20%; text-align: center;">

                            <div class="image-area mt-4"><img id="imageResult" name="img" src="./img/<?php echo $det['seller_img'] ?>" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                        </td>
                        <th style="padding-left: 50px; width: 20%">
                            Username :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <input type="text" style="border: none; border-bottom: 1px solid #E8A42A; width: 90%;" name="seller_username" value="<?php echo $det['seller_username'] ?>" id="username" >
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left: 50px; width: 20%">
                            Password :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <input type="text" style="border: none; border-bottom: 1px solid #E8A42A; width: 90%;" name="seller_password" value="<?php echo $det['seller_password'] ?>" id="password" >
                        </td>
                    </tr>
                    <tr>
                        <th style="padding-left: 50px; width: 20%">
                            ชื่อร้าน :
                        </th>
                        <td style="padding-left: 20px; width: 60%">
                            <input  type="text" style="border: none; border-bottom: 1px solid #E8A42A; width: 90%;" name="seller_name" value="<?php echo $det['seller_name'] ?>" id="name">
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
                            <input type="text" style="border: none; border-bottom: 1px solid #E8A42A; width: 90%;" name="seller_tel" value="<?php echo $det['seller_tel'] ?>" id="phonnumber" >
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 50px;"></td>
                        <th style="padding-left: 50px; width: 20%; vertical-align: text-top;">
                            โปรโมชั่นร้าน :
                        </th>
                        <td style="padding-left: 20px; width: 60%; border-bottom: 1px solid #E8A42A;">
                            <?php if($det['seller_StatusPromotion']==true){ ?>
                                <div class="form-check-inline">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="seller_Promotion1" id="seller_Promotion1" value="เปิด" checked>
                                      <label class="form-check-label" for="seller_Promotion1">
                                        เปิด
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="seller_Promotion1" id="seller_Promotion2" value="ปิด">
                                      <label class="form-check-label" for="seller_Promotion2">
                                        ปิด
                                      </label>
                                    </div>
                                </div>
                            <?php }else if($det['seller_StatusPromotion']==false){ ?>
                                <div class="form-check-inline">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="seller_Promotion1" id="seller_Promotion1" value="เปิด" >
                                      <label class="form-check-label" for="seller_Promotion1">
                                        เปิด
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="seller_Promotion1" id="seller_Promotion2" value="ปิด" checked>
                                      <label class="form-check-label" for="seller_Promotion2">
                                        ปิด
                                      </label>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="form-group mt-3" >
                                ซื้อขั้นต่ำ :
                                <input id="SL" class="form-control" type="text" style="border: none;width: 20%;" name="seller_condition" id="seller_condition" value="<?php echo $det['seller_conditionPromotion'] ?>" >
                            </div>
                            <div class="form-group" >
                                 ส่วนลด :
                                <input id="SO" class="form-control" type="text" style="border: none;width: 20%;" name="seller_pinput" id="seller_pinput" value="<?php echo $det['seller_Promotion'] ?>" >
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center; padding-top: 10px;">
                            <input type="submit" class="btn btn-outline-warning">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<script>
    function phonenumber()
    {
        inputtxt = document.getElementById("phonnumber")
        username = document.getElementById("username")
        password = document.getElementById("password")
        nameS = document.getElementById("name")
        ISL = document.getElementById("SL")
        ISO = document.getElementById("SO")
        var phoneno = /^\(?[0]([0-9]{2})\)?[-]?([0-9]{3})[-]?([0-9]{4})$/;
        var passw=  /^[a-z0-9A-Z]{7,14}$/;
        var user = /^[A-Za-z0-9_]{4,14}$/;
        var nameformat = /^[A-Za-z0-9ก-ฮ_ะาิีึืุูเะแโั ]{2,30}$/;
        var SL =  /^[0-9]{0,3}$/;
        var SO =  /^[0-9]{0,2}$/;
        if(inputtxt.value.match(phoneno)) {
            if(password.value.match(passw)) {
                if(username.value.match(user)) {
                    if(nameS.value.match(nameformat)){
                        if(ISL.value.match(SL)){
                            if(ISO.value.match(SO)){
                                return true
                            } else{
                                alert('0 - 100 เปอร์เซนเท่านั้น');
                                return false
                            }
                        } else{
                            alert('ต้องไม่เกิน 3000');
                            return false
                        }
                    } else{
                        alert('name \n1.ต้องมีขนาด 2-14 เท่านั้น และต้องไม่มีอักขระพิเศษ ');
                        return false
                    }
                } else {
                    alert('Username ไม่ถูกต้อง \n1.ต้องมีขนาด 4-14 เท่านั้น และต้องไม่มีอักขระพิเศษ ');
                    username.focus();
                    return false;
                }
            } else {
                alert('password ไม่ถูกต้อง\n1.ต้องมี 7 ตัวขึ้นไป\n2.ต้องมีอักษรอยู่ด้วย ')
                return false;
            }
        } else {
            alert("หมายเลขโทรศัพธ์ของคุณไม่ถูกต้อง ตัวอย่างเช่น 08X-XXXXXXX,08X-XXX-XXXX");
            return false;
        }
    }
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
