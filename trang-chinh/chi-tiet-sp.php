<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/products.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/chi-tiet-sp/plugin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/chi-tiet-sp/plugin/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="../hinh-anh/trang-web/iconweb.png" />
    <title>Chi tiết sản phẩm</title>
    <style>
        .item {
            position: relative;
        }

        .item .cung-loai {
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
            right: 25px;
        }
    </style>
</head>

<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../css/chi-tiet-sp/plugin/js/owl.carousel.min.js"></script>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4" style="background-color: rgb(54, 54, 54);text-align: center">
                <div class="login">
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
                        <li><a href="../index.php">TRANG CHỦ</a></li>
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
            <div class="col-md-7" style="
    padding-left: 0px;
">
                <div class="chuyen">
                    <p><span><a href="index.php" style="text-decoration:none;color:black">TRANG CHỦ </a></span> / SẢN PHẨM</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================
 ======================CHI-TIẾT====================================
 ============================================ -->

    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <?php
            require_once('../admin/dao/hang-hoa.php');
            extract($_REQUEST);
            $items = hang_hoa_select_by_id($ma_hh);
            extract($items);
            $thisitem = $items;
            ?>
            <div class="product-content row">
                <div class="product-content-left row">
                    <div class="product-content-left-big-img">
                        <img style="height:423px;" src="../hinh-anh/san-pham/<?= $hinh ?>" alt="" id="imgbig">
                    </div>
                    <div class="product-content-left-small-img">
                        <img src="../hinh-anh/san-pham/<?= $hinh ?>" alt="" onclick="myFunction1(this)">
                        <img src="../hinh-anh/san-pham/<?= $hinh1 ?>" alt="" onclick="myFunction1(this)">
                        <img src="../hinh-anh/san-pham/<?= $hinh2 ?>" alt="" onclick="myFunction1(this)">
                        <img src="../hinh-anh/san-pham/<?= $hinh3 ?>" alt="" onclick="myFunction1(this)">
                    </div>
                </div>
                <div class="len"></div>
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                        <h1><?= $ten_hh ?></h1>
                    </div>
                    <div class="product-content-right-product-price">
                        <del><?= number_format($don_gia) ?></del> VNĐ
                        <p style="font-size:20px;">Giá : <a style="font-size:26px;color:red;"><?= number_format($don_gia - $don_gia * ($giam_gia / 100)) ?> VNĐ</p>
                    </div>
                    <?php
                    $items = loai_hang_select_by_id($ma_loai);
                    extract($items);
                    ?>
                    <div style="color: black;"><b style="font-size:18px;color:black">Nhà sản xuất : </b><?= $ten_loai ?></div>
                    <div style="color: black;font-size:18px;"><b>Xuất xứ : </b>Chính hãng</div>
                    <div style="color: black;font-size:18px;"><b>Tình trạng : </b>Mới 100%</div>
                    <br>
                    <div class="bottom-content-chitiet" style="font-size:16px; color: black;">
                        <?= $mo_ta ?>
                    </div>
                    <div class="gu" style="margin-top: 20px;"> <img src="../../MVH_Watch/css/chi-tiet-sp/img/ttt.png" alt=""></div>
                    <br>
                    <div class="product-content-right-product-button">
                        <?php
                        if (isset($_SESSION['user'])) {
                        ?>
                            <a href="them-gio-hang.php?ma_hh=<?= $ma_hh ?>" style="text-decoration:none"><button style="margin-top:-5px;" class="btn btn-dark">THÊM VÀO GIỎ HÀNG</button></a>
                        <?php } elseif (isset($_SESSION['user1'])) {
                        ?>
                            <a href="them-gio-hang.php?ma_hh=<?= $ma_hh ?>" style="text-decoration:none"><button style="margin-top:-5px;" class="btn btn-dark">THÊM VÀO GIỎ HÀNG</button></a>
                        <?php
                        } else { ?>
                            <a href="../tai-khoan/dang-nhap.php" style="text-decoration:none"><button style="margin-top:-5px;" class="btn btn-dark">ĐĂNG NHẬP ĐỂ MUA HÀNG</button></a>
                        <?php } ?>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        function myFunction() {
            var button = document.getElementById("action");
            if (button) {
                document.querySelector(".bottom-content-big").classList.toggle("activeA");
            }
        }

        function myFunction1(smalling) {
            var fullimg = document.getElementById("imgbig");
            fullimg.src = smalling.src;
        }
    </script>

    <!-- ============================================
 ============================================ -->

    <div class="container" style="margin-top: 30px;">
        <div class="row">

            <div class="col-md-12" style="padding-left: 0px;">
                <div class="spnoibat">
                    <h5>SẢN PHẨM CÙNG LOẠI</h5>
                    <p></p>
                </div>

                <div class="owl-carousel owl-theme ">
                    <?php
                    $items = hang_hoa_select_by_loai($ma_loai);
                    foreach ($items as $item) {
                        if ($item != $thisitem) {
                        extract($item);
                    ?>
                        <div class="item">
                            <a href="chi-tiet-sp.php?ma_hh=<?= $ma_hh ?>"><img style="width: 200px;height:230px;" src="../hinh-anh/san-pham/<?= $hinh ?>" alt="ds"><span class='cung-loai'><?= $ten_loai ?></span></a>
                        </div>
                    <?php }} ?>
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