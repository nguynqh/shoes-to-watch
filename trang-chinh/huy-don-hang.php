<?php
    require_once ('../admin/dao/pdo.php');
    $sql = "UPDATE hoa_don SET tinh_trang = 2 WHERE ma_hd = ?";
    pdo_execute($sql,$_GET['ma_hd']);
    header('location:don-mua.php');
?>