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
    <?php
    require_once('../../dao/pdo.php');
    session_start();
    check_login();
    ?>
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
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a>
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
                    <h1>QUẢN LÝ HÀNG HÓA</h1>
                    <p>Điền đầy đủ thông tin để tiến hành thêm hàng hóa mới :</p>

                    <!-- /. CODE XỬ LÝ PHP  -->
                    <?php
                    require_once('../../dao/hang-hoa.php');
                    require_once('../../dao/loai-hang.php');

                    extract($_REQUEST);
                    if (array_key_exists("btn_insert", $_REQUEST)) {
                        $up_hinh = save_file("hinh", "../../../hinh-anh/san-pham/");
                        $hinh = strlen($up_hinh) > 0 ? $up_hinh : 'product.png';

                        // $up_hinh1 = save_file("hinh1", "../../../../bigshoes/css/admin/images/products/");
                        // $hinh1 = strlen($up_hinh1) > 0 ? $up_hinh1 : 'product.png';

                        // $up_hinh2 = save_file("hinh2", "../../../../bigshoes/css/admin/images/products/");
                        // $hinh2 = strlen($up_hinh2) > 0 ? $up_hinh2 : 'product.png';

                        // $up_hinh3 = save_file("hinh3", "../../../../bigshoes/css/admin/images/products/");
                        // $hinh3 = strlen($up_hinh3) > 0 ? $up_hinh3 : 'product.png';

                        hang_hoa_insert($ten_hh, $hinh, $don_gia, $giam_gia, $mo_ta, $ma_loai);
                        unset($ten_hh, $hinh, $don_gia, $giam_gia, $mo_ta, $ma_loai);
                        $message = "Thêm hàng hóa thành công !";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                    ?>
                    <!-- /. CONTENT  -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Tên hàng hóa:</label>
                            <input type="text" class="form-control" id="ten_hh" name="ten_hh" placeholder="Nhập tên hàng hóa ...">
                        </div>

                        <div class="form-group">
                            <label for="">Đơn giá</label>
                            <input type="number" class="form-control" id="don_gia" name="don_gia" placeholder="Nhập đơn giá ...">
                        </div>

                        <div class="form-group">
                            <label for="">Giảm giá (%)</label>
                            <input type="number" class="form-control" id="giam_gia" name="giam_gia" min="0" max="100" placeholder="Nhập giảm giá">
                        </div>

                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" class="form-control-file border" name="hinh">
                        </div>

                        <!-- <div class="form-group">
                            <label for="">Hình ảnh 1</label>
                            <input type="file" class="form-control-file border" name="hinh1">
                        </div>

                        <div class="form-group">
                            <label for="">Hình ảnh 2</label>
                            <input type="file" class="form-control-file border" name="hinh2">
                        </div>

                        <div class="form-group">
                            <label for="">Hình ảnh 3</label>
                            <input type="file" class="form-control-file border" name="hinh3">
                        </div> -->

                        <div class="form-group">
                            <label for="">Mô tả:</label>
                            <textarea class="form-control" rows="5" id="mo_ta" name="mo_ta" placeholder="Mô tả hàng hóa ..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Mã loại?</label>
                            <select name="ma_loai" class="form-control">
                                <?php
                                $loai_select_list = loai_hang_select_all();
                                foreach ($loai_select_list as $loai) {
                                    echo '<option value="' . $loai['ma_loai'] . '">' . $loai['ten_loai'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" name="btn_insert" class="btn btn-primary">Thêm mới</button>
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


</body>

</html>