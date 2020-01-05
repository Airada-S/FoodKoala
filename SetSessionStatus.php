<?php
session_start();
require_once './ConnectDatabase.php';

if($_SESSION['page'] == null){
    $_SESSION['page'] = 'null';
    $conn = new ConnectDB();
    $result = $conn->getAll();
}

if($_SESSION['status'] == null){

}
//session_destroy();




