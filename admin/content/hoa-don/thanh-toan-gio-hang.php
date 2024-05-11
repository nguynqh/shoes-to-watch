<?php
require_once('../../dao/hoa-don.php');
extract($_REQUEST);

$item = hoa_don_select_by_id($ma_hd);
extract($item);

// Kiểm tra nếu trạng thái không phải là "Chưa xử lý", không thực hiện cập nhật và không chuyển hướng
if ($tinh_trang != 0) {
    header('location: hoa-don-list.php');
    exit; // Dừng kịch bản
}

$mahd = $ma_hd;
$ngaymua = $ngay_mua;
$ghichu = $ghi_chu;
$tinhtrang = 1;
$makh = $ma_kh;
$conn = pdo_get_connection();
$sql = "UPDATE hoa_don SET ngay_mua = '$ngaymua', ghi_chu = '$ghi_chu', tinh_trang = '$tinhtrang', ma_kh = '$ma_kh' WHERE ma_hd = '$mahd'";
$conn->exec($sql);

header('location: hoa-don-list.php');
?>
