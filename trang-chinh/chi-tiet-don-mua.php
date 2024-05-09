<!DOCTYPE html>
<html lang="en">

<head>
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
    <link rel="shortcut icon" type="image/png" href="../hinh-anh/trang-web/iconweb.png">
    <title>Chi tiết đơn mua</title>
</head>

<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../css/chi-tiet-sp/plugin/js/owl.carousel.min.js"></script>

    <?php require('../header.php'); ?>
    
    
    <div id="page-wrapper" class="container" style="padding-top: 30px;">
        <div class="header">
            <?php
            if (isset($_SESSION['user'])) {
                // echo "hiiiiiiiiiii";
                $conn = mysqli_connect('localhost', 'root', '', 'bigshoes');
                $username = $_SESSION['user'];
                $Total = 0;
                $result1 = mysqli_query($conn, "SELECT * FROM hoa_don_chi_tiet WHERE ma_hd = '" . $_GET['ma_hd'] . "'");
            ?>

                <div class="page-header">
                    <p style="font-size: 24px"><b>Dưới đây là những sản phẩm mà khách hàng đã mua: </b></p>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>TÊN HÀNG HÓA</th>
                                <th>HÌNH ẢNH</th>
                                <th>ĐƠN GIÁ/SP</th>
                                <th>THÀNH TIỀN</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($result1)) {
                                foreach ($result1 as $item) {
                                    extract($item);
                                    $result2 = mysqli_query($conn, "SELECT * FROM hang_hoa WHERE ma_hh ='" . $item['ma_hh'] . "'");
                                    $detail = mysqli_fetch_assoc($result2);
                            ?>
                            <tr href="chi-tiet-sp.php?ma_hh=<?= $detail['ma_hh'] ?>">
                                    <td><b><?= $detail['ten_hh'] ?></b></td>
                                    <td><img src="../hinh-anh/san-pham/<?= $detail['hinh']; ?>" alt="" style="width:80px;"></td>
                                    <td><?= number_format($detail['don_gia']) ?> <sup>đ</sup></td>
                                    <td><b><?= number_format($detail['don_gia']);
                                            $Total += ($detail['don_gia'] * $so_luong) ?> <sup>đ</sup></b></td>
                            </tr>
                            <?php } ?>
                                <tr>
                                    <td colspan="3" style="text-align:center;background:#B6DDDA"><b>TỔNG TIỀN</b></td>
                                    <td style="background: #01877   E;"><b><?= number_format($Total) ?> <sup>đ</sup></b></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
        <?php 
            } 
        ?>
        </div>
    </div>

    <?php require('../footer.php'); ?>

    <script src="../css/admin/js/jquery-1.10.2.js"></script>
    <script src="../css/admin/js/bootstrap.min.js"></script>
    <script src="../css/admin/js/jquery.metisMenu.js"></script>
    <script src="../css/admin/js/custom-scripts.js"></script>
</body>

</html>