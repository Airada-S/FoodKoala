<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
        require_once './ConnectDatabase.php';
        $conn = new ConnectDB();
        $seller = $conn->getSeller($_REQUEST["id"]);
        ?>
        <title></title>

</head>
<body>
<?php
//require("SetSessionStatus.php");
    include 'header.php';

//    $conn = new ConnectDB();
//    $seller = $conn->getSeller($_REQUEST["id"]);
    if ($seller->num_rows > 0) {
        // output data of each row
        while ($row = $seller->fetch_assoc()) {
            ?>
            <div class="card m-4">
<!--                <img src="--><?php //echo $row["seller_img"] ?><!--" class="card-img-top" alt="...">-->
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row["seller_name"] ?>
                        <?php
                        $result3 = $conn->getStar($row["seller_id"]);
                        $sum = 0;
                        $n = 1;
                        if ($result3->num_rows > 0) {
                            $n = 0;
                            while($row3 = $result3->fetch_assoc()) {
                                $sum = $sum+$row3["reviews_star"];
                                $n++;
                            }
                        }
                        //                        echo $sum."<br>".$n."<br>";
                        $star = ($sum/$n)*2;
                        //                        echo $star;
                        for($i= 1 ;$i<=10;$i++) {
                            if($star >= $i) {
                                if ($i % 2 != 0 && $i == floor($star)) {
                                    echo '<i class="fas fa-star-half-alt" style="font-size: 20px;color: gold"></i>';
                                } else if($i%2==0){
                                    echo '<i class="fas fa-star" style="font-size: 20px;color: gold"></i>';
                                }
                            }else if($i%2==0 && $i-$star != 1){
                                echo '<i class="far fa-star" style="font-size: 20px;color: gold"></i>';
                            }
                        }
                        ?>
                        <a class="font-weight-light" style="font-size: small"><?php  echo "  ".($sum/$n)."/5"; ?></a>
                    </h5>
                    <p class="card-text">
                        <?php
                        $result2 = $conn->getType($row["seller_id"]);
                        ?>
                        ประเภท :
                        <?php
                        if ($result2->num_rows > 0) {
                            $i = 1;
                            // output data of each row
                            while($row2 = $result2->fetch_assoc()) {
                                if( $i != 1){
                                    echo " , ";
                                }
                                echo $row2["product_type"];
                                $i++;
                            }}
                        ?>
                    </p>
                    <?php
                    $product = $conn->getProduct($_REQUEST["id"]);
                    if ($product->num_rows > 0) {
                    // output data of each row
                        while ($row = $product->fetch_assoc()) {
//                            echo $row["product_name"]."<br>";
                            ?>
<!--                            <form action="check.php?s=6&pid=--><?php //echo $row["product_id"]?><!--&id=--><?php //echo $_REQUEST["id"] ?><!--" method="post">-->
                            <div class="card mt-2">
                                <div class="card-body">
                                    <?php
                                    echo $row["product_name"]."<br>";
                                    echo $row["product_price"]." บาท";
                                    ?>
                                <a  class="float-right" type="submit" href="check.php?s=6&pid=<?php echo $row["product_id"]?>&id=<?php echo $_REQUEST["id"] ?>">
                                    <i class="fas fa-cart-plus float-right" style="font-size: 40px;color: gold"></i>
                                </a>
                            </div>
                            </div>
<!--                            </form>-->
                            <?php
                        }
                    }
                    ?>

<!--                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                </div>
            </div>
            <?php
        }
    }

?>
<!--<style>-->
<!--    img {-->
<!--        position: absolute;-->
<!--        clip: rect(0px,100px,50px,0px);-->
<!--    }-->
<!--</style>-->
</body>
</html>