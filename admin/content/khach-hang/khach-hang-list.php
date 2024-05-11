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
                    <h1>QUẢN LÝ DANH SÁCH KHÁCH HÀNG</h1>
                    <p>Dưới đây là danh sách các khách hàng đã đăng ký: </p>

                    <!-- /. XỬ LÝ CODE PHP  -->
                    <?php
                    require_once('../../dao/khach-hang.php');

                    $items = khach_hang_select_all();
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
                                <th>MÃ KHÁCH HÀNG</th>
                                <th>TÊN ĐĂNG NHẬP</th>
                                <th>HỌ VÀ TÊN</th>
                                <th>EMAIL</th>
                                <th>SĐT</th>
                                <th>ĐỊA CHỈ</th>
                                <th>TRẠNG THÁI</th>
                                <th>HÀNH ĐỘNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item) {
                                extract($item);
                            ?>
                                <tr>
                                    <td><?= $ma_kh ?></td>
                                    <td><?= $ten_dang_nhap ?></td>
                                    <td><?= $ho_ten ?></td>
                                    <td><?= $email ?></td>
                                    <td><?= $sdt ?></td>
                                    <td><?= $duong . ', ' . $phuong .  ', ' . $quan.  ', ' . $thanh_pho?></td>
                                    <td><?php echo $trang_thai == 0 ? "Hoạt động tốt" : "Bị chặn"; ?></td>
                                    <td>
                                    <a href="khach-hang-update.php?ma_kh=<?= $ma_kh ?>">
                                        <button class="btn btn-primary">Sửa</button>
                                    </a>
                                    <form method="post" action="khach-hang-khoa-mo.php">
                                        <input type="hidden" name="ma_kh" value="<?= $ma_kh ?>">
                                        <input type="hidden" name="trang_thai" value="<?= $trang_thai ?>">
                                        <button type="submit" class="btn <?php echo $trang_thai == 0 ? 'btn-warning' : 'btn-success'; ?>">
                                            <?php echo $trang_thai == 0 ? 'Khóa' : 'Mở'; ?>
                                        </button>
                                    </form>
                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" href="khach-hang-delete.php?ma_kh=<?= $ma_kh ?>">
                                        <button class="btn btn-danger">Xóa</button>
                                    </a>
                                </td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="../khach-hang/khach-hang-new.php"><button class="btn btn-danger">Thêm mới</button></a>
                </div>
            </div>
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <script src="../../../css/admin/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="../../../css/admin/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="../../../css/admin/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="../../../css/admin/js/custom-scripts.js"></script>


</body>

</html>