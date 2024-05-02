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
                    <h1>QUẢN LÝ HÀNG HÓA</h1>
                    <div class="row">
                        <div class="col-md-3" style="padding-left: 0px;margin-top: 42px;">
                            <div class="row" style="margin-left: 0px;">
                                <form action="hang-hoa-list.php" method="get">
                                    <div class="serch">
                                        <input type="text" placeholder="Tìm kiếm..." name="keyword">
                                        <button type="submit" style="background-color:black"><i class="fa fa-search" style="font-size:20px;color:white;"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="row" style="margin-left: 0px;">
                            </div>
                        </div>
                    </div>
                    <p>Dưới đây là danh sách các sản phẩm đã được thêm vào: </p>

                    <?php
                    $result = "";
                    $conn = mysqli_connect('localhost', 'root', '', 'bigshoes');
                    if (!empty(($_GET['keyword']))) {
                        $search = $_GET['keyword'];
                        $result = mysqli_query($conn, $sql = "SELECT count(ma_hh) AS total FROM hang_hoa WHERE (CONCAT(ten_hh,don_gia) LIKE '%" . $search . "%')");
                    
                    } else {
                        $result = mysqli_query($conn, 'select count(ma_hh) AS total FROM hang_hoa');
                    }
                    $row = mysqli_fetch_assoc($result);
                    $total_records = $row['total'];
                    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $limit = 6;
                    $total_page = ceil($total_records / $limit);
                    if ($current_page > $total_page) {
                        $current_page = $total_page;
                    } else if ($current_page < 1) {
                        $current_page = 1;
                    }
                    $start = ($current_page - 1) * $limit;
                    if (!empty(($_GET['keyword']))) {
                        $search = $_GET['keyword'];
                        $result = mysqli_query($conn, $sql = "SELECT * FROM hang_hoa WHERE (CONCAT(ten_hh,don_gia) LIKE '%" . $search . "%') LIMIT $start, $limit");
                    } else {
                        $result = mysqli_query($conn, "SELECT * FROM hang_hoa LIMIT $start, $limit");
                    }
                    $html = '';
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>MÃ HÀNG HÓA</th>
                                <th>TÊN HÀNG HÓA</th>
                                <th>HÌNH ẢNH</th>
                                <th>SỐ LƯỢNG</th>
                                <th>ĐƠN GIÁ</th>
                                <th>GIẢM GIÁ</th>
                                <th>HÀNH ĐỘNG</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($item = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?= $item['ma_hh'] ?></td>
                                    <td><?= $item['ten_hh'] ?></td>
                                    <td><img src="../../../../hinh-anh/san-pham/<?= $item['hinh']?>" alt="" style="width:120px;"></td>
                                    <td><?= $item['so_luong'] ?></td>
                                    <td ><?= number_format($item['don_gia']) ?> VNĐ</td>
                                    <td><?= $item['giam_gia'] ?> <sup>%</sup></td>
                                    <td>
                                        <a href="hang-hoa-update.php?ma_hh=<?= $item['ma_hh'] ?>"><button class="btn btn-primary">Sửa</button></a>
                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" href="hang-hoa-delete.php?ma_hh=<?= $item['ma_hh'] ?>"><button class="btn btn-danger">Xóa</button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="hang-hoa-new.php"><button class="btn btn-danger">Thêm mới</button></a><br>
                    <div class="col-md-9">
                        <div id="menu" style="margin-left: 480px;">
                            <?php echo $html; ?>
                            <div class="pagination" style="text-align: center;list-style-type: none;display: inline-block">
                                <?php
                                for ($i = 1; $i <= $total_page; $i++) {
                                    if ($i == $current_page) {
                                        echo '<li class="page-item"><a class="page-link">' . $i . '</a></li> ';
                                    } else {
                                        if (isset($_GET['keyword'])) {
                                            echo '<li class="page-item">
                              <a class="page-link" href="hang-hoa-list.php?keyword=' . $_GET['keyword'] . '&page=' . $i . '">' . $i . '</a></li ';
                                        } else {
                                            echo '<li class="page-item"><a class="page-link" href="hang-hoa-list.php?page=' . $i . '">' . $i . '</a></li>';
                                        }
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div><br><br><br>

                    <script src="../../../css/admin/js/jquery-1.10.2.js"></script>
                    <!-- Bootstrap Js -->
                    <script src="../../../css/admin/js/bootstrap.min.js"></script>
                    <!-- Metis Menu Js -->
                    <script src="../../../css/admin/js/jquery.metisMenu.js"></script>
                    <!-- Custom Js -->
                    <script src="../../../css/admin/js/custom-scripts.js"></script>


</body>

</html>