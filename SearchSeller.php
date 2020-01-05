<?php
require_once './ConnectDatabase.php';
$value = $_GET["SearchID"];
$conn = new ConnectDB();
$result = $conn->getAll();
echo $value;
