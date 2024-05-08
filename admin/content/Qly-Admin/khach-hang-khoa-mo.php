<?php
// Kết nối đến cơ sở dữ liệu
require_once("../login/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_kh = $_POST["ma_kh"];
    $trang_thai = $_POST["trang_thai"];

    // Đảo ngược trạng thái
    $new_trang_thai = $trang_thai == 0 ? 1 : 0;

    // Cập nhật trạng thái trong cơ sở dữ liệu
    $sql = "UPDATE khach_hang SET trang_thai = $new_trang_thai WHERE ma_kh = $ma_kh";
    if ($conn->query($sql) === TRUE) {
        // Chuyển hướng trở lại trang danh sách khách hàng
        header("Location: khach-hang-list.php");
        exit();
    } else {
        echo "Lỗi khi cập nhật trạng thái: " . $conn->error;
    }
}
?>
