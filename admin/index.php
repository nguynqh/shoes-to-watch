<?php
session_start();
include("content/login/admin-xyly.php");
if(isset($_SESSION['login']) && $_SESSION['login']==1){
    header('location: content/thong-ke/thong-ke-list.php');
}else{
    header('location: content/login/login.php');
}
?>