<?php
$lifetime = 60*60*24*365;
session_set_cookie_params($lifetime,'/');
session_start();

require_once ('../admin/dao/hang-hoa.php');
    extract($_REQUEST);
    $item = hang_hoa_select_by_id($ma_hh);
    extract($item);

    if(!empty($_SESSION['cart'])){
        $cart = $_SESSION['cart'];
        // Kiểm tra lần thứ 2 mua hàng đã có id phần tử mảng hay chưa dùng hàm array_key_exists
            if(array_key_exists($ma_hh,$cart)){
                $cart[$ma_hh] = array(
                    "sl" => (int)$cart[$ma_hh]["sl"]+1,
                    "price" =>$don_gia,
                    "name" =>$ten_hh,
                    "hinh" =>$hinh,
                    "ma_hh" =>$ma_hh,
                    "giam_gia"=>$giam_gia

                    
                );
            }else{
                $cart[$ma_hh] = array(
                    "sl" =>1,
                    "price" =>$don_gia,
                    "name" =>$ten_hh,
                    "hinh" =>$hinh,
                    "ma_hh" =>$ma_hh,
                    "giam_gia"=>$giam_gia

                    
                );
            }
    }else{
        // Lần đầu tiên mua hàng
        $cart[$ma_hh] = array(
            "sl" =>1,
            "price" =>$don_gia,
            "name" =>$ten_hh,
            "hinh" =>$hinh,
            "ma_hh" =>$ma_hh,
            "giam_gia"=>$giam_gia
            
        );
    }
    $_SESSION['cart'] = $cart;
    

header('location: danh-sach-gio-hang.php');
?>