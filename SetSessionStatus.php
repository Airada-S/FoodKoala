<?php
session_start();
require_once './ConnectDatabase.php';
$pt = $_REQUEST["pt"];
if(!isset($_SESSION['page'])){
    $_SESSION['page'] = 'null';
}
if($_SESSION['page'] == 'null'){
    $conn = new ConnectDB();
    $result = $conn->getAll();
}
if($_SESSION['page'] == 'menu'){
    echo $_SESSION['page'];
    $conn = new ConnectDB();
    $conn->getByProductType($pt);
}
if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 'null';
}
if($_SESSION['status'] == 'login'){
    echo $_SESSION['status'];
}
//session_destroy();




