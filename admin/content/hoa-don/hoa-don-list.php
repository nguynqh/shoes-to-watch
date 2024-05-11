<?php
session_start();
if(isset($_SESSION['login']) && $_SESSION['login']==1){
    // Kết nối đến cơ sở dữ liệu
    require_once("../login/connect.php");

    // Lấy thông tin người dùng từ cơ sở dữ liệu
    $sodienthoai = $_SESSION['sodienthoai'];
    $sql = "SELECT * FROM manager WHERE Manager_Phone = '$sodienthoai' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['Manager_Full_Name'] = $row['Manager_Full_Name']; // Lưu tên người dùng vào session
    }
} else {
    header('location: ../login/login.php');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="" name="description" />
    <meta content="webthemez" name="author" />
    <title>ADMIN</title>
    <!-- Bootstrap Styles-->
    <link href="../../../css/admin/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="../../../css/admin/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="../../../css/admin/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="shortcut icon" type="image/png" href="../../../hinh-anh/trang-web/iconweb.png" />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../../index.php">
                    <strong style="margin-left: 40px;">MVH WATCH</strong></a>
            </div>

            <!-- Nav bar-->

            <ul class="nav navbar-top-links navbar-right">
            <div style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px; 
             display: inline-block; vertical-align: middle;
             padding-right: 3px; font-weight: bold; font-size: 16px; color: #6c757d;">
                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
                    // Kết nối đến cơ sở dữ liệu và lấy tên người dùng
                    require_once("../login/connect.php");

                    $sodienthoai = $_SESSION['sodienthoai'];
                    $sql = "SELECT * FROM manager WHERE Manager_Phone = '$sodienthoai' LIMIT 1";
                    $result = $conn->query($sql);

                    if ($result->num_rows == 1) {
                        $row = $result->fetch_assoc();
                        echo 'Chào ' . $row['Manager_Full_Name'];
                    }
                }
                ?>
            </div>
            <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="fa fa-user fa-fw"></i>
            <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            
            <li>
                <form id="logoutForm" action="../../../tai-khoan/dang-xuat-admin.php" method="post">
                    <input type="hidden" name="logout" value="true">
                    <button type="submit" class="btn-link"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</button>
                </form>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>

        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="../thong-ke/thong-ke-list.php"><i class="fa fa-dashboard"></i>TRANG CHỦ</a>
                    </li>
                    <li>
                        <a href="../loai-hang/loai-hang-list.php"><i class="fa fa-list-alt" aria-hidden="true"></i>LOẠI HÀNG</a>
                    </li>
                    <li>
                        <a href="../hang-hoa/hang-hoa-list.php"><i class="fa fa-qrcode"></i>HÀNG HÓA</a>
                    </li>

                    <li>
                        <a href="../khach-hang/khach-hang-list.php"><i class="fa fa-user"></i>KHÁCH HÀNG</a>
                    </li>
                    <li>
                        <a href="../Qly-Admin/admin-list.php"><i class="fa fa-user"></i>QUẢN TRỊ VIÊN</a>
                    </li>
                    <li>
                        <a href="../hoa-don/hoa-don-list.php"><i class="fa fa-edit"></i>ĐƠN HÀNG</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div class="header">
                <div class="page-header">
                    <h1>QUẢN LÝ ĐƠN HÀNG</h1>
                    <p>Dưới đây là danh sách các đơn hàng mà khách hàng đã đặt mua: </p>

                    <!-- /. XỬ LÝ CODE PHP  -->
                    <?php
                    require_once('../../dao/hoa-don.php');


                    $items = hoa_don_select_all();
                    $detail = hoa_don_chi_tiet_select_all();
                    ?>
                    <!-- /. CONTENT  -->
                    <table class="table table-hover" 
                    style="box-shadow: rgb(0 0 0 / 10%) 0px 5px 10px;
                            background: rgb(255, 255, 255);
                            padding: 15px 14px;
                            border-radius: 12px;
                            margin: 0 14px;
                            margin-top: 15px;">
                        <thead>
                            <tr>
                                <th>MÃ HĐ</th>
                                <th>MÃ KH</th>
                                <th>NGÀY MUA</th>
                                <th>GHI CHÚ</th>
                                <th>HÌNH THỨC THANH TOÁN</th>
                                <th>TÌNH TRẠNG</th>
                                <th>CHI TIẾT</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($items as $item) {
                        extract($item);
                        // Tìm dòng dữ liệu trong bảng hoa_don_chi_tiet có ma_hd tương ứng với đơn hàng hiện tại
                        $thanh_toan_row = null;
                        foreach ($detail as $detail_item) {
                            if ($detail_item['ma_hd'] == $ma_hd) {
                                $thanh_toan_row = $detail_item;
                                break;
                            }
                        }
                        
                        // Kiểm tra và hiển thị hình thức thanh toán
                        $hinh_thuc_thanh_toan = "";
                        if ($thanh_toan_row) {
                            $hinh_thuc_thanh_toan = $thanh_toan_row['Thanh_toan'] == 0 ? "Thanh toán tiền mặt" : "Thanh toán trực tuyến";
                        }

                        // Tiếp tục hiển thị dữ liệu đơn hàng
                    ?>
                    <tr>
                        <td><?= $ma_hd ?></td>
                        <td><?= $ma_kh ?></td>
                        <td><?= $ngay_mua ?></td>
                        <td><?= $ghi_chu ?></td>
                        <td><?= $hinh_thuc_thanh_toan ?></td> <!-- Thêm dòng này để hiển thị hình thức thanh toán -->
                        <td>
                            <a href="thanh-toan-gio-hang.php?ma_hd=<?= $ma_hd ?>">
                                <?php
                                if ($tinh_trang == 0) {
                                    echo '<button class="btn btn-danger name="thanh_toan">';
                                    echo "Chưa xử lý";
                                } else {
                                    echo '<button class="btn btn-primary name ="thanh_toan">';
                                    echo "Đã xử lý";
                                }
                                ?>
                                </button>
                            </a>
                        </td>
                        <td><a href="chi-tiet-hoa-don.php?ma_hd=<?= $ma_hd ?>&ma_kh=<?= $ma_kh ?>"><button class="btn btn-success">Chi tiết</button></a></td>
                    </tr>
                    <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="../../../css/admin/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="../../../css/admin/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../../../css/admin/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="../../../css/admin/js/custom-scripts.js"></script>


</body>

</html>