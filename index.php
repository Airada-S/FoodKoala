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
    $username = 'team';
    $password = '';
    $host = '10.31.2.10';
    $database = "foodkoala2";
    $port = 3306;

    $conn = new mysqli($host.':'.$port, $username, $password,$database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully455841582310";
    $sql = "SELECT * FROM seller";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
?>

<div class="card border-danger m-5 " style="max-width: 18rem;">
<!--    <div class="card-header bg-transparent border-danger">Header</div>-->
    <div class="card-body text-danger">
        <img class="card-img-top"
             src="<?php echo $row["seller_img"]?>"
             alt="Card image cap">
        <h5 class="card-title"><?php echo $row["seller_name"]?></h5>
        <p class="card-text">
            <?php
                for($i= 1 ;$i<=4;$i++) {
                    echo '<i class="fas fa-star" style="font-size: 20px;color: gold"></i>';
                }
                $sql2 = "SELECT DISTINCT product_type FROM product WHERE seller_id = ".$row["seller_id"];
                $result2 = $conn->query($sql2);
            ?>
            <br>ประ :
            <?php
                if ($result2->num_rows > 0) {
                // output data of each row
                while($row2 = $result2->fetch_assoc()) {
                    echo $row2["product_type"].",";
                }}
                ?>
            <br>
            เปิด <?php echo $row["seller_time"]?><br>
            ที่อยู่ :<br>
            <?php echo $row["seller_address"]?>
        </p>
    </div>
<!--    <div class="card-footer bg-transparent border-danger">Footer</div>-->
</div>
<?php
        }
    } else {
        echo "0 results";
    }
    $conn->close();
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

