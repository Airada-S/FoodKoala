<?php
session_start();
require_once './ConnectDatabase.php';

if(!isset($_SESSION['page'])){
    $_SESSION['page'] = 'null';
}
if($_SESSION['page'] == 'null'){
    $conn = new ConnectDB();
    $result = $conn->getAll();
}
if(!isset($_SESSION['status'])){
    $_SESSION['status'] = 'null';
}
//session_destroy();




