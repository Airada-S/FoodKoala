<?php
session_start();
$s = $_REQUEST["s"];
$pt = $_REQUEST["pt"];
if($s==1){
    $_SESSION['status']='login';
    echo $_SESSION['status'];
    header("Location:index.php");
}elseif($s == 2){
    $_SESSION['page'] = 'menu';
    header("Location:index.php?pt=".$pt);
}
?>
