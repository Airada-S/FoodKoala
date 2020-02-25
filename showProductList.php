<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show</title>
</head>
<body >
<?php
    require_once './ConnectDatabase.php';
    include 'header.php';
?>
<div style="padding-top: 3%; padding-left: 20%; margin-right: 20%">
    <div class="card p-5">
    <table class="table">
        <thead>
        <tr>
            <th >จำนวน</th>
            <th >รายการ</th>
            <th style="text-align: center">ราคาต่อชิ้น</th>
            <th style="text-align: center">ราคารวม</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $sumall = 0;
            $i=0;
            foreach ($_SESSION["listProduct"] as $key => $value){
               $conn = new ConnectDB();
               $product = $conn->getProductByPid($key);
               $row = $product->fetch_assoc();
               $sumall += $row["product_price"]*$value;
        ?>
                <tr>
                    <td rowspan="2" >
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a  href="check.php?s=8&pid=<?php echo $key ?>" onclick="return deletemount(<?php echo $i ?>)">
                                    <i class="far fa-minus-square" style="font-size: 25px;color: gold"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <p id="mount<?php echo $i ?>"> <?php echo $value ?> </p>
                            </li>
                            <li class="list-inline-item">
                                <a  href="check.php?s=9&pid=<?php echo $key ?>" >
                                    <i class="far fa-plus-square" style="font-size: 25px;color: gold"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                    <td>
                        <p id="nameP<?php echo $i ?>"> <?php echo $row["product_name"]; ?></p>
                    </td>

                    <td rowspan="2" style="text-align: center">
                        <a class="mr-1"><?php echo $row["product_price"] ?></a>
                    </td>
                    <td rowspan="2" style="text-align: center">
                        <a ><?php echo $row["product_price"]*$value ?></a>
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 0px;">
                        <?php
                        $seller = $conn->getSeller($row["seller_id"]);
                        $row2 = $seller->fetch_assoc();
                        echo "จากร้าน : ".$row2["seller_name"];
                        ?>
                    </td>
                </tr>
        <?php
                $i++;
            }
        ?>
        <tr>
            <td colspan="3">ยอดรวม</td>
            <td style="text-align: center"><?php echo $sumall ?></td>
        </tr>
        </tbody>
    </table>
        <a href="AddOderProduct.php" style="text-align: center" class="btn btn-outline-warning my-2 my-sm-0">ชำระเงิน</a>
    </div>
</div>
</body>
<script>
    function deletemount(i) {
        const x = document.getElementById("mount"+i).textContent;
        const name = document.getElementById("nameP"+i).textContent;
        if(x == 1){
            if (confirm('คุณต้องลบสินค้า'+name+" หรือไม่")) {
                    return true
            } else {
                    return false
            }
        }
    }
</script>