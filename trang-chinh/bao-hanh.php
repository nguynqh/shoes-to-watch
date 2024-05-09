<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale =1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/chi-tiet-sp/products.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/danh-sach-sp/plugin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/danh-sach-sp/plugin/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="image/png" href="../hinh-anh/trang-web/iconweb.png" />
    <title>Bảo hành</title>
    <style>
        .activeA {
            display: none;
        }
    </style>
</head>

<body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="../css/chi-tiet-sp/plugin/js/owl.carousel.min.js"></script>
    <script src="../css/trang-chinh/style.js"></script>
    <stype>

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

        <div class="container" style="margin-top: 50px;">
            <img src="../hinh-anh/trang-web/chinh-sach-bao-hanh.png" style="width:800px;height:400px;text-align:center;margin-left:180px"><br><br>
            <div class="content">
                <div class="step0">
                    <p style="color:red;font-size:30px"><b>I. CÁC BƯỚC BẢO HÀNH SẢN PHẨM</b></p>
                    <p style="font-size:20px;"><b>MVH WATCH hỗ trợ bảo hành tận nhà, quý khách có nhu cầu bảo hành vui lòng liên hệ với MVH WATCH.</b></p>
                    <div class="step1">
                        <div class="title-big" style="cursor:pointer" id="action1" onclick="myFunction(this)">
                            <h3 style="color:red;">Bước 1</h3>
                        </div>
                        <div class="content-small">
                            <p>Khi có nhu cầu bảo hành sản phẩm, khách hàng vui lòng liên hệ qua các hình thức sau :</p>
                            <ul style="margin-left:40px;">
                                <li>Hotline : 037 5736 735</li>
                                <li>Trò chuyện trực tiếp tại Website hoặc Fanpage.</li>
                                <li>Liên hệ trực tiếp tại cửa hàng.</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="step2">
                        <div class="title-big" style="cursor:pointer" id="action2" onclick="myFunction2(this)">
                            <h3 style="color:red;">Bước 2</h3>
                        </div>
                        <div class="content-small">
                            <p>Khách hàng tại Hồ Chí Minh mang sản phẩm đến Showroom.</p>
                            <ul style="margin-left:40px;">
                                <li>Hồ Chí Minh : 273 An Dương Vương, Phường 3, Quận 5.</li>
                            </ul>
                            <p>Nhân viên MVH WATCH sẽ tiếp nhận thông tin và phản hồi thời gian xử lý với khách hàng, theo chính sách từng sản phẩm.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="step3">
                        <div class="title-big" style="cursor:pointer" id="action3" onclick="myFunction3(this)">
                            <h3 style="color:red;">Bước 3</h3>
                        </div>
                        <div class="content-small">
                            <p style="color:#66CC33;font-size:18px"><b>Hoàn tất xử lý bảo hành và bàn giao sản phẩm đến với khách hàng.</b></p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="dieu-kien">
                    <div class="dieu-kien-1">
                        <p style="color:red;font-size:30px"><b>II. ĐIỀU KIỆN BẢO HÀNH SẢN PHẨM</b></p>
                    </div>
                    <div class="dieu-kien-2">
                        <div class="truoc">
                            <h5 style="color:red;">SẢN PHẨM ĐỦ ĐIỀU KIỆN BẢO HÀNH</h5>
                            <ul style="margin-left:40px;">
                                <li>Các sản phẩm, thiết bị do MVH WATCH cung cấp ( dựa trên hóa đơn bán hàng, tem hoặc phiếu bảo hành, serial number v.v…. ) .</li>
                                <li>Đối với các sản phẩm được cấp hiếu bảo hành (PBH), khách hàng phải xuất trình PBH và có đầy đủ tem bảo hành của MVH WATCH(nếu sản phẩm không cấp PBH thì phải còn nguyên tem của MVH WATCH) và phải còn trong thời hạn bảo hành.</li>
                                <li>Tem bảo hành, mã vạch số serial,… của sản phẩm phải còn nguyên vẹn, không có dấu hiệu cạo sửa, tẩy xóa, bị rách, mờ.</li>
                                <li>Những hư hỏng của sản phẩm được xác định do lỗi kỹ thuật hoặc lỗi của nhà sản xuất .</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="chinh-sach">
                    <div class="title">
                        <p style="color:red;font-size:30px"><b>III. Chính sách bảo hành</b></p>
                    </div>
                    <div class="content">
                        <p><b>KHÔNG ÁP DỤNG ĐỐI VỚI TRƯỜNG HỢP CẢM TÍNH NHƯ : ” TÔI KHÔNG THÍCH MUA NỮA, TÔI KHÔNG THÍCH SẢN PHẨM NÀY NỮA …”</b></p>
                        <p><b>1. Trả hàng và hoàn lại tiền 100% theo hoá đơn bán hàng:</b></p>
                        <p> – Giao hàng không đúng theo đơn đặt hàng của quý khách .</p>
                        <p> – Sản phẩm còn trong thời hạn đổi mới nhưng không còn sản phẩm đổi và khách hàng không muốn đổi sang sản phẩm tương tự.</p>
                        <p><b>2. Trả hàng hoàn lại tiền nhưng mất phí trong các trường hợp sau:</b></p>
                        <p> – Phí 2%/ trên hóa đơn sản phẩm trả của MVH WATCH : sản phẩm còn trong thời hạn đổi trả và chưa qua sử dụng .</p>
                        <p> – Phí 5%/ trên hóa đơn sản phẩm trả của MVH WATCH: sản phẩm còn trong thời hạn đổi trả và đã qua sử dụng.</p>
                        <p> – Phí 10% / trên hóa đơn sản phẩm trả của MVH WATCH ( từ ngày thứ 8 đến ngày thứ 12 ) . Bao gồm cả sản phẩm chưa qua sử dụng hoặc đã qua sử dụng .</p>
                        <p> – Phí 20% / trên hóa đơn sản phẩm trả của MVH WATCH ( từ ngày thứ 13 đến ngày thứ 20 ) . Bao gồm cả sản phẩm chưa qua sử dụng hoặc đã qua sử dụng .</p>
                        <p> – Kể từ ngày giao hàng , quá thời hạn 20 ngày sản phẩm đã mua sẽ không được áp dụng chính sách trả hàng của MVH WATCH .</p>
                        <p style="color:#66CC33"><b>LƯU Ý – YÊU CẦU VỀ TRẢ HÀNG: Sản phẩm phải còn nguyên vẹn, không bị lỗi, không bị trầy xước . Tem/nhãn trên máy còn nguyên vẹn .
                                Bắt buộc phải đầy đủ các giấy tờ – phụ kiện kèm theo chứng từ mà MVH WATCH đã xuất như lúc khách hàng nhận hàng ( bao gồm cả quà tặng ).
                                MVH WATCH sẽ hoàn tiền trễ nhất trong vòng 48h dưới hình thức tiền mặt hoặc chuyển khoản theo yêu cầu của khách hàng.
                                MVH WATCH sẽ không áp dụng chính sách trả hàng nếu như sản phẩm không đáp ứng đầy đủ các yêu cầu trên .</b></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <?php require_once('../footer.php')?>
</body>
<!-- <script>
    function myFunction()
    {
      var button = document.getElementById("action1");
      if(button)
      {
         document.querySelector(".content-small-1").classList.toggle("activeA");
      }
    }
    function myFunction2()
    {
      var button = document.getElementById("action2");
      if(button)
      {
         document.querySelector(".content-small-2").classList.toggle("activeA");
      }
    }
    function myFunction3()
    {
      var button = document.getElementById("action3");
      if(button)
      {
         document.querySelector(".content-small-3").classList.toggle("activeA");
      }
    }
</script> -->

</html>