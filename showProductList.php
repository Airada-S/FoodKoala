<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show</title>
</head>
<body>
<?php
    require_once './ConnectDatabase.php';
    include 'header.php';
    $pid = (explode("|",$_SESSION['pid']));
//    $_SESSION["num"] = count($arr)-1;
?>
<div class="card m-4">
    <!--                <img src="--><?php //echo $row["seller_img"] ?><!--" class="card-img-top" alt="...">-->
    <div class="card-body">
        <p class="card-text">
<?php
    $arrNum = array();
    for($i=0;$i<$_SESSION["num"];$i++) {
//        if($i == 0){
//            array_push($arrNum,array($pid[$i]=>1));
//        }
        if (array_key_exists($pid[$i], $arrNum)) {
            $arrNum[$pid[$i]] += 1;
        } else {
//            array_push($arrNum,array($pid[$i]=>1));
            $arrNum[$pid[$i]] = 1;
        }
    }foreach ($arrNum as $key => $value){
        $conn = new ConnectDB();
        $product = $conn->getProductByPid($key);
        if($product->num_rows >0){
            while ($row = $product->fetch_assoc()){
?>
    <div class="card mt-2">
        <div class="card-body" style="font-size: 25px;">
            <a  href="" >
                <i class="far fa-minus-square" style="font-size: 25px;color: gold"></i>
            </a>
            <?php echo $value ?>
            <a  href="" >
                <i class="far fa-plus-square" style="font-size: 25px;color: gold"></i>
            </a>
            <?php
                echo $row["product_name"];
            ?>
            <div  class="float-right" href="" style="font-size: 25px;color: gold">
                <a class="mr-1">ราคา</a>
                <a >ราคารวม</a>
            </div>
            <br>
            จากร้าน
<!--            <a  class="float-right" type="submit" href="" style="font-size: 40px;color: gold">-->
<!--                <i class="far fa-minus-square"></i>-->
<!--                <i class="far fa-plus-square"></i>-->
<!--            </a>-->
        </div>
    </div>
<?php
            }
        }
    }
    print_r($arrNum);
?>
        </p>
    </div>
</div>
</body>