<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>สมัครสมาชิก</title>
    <link rel="stylesheet" type="text/css" href="loginCSS.css" title="style1">

</head>
<body>
<?php
include 'header.php';
require("SetSessionStatus.php");
?>

<div class="login-page">
    <ul class="nav nav-tabs" style="width: 100%">
        <li class="active" style="background-color: white; padding: 10px; width: 50%; text-align: center;" id="cus1"><a data-toggle="tab" href="#customer" id="cus" style="color: black">สมาชิก</a></li>
        <li style="background-color: white; padding: 10px; width: 50%; text-align: center;" id="sell"><a data-toggle="tab" href="#seller" id="sel" style="color: black">ร้านค้า</a></li>
    </ul>
    <div class="form tab-content">
        <div id="customer" class="tab-pane fade in active">
            <form class="login-form" action='check.php?s=10' method='POST'>

                <?php
                $n = $_REQUEST["n"];
                    if($n == 1){
                        echo "<p style=\"color: #EF3B3A\" >Username ไม่สามารถใช่ได้</p>";
                    }

                ?>

                <input type="text" id='user' placeholder="Username" name='user'/>
                <input type='password' id='pass' placeholder='Password' name='pass'/>
                <input type="text" id='name' placeholder="Name" name='name'/>
<!--                <input type="text" id='email' placeholder="Email" name='email'/>-->
                <input type="text" id='tel' placeholder="Phone number" name='tel'/>
                <textarea placeholder="Address" name='address' id='address' style="width: 100%; border: none; background-color: #F2F2F2; height: 100px; padding: 15px; color: #555555;"></textarea>
<!--                <input type="text" id='address' placeholder="Address" name='address' aria-multiline="true" height="100"/>-->
                <button onclick=" return check()">สมัครสมาชิก</button>
            </form>
        </div>
        <div id="seller" class="tab-pane fade">
            <form class="login-form" action='check.php?s=11' method='POST' id="seller" enctype="multipart/form-data">

                <?php
                $n = $_REQUEST["n"];
                if($n == 2){
                    echo "<p style=\"color: #EF3B3A\" >Username ไม่สามารถใช่ได้</p>";
                }

                ?>
                <input type="text" id='user2' placeholder="Username" name='user2'/>
                <input type='password' id='pass2' placeholder='Password' name='pass2'/>
                <input type="text" id='name2' placeholder="Name" name='name2'/>
<!--                <input type="text" id='email2' placeholder="Email" name='email2'/>-->
                <input type="text" id='tel2' placeholder="Phone number" name='tel2'/>
                <textarea placeholder="Address" name='address2' id='address2' style="width: 100%; border: none; background-color: #F2F2F2; height: 100px; padding: 15px; color: #555555;"></textarea>
<!--                <input type="text" id='address2' placeholder="Address" name='address2'/>-->
                <input type="text" id='time2' placeholder="Open-close time" name='time2'/>
                <input type="file" id='img2' placeholder="img" name='img2'/>
                <button onclick=" return check2()">Insert</button>

            </form>
        </div>
    </div>
</div>



<script>

    $(document).ready(function(){
        $("#cus").click(function(){
            $("#cus1").css({"background-color": "white"});
            $("#sell").css({"background-color": "#E8A42A"});
        });
    });

    $(document).ready(function(){
        $("#sel").click(function(){
            $("#cus1").css({"background-color": "#E8A42A"});
            $("#sell").css({"background-color": "white"});
        });
    });

    $(document).ready(function(){
        $("#cus").click();
    });

    function check() {
        let user = document.getElementById("user");
        let pass = document.getElementById("pass");
        let name = document.getElementById("name");
        let email = document.getElementById("email");
        let tel = document.getElementById("tel");
        let address = document.getElementById("address");

        if(user.value == ""){
            window.alert('กรุณากรอกข้อมูล Username')
            return false
        }
        else if(user.value == "admin"){
            window.alert('Username ไมสามารถใช่ได้')
            return false
        }
        else if(user.value == "admin"){
            window.alert('Username ไมสามารถใช่ได้')
            return false
        }
        else if(pass.value == ""){
            window.alert('กรุณากรอกข้อมูล Password')
            return false
        }
        else if(name.value == ""){
            window.alert('กรุณากรอกข้อมูล Name')
            return false
        }
        else if(email.value == ""){
            window.alert('กรุณากรอกข้อมูล Email')
            return false
        }
        else if(tel.value == ""){
            window.alert('กรุณากรอกข้อมูล Phone number')
            return false
        }
        else if(address.value == ""){
            window.alert('กรุณากรอกข้อมูล Address')
            return false
        }

    }
    function check2() {
        let user2 = document.getElementById("user2");
        let pass2 = document.getElementById("pass2");
        let name2 = document.getElementById("name2");
        let email2 = document.getElementById("email2");
        let tel2 = document.getElementById("tel2");
        let address2 = document.getElementById("address2");
        let time2 = document.getElementById("time2");
        let img2 = document.getElementById("img2");
        if(user2.value == ""){
            window.alert('กรุณากรอกข้อมูล Username')
            return false
        }
        else if(user2.value == "admin"){
            window.alert('Username ไมสามารถใช่ได้')
            return false
        }
        else if(pass2.value == ""){
            window.alert('กรุณากรอกข้อมูล Password')
            return false
        }
        else if(name2.value == ""){
            window.alert('กรุณากรอกข้อมูล Name')
            return false
        }
        else if(email2.value == ""){
            window.alert('กรุณากรอกข้อมูล Email')
            return false
        }
        else if(tel2.value == ""){
            window.alert('กรุณากรอกข้อมูล Phone number')
            return false
        }
        else if(address2.value == ""){
            window.alert('กรุณากรอกข้อมูล Address')
            return false
        }
        else if(time2.value == ""){
            window.alert('กรุณากรอกข้อมูล Open-close time')
            return false
        }
        else if(img2.value == ""){
            window.alert('กรุณากรอกข้อมูล image')
            return false
        }
    }
</script>
</body>
</html>