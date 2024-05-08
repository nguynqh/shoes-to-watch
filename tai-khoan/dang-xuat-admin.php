<?php
session_start();

if (isset($_POST['logout']) && $_POST['logout'] === 'true') {
    // Xóa session 'login'
    unset($_SESSION['login']);

    // Chuyển hướng người dùng đến trang đăng nhập
    header('Location: ../admin/content/login/login.php');
    exit; // Đảm bảo rằng mã PHP dừng lại tại đây và chuyển hướng được thực hiện
}
?>