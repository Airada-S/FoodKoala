<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bill</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
include 'header.php';
?>
<div class="container">
    <div class="row" style="margin-top: 10%" >
        <div class="col-6" >
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h1 style="width: 3rem; height: 3rem; background-color: #b87070; text-align: center">1</h1>
                        </li>
                        <li class="list-inline-item">
                            <h2 class="card-title">รายละเอียดการจัดส่ง</h2>
                        </li>
                    </ul>
                    <h5 class="card-title">เวลาส่งอาหาร</h5>
                    <select id="date">
                        <option></option>
                    </select>
                    <input type="time" style="width: 45%;">
                    <h5 class="card-title mt-5">ที่อยู่สำหรับจัดส่ง</h5>
                    <div class="card" style="width: 50%; border-color: #e06c6c;">
                        <div STYLE="text-align: end;padding: 10px">
                              <a href="#" style="color: #e06c6c"><i class="far fa-edit"></i></a>
                              <a href="#" style="color: #e06c6c"><i class="far fa-trash-alt"></i></a>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h1 style="width: 3rem; height: 3rem; background-color: #b87070; text-align: center">2</h1>
                        </li>
                        <li class="list-inline-item">
                            <h2 class="card-title">ข้อมูลส่วนตัว</h2>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <h1 style="width: 3rem; height: 3rem; background-color: #b87070; text-align: center">3</h1>
                        </li>
                        <li class="list-inline-item">
                            <h2 class="card-title">การชำระเงิน</h2>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-6" style="text-align: center">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <p class="font-weight-normal">ออเดอร์รายการอาหารของคุณ</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    let tomorrow = new Date();
    const x = document.getElementById("date");
    let date;
    var months = ["January", "February", "March", "April", "May", "June", "July",
        "August", "September", "October", "November", "December"];
    const option = document.createElement("option");
    date = tomorrow.getDate()+"/"+months[tomorrow.getMonth()]+"/"+tomorrow.getFullYear();
    option.text = date;
    x.add(option);
    for (let i = 1; i < 5; i++) {
        const option = document.createElement("option");
        tomorrow.setDate(tomorrow.getDate() + 1);
        date = tomorrow.getDate()+"/"+months[tomorrow.getMonth()]+"/"+tomorrow.getFullYear();
        option.text = date;
        x.add(option);
    }
    document.getElementById("date").selectedIndex = "1";
</script>
</body>
</html>