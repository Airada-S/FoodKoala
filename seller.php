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
<body >
<?php
    include 'header.php';
    if ($seller->num_rows > 0) {
        // output data of each row
        $row = $seller->fetch_assoc()
            ?>
<div class="container">
    <div class="row">
        <div class="col align-self-center" style="padding-left: 20%;padding-right: 20%">
            <div class="card m-5" >
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
                        $star = number_format(($sum / $n), 1, '.', '');
                        for ($i = 1; $i <= 5; $i++) {
                            if ($star >= 1) {
                                echo '<i class="fas fa-star" style="font-size: 20px;color: gold"></i>';
                            } else if($star >= 0.5){
                                echo '<i class="fas fa-star-half-alt" style="font-size: 20px;color: gold"></i>';
                            }else {
                                echo '<i class="far fa-star" style="font-size: 20px;color: gold"></i>';
                            }
                            $star--;
                        }
                        ?>
                        <a class="font-weight-light" style="font-size: small"><?php  echo "  ".number_format(($sum / $n), 1, '.', '')."/5"; ?></a>
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
                        <?php if($row["seller_StatusPromotion"] == true){ ?>
                        <p align="right">
                            <b style="color: #b85252">ลด <?php echo $row["seller_Promotion"] ?>%</b>
                            <?php if($row["seller_conditionPromotion"] > 0) {?>
                                <a style="font-size: small">เมื่อซื้อขั้นต่ำ <?php echo $row["seller_conditionPromotion"] ?> บาท</a>
                            <?php }else{ ?>
                                <a style="font-size: small">ไม่มีขั้นต่ำ</a>
                            <?php } ?>
                        </p>
                    <?php } ?>
                    </p>
                    <?php
                    $product = $conn->getProduct($_REQUEST["id"]);
                    if ($product->num_rows > 0) {
                    // output data of each row
                        while ($row = $product->fetch_assoc()) {
                            if($row["product_status"]) {
                                $link = "";
                                if ($_SESSION['status'] == 'customer') {
                                    $link = "check.php?s=6&pid=" . $row["product_id"] . "&id=" . $_REQUEST["id"];
                                }

                                ?>
                                <div class="card m-3">
                                    <div class="card-body">
                                        <?php
                                        echo $row["product_name"] . "<br>";
                                        echo $row["product_price"] . " บาท";
                                        ?>
                                        <a class="float-right" type="submit" href="<?php echo $link ?>">
                                            <i class="fas fa-cart-plus float-right"
                                               style="font-size: 30px;color: gold"></i>
                                        </a>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
            <?php

    }

?>
</body>
</html>