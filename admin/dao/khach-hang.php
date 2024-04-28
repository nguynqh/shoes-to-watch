<?php
    require_once ('pdo.php');

    function khach_hang_insert($ten_dang_nhap,$ho_ten,$mat_khau,$email,$sdt,$dia_chi){
        $sql = "INSERT INTO khach_hang(ten_dang_nhap,ho_ten,mat_khau,email,sdt,dia_chi) VALUES(?,?,?,?,?,?)";
        pdo_execute($sql,$ten_dang_nhap,$ho_ten,$mat_khau,$email,$sdt,$dia_chi);
    }

    function khach_hang_update($ma_kh,$ho_ten,$mat_khau,$email,$sdt,$dia_chi){
        $sql = "UPDATE khach_hang SET ho_ten=?,mat_khau=?,email=?,sdt=?,dia_chi=? WHERE ma_kh=?";
        pdo_execute($sql,$ho_ten,$mat_khau,$email,$sdt,$dia_chi,$ma_kh);
    }

    function khach_hang_delete($ma_kh){
        $sql = "DELETE FROM khach_hang WHERE ma_kh=?";
        if(is_array($ma_kh)){
            foreach($ma_kh as $ma){
                pdo_execute($sql,$ma);
            }
        }else{
            pdo_execute($sql,$ma_kh);
        }
    }

    function khach_hang_select_all(){
        $sql = "SELECT * FROM khach_hang";
        return pdo_query($sql);
    }

    function khach_hang_select_by_id($ten_dang_nhap){
        $sql = "SELECT * FROM khach_hang WHERE ten_dang_nhap=?";
        return pdo_query_one($sql,$ten_dang_nhap);
    }

    function khach_hang_change_password($ma_kh, $mat_khau_moi){
        $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
        pdo_execute($sql, $mat_khau_moi, $ma_kh);
    }
