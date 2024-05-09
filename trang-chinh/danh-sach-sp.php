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

    <!-- header -->
    <?php require('../header.php');?>

    <!-- content -->
    <div class="container">
        <div class="row">
            <!-- sidebar -->
            <?php require('../sidebar.php')?>

            <!-- danh sach san pham -->
            <div class="col-md-9">
                <div class="row">

                    <?php
                    // $result = "";
                    // $conn = mysqli_connect('localhost', 'root', '', 'bigshoes');
                    // if (!empty(($_GET['keyword']))) {
                    //     $search = $_GET['keyword'];
                    //     $result = mysqli_query($conn, $sql = "SELECT count(ma_hh) AS total FROM hang_hoa WHERE (CONCAT(ten_hh,don_gia) LIKE '%" . $search . "%')");
                    // } else {
                    //     $result = mysqli_query($conn, 'select count(ma_hh) AS total FROM hang_hoa');
                    // }
                    // $row = mysqli_fetch_assoc($result);
                    // $total_records = $row['total'];
                    // $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
                    // $limit = 9;
                    // $total_page = ceil($total_records / $limit);
                    // if ($current_page > $total_page) {
                    //     $current_page = $total_page;
                    // } else if ($current_page < 1) {
                    //     $current_page = 1;
                    // }
                    // $start = ($current_page - 1) * $limit;

                    // if (!empty(($_GET['keyword']))) {
                    //     $search = $_GET['keyword'];
                    //     $result = mysqli_query($conn, $sql = "SELECT * FROM hang_hoa WHERE (CONCAT(ten_hh,don_gia) LIKE '%" . $search . "%') LIMIT $start, $limit");
                    // } else {
                    //     $result = mysqli_query($conn, "SELECT * FROM hang_hoa LIMIT $start, $limit");
                    // }
                    // $html = '';
                    // tạo connection
                    require_once('../admin/dao/pdo.php');
                    $conn = mysqli_connect('localhost', 'root', '', 'bigshoes');
                    
                    // lấy dữ liệu đẩy đủ
                    $sql = "SELECT * FROM hang_hoa";
                    // echo $sql;
                    if (isset($_GET['keywords'])) {

                        // boolean check
                        $keyWordCheck = $_GET['keywords'] != "";
                        $danhMucCheck = $_GET['danh-muc'] != "";
                        require_once('../admin/dao/loai-hang.php');
                        $temp = don_gia_max();
                        $mucGiaCheck = $_GET['muc-gia'] != $temp['don_gia'];
                        $giamGiaCheck = $_GET['giam-gia'] != "";

                        //lọc theo tác biến get
                        if ( $keyWordCheck || $danhMucCheck || $mucGiaCheck || $giamGiaCheck) {
                            $sql .= " WHERE ";
                            if ($danhMucCheck) {
                                // if ($keyWordCheck) {
                                //     $sql .= " AND ";
                                // }
                                $sql .= " ma_loai = " . $_GET['danh-muc'];
                            }
                            if ($keyWordCheck) {
                                if ($danhMucCheck) {
                                    $sql .= " AND ";
                                }
                                $sql .= " (CONCAT(ten_hh,don_gia) LIKE '%" . $_GET['keywords'] . "%') ";
                            }
                            if ($mucGiaCheck) {
                                if ($keyWordCheck || $danhMucCheck) {
                                    $sql .= " AND ";
                                }
                                $sql .= " don_gia <= " . $_GET['muc-gia'];
                            }
                            if ($giamGiaCheck) {
                                if ($keyWordCheck || $danhMucCheck || $mucGiaCheck ) {
                                    $sql .= " AND ";
                                }
                                $sql .= " giam_gia = " . $_GET['giam-gia'];
                            }
                        }
                        // echo $sql;
                        echo "<div style='width: 100%; margin-top: 43px;'><h5 style='margin-left: 10px;'>Kết quả tìm kiếm</h5></div>";
                    } else if(isset($_GET['danh-muc']) && !isset($_GET['keywords'])) {
                        echo "<div style='width: 100%; margin-top: 43px;'><h5 style='margin-left: 10px;'>Danh mục</h5></div>";
                        $sql .= " WHERE ma_loai = " . $_GET['danh-muc'];
                    }

                    /////////// repair for pagination
                    ///limit
                    $limit = 9;
                    ///page
                    if (isset($_GET['page'])) {
                        $current_page = $_GET['page'];
                    } else {
                        $current_page = 1;
                    }
                    ///item
                    $start = ($current_page - 1) * $limit;
                    ///total item
                    $total = mysqli_num_rows(mysqli_query($conn, $sql));
                    $total_records = $total;
                    $total_page = ceil($total_records / $limit);
                    ///done sql
                    $sql .= " LIMIT $start, $limit";
                    $result = mysqli_query($conn, $sql);

                    // bắt đầu show sản phẩm
                    while ($item = $result->fetch_assoc()) {

                    ?>

                        <div class="sanpham">
                            <a href="../trang-chinh/chi-tiet-sp.php?ma_hh=<?= $item['ma_hh'] ?>">
                                <span class="chi-tiet" style="margin-left: 10px">CHI TIẾT</span></a>
                            <a href="chi-tiet-sp.php?ma_hh=<?= $item['ma_hh'] ?>">
                                <img style="height: 250px;" src="../hinh-anh/san-pham/<?= $item['hinh'] ?>" alt=""></a>
                            <span class='hang-moi'>Hàng mới</span></a>
                            <div class="glow-wrap">
                                <i class="glow"></i>
                            </div>
                            <div class="text">
                                <div class="name">
                                    <?= $item['ten_hh'] ?>
                                </div>
                                <div class="price">
                                    <?= number_format($item['don_gia'] - $item['don_gia'] * ($giam_gia / 100)) ?> VNĐ <span style="color:grey;font-size:14px;margin-left:40px;">
                                        <strike><?= number_format($item['don_gia']) ?> VNĐ</strike></span>
                                </div>
                            </div>
                        </div>

                    <?php 
                        } 
                    ?>
                </div>


                <br>
                <br>


                <div class="" style="margin-left:350px;text-align: center;float:left">
                    <ul class="pagination">
                        <?php
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i == $current_page) {
                                echo '<li class="page-item"><a class="page-link">' . $i . '</a></li> ';
                            } else {
                                if (isset($_GET['keywords'])) {
                                    echo '<li class="page-item"><a class="page-link" href="danh-sach-sp.php?page='.$i. '&keywords='.$_GET['keywords']. '&danh-muc='.$_GET['danh-muc']. '&muc-gia='.$_GET['muc-gia']. '&giam-gia='.$_GET['giam-gia'].'">' . $i . '</a></li ';
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
                            <a href="chi-tiet-sp.php?ma_hh=<?= $ma_hh ?>"><img style="width: 200px" src="../hinh-anh/san-pham/<?= $hinh ?>" alt="ds"><span class='noi-bat'>HOT</span></a>
                        </div>
                    <?php } ?>
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