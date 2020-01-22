<!DOCTYPE html>
<html>
    <head>
        <?php

        ?>
    <meta charset="UTF-8">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="loginCSS.css" title="style1">
    <title></title>
</head>
<body>
<div class="login-page">
    <div class="form">
        <div>
            <table style="width: 100%;">
                <tr>
                    <td style="text-align: center;">
                        <img src="./img/logo.png" width="200" height="200">
                    </td>
                </tr>
            </table>
        </div>
        <form class="login-form" action='check.php?s=1' method='POST'>
            <?php if($_REQUEST['cl'] == 1){ ?>
                <div class="alert alert-danger" role="alert">
                    Username หรือ Password ไม่ถูกต้อง...
                </div>
            <?php } ?>
            <input type="text" placeholder="username" name='username'/>
            <input type='password' placeholder='password' name='password'/>
            <button>login</button>
            <p class="message">Not registered? <a href="register.php?n=0">Create an account</a></p>
        </form>


    </div>
</div>
<?php


?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>