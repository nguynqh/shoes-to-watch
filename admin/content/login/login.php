<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Watch | Admin Login</title>

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="login_register_css/login.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3 style="text-align: center; font-weight: 700;">Login to admin page</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="admin-xuly.php" method="post" onsubmit="return valid()">


					<?php
						if(isset($_GET['error']))
						{
							echo '<div class="alert alert-danger" role="alert">Username or Password is incorrect!</div>';
						}
					?>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input name="sodienthoai" id="sodienthoai" type="text" class="form-control" placeholder="Nhập số điện thoại">
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input name="password" id="password" type="password" class="form-control" placeholder="Nhập mật khẩu">
					</div>


					<div class="action">
						<!-- <button type="button" value="Cancel" onclick="window.location.assign('index.php');" class="btn float-right login_btn">Cancel</button> -->
						<button name="submit" type="submit" value="Login" class="btn float-right login_btn" >Login</button>
					</div>

				</form>
			</div>
			
		</div>
	</div>
</div>
<script src="../../../js/ad_main.js"></script>
</body>
</html>