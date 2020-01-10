<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
</head>
<body>
<?php
    require("SetSessionStatus.php");
    include 'header.php';
?>

<form class="form-inline justify-content-center">



</form>
    <form class="form-inline justify-content-center" action="check.php?s=3" onsubmit="return checkSearch()" method="POST">
        <div class="btn-group mt-2">
<!--            <select class="custom-select " style="color: red;border-color: red" id="inputGroupSelect01" onchange="switchShow()">-->
            <select class="custom-select " style="color: red;border-color: red" id="inputGroupSelect01" onchange="" name="choice">
                    <option selected value="searchBySellerName">ค้นหาด้วย ชื่อร้านค้า</option>
                    <option value="searchByProductName" >ค้นหาด้วย ชื่ออาหาร</option>
            </select>
            <div class="ml-2">
                <input class="form-control" id="Search" placeholder="คำที่ใช้ค้นหา" name="Search" style="color: red;border-color: red">
                <button type="submit" class="btn btn-outline-danger ">ค้นหา</button>
            </div>
            <a href="check.php?s=2&pt=อาหาร" class="btn btn-outline-warning ml-5">เมนู อาหาร</a>
            <a href="check.php?s=2&pt=เครื่องดื่ม" class="btn btn-outline-warning ml-2">เมนู เครื่องดื่ม</a>
            <a href="check.php?s=2&pt=ขนม" class="btn btn-outline-warning ml-2">เมนู ขนม</a>
        </div>
    </form>

<ul class="list-inline">
<?php
//echo $result->num_rows;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
?>
    <li class="list-inline-item">
        <form action="check.php?s=5&id=<?php echo $row["seller_id"] ?>" method="POST">
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
                        <?php
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
                    <button type="submit" class="btn btn-outline-warning  float-right">ดูรายการอาหาร</button>
                </div>
            </div>
        </form>
    </li>
<?php
        }
    } else {
        echo "0 results";
    }
?>
</ul>
<script>
    function switchShow() {
        let x = document.getElementById("inputGroupSelect01");
        let y = document.getElementById("inputGroupSelect02");
        if(x.options[x.selectedIndex].value == 1){
            y.hidden = false;
        }
        else{
            y.hidden = true;
        }
    }
    function checkSearch() {
        let x = document.getElementById("SearchID");
        if(x.value == ""){
            window.alert('กรุณาใส่ข้อความที่ต้องการค้นหา')
            return false
        }
        else{
            return true
        }
    }
</script>
</body>
</html>

