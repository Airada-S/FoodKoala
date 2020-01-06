<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <?php

    ?>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="loginCSS.css" title="style1">
    <title></title>
</head>
<body>
<div class="login-page">
    <div class="form">

        <form class="login-form" action='check.php?s=1' method='POST'>
            <input type="text" placeholder="username" name='user'/>
            <input type='password' placeholder='password' name='pass'/>
            <button>login</button>
            <p class="message">Not registered? <a href="member.php">Create an account</a></p>
        </form>


    </div>
</div>
<?php


?>

</body>
</html>