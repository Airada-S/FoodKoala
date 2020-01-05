<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>index</title>
</head>
<body>

<?php
    require("SetSessionStatus.php");
?>
<nav class="navbar navbar-light bg-danger">
    <a class="navbar-brand text-light" href="#">
        <img src="" width="30" height="30" class="d-inline-block align-top" alt="">
        FoodKoala
    </a>
    <form class="form-inline">
        <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">เข้าสู่ระบบ</button>
    </form>
</nav>
<center>
<div class="btn-group mt-2">

        <select class="custom-select  " style="color: red;border-color: red" id="inputGroupSelect01">
            <option selected>ค้นหาด้วย ชื่อร้านค้า</option>
            <option value="1">ค้นหาด้วย ชื่ออาหาร</option>
        </select>
    <select class="custom-select ml-2" style="color: red;border-color: red" id="inputGroupSelect01">
        <option selected>เมนู ทั้งหมด</option>
        <option value="1">เมนู อาหาร</option>
        <option value="2">เมนู เครื่องดื่ม</option>
        <option value="3">เมนู ขนม</option>
    </select>
<!--    <div class="input-group">-->
        <input type="text" class="form-control ml-2" placeholder="คำค้นหา" style="color: red;border-color: red">
        <div class="input-group-append">
            <button class="btn btn-outline-danger" type="button">ค้นหา</button>
        </div>
<!--    </div>-->
</div>
</center>
<ul class="list-inline">
<?php
//echo $result->num_rows;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
?>
    <li class="list-inline-item">
            <div class="card border-danger ml-5 mt-3" style="max-width: 20rem;">
                <!--    <div class="card-header bg-transparent border-danger">Header</div>-->
                <div class="card-body">
                    <img class="card-img-top" height="155px" width="255px"
                         src="<?php echo $row["seller_img"] ?>"
                         alt="Card image cap">
                    <h5 class="card-title text-danger"><?php echo $row["seller_name"] ?></h5>
                    <p class="card-text">
                        <?php
                        $result3 = $conn->getStar($row["seller_id"]);
//                        $sql3 = "SELECT `reviews_start` FROM `reviews` WHERE `seller_id` = '".$row["seller_id"]."'";
//                        echo $sql3;
//                        $result3 = $conn->query($sql3);
                        $sum = 0;

                        if ($result3->num_rows > 0) {
                            $n = 0;
                            // output data of each row
                            while($row3 = $result3->fetch_assoc()) {
                                $sum = $sum+$row3["reviews_start"];
                                $n++;
                            }
                        }
                        $stra = ($sum/$n)*2;
                        for($i= 1 ;$i<=10;$i++) {
                            if($stra >= $i) {
                                if ($i % 2 != 0 && $i == floor($stra)) {
                                    echo '<i class="fas fa-star-half-alt" style="font-size: 20px;color: gold"></i>';
                                } else if($i%2==0){
                                    echo '<i class="fas fa-star" style="font-size: 20px;color: gold"></i>';
                                }
                            }else if($i%2==0 && $i-$stra != 1){
                                echo '<i class="far fa-star" style="font-size: 20px;color: gold"></i>';
                            }

                        }
                        ?>
                        <a class="font-weight-light" style="font-size: small"><?php  echo "  ".($sum/$n)."/5"; ?></a>
                        <?php
//                        $sql2 = "SELECT DISTINCT `product_type` FROM product WHERE `seller_id` = '".$row["seller_id"]."'";
                        $result2 = $conn->getType($row["seller_id"]);
                        ?>
                        <br>ประเภท :
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
                        <br>
                        เปิด <?php echo $row["seller_time"]?><br>
                        ที่อยู่ :<br>
                        <?php echo $row["seller_address"]?>
                    </p>
                    <button type="button" class="btn btn-outline-warning  float-right">ดูรายการอาหาร</button>
                </div>

                <!--    <div class="card-footer bg-transparent border-danger">Footer</div>-->
            </div>
    </li>


<?php
        }

    } else {
        echo "0 results";
    }
//    $conn->close();
?>
</ul>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

