<?php
session_start();
$s = $_REQUEST["s"];
//echo $s;
if($s==1){
//    session_destroy();
    $_SESSION['status']='login';
    $_SESSION['user']=$_POST["user"];
//    echo $_SESSION['status'];
    header("Location:index.php");
}elseif($s == 2){
    $pt = $_REQUEST["pt"];
    $_SESSION['page'] = 'searchByType';
    header("Location:index.php?pt=".$pt);
} elseif ($s == 3){
    $search = $_POST["Search"];
    $choice = $_POST["choice"];
    $_SESSION['page'] = $choice;
    header("Location:index.php?search=".$search);
//    echo "<br>". $_POST["choice"];

}elseif($s == 4){
    session_destroy();
    header("Location:index.php");
}elseif($s == 5){
    $id = $_REQUEST["id"];
    header("Location:seller.php?id=".$id);
}elseif($s == 6){
    $pid = $_REQUEST["pid"];
    $id = $_REQUEST["id"];
    $_SESSION["pid"] = $_SESSION["pid"].$pid."|";

    header("Location:seller.php?id=".$id);
}elseif($s == 7){
    echo $_SESSION["pid"];
//    $id = $_REQUEST["id"];
    header("Location:showProductList.php");
}
?>
