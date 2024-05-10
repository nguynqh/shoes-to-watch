<?php
    require_once ('pdo.php');

    function khach_hang_insert($ManagerID ,$Manager_Full_Name,$password,$Manager_email,$Manager_Phone,$Address){
        $sql = "INSERT INTO manager(ManagerID ,Manager_Full_Name,mat_khau,Manager_email,Manager_Phone,  ) VALUES(?,?,?,?,?,?)";
        pdo_execute($sql,$ManagerID,$Manager_Full_Name,$password,$Manager_email,$Manager_Phone,$Address);
    }

    function khach_hang_update($ma_kh,$ten_dang_nhap,$ho_ten,$email,$sdt,$dia_chi){
        $sql = "UPDATE khach_hang SET ten_dang_nhap=?,ho_ten=?,email=?,sdt=?,dia_chi=? WHERE ma_kh=?";
        pdo_execute($sql,$ten_dang_nhap,$ho_ten,$email,$sdt,$dia_chi,$ma_kh);
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
        $sql = "SELECT * FROM manager";
        return pdo_query($sql);
    }

    function khach_hang_select_by_id($ma_kh){
        $sql = "SELECT * FROM khach_hang WHERE ma_kh =?";
        return pdo_query_one($sql,$ma_kh);
    }

    function khach_hang_select_by_ten_dang_nhap($ten_dang_nhap){
        $sql = "SELECT * FROM khach_hang WHERE ten_dang_nhap =?";
        return pdo_query_one($sql,$ten_dang_nhap);
    }

    function khach_hang_change_password($ma_kh, $mat_khau_moi){
        $sql = "UPDATE khach_hang SET mat_khau=? WHERE ma_kh=?";
        pdo_execute($sql, $mat_khau_moi, $ma_kh);
    }