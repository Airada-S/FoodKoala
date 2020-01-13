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
        <li class="active"><a data-toggle="tab" href="#customer">สมาชิก</a></li>
        <li><a data-toggle="tab" href="#seller">ร้านค้า</a></li>
    </ul>
    <div class="form tab-content">
        <div id="customer" class="tab-pane fade in active">
            <form class="login-form" action='check.php?s=1' method='POST'>

                <input type="text" placeholder="username" name='user'/>
                <input type="text" placeholder="username" name='user'/>
                <input type='password' placeholder='password' name='pass'/>
                <button>login</button>
            </form>
        </div>
        <div id="seller" class="tab-pane fade">
            <form class="login-form" action='check.php?s=1' method='POST' id="seller">

                <input type="text" placeholder="username" name='user'/>
                <input type="text" placeholder="username" name='user'/>
                <input type='password' placeholder='password' name='pass'/>
                <input type='password' placeholder='password' name='pass'/>
                <button>login</button>

            </form>
        </div>
    </div>

</div>

</body>
</html>