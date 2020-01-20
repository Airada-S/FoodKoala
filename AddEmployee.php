<?php
include 'header.php';
//require("SetSessionStatus.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="button.css">

</head>
<body>

<?php
require './ConnectDatabase.php';
$con = new connectDB();
if($con->connect()){
    $sql = "SELECT * FROM `employee`";
    $objquery = mysqli_query($con->connect(), $sql);

}else{
    echo 'Connect Failed:'. mysqli_error($con->connect());
}
?>
<form action='check.php?s=22' method='POST'>
    <div class="form-group">
        <label for="exampleFormControlInput1">Name LastName</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="employee_name">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Phone Number</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="employee_tell">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Address</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="employee_add">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">UserName</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="employee_user">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Password</label>
        <input type="password" class="form-control" id="exampleFormControlInput1" name="employee_pass">
    </div>
</form>
<br>
<input type="submit" name="submit" value="Register" >
</body>
</html>


