<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/lien-he/products.css">
    <link rel="stylesheet" href="../css/chi-tiet-sp/products.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/chi-tiet-sp/plugin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/chi-tiet-sp/plugin/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="../hinh-anh/trang-web/iconweb.png" />
    <title>Liên hệ</title>
</head>

<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../css/chi-tiet-sp/plugin/js/owl.carousel.min.js"></script>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4" style="background-color: rgb(54, 54, 54);text-align: center">
                <div class="login">


                    <!-- CODE CHECK ĐĂNG NHẬP -->
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
                    <a href="index.php"><img src="../hinh-anh/trang-web/iconweb.png" alt="anh"></a>
                </div>
            </div>
            <div class="col-md-4" style="background-color: rgb(54, 54, 54);text-align: center">
                <!-- MÃ CODE PHP CHECK SỐ LƯỢNG SẢN PHẨM THÊM VÀO GIỎ HÀNG  -->

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
                                <a href="" style="text-decoration:none;color:#f7941d;">ĐƠN MUA</a>
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
                        <li><a href="danh-sach-sp.php">TRANG CHỦ</a></li>
                        <li><a href="danh-sach-sp.php">SẢN PHẨM</a></li>
                        <li><a href="gioi-thieu.php">GIỚI THIỆU</a></li>
                        <li><a href="bao-hanh.php">BẢO HÀNH</a></li>
                        <li><a href="lien-he.php">LIÊN HỆ</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>



    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-6">
                <div class="lienhe">
                    <h6>THÔNG TIN LIÊN HỆ</h6>

                    <table class="tus">
                        <tr>
                            <td> <img src="../hinh-anh/trang-web/a.png" alt=""> </td>
                            <td>273 An Dương Vương - Phường 3 - Quận 5 - TPHCM</td>
                        </tr>
                        <tr>
                            <td><img src="../hinh-anh/trang-web/f.png" alt=""></td>
                            <td>0375736735</td>
                        </tr>
                        <tr>
                            <td><img src="../hinh-anh/trang-web/s.png" alt=""></td>
                            <td>mvhwatch@gmail.com</td>
                        </tr>
                        <tr>
                            <td><img src="../hinh-anh/trang-web/d.png" alt=""></td>
                            <td>mvhwatch.com</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="nu"><img src="../hinh-anh/trang-web/u.png" alt=""></td>

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid" style="margin-top: 40px;">
        <div class="row">
            <div class="col-md-12">
                <div class="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.669726937899!2d106.68006961462243!3d10.759917092332744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b7c3ed289%3A0xa06651894598e488!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTw6BpIEfDsm4!5e0!3m2!1svi!2s!4v1607277768947!5m2!1svi!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php require('../footer.php');?>


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