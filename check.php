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

    if (array_key_exists($pid, $_SESSION["listProduct"])) {
        $_SESSION["listProduct"][$pid] += 1;
    } else {
        $_SESSION["listProduct"][$pid] = 1;
    }
//    $_SESSION["pid"] = $_SESSION["pid"].$pid."|";

    header("Location:seller.php?id=".$id);
}elseif($s == 7){
    echo $_SESSION["pid"];
//    $id = $_REQUEST["id"];
    header("Location:showProductList.php");
}elseif($s == 8){
    $pid = $_REQUEST["pid"];
    if($_SESSION["listProduct"][$pid]>=1){
        $_SESSION["listProduct"][$pid] -= 1;
    }
    if($_SESSION["listProduct"][$pid] == 0){
        unset($_SESSION["listProduct"][$pid]);
    }
    header("Location:showProductList.php");
}elseif($s == 9){
    $pid = $_REQUEST["pid"];
    $_SESSION["listProduct"][$pid] += 1;
    header("Location:showProductList.php");
}
?>
