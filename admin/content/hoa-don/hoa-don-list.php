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
            <p>Dưới đây là danh sách các đơn hàng mà khách hàng đã đặt mua:</p>

            <!-- Form lọc đơn hàng -->
            <div class="row">
    <div class="col-md-2">
        <h4><b>Lọc đơn hàng: </b></h4>
    </div>
    <div class="col-md-10">
        <form action="" method="GET">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="date" class="form-label">Ngày đặt hàng</label>
                    <input type="date" id="date" name="ngay_mua" required value="<?= isset($_GET['ngay_mua']) == true ? $_GET['ngay_mua'] : '' ?>" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="inputSelectLarge" class="form-label">Tình trạng đơn hàng</label>
                    <select id="inputSelectLarge" name="tinh_trang" required class="form-select form-select-lg">
                        <option value="">Chọn tình trạng đơn hàng</option>
                        <option value="0" <?= isset($_GET['tinh_trang']) == true ? ($_GET['tinh_trang'] == '0' ? 'selected' : '') : '' ?>>Chưa xử lý</option>
                        <option value="1" <?= isset($_GET['tinh_trang']) == true ? ($_GET['tinh_trang'] == '1' ? 'selected' : '') : '' ?>>Đã xử lý</option>
                        <option value="2" <?= isset($_GET['tinh_trang']) == true ? ($_GET['tinh_trang'] == '2' ? 'selected' : '') : '' ?>>Đã hủy</option>
                    </select>
                </div>
                <div class="col-md-4 ">
                    <strong>Hành động</strong><br>
                    <button type="submit" class="btn btn-primary">Lọc</button>
                    <a href="hoa-don-list.php" class="btn btn-warning">Làm mới</a>
                </div>
            </div>
        </form>
    </div>
</div>

            <!-- Bảng hiển thị thông tin đơn hàng -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Mã HĐ</th>
                        <th>Mã KH</th>
                        <th>Ngày Mua</th>
                        <th>Ghi Chú</th>
                        <th>Hình Thức Thanh Toán</th>
                        <th>Tình Trạng</th>
                        <th>Chi Tiết</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once('../../dao/hoa-don.php');
                    //nếu tồn tại 2 thông tin ngay mua và tình trạng
                    if (isset($_GET['ngay_mua']) && isset($_GET['tinh_trang'])) {
                        $date = $_GET['ngay_mua'];
                        $status = $_GET['tinh_trang'];
                        $enquires = mysqli_query($conn, "SELECT * FROM hoa_don WHERE ngay_mua ='$date' AND tinh_trang='$status' ORDER BY ma_hd DESC");
                        //tìm các hoa_don trùng với 2 biến get  
                        //nếu kết quả tìm được >0 thực hiện câu lệnh bên dưới
                        if (mysqli_num_rows($enquires) > 0) {
                            foreach ($enquires as $item) {
                                extract($item);
                                $detail = hoa_don_chi_tiet_select_all();
                                $hinh_thuc_thanh_toan = "";
                                foreach ($detail as $detail_item) {
                                    if ($detail_item['ma_hd'] == $ma_hd) {
                                        $hinh_thuc_thanh_toan = $detail_item['Thanh_toan'] == 0 ? "Thanh toán tiền mặt" : "Thanh toán trực tuyến";
                                        break;
                                    }
                                }
                    ?>
                                <tr>
                                    <td><?= $ma_hd ?></td>
                                    <td><?= $ma_kh ?></td>
                                    <td><?= $ngay_mua ?></td>
                                    <td><?= $ghi_chu ?></td>
                                    <td><?= $hinh_thuc_thanh_toan ?></td>
                                    <td>
                                    <a href="thanh-toan-gio-hang.php?ma_hd=<?= $ma_hd ?>">
                                        <?php
                                        if ($tinh_trang == 0) {
                                            echo '<button class="btn btn-warning name="thanh_toan">';
                                            echo "Chưa xử lý";
                                        } else if ($tinh_trang == 1) {
                                            echo '<button class="btn btn-primary name ="thanh_toan" disabled>';
                                            echo "Đã xử lý";
                                        } else if ($tinh_trang == 2) {
                                            echo '<button class="btn btn-danger name ="thanh_toan" disabled>';
                                            echo "Đã hủy";
                                        }
                                        ?>
                                    </button>
                                    </a>

                                    </td>
                                    <td><a href="chi-tiet-hoa-don.php?ma_hd=<?= $ma_hd ?>&ma_kh=<?= $ma_kh ?>"><button class="btn btn-success">Chi tiết</button></a></td>
                                </tr>
                            <?php
                            }
                            //nếu kết quả =0 thì không có đơn hàng phù hợp
                        } else {
                            echo "<tr><td colspan='7'>Không tìm thấy đơn hàng phù hợp.</td></tr>";
                        }
                    }// nếu không tồn tại giá trị lọc thì hiển thị tất cả sản phẩm
                     else {
                        $items = hoa_don_select_all();
                        if (isset($items) && is_array($items)) {
                            foreach ($items as $item) {
                                extract($item);
                                $detail = hoa_don_chi_tiet_select_all();
                                $thanh_toan_row = null;
                                foreach ($detail as $detail_item) {
                                    if ($detail_item['ma_hd'] == $ma_hd) {
                                        $thanh_toan_row = $detail_item;
                                        break;
                                    }
                                }
                                $hinh_thuc_thanh_toan = "";
                                if ($thanh_toan_row) {
                                    $hinh_thuc_thanh_toan = $thanh_toan_row['Thanh_toan'] == 0 ? "Thanh toán tiền mặt" : "Thanh toán trực tuyến";
                                }
                            ?>
                                <tr>
                                    <td><?= $ma_hd ?></td>
                                    <td><?= $ma_kh ?></td>
                                    <td><?= $ngay_mua ?></td>
                                    <td><?= $ghi_chu ?></td>
                                    <td><?= $hinh_thuc_thanh_toan ?></td>
                                    <td>
                                        <a href="thanh-toan-gio-hang.php?ma_hd=<?= $ma_hd ?>">
                                        <?php
                                        if ($tinh_trang == 0) {
                                            echo '<button class="btn btn-warning name="thanh_toan">';
                                            echo "Chưa xử lý";
                                        } else if ($tinh_trang == 1) {
                                            echo '<button class="btn btn-primary name ="thanh_toan" disabled>';
                                            echo "Đã xử lý";
                                        } else if ($tinh_trang == 2) {
                                            echo '<button class="btn btn-danger name ="thanh_toan" disabled>';
                                            echo "Đã hủy";
                                        }
                                        ?>
                                            </button>
                                        </a>
                                    </td>
                                    <td><a href="chi-tiet-hoa-don.php?ma_hd=<?= $ma_hd ?>&ma_kh=<?= $ma_kh ?>"><button class="btn btn-success">Chi tiết</button></a></td>
                                </tr>
                    <?php
                            }
                        } else {
                            echo "<tr><td colspan='7'>Không có đơn hàng.</td></tr>";
                        }//trường hợp chưa có đơn hàng
                    }
                    ?>
                </tbody>
            </table>
            <!-- Kết thúc bảng hiển thị thông tin đơn hàng -->
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
