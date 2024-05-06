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
    <link rel="shortcut icon" type="image/png" href="../../../css/admin/img/TBT.png" />
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
                <a class="navbar-brand" href="../../../../bigshoes/trang-chinh/" style="background:#00CC99;">
                    <strong style="margin-left: 40px;">BIG SHOES</strong></a>
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
                <form id="logoutForm" action="../../../tai-khoan/dang-xuat.php" method="post">
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
                        <a href="../hoa-don/hoa-don-list.php"><i class="fa fa-edit"></i>ĐƠN HÀNG</a>
                    </li>
                </ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div class="header">
                <div class="page-header">
                    <h1>QUẢN LÝ KHÁCH HÀNG</h1>
                    <p>Cập nhật lại thông tin khách hàng: </p>

                    <!-- /. CODE XỬ LÝ PHP  -->
                    <?php
                    require_once('../../dao/khach-hang.php');
                    extract($_REQUEST);
                    $item = khach_hang_select_by_id($ma_kh);
                    extract($item);

                    extract($_REQUEST);
                    if (array_key_exists("btn_update", $_REQUEST)) {
                        khach_hang_update($ma_kh,$ten_dang_nhap ,$ho_ten, $mat_khau, $email, $sdt, $dia_chi);
                        $message = "Cập nhật tài khoản thành công !";
                        echo "<script type='text/javascript'>alert('$message'); window.location.href='khach-hang-list.php';</script>";
                    }
                    ?>
                    <!-- /. CONTENT  -->
                    <form action="" method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="">Mã khách hàng:</label>
                            <input type="text" class="form-control" name="ma_kh" placeholder="Mã khách hàng đã được khóa" value="<?= $ma_kh ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tên đăng nhập:</label>
                            <input type="text" class="form-control" name="ten_dang_nhap" placeholder="Nhập tên đăng nhập ..." value="<?= $ten_dang_nhap ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Họ và tên:</label>
                            <input type="text" class="form-control" name="ho_ten" placeholder="Nhập họ và tên ..." value="<?= $ho_ten ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Mật khẩu:</label>
                            <input type="text" class="form-control" name="mat_khau" placeholder="Nhập mật khẩu ..." value="<?= $mat_khau ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="text" class="form-control" name="email" placeholder="Nhập email ..." value="<?= $email ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Số điện thoại:</label>
                            <input type="text" class="form-control" name="sdt" placeholder="Nhập số điện thoại ..." value="<?= $sdt ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Địa chỉ:</label>
                            <input type="text" class="form-control" name="dia_chi" placeholder="Nhập địa chỉ ..." value="<?= $dia_chi ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Vai trò:</label>
                            <input type="text" class="form-control" placeholder="Khách hàng ..." readonly>
                        </div>

                        <button type="submit" name="btn_update" class="btn btn-danger">Cập nhật</button>
                        <a href="./khach-hang-list.php"><button type="button" name="btn_update" class="btn btn-info">Quay lại</button></a>
                    </form>
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