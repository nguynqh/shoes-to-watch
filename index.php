<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/trang-chu/plugin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/trang-chu/plugin/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/trang-chu/style.css">
    <link rel="shortcut icon" type="image/png" href="hinh-anh/trang-web/iconweb.png" />
</head>

<body>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="css/trang-chu/plugin/js/owl.carousel.min.js"></script>


    <div class="container-fluid">
        <div class="banner">
            <video autoplay muted loop id="myVideo">
                <source src="hinh-anh/trang-web/tvc.mp4" type="video/mp4">
            </video>
            <div class="row">

                <div class="col-sm-2">
                    <div class="logo">
                        <img src="hinh-anh/trang-web/iconweb.png" alt="">
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="nav">
                        <ul>
                            <li class="active">TRANG CHỦ</li>
                            <li><a href="trang-chinh/danh-sach-sp.php">SẢN PHẨM</a></li>
                            <li><a href="trang-chinh/gioi-thieu.php">GIỚI THIỆU</a></li>
                            <li><a href="trang-chinh/bao-hanh.php">BẢO HÀNH</a></li>
                            <li><a href="trang-chinh/lien-he.php">LIÊN HỆ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="sign">
                        <?php
                        session_start();
                        if (!isset($_SESSION['user'])) {
                        ?>
                            <a class="signup-btn" href="tai-khoan/dang-nhap.php"><span>Đăng nhập</span> </a>
                        <?php } else { ?>
                            <a class="signup-btn" href="tai-khoan/thong-tin-tk.php"><span><?= $_SESSION['user']['ho_ten'] ?> </span></a>
                        <?php } ?>
                    </div>
                </div>


            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="text">
                        <p class="nho">Khám phá thế giới với từng giây trôi qua</p>
                        <p class="nho">Đồng hồ cho cuộc sống của bạn</p>
                        <P class="likk">
                            <a href="trang-chinh/danh-sach-sp.php"><span>SHOPPING</span></a>
                        </P>
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>

        </div>
    </div>


    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <div class="caption">
                    <p> 2021-2023 </p>
                    <h2><span>BEST</span> 2023</h2>
                </div>
            </div>
        </div>
    </div>




    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-6">
                <div class="anhmoi">
                    <img src="hinh-anh/trang-web/banner1-2.jpg" alt="" style="height:700px;">
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="anhmoi">
                        <img src="hinh-anh/trang-web/banner2.jpg" alt="">
                    </div>
                </div>
                <div class="row" style="margin-top: 30px;">
                    <div class="col-md-6">
                        <div class="anhmoi">
                            <img src="hinh-anh/trang-web/banner3.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="anhmoi">
                            <img src="hinh-anh/trang-web/banner4.jpg" alt="">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- <style>
        .anhmoi {
            overflow: hidden;
        }
    </style> -->


    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-12">
                <div class="caption">
                    <p>XEM NGAY NÀO !</p>
                    <h2> <span>SẢN PHẨM</span> BÁN CHẠY</h2>
                </div>
            </div>
        </div>
    </div>


    <?php
    require_once('admin/dao/hang-hoa.php');
    $items = hang_hoa_ban_chay();

    ?>

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme ">

                    <?php
                    foreach ($items as $item) {
                        extract($item);

                    ?>
                        <div class="item">
                            <a href="chi-tiet-sp.php?ma_hh=<?= $ma_hh ?>"><img style="width: 200px;height: 230px;" src="hinh-anh/san-pham/<?= $hinh ?>" alt="ds"></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    </div> <br><br><br>


    <div class="container now1">
        <div class="row">

            <div class="col-md-4">
                <div class="pick">
                    <ul>
                        <li>
                            <p><i class="fa fa-shopping-bag"></i></p>
                        </li>
                        <li>
                            <p><span>Miễn phí</span> vận chuyển <br> cho các đơn hàng > 200K</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="pick">
                    <ul>
                        <li>
                            <p>
                                <i class="fa fa-heartbeat"></i>
                            </p>
                        </li>
                        <li>
                            <p><span>Nhiệt tình</span> Tư vấn <br> và hỗ trợ tận tình 24/7</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="pick">
                    <ul>
                        <li>
                            <p><i class="fa fa-gift"></i></p>
                        </li>
                        <li>
                            <p><span>Chế độ</span> quà tặng hấp <br> dẫn cho mọi khách hàng</p>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>



    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-12">
                <div class="caption">
                    <p>XEM NGAY NÀO ... </p>
                    <h2> SẢN PHẨM <span>SALE OFF</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>




    <div class="container" style="margin-top: 50px;">

        <?php
        $items = hang_hoa_sale_9();
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme ">
                    <?php foreach ($items as $item) {
                        extract($item);
                    ?>
                        <div class="item">
                            <a href="trang-chinh/chi-tiet-sp.php?ma_hh=<?= $ma_hh ?>"><img style="width: 200px;height: 230px;" src="hinh-anh/san-pham/<?= $hinh ?>" alt="ds"></a>
                        </div>
                    <?php } ?>



                </div>
            </div>
        </div>
    </div>




    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-12">
                <div class="caption">
                    <p>XEM NGAY NÀO... </p>
                    <h2>SẢN PHẨM <span>TRENDING</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <?php
    $items = hang_hoa_noi_bat();
    ?>

    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <?php foreach ($items as $item) {
                extract($item);
            ?>
                <div class="col-md-3">
                    <div class="card">
                        <a href="trang-chinh/chi-tiet-sp.php?ma_hh=<?= $ma_hh ?>"><img class="card-img-top" src="hinh-anh/san-pham/<?= $hinh ?>" alt="Card image top"></a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $ten_hh ?></h5>
                            <p class="card-subtitle"><?= number_format($don_gia - ($don_gia * $giam_gia / 100)) ?> VNĐ</p>

                        </div>
                    </div>
                </div>
            <?php } ?>


        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-12">
                <a href="trang-chinh/danh-sach-sp.php"><button type="button" class="btn btn-outline-dark">Tất cả</button></a>
            </div>
        </div>
    </div>


<!-- footer -->
    <?php require('footer.php'); ?>

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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>