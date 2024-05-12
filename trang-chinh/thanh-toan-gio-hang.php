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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="../hinh-anh/trang-web/iconweb.png" />
    <title>Thanh toán</title>
</head>

<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../css/chi-tiet-sp/plugin/js/owl.carousel.min.js"></script>
    <?php
    require('../header.php');
    ?>

    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-7" style="padding-left: 0px;">
                <div class="chuyen">
                    <p><span><a href="index.php" style="text-decoration:none;color:black">TRANG CHỦ </a></span> / SẢN PHẨM</p>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once('../admin/dao/khach-hang.php');
    require_once('../admin/dao/hang-hoa.php');

    extract($_REQUEST);

    $ma_kh = $_SESSION['user']['ma_kh'];
    $item = khach_hang_select_by_id($ma_kh);
    extract($item);
    ?>



    <div class="container" style="margin-top: 80px;">
        <div class="row">
            <div class="col-sm-7">
                <form action="" method="post">
                    <h4>THÔNG TIN THANH TOÁN</h4>
                    <br>
                    <table class="table table-borderless" border="0">
                        <input type="text" class="form-control" id="" name="ma_kh" value="<?= $ma_kh ?>" hidden>
                        <tr>
                            <div class="form-group">
                                <label for=""> <b>Họ và tên:</b> </label>
                                <input type="text" class="form-control" id="" name="ho_ten" value="<?= $ho_ten ?>">
                            </div>

                        </tr>
                        <tr>
                            <div class="form-group">
                                <label for=""><b>Email:</b></label>
                                <input type="text" class="form-control" id="" name="email" value="<?= $email ?>">
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <label for=""><b>Số điện thoại:</b></label>
                                <input type="text" class="form-control" id="" name="sdt" value="<?= $sdt ?>">
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <label for=""><b>Địa chỉ:</b></label>
                                <!-- <input type="text" class="form-control" id="" name="dia_chi" value=""> -->
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">Đường</span>
                                    <input type="text" class="form-control" name="duong" value="<?= $duong?>" aria-describedby="addon-wrapping">
                                </div>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">Phường</span>
                                    <input type="text" class="form-control" name="phuong" value="<?= $phuong?>"  aria-describedby="addon-wrapping">
                                </div>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">Quận</span>
                                    <input type="text" class="form-control" name="quan" value="<?= $quan?>"  aria-describedby="addon-wrapping">
                                </div>
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">Thành phố</span>
                                    <input type="text" class="form-control" name="thanh_pho" value="<?= $thanh_pho?>"  aria-describedby="addon-wrapping">
                                </div>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <label><b>Phương thức thanh toán:</b></label>
                                <div class=".container-fluid">
                                    <input type="radio" class="" id="tien-mat" name="thanh_toan" value="0">
                                    <label for="tien-mat">Thanh toán tiền mặt</label>
                                </div>
                                <div class=".container-fluid">
                                    <input type="radio" class="" id="online" name="thanh_toan" value="1">
                                    <label for="online">Thanh toán online</label>
                                </div>
                            </div>
                        </tr>
                        <tr>
                            <div class="form-group">
                                <label for=""><b>Ghi chú:</b></label>
                                <textarea class="form-control" rows="5" id="" name="ghi_chu"></textarea>
                            </div>
                        </tr>
                    </table>
                </div>
            <div class="col-sm-5">
                <h4>ĐƠN HÀNG CỦA BẠN</h4>
                <br>
                <table class="table" style="border:3px solid #c30005;">
                    <thead>
                        <tr>
                            <th>SẢN PHẨM</th>
                            <th style="text-align:right;">TỔNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = $i = 0;
                        if (!empty($_SESSION['cart'])) {
                            $items = $_SESSION['cart'];
                            foreach ($items as $item) {
                                extract($item);
                                $i++;
                        ?>
                                <tr>
                                    <td><?= $name ?> x <?= $sl; ?></td>
                                    <td style="text-align:right;"><?= number_format(($price - ($price * ($giam_gia / 100))) * $sl);
                                                                    $total += (($price - ($price * ($giam_gia / 100))) * $sl); ?> VNĐ</td>
                                </tr>
                        <?php }
                        } ?>
                        <tr>
                            <td><b>Tổng phụ</b></td>
                            <td style="text-align:right;"><b><?= number_format($total) ?> VNĐ</b></td>
                        </tr>
                        <tr>
                            <td><b>Giao hàng</b></td>
                            <td style="text-align:right;">
                                Giao hàng miễn phí </br>
                            </td>
                        </tr>
                        <tr>
                            <td><b>TỔNG</b></td>
                            <td style="text-align:right;"><b><?= number_format($total) ?> VNĐ</b></td>
                        </tr>
                        <tr>
                            <td colspan="2"><i>Quý khách vui lòng kiểm tra lại thông tin giao hàng và thông tin đơn hàng để tiến hành đặt hàng. Quý khách có thể tra cứu tình trạng đơn hàng tại MVH Watch. Chúc quý khách ngày mới tốt lành !</i></td>
                        </tr>
                        <tr>
                            <td><button type="submit" name="dathang" class="btn btn-danger"><b>ĐẶT HÀNG</b></button></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                </form>
            </div>
        </div>
    </div>

    <!-- KHI KHÁCH HÀNG TIẾN HÀNH ĐẶT HÀNG -->
    <?php
    require_once('../admin/dao/hoa-don.php');
    extract($_REQUEST);
    if (array_key_exists('dathang', $_REQUEST)) {
        try {
            $conn = pdo_get_connection();

            $ngaymua = date("Y-m-d");

            $thanh_toan = 'Tiền mặt';

            $sql = "INSERT INTO hoa_don(ghi_chu,ma_kh) 
                            VALUES ('" . $ghi_chu . "','" . $ma_kh . "')";

            $conn->exec($sql);
            echo $sql;

            $ma_hd = $conn->lastInsertId();

            $items = $_SESSION['cart'];
            foreach ($items as $item) {
                extract($item);
                $sql = "INSERT INTO hoa_don_chi_tiet(ma_hd,ma_hh,duong,phuong,quan,thanh_pho,Thanh_toan) VALUES ('" . $ma_hd . "','" . $ma_hh . "','" . $duong . "','" . $phuong . "','" . $quan . "','" . $thanh_pho . "','" . $thanh_toan . "')";
                $conn->exec($sql);
            }
            unset($_SESSION['cart']);
            echo '<script language="javascript">';
            echo 'alert("Bạn đã đặt đơn hàng thành công !")';
            echo '</script>';
            header('location:../index.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    ?>

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