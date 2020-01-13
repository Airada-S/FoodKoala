<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
</head>
<body>
<?php
    session_start();
    if(!isset($_SESSION['status'])){
        $_SESSION['status'] = 'null';
    }
    if(!isset($_SESSION["listProduct"])){
        $_SESSION["listProduct"] = array();
    }
//    if(!isset($_SESSION['pid'])){
//        $_SESSION['pid'] = '';
//    }
//    echo $_SESSION["status"] ;
    $butt = "เข้าสู่ระบบ";
    $link = "login.php";
    if($_SESSION["status"] != 'null'){
        $butt = "ออกจากระบบ";
        $link = "check.php?s=4";
//        $arr = (explode("|",$_SESSION['pid']));
        $_SESSION["num"] = array_sum($_SESSION["listProduct"]);
    }
?>
<nav class="navbar navbar-light bg-danger">
    <a class="navbar-brand text-light" href="index.php">
        <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        FoodKoala
    </a>
    <form class="form-inline" action="<?php echo $link ?>" method='POST'>
<!--        <i class="fas fa-shopping-cart"></i>-->
<!--        <i class="fas fa-shopping-bag"></i>-->

        <?php
        if($_SESSION["status"] != "null"){?>
            <a style="font-size: 20px;color: gold">
                <?php echo  $_SESSION["user"]; ?>
            </a>
<!--            <i class="fas fa-shopping-basket mr-1 ml-1" style="font-size: 20px;color: gold"></i>-->
            <a style="font-size: 20px;color: gold" href="check.php?s=7">
            <i class="fas fa-shopping-cart mr-1 ml-1" ></i>

        <?php
            echo $_SESSION["num"];
        }
        ?>
            </a>
        <button class="btn btn-outline-warning my-2 my-sm-0 ml-3" type="submit"><?php echo $butt ?></button>
    </form>
</nav>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>