<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cập nhật tài khoản</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/tai-khoan/css/main.css">
	<!--===============================================================================================-->
	<link rel="shortcut icon" type="image/png" href="../hinh-anh/trang-web/iconweb.png" />

</head>

<body>

	<!-- CODE XỬ LÝ PHP -->
	<?php
	session_start();
	require_once('../admin/dao/khach-hang.php');

	extract($_REQUEST);
	echo $_SESSION['user']['ma_kh'];
	if (array_key_exists('btn_update', $_REQUEST)) {
		khach_hang_update_user($_SESSION['user']['ma_kh'], $ten_dang_nhap, $ho_ten, $mat_khau, $email, $sdt, $duong, $phuong, $quan, $thanh_pho);
		$user = khach_hang_select_by_ten_dang_nhap_user($ten_dang_nhap);
		$_SESSION['user'] = $user;
		$_SESSION['cart'] = array();
		echo '<script language="javascript">';
		echo 'alert("Cập nhật thành công!")';
		echo '</script>';
		header('location: ../index.php');
	} else {
		extract($_SESSION['user']);
	}

	?>

	<!-- -->

	<div class="limiter">
		<div class="container-login100" style="background-image: url('../css/tai-khoan/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-logo">
						<a href="../index.php"><img src="../hinh-anh/trang-web/iconweb.png" width="80px" alt=""></a>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Update account
					</span>
					<style>
						.white-text{
							color: white;
						}
					</style>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<h4 class="white-text" >Tên đăng nhập:</h4>
						<input class="input100" type="text" name="ten_dang_nhap" placeholder="Username" value="<?= $ten_dang_nhap ?>">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter fullname">
					<h4 class="white-text" >Họ và tên:</h4>
						<input class="input100" type="text" name="ho_ten" placeholder="Fullname" value="<?= $ho_ten ?>">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<h4 class="white-text" >Mật khẩu:</h4>
						<input class="input100" type="text" name="mat_khau" placeholder="mat_khau" value="<?= $mat_khau ?>">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter email">
					<h4 class="white-text" >Email:</h4>
						<input class="input100" type="text" name="email" placeholder="Email" value="<?= $email ?>">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter email">
						<h4 class="white-text" >Số điện thoại:</h4>
						<input class="input100" type="text" name="sdt" placeholder="Số điện thoại" value="<?= $sdt ?>">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter Address">
						<h4 class="white-text" >Địa chỉ:</h4>
						<span style="padding-left: 15px;" class="white-text">-Đường:</span>
						<input class="input100" type="text" name="duong" placeholder="Address" value="<?= $duong ?>" >
						<span style="padding-left: 15px;" class="white-text">-Phường:</span>
						<input class="input100" type="text" name="phuong" placeholder="Address" value="<?= $phuong ?>" >
						<span style="padding-left: 15px;" class="white-text">-Quận:</span>
						<input class="input100" type="text" name="quan" placeholder="Address" value="<?= $quan ?>" >
						<span style="padding-left: 15px;" class="white-text">-Thành phố</span>
						<input class="input100" type="text" name="thanh_pho" placeholder="Address" value="<?= $thanh_pho ?>" >
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="btn_update">
							OK
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="../index.php">
							Home ?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/bootstrap/js/popper.js"></script>
	<script src="../css/tai-khoan/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/daterangepicker/moment.min.js"></script>
	<script src="../css/tai-khoan/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../css/tai-khoan/vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="../css/tai-khoan/js/main.js"></script>

</body>

</html>