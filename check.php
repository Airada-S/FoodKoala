<?php
session_start();
$s = $_REQUEST["s"];
echo $s;
if($s==1){
    $_SESSION['status']='login';
    echo $_SESSION['status'];
    header("Location:index.php");
}elseif($s == 2){
    $pt = $_REQUEST["pt"];
    $_SESSION['page'] = 'menu';
    header("Location:index.php?pt=".$pt);
}elseif($s == 3){
    session_destroy();
    header("Location:index.php");
}
?>
