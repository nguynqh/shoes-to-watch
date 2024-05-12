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
    <link rel="stylesheet" href="../../css/custom.css">
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
                <!-- /. XỬ LÝ CODE PHP  -->
                <?php
                require_once('../../../admin/dao/hoa-don.php');
                extract($_REQUEST);
                $items = hoa_don_chi_tiet_select_by_id($ma_hd);
                $Total = 0;
                $khach_hang_info = pdo_query_one("SELECT * FROM khach_hang WHERE ma_kh = ?", $ma_kh);
                // Giả sử $row là một hàng dữ liệu từ kết quả truy vấn SQL
                $dia_chi = $khach_hang_info['duong'] . ', ' . $khach_hang_info['phuong'] .  ', ' . $khach_hang_info['quan'] .  ', ' . $khach_hang_info['thanh_pho'];

                ?>
                <div class="page-header">
                    <h1>CHI TIẾT ĐƠN HÀNG MÃ SỐ <b><?= $ma_hd ?></b></h1><br>
                    <h4>THÔNG TIN KHÁCH HÀNG MÃ SỐ <b><?= $ma_kh; ?></b></h4>
                    <table class="table table-hover"
                    style="box-shadow: rgb(0 0 0 / 10%) 0px 5px 10px;
                            background: rgb(255, 255, 255);
                            padding: 15px 14px;
                            border-radius: 12px;
                            margin: 0 14px;
                            margin-top: 15px;">
                        <thead>
                            <tr>
                                <th>HỌ VÀ TÊN</th>
                                <th>SỐ ĐIỆN THOẠI</th>
                                <th>ĐỊA CHỈ</th>
                                <th>EMAIL</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                
                                <tr>
                                    <td><?= $khach_hang_info['ho_ten'] ?></td>
                                    <td><?= $khach_hang_info['sdt'] ?></td>
                                    <td><?= $dia_chi ?></td>
                                    <td><a href="mailto:info@yoursite.com"><?= $khach_hang_info['email'] ?> </a></td>
                                </tr>
                        </tbody>
                    </table>
                    <h4>CHI TIẾT CÁC SẢN PHẨM TRONG ĐƠN HÀNG <b></b></h4>
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
                                <th>TÊN HÀNG HÓA</th>
                                <th>HÌNH ẢNH</th>
                                <th>SỐ LƯỢNG</th>
                                <th>ĐƠN GIÁ/SP</th>
                                <th>GIẢM GIÁ</th>
                                <th>THÀNH TIỀN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item) {
                                extract($item);
                            ?>
                                <tr>
                                    <td><?= $ten_hh ?></td>
                                    <td class="square-image" style="height:3px">
                                        <img src="../../../hinh-anh/san-pham/<?= $item['hinh']?>" alt="">
                                    </td>
                                    <td><?= $so_luong ?></td>
                                    <td><?= number_format($don_gia) ?> VNĐ</td>
                                    <td><?= number_format($giam_gia) ?> %</td>
                                    <td><?= number_format($don_gia-($don_gia * $giam_gia /100));
                                        $Total += ($don_gia-($don_gia * $giam_gia /100)) ?> VNĐ</td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3" style="text-align:center;"><b>TỔNG TIỀN</b></td>
                                <td><b><?= number_format($Total) ?> VNĐ</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="hoa-don-list.php"><button class="btn btn-danger">Danh sách đơn hàng</button></a>
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