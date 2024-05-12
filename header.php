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