<?php
// Kết nối đến cơ sở dữ liệu
require_once("../login/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ManagerID = $_POST["ManagerID"];
    $status = $_POST["status"];

    // Đảo ngược trạng thái
    $new_status = $status == 0 ? 1 : 0;

    // Cập nhật trạng thái trong cơ sở dữ liệu
    $sql = "UPDATE manager SET status = $new_status WHERE ManagerID = $ManagerID";
    if ($conn->query($sql) === TRUE) {
        // Chuyển hướng trở lại trang danh sách khách hàng
        header("Location: admin-list.php");
        exit();
    } else {
        echo "Lỗi khi cập nhật trạng thái: " . $conn->error;
    }
}
?>
