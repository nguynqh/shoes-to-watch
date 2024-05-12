<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> -->
<script src="jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Watch | Admin Login</title>

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="login_register_css/login.css">
</head>
<body style="background-image: url('../../../hinh-anh/trang-web/Hinh-nen-mau-cam-dep_.jpg'); background-size: cover; background-position: center;">
<div class="container h-100" >
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card" style="background-color:#ffddaa;">
            <div class="card-header" style="background-color: #ffd400">
                <h3 style="text-align: center; font-weight: 500;">ĐĂNG NHẬP VÀO TRANG QUẢN TRỊ VIÊN</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form action="admin-xuly.php" method="post" onsubmit="return valid()">

                    <?php
                        if(isset($_GET['error'])) {
                            echo '<div class="alert alert-danger" role="alert">Username or Password is incorrect!</div>';
                        }
                    ?>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #ffd400"><i class="fas fa-user"></i></span>
                        </div>
                        <input name="sodienthoai" id="sodienthoai" type="text" class="form-control" placeholder="Nhập số điện thoại">
                    </div>

                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" style="background-color: #ffd400"><i class="fas fa-key"></i></span>
                        </div>
                        <input name="password" id="password" type="password" class="form-control" placeholder="Nhập mật khẩu">
                    </div>

                    <div class="action">
                        <button type="button" value="Cancel" onclick="window.location.assign('../../../index.php');" class="btn float-left" style="color: black; background-color: #ffd400; width: 100px;">Quay về</button>
                        <button name="submit" type="submit" value="Login" class="btn float-right login_btn" style="color: black; background-color: #ffd400; width: 100px;">Đăng nhập</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="../../../js/ad_main.js"></script>
</body>
</html>