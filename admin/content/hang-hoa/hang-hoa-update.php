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
                    <h1>QUẢN LÝ HÀNG HÓA</h1>
                    <p>Cập nhật lại thông tin hàng hóa :</p>

                    <!-- /. CODE XỬ LÝ PHP  -->
                    <?php
                    require_once('../../dao/hang-hoa.php');
                    require_once('../../dao/loai-hang.php');
                    extract($_REQUEST);
                    $item = hang_hoa_select_by_id($ma_hh);
                    extract($item);


                    extract($_REQUEST);
                    if (array_key_exists("btn_update", $_REQUEST)) {
                        $up_hinh = save_file("hinh", "../../../hinh-anh/san-pham/");
                        $hinh = strlen($up_hinh) > 0 ? $up_hinh : $hinh;

                        // $up_hinh1 = save_file("hinh1", "../../../css/admin/images/products/");
                        // $hinh1 = strlen($up_hinh1) > 0 ? $up_hinh1 : $hinh1;

                        // $up_hinh2 = save_file("hinh2", "../../../css/admin/images/products/");
                        // $hinh2 = strlen($up_hinh2) > 0 ? $up_hinh2 : $hinh2;

                        // $up_hinh3 = save_file("hinh3", "../../../css/admin/images/products/");
                        // $hinh3 = strlen($up_hinh3) > 0 ? $up_hinh3 : $hinh3;

                        hang_hoa_update($ma_hh, $ten_hh,$so_luong ,$don_gia, $giam_gia, $hinh, $ma_loai, $mo_ta);
                        $message = "Sửa thành công !";
                        echo "<script type='text/javascript'>alert('$message'); window.location.href = 'hang-hoa-list.php'</script>";
                    }
                    ?>
                    <!-- /. CONTENT  -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Mã hàng hóa:</label>
                            <input type="text" class="form-control" id="ma_hh" name="ma_hh" placeholder="Nhập tên hàng hóa ..." value=<?= $ma_hh ?> readonly>
                        </div>

                        <div class="form-group">
                            <label for="">Tên hàng hóa:</label>
                            <input type="text" class="form-control" id="ten_hh" name="ten_hh" placeholder="Nhập tên hàng hóa ..." value="<?= $ten_hh ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng </label>
                            <input type="text" class="form-control" id="so_luong" name="so_luong" placeholder="Nhập số lượng hàng hóa ..." value="<?= $so_luong ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Đơn giá</label>
                            <input type="number" class="form-control" id="don_gia" name="don_gia" placeholder="Nhập đơn giá ..." value="<?= $don_gia ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Giảm giá (%)</label>
                            <input type="number" class="form-control" id="giam_gia" name="giam_gia" min="0" max="100" placeholder="Nhập giảm giá" value="<?= $giam_gia ?>">
                        </div>

                        <div class="form-group">
                        <label for="">Hình Ảnh Hiện Tại</label>
                        <!-- Hiển thị hình ảnh hiện tại -->
                        <img id="current-image" src="../../../hinh-anh/san-pham/<?= $hinh ?>" alt="" style="width:80px">
                        <br>
                        <!-- Hiển thị tên tệp của hình ảnh hiện tại -->
                        <div style="margin-left:50px">(file hình <?= $hinh ?>)</div>
                        <!-- Input để chọn hình ảnh mới -->
                        <input type="file" id="input-file" class="form-control-file border" name="hinh" onchange="previewImage(event)">
                        <!-- Input ẩn chứa đường dẫn của hình ảnh hiện tại -->
                        <input name="hinh" type="hidden" value="<?= $hinh ?>"><br>
   
</div>

                        

                        <div class="form-group">
                            <label for="">Mô tả:</label>
                            <textarea class="form-control" rows="5" id="mo_ta" name="mo_ta" placeholder="Mô tả hàng hóa ..."><?= $mo_ta ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Tên Loại</label>
                            <select name="ma_loai" class=form-control>
                                <?php
                                $loai_select_list = loai_hang_select_all();
                                foreach ($loai_select_list as $loai) {
                                    if ($loai['ma_loai'] == $ma_loai) {
                                        echo '<option selected value="' . $loai['ma_loai'] . '">' . $loai['ten_loai'] . '</option>';
                                    } else {
                                        echo '<option value="' . $loai['ma_loai'] . '">' . $loai['ten_loai'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="btn_update" class="btn btn-danger">Cập nhật</button>
                        <a href="./hang-hoa-list.php"><button type="button" name="btn_insert" class="btn btn-info">Quay lại</button></a>
                    </form>
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
    <script>
    // Function để xem trước hình ảnh mới
    function previewImage(event) {
        var reader = new FileReader(); // Tạo một đối tượng FileReader

        // Xác định hành động khi đọc tệp hoàn tất
        reader.onload = function () {
            var output = document.getElementById('current-image'); // Lấy phần tử hình ảnh hiện tại
            output.src = reader.result; // Đặt đường dẫn của hình ảnh mới vào thuộc tính src của phần tử hình ảnh hiện tại
        }

        // Đọc tệp hình ảnh
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

</body>

</html>