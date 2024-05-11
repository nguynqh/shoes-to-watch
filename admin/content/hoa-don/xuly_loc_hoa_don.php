<?php
// Kết nối đến cơ sở dữ liệu
require_once("../login/connect.php");

// Lấy giá trị tinh_trang được gửi từ form
$tinh_trang_filter = $_GET['tinh_trang'];

// Truy vấn dữ liệu từ cơ sở dữ liệu với điều kiện tinh_trang được lựa chọn
$sql = "SELECT * FROM hoa_don WHERE tinh_trang = $tinh_trang_filter";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output dữ liệu của mỗi hàng
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["ma_hd"] . " - Tình trạng: " . $row["tinh_trang"]. "<br>";
    }
} else {
    echo "Không có hóa đơn nào phù hợp với bộ lọc này.";
}

// Đóng kết nối đến CSDL
$conn->close();
?>
