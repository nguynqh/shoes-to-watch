<?php
require_once("../login/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ma_hh = $_POST["ma_hh"];
    $trang_thai = $_POST["trang_thai"];
    $conn = mysqli_connect('localhost', 'root', '', 'bigshoes');

    if ($trang_thai == 2) { // Nếu người dùng ấn vào nút "Ẩn"
        $sql_check_sold = "SELECT COUNT(*) AS sold_count FROM hoa_don_chi_tiet WHERE ma_hh = $ma_hh";
        $result_check_sold = mysqli_query($conn, $sql_check_sold);
        $row = mysqli_fetch_assoc($result_check_sold);
        $sold_count = $row['sold_count'];

        if ($sold_count > 0) {
            // Nếu sản phẩm đã bán, cập nhật trạng thái thành "Đã ẩn" (trạng thái 2)
            $new_trang_thai = 2;
        } else {
            // Nếu sản phẩm chưa bán, không thay đổi trạng thái
            $new_trang_thai = 0;
        }
    } elseif ($trang_thai == 1) { // Nếu người dùng ấn vào nút "Hiện"
        $sql_check_sold = "SELECT COUNT(*) AS sold_count FROM hoa_don_chi_tiet WHERE ma_hh = $ma_hh";
        $result_check_sold = mysqli_query($conn, $sql_check_sold);
        $row = mysqli_fetch_assoc($result_check_sold);
        $sold_count = $row['sold_count'];

        if ($sold_count > 0) {
            // Nếu sản phẩm đã bán, cập nhật trạng thái thành "Đã bán" (trạng thái 1)
            $new_trang_thai = 1;
        } else {
            // Nếu sản phẩm chưa bán, cập nhật trạng thái thành "Chưa bán" (trạng thái 0)
            $new_trang_thai = 0;
        }
    }

    $sql_update = "UPDATE hang_hoa SET trang_thai = $new_trang_thai WHERE ma_hh = $ma_hh";
    if (mysqli_query($conn, $sql_update)) {
        echo "Cập nhật trạng thái thành công";
        header("Location: hang-hoa-list.php");
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
