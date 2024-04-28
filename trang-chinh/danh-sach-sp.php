<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/danh-sach-sp/products.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/danh-sach-sp/plugin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/danh-sach-sp/plugin/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/ihover-gh-pages/src/ihover.css">
    <link rel="stylesheet" href="../css/ihover-gh-pages/src/ihover.min.css">
    <link rel="shortcut icon" type="image/png" href="../css/trang-chu/img/iconweb.png" />
    <title>Sản phẩm</title>
    <style>
        .sanpham {
            position: relative;
        }

        .sanpham:hover img {
            opacity: 0.4;
            transform: scale(1.05);
            transition: all 0.5s;
        }

        .sanpham .chi-tiet {
            position: absolute;
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            background-color: black;

        }

        .sanpham:hover .chi-tiet {
            opacity: 1;
            font-weight: bold;
            z-index: 1;

        }

        .chi-tiet {
            background-color: #313a40;
            color: white;
            font-size: 16px;
            padding: 10px 20px;
            font-family: "Roboto Condensed", sans-serif;

        }

        .sanpham .hang-moi {
            position: absolute;
            font-size: 12px;
            color: #fff;
            text-align: center;
            font-weight: 400;
            line-height: 26px;
            font-family: "Roboto Condensed", sans-serif;
            width: 80px;
            display: block;
            background: #f7941d;
            background: linear-gradient(#f7941d 0, #f7941d 100%);
            box-shadow: 0 3px 10px -5px #000;
            top: 10px;
            right: 10px;
        }

        .item {
            position: relative;
        }

        .item .noi-bat {
            position: absolute;
            font-size: 12px;
            color: #fff;
            text-align: center;
            font-weight: 400;
            line-height: 26px;
            transform: rotate(45deg);
            font-family: "Roboto Condensed", sans-serif;
            width: 50px;
            display: block;
            background: #f7941d;
            background: linear-gradient(#f7941d 0, #f7941d 100%);
            box-shadow: 0 3px 10px -5px #000;
            top: 15px;
            right: 20px;
        }
    </style>
</head>

<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../css/danh-sach-sp/plugin/js/owl.carousel.min.js"></script>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4" style="background-color: rgb(54, 54, 54);text-align: center">
                <div class="login">
                    <!-- kiem tra dang nhap -->
                    <?php
                    session_start();
                    if (!isset($_SESSION['user'])) {
                    ?>
                        <a href="../tai-khoan/dang-nhap.php">
                            <p><strong>ĐĂNG NHẬP / ĐĂNG KÍ</strong></p>
                        </a>
                    <?php } else { ?>
                        <a href="../tai-khoan/thong-tin-tk.php">
                            <p><strong>XIN CHÀO <?= $_SESSION['user']['ho_ten'] ?></strong></p>
                        </a>
                    <?php } ?>
                    
                </div>
            </div>
            <div class="col-md-4" style="background-color: rgb(54, 54, 54);text-align: center">
                <div class="logo">
                    <a href="../index.php"><img src="../css/trang-chu/img/iconweb.png" alt="anh"></a>
                </div>
            </div>
            <div class="col-md-4" style="background-color: rgb(54, 54, 54);text-align: center">
                <div class="giohang" style="position: reletive;">

                    <?php
                    $sll = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $item) {
                            extract($item);
                            $sll += $sl;
                        }
                    }
                    ?>
                    <span style="position: absolute;padding:3px 8px;background-color:#fff;border-radius:50px;left:295px;top:25px;"><?= $sll ?></span>
                    <ul>
                        <li style="list-style: none;">
                            <p style="font-size: 14px;">
                                <a href="don-mua.php" style="text-decoration:none;color:#f7941d;">ĐƠN MUA</a>
                            </p>
                        </li>
                        <li style="list-style: none;">
                            <p style="color: rgb(212, 212, 212);font-size: 14px;">GIỎ HÀNG</p>
                        </li>
                        <a href="danh-sach-gio-hang.php">
                            <li style="list-style: none;">
                                <i class="fa fa-shopping-basket" style="font-size:28px;color:rgb(255, 255, 255)"></i>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="background-color: rgb(211, 211, 211);">
                <div class="nav">
                    <ul>
                        <li><a href="index.php">TRANG CHỦ</a></li>
                        <li><a href="danh-sach-sp.php">SẢN PHẨM</a></li>
                        <li><a href="gioi-thieu.php">GIỚI THIỆU</a></li>
                        <li><a href="bao-hanh.php">BẢO HÀNH</a></li>
                        <li><a href="lien-he.php">LIÊN HỆ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-7" style="padding-left: 0px;">
                <div class="chuyen">
                    <p><span><a href="index.php" style="text-decoration:none;color:black">TRANG CHỦ </a></span> / SẢN PHẨM</p>
                </div>
            </div>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-md-3" style="padding-left: 0px;margin-top: 42px;">

                <div class="row" style="margin-left: 0px;">
                    <form action="tim-kiem-theo-ten.php" method="post">

                        <div class="serch">
                            <input type="text" placeholder="Tìm kiếm..." name="keywords">
                            <button type="submit" name="search-keywords"><i class="fa fa-search" style="font-size:20px;color:rgb(255, 255, 255)"></i></button>
                        </div>
                    </form>
                </div>
                <div class="row" style="margin-left: 0px;">
                    <?php
                    require_once('../admin/dao/loai-hang.php');
                    extract($_REQUEST);
                    $items = loai_hang_select_all();
                    ?>
                    <div class="row" style="margin-top: 35px;margin-left: 0px;">

                        <ul class="list-group">
                            <li class="list-group-item active">DANH MỤC</li>
                            <?php foreach ($items as $item) {
                                extract($item);
                            ?>
                                <a href="sp-cung-loai.php?ma_loai=<?= $ma_loai ?>">
                                    <li class="list-group-item"><?= $ten_loai ?></li>
                                </a>
                            <?php } ?>
                        </ul>

                    </div>

                    <div class="row" style="margin-top: 35px;margin-left: 0px;">

                        <ul class="list-group">
                            <?php
                            require_once('../admin/dao/hang-hoa.php');
                            extract($_REQUEST);
                            $items = hang_hoa_sale();

                            ?>
                            <li class="list-group-item active">SẢN PHẨM SALE UP 10 - 50%</li>
                            <?php foreach ($items as $item) {
                                extract($item);
                            ?>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-sm-4"><a href="chi-tiet-sp.php?ma_hh=<?= $ma_hh ?>&ma_loai=<?= $ma_loai ?>"><img style="width:80px;" src="../../bigshoes/css/admin/images/products/<?= $hinh ?>" alt=""></a></div>
                                        <div class="col-sm-8"><?= $ten_hh ?><br><br><b><?= number_format($don_gia - ($don_gia * $giam_gia / 100)) ?> VNĐ</b></div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
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
                    $limit = 9;
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

                    while ($item = $result->fetch_assoc()) {
                    ?>

                        <div class="sanpham">
                            <a href="../trang-chinh/chi-tiet-sp.php?ma_hh=<?= $item['ma_hh'] ?>">
                                <span class="chi-tiet" style="margin-left: 10px">CHI TIẾT</span></a>
                            <a href="chi-tiet-sp.php?ma_hh=<?= $item['ma_hh'] ?>">
                                <img style="height: 250px;" src="../css/admin/images/products/<?= $item['hinh'] ?>" alt=""></a>
                            <span class='hang-moi'>Hàng mới</span></a>
                            <div class="glow-wrap">
                                <i class="glow"></i>
                            </div>
                            <div class="text">
                                <div class="name">
                                    <?= $item['ten_hh'] ?>
                                </div>
                                <div class="price">
                                    <?= number_format($don_gia - $don_gia * ($giam_gia / 100)) ?> VNĐ <span style="color:grey;font-size:14px;margin-left:40px;">
                                        <strike><?= number_format($don_gia) ?> VNĐ</strike></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>


                <br>
                <br>

                <?php echo $html; ?>
                <div class="" style="margin-left:350px;text-align: center;float:left">
                    <ul class="pagination">
                        <?php
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i == $current_page) {
                                echo '<li class="page-item"><a class="page-link">' . $i . '</a></li> ';
                            } else {
                                if (isset($_GET['keyword'])) {
                                    echo '<li class="page-item">
                     <a class="page-link" href="danh-sach-sp.php?keyword=' . $_GET['keyword'] . '&page=' . $i . '">' . $i . '</a></li ';
                                } else {
                                    echo '<li class="page-item"><a class="page-link" href="danh-sach-sp.php?page=' . $i . '">' . $i . '</a></li>';
                                }
                            }
                        }
                        ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="container" style="margin-top: 30px;">
        <div class="row">

            <div class="col-md-12" style="padding-left: 0px;">
                <div class="spnoibat">
                    <h5>sản phẩm nỗi bật</h5>
                    <p></p>
                </div>

                <div class="owl-carousel owl-theme ">
                    <?php
                    $items = hang_hoa_noi_bat();
                    foreach ($items as $item) {
                        extract($item);
                    ?>
                        <div class="item">
                            <a href="chi-tiet-sp.php?ma_hh=<?= $ma_hh ?>"><img style="width: 200px" src="../css/admin/images/products/<?= $hinh ?>" alt="ds"><span class='noi-bat'>HOT</span></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid now2" style="margin-top: 70px;">
        <div class="row">
            <div class="container" style="margin-top: 50px;">
                <div class="row">
                    <div class="col-md-3">
                        <div class="fo">
                            <img src="../css/trang-chu/img/iconweb.png" alt="" style="width:60px;">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="fo">
                            <h5>Shop</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h5>Hỗ trợ</h5>
                    </div>
                    <div class="col-md-3">
                        <h5>Bộ sưu tập</h5>
                    </div>
                </div>

                <div class="row" style="margin-top: 0px;">
                    <div class="col-md-3">
                        <div class="fo">
                            <ul>
                                <li>
                                    <p>
                                        Nhiệm vụ của chúng tôi là mang đến những sản phẩm chất lượng với giá cả tốt nhất cho khách hàng.

                                        Được hỗ trợ khách hàng là niềm vinh dự của chúng tôi . <br><br>
                                        Xin cám ơn !
                                    </p>
                                </li>
                                <li>
                                    <i class="fa fa-facebook "></i>
                                    <i class="fa fa-firefox"></i>
                                    <i class="fa fa-pinterest-p"></i>
                                    <i class="fa fa-youtube"></i>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="fo">

                            <ul>

                                <li>
                                    <p>Trang chủ</p>
                                </li>
                                <li>
                                    <p>Cửa hàng</p>
                                </li>
                                <li>
                                    <p>Giới thiệu</p>
                                </li>
                                <li>
                                    <p>Liên hệ</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="fo">
                            <ul>
                                <li>
                                    <p>Ưu đãi</p>
                                </li>
                                <li>
                                    <p>Giao nhận</p>
                                </li>
                                <li>
                                    <p>Đổi trả</p>
                                </li>
                                <li>
                                    <p>Bảo mật</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="fo">
                            <ul>
                                <li>
                                    <p>Nike</p>
                                </li>
                                <li>
                                    <p>Adidas</p>
                                </li>
                                <li>
                                    <p>Pegasus</p>
                                </li>
                                <li>
                                    <p>Jordan</p>
                                </li>
                            </ul>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>


    <script type="text/javascript">
        const nextIcon = ' <i class="fa fa-chevron-left" style="font-size:36px;color:black"></i>';
        const preIcon = ' <i class="fa fa-chevron-right" style="font-size:36px;color:black"></i>';
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            navText: [
                nextIcon,
                preIcon
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1200: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
        })
    </script>




    <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js " integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin="anonymous "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js " integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin="anonymous "></script>











</body>

</html>