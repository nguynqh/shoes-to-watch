 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/chi-tiet-sp/products.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/chi-tiet-sp/plugin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/chi-tiet-sp/plugin/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="../hinh-anh/trang-web/iconweb.png" />
    <title>Đơn mua</title>
</head>

<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../css/chi-tiet-sp/plugin/js/owl.carousel.min.js"></script>


    <?php
        require('../header.php');
    ?>
    
    <div id="page-wrapper">
        <div class="header">
            <div class="page-header">
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <h1>CÁC ĐƠN MUA</h1>
                    <p>Dưới đây là danh sách các đơn hàng mà khách hàng đã đặt mua: </p>
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'MVH_Watch');
                    $Total = 0;
                    $result1 = mysqli_query($conn, "SELECT * FROM hoa_don WHERE ma_kh = '" . $_SESSION['user']['ma_kh'] . "'");
                    while ($value = $result1->fetch_assoc()) {
                ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>MÃ ĐƠN</th>
                                    <th>MÃ KHÁCH HÀNG</th>
                                    <th>NGÀY MUA</th>
                                    <th>GHI CHÚ</th>
                                    <th>TÌNH TRẠNG</th>
                                    <th>CHI TIẾT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $value['ma_hd'] ?></td>
                                    <td><?= $value['ma_kh'] ?></td>
                                    <td><?= $value['ngay_mua'] ?></td>
                                    <td><?= $value['ghi_chu'] ?></td>
                                    <td>
                                            <?php
                                            if ($value['tinh_trang'] == 0) {
                                                echo '<button class="btn btn-danger name="thanh_toan">';
                                                echo "Chờ xử lý";
                                            } else if ($value['tinh_trang'] == 1) {
                                                echo '<button class="btn btn-primary name ="thanh_toan">';
                                                echo "Đã xử lý";
                                            } else {
                                                echo '<button class="btn btn-success name="thanh_toan">';
                                                echo "Hủy đơn";
                                            }
                                            ?>
                                            </button>
                                    </td>
                                    <td><a href="chi-tiet-don-mua.php?ma_hd=<?= $value['ma_hd'] ?>"><button class="btn btn-success">Chi tiết</button></a></td>
                                </tr>
                        <?php }
                } else { echo"<h2>Vui lòng đăng nhập để xem các đơn đã mua của bạn!</h2>"; }?>
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
    <script src="../css/admin/js/jquery-1.10.2.js"></script>
    <script src="../css/admin/js/bootstrap.min.js"></script>
    <script src="../css/admin/js/jquery.metisMenu.js"></script>
    <script src="../css/admin/js/custom-scripts.js"></script>


</body>

</html>