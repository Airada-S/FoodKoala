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
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#customer" id="cus">สมาชิก</a></li>
        <li><a data-toggle="tab" href="#seller">ร้านค้า</a></li>
    </ul>
    <div class="form tab-content">
        <div id="customer" class="tab-pane fade in active">
            <form class="login-form" action='check.php?s=10' method='POST'>

                <input type="text" id='user' placeholder="Username" name='user'/>
                <input type='password' id='pass' placeholder='Password' name='pass'/>
                <input type="text" id='name' placeholder="Name" name='name'/>
                <input type="text" id='email' placeholder="Email" name='email'/>
                <input type="text" id='tel' placeholder="Phone number" name='tel'/>
                <input type="textarea" id='address' placeholder="Address" name='address'/>
                <button onclick=" return check()">Insert</button>
            </form>
        </div>
        <div id="seller" class="tab-pane fade">
            <form class="login-form" action='check.php?s=11' method='POST' id="seller" enctype="multipart/form-data">

                <input type="text" id='user2' placeholder="Username" name='user2'/>
                <input type='password' id='pass2' placeholder='Password' name='pass2'/>
                <input type="text" id='name2' placeholder="Name" name='name2'/>
                <input type="text" id='email2' placeholder="Email" name='email2'/>
                <input type="text" id='tel2' placeholder="Phone number" name='tel2'/>
                <input type="text" id='address2' placeholder="Address" name='address2'/>
                <input type="text" id='time2' placeholder="Open-close time" name='time2'/>
                <input type="file" id='img2' placeholder="img" name='img2'/>
                <button onclick=" return check2()">Insert</button>

            </form>
        </div>
    </div>
    <?php
    if(!isset($_SESSION['ch'])){

    }else{
        if($_SESSION['ch']==1){
            echo "<div class='alert alert-primary' role='alert'>
             A simple primary alert—check it out!
            </div>";
        }

    }
    ?>

</div>

<?php
$user = $_POST['user'];
$user2 = $_POST['user2'];
$con = new connectDB();
$sql = "SELECT `customer_username` FROM `customer` where customer_username = '".$user."' and customer_username = '".$user2."'";
$result = mysqli_query($con->connect(),$sql);

?>

<script>

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
        else if($result.value == "admin"){
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