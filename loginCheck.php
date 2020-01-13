<?php
require_once './ConnectDatabase.php';
$conn = new ConnectDB();
$user = $conn->login($_POST['username'],$_POST['password']);
$_SESSION['user'] = $_POST['username'];
header("Location:index.php");