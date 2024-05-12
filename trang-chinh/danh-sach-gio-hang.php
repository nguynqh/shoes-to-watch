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
    <title>Danh sách giỏ hàng</title>
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
                    <p><span><a href="../index.php" style="text-decoration:none;color:black">TRANG CHỦ </a></span> / SẢN PHẨM</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 80px;width: 90%;">
        <div class="row">

            <div class="col-sm-7">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SẢN PHẨM</th>
                            <th>HÌNH ẢNH</th>
                            <th>GIÁ</th>
                            <!-- <th>SL</th> -->
                            <th>TỔNG</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- CODE PHP DANH SÁCH GIỎ HÀNG -->
                        <form action="cap-nhat-gio-hang.php" method="post">
                            <?php
                            $total = $i = 0;
                            if (!empty($_SESSION['cart'])) {
                                $items = $_SESSION['cart'];
                                foreach ($items as $item) {
                                    extract($item);
                                    $i++;
                            ?>
                                    <tr>

                                        <td><?= $name ?></td>
                                        <td><img src="../hinh-anh/san-pham/<?= $hinh ?>" alt="" style="width:80px;"></td>
                                        <td><?= number_format($price - ($price * ($giam_gia / 100))) ?> VNĐ</td>
                                        <!-- <td><input class="form-control" type="number" name='sl[<?= $ma_hh ?>]' value="<?= $sl ?>" min=1 style="width:50px;"></td> -->
                                        <td><?= number_format(($price - ($price * ($giam_gia / 100))) * $sl);
                                            $total += (($price - ($price * ($giam_gia / 100))) * $sl);
                                            ?> VNĐ</td>
                                        <td><a onclick="return confirm('Bạn muốn bỏ sản phẩm này khỏi giỏ hàng ?')" style="color:black;" href="xoa-gio-hang.php?ma_hh=<?= $ma_hh ?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a></td>
                                    </tr>

                            <?php 
                            // print_r($items);
                                }
                            } else {
                                echo '<p>Giỏ hàng của bạn chưa có sản phẩm nào !</p>';
                            } ?>

                    </tbody>
                </table><br>
                <button class="btn btn-info"><a style="color:#fff;text-decoration:none;" href="danh-sach-sp.php">Tiếp tục xem sản phẩm</a></button>
                <button type="submit" class="btn btn-secondary" name="btn_update_gio_hang">Cập nhật giỏ hàng</button>

                </form>
            </div>

            <div class="col-sm-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>TỔNG SỐ LƯỢNG</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tổng phụ</td>
                            <td style="text-align:right;"><?= number_format($total) ?> VNĐ</td>
                        </tr>
                        <tr>
                            <td>Giao hàng</td>
                            <td style="text-align:right;">Giao hàng miễn phí <br>
                                Ước tính cho Việt Nam <br>
                            </td>
                        </tr>
                        <form method="post">
                            <tr>
                                <td>Tổng</td>
                                <td style="text-align:right;"><b><?= number_format($total) ?> VNĐ</b></td>
                            </tr>
                        </form>
                        <tr>
                            <td colspan="2">
                                <?php if(!empty($_SESSION['cart'])) { ?>
                                    <a href="thanh-toan-gio-hang.php">
                                    <button class="btn btn-danger" style="width:100%;" name="payment" value="tienmat">THANH TOÁN</button>
                                    </a>
                                <?php } else {
                                    echo '<button class="btn btn-danger" style="width:100%;" disabled>Chưa có sản phẩm trong giỏ hàng</button>';
                                };?>
                            </td>
                        </tr>
                        <!-- <tr>
                            <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="thanh-toan-momo.php">
                                <td colspan="2"><a href="thanh-toan-gio-hang-atm.php">
                                        <input type="hidden" value="<?= $total ?>" name="sumprice">
                                        <button class="btn" style="width:100%;background:#D82D8B;color:white" name="payment" value="momo">THANH TOÁN BẰNG QR CODE MOMO</button></a></td>
                            </form>
                        </tr> -->
                        <!-- <tr>
                            <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded" action="thanh-toan-gio-hang-atm.php">
                                <td colspan="2"><a href="thanh-toan-gio-hang-atm.php">
                                        <input type="hidden" value="<?= $total ?>" name="sumprice">
                                        <button class="btn" style="width:100%;background:#D82D8B;color:white" name="payment" value="momo">THANH TOÁN BẰNG ATM MOMO</button></a></td>
                            </form>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div><br><br><br>

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
    </div>

    <!-- footer -->
    <?php require('../footer.php');?>


</body>

</html>