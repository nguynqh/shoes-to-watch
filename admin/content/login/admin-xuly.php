<?php
require_once("connect.php");
    
if(isset($_POST['submit'])){
    $sodienthoai = $_POST['sodienthoai'];
    $password = $_POST['password'];
    echo $sodienthoai;
    echo $password;

    // Kiểm tra nếu số điện thoại được nhập
    if (!empty($sodienthoai)) {
        // Trường hợp 1: Có số điện thoại, kiểm tra cả số điện thoại và mật khẩu

        // Thực hiện truy vấn SQL để lấy thông tin người dùng dựa trên số điện thoại
        $sql = "SELECT * FROM manager WHERE Manager_Phone='".$sodienthoai."' LIMIT 1";
        $result  = $conn->query($sql);

        // Kiểm tra xem có bản ghi nào trả về từ cơ sở dữ liệu không
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();

            // So sánh mật khẩu đã nhập với mật khẩu trong cơ sở dữ liệu
            if ($row['password'] == $password){
               // login đúng
                $_SESSION['sodienthoai'] = $sodienthoai;
                //echo('Logined');
                $conn->close();
                
                session_start();
                $_SESSION['sodienthoai'] = $sodienthoai;
                $_SESSION['login'] = true;

                header('Location: ../../index.php');
        } else {
			$conn->close();
			header('Location: login.php?error=1');
        }
    } 
    }
}
?>
