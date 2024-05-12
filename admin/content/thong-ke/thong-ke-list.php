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

    <!-- Chart 3D -->
    <script type="text/javascript" src="../../../js/loader.js"></script>
    <!-- <script type="text/javascript">
        google.charts.load("current", {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Loại', 'Số Lượng', {
                    role: 'style'
                }],
                <?php
                require_once('../../dao/thong-ke.php');
                $items = thong_ke_hang_hoa();

                foreach ($items as $item) {
                    echo "['$item[ma_loai]',$item[so_luong],'#b87333'],";
                }
                ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var options = {
                title: "BIỂU ĐỒ THỐNG KÊ LOẠI HÀNG (theo số lượng)",
                width: 1176,
                height: 500,
                bar: {
                    groupWidth: "25%"
                },
                legend: {
                    position: "none"
                },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script> -->

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
                <a class="navbar-brand" href="../../index.php" style="background:#CC8C25;">
                    <strong style="margin-left: 40px;">MVH WATCH</strong></a>
            </div>

            <!-- Nav bar-->
            </span>
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
                    <h1>QUẢN TRỊ WEBSITE</h1>
                    <!--Bộ lọc thống kê-->
                    <?php
// Kiểm tra nếu đã nhận dữ liệu ngày mua từ form
if(isset($_GET['ngay_mua'])) {
    // Lấy ngày mua từ form
    $ngay_mua = $_GET['ngay_mua'];

    // Thực hiện kết nối đến cơ sở dữ liệu (giả sử đã có)
    require_once("../login/connect.php");

    // Truy vấn SQL để tính tổng tiền mua hàng của từng khách hàng
    $query = "SELECT kh.ma_kh, kh.ten_dang_nhap, kh.email, kh.duong, kh.phuong, kh.quan, kh.thanh_pho,
              SUM(hh.don_gia - hh.don_gia * hh.giam_gia) AS tong_tien
              FROM hoa_don hd
              INNER JOIN hoa_don_chi_tiet hct ON hd.ma_hd = hct.ma_hd
              INNER JOIN hang_hoa hh ON hct.ma_hh = hh.ma_hh
              INNER JOIN khach_hang kh ON hd.ma_kh = kh.ma_kh
              WHERE hd.ngay_mua = '$ngay_mua'
              GROUP BY kh.ma_kh
              ORDER BY tong_tien DESC";

    $result = mysqli_query($conn, $query);

    // Lấy thông tin 5 khách hàng có mức mua hàng cao nhất trong ngày đã chọn
    $top_customers = [];
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $top_customers[] = $row;
        $count++;
        if ($count >= 5) {
            break;
        }
    }

    // Hiển thị kết quả
    echo "<h2>Top 5 Khách hàng có mức mua hàng cao nhất vào ngày $ngay_mua:</h2>";
    echo "<table border='1'>
          <tr>
            <th>Mã Khách hàng</th>
            <th>Tên đăng nhập</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Tổng tiền mua hàng</th>
          </tr>";
    foreach ($top_customers as $customer) {
        echo "<tr>";
        echo "<td>" . $customer['ma_kh'] . "</td>";
        echo "<td>" . $customer['ten_dang_nhap'] . "</td>";
        echo "<td>" . $customer['email'] . "</td>";
        echo "<td>" . $customer['duong'] . ", " . $customer['phuong'] . ", " . $customer['quan'] . ", " . $customer['thanh_pho'] . "</td>";
        echo "<td>" . number_format($customer['tong_tien']) . " đ</td>"; // Định dạng số tiền
        echo "</tr>";
    }
    echo "</table>";

    // Đóng kết nối
    mysqli_close($conn);
}
?>



                    <div class="row" 
                     style="box-shadow: rgb(0 0 0 / 10%) 0px 5px 10px;
                            background: rgb(255, 255, 255);
                            padding: 15px 14px;
                            border-radius: 12px;
                            margin: 0 14px;
                            margin-top: 15px;">
                        <div class="col">
                            <h4><b>Lọc đơn hàng: </b></h4>
                        </div>
                        <div class="row"><br></div>
                        <div class="row">
                        <div class="col-md-12">
                            <form action="" method="GET">
                                    <div class="col-md-4">
                                        <label for="date" class="form-label">Ngày đặt hàng</label>
                                        <input type="date" id="date" name="ngay_mua" required value="<?= isset($_GET['ngay_mua']) == true ? $_GET['ngay_mua'] : '' ?>" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <strong>Hành động</strong><br>
                                        <button type="submit" class="btn btn-primary">Lọc</button>
                                        <a href="thong-ke-list.php" class="btn btn-warning">Làm mới</a>
                                    </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    
                    <!-- /. CONTENT  -->
                    <!-- <div id="columnchart_values" style="width: 100%; height: 300px;"></div><br><br><br><br><br><br><br><br><br><br> -->

                    <p>Dưới đây là những số liệu thống kê hàng hóa của BIGSHOES hiện tại có trong kho: </p>
                    <table class="table table-bordered" style="background-color:#fff">
                        <thead>
                            <tr>
                                <th>MÃ LOẠI HÀNG </th>
                                <th>LOẠI HÀNG</th>
                                <th>SỐ LƯỢNG HIỆN CÓ</th>
                                <th>GIÁ CAO NHẤT</th>
                                <th>GIÁ THẤP NHẤT</th>
                                <th>TỔNG GIÁ TRỊ HIỆN CÓ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item) {
                                extract($item);
                            ?>
                                <tr>
                                    <td><?= $ma_loai ?></td>
                                    <td><?= $ten_loai ?></td>
                                    <td><?= $so_luong ?></td>
                                    <td><?= number_format($gia_max) ?> <sup>đ</sup></td>
                                    <td><?= number_format($gia_min) ?> <sup>đ</sup></td>
                                    <td><?= number_format($gia_sum) ?> <sup>đ</sup></td>
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