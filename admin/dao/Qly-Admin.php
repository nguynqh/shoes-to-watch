<?php
    require_once ('pdo.php');

    function khach_hang_insert($Manager_Full_Name,$password,$Manager_email,$Manager_Phone,$Address){
        $sql = "INSERT INTO manager(Manager_Full_Name,password,Manager_email,Manager_Phone,Address) VALUES(?,?,?,?,?)";
        pdo_execute($sql,$Manager_Full_Name,$password,$Manager_email,$Manager_Phone,$Address);
    }

    function khach_hang_update($ManagerID,$Manager_Full_Name,$Manager_email,$Manager_Phone,$Address){
        $sql = "UPDATE manager SET Manager_Full_Name=?,Manager_email=?,Manager_Phone=?,Address=? WHERE ManagerID=?";
        pdo_execute($sql,$Manager_Full_Name,$Manager_email,$Manager_Phone,$Address,$ManagerID);
    }

    function khach_hang_delete($ManagerID){
        $sql = "DELETE FROM manager WHERE ManagerID=?";
        if(is_array($ManagerID)){
            foreach($ManagerID as $ma){
                pdo_execute($sql,$ma);
            }
        }else{
            pdo_execute($sql,$ManagerID);
        }
    }

    function khach_hang_select_all(){
        $sql = "SELECT * FROM manager";
        return pdo_query($sql);
    }

    function khach_hang_select_by_id($ManagerID){
        $sql = "SELECT * FROM manager WHERE ManagerID =?";
        return pdo_query_one($sql,$ManagerID);
    }

    function khach_hang_select_by_ten_dang_nhap($ten_dang_nhap){
        $sql = "SELECT * FROM manager WHERE ten_dang_nhap =?";
        return pdo_query_one($sql,$ten_dang_nhap);
    }

    function khach_hang_select_by_ten_dang_nhap_user($ten_dang_nhap){
        $sql = "SELECT * FROM khach_hang WHERE ten_dang_nhap =?";
        return pdo_query_one($sql,$ten_dang_nhap);
    }

    function khach_hang_change_password($ManagerID, $mat_khau_moi){
        $sql = "UPDATE manager SET mat_khau=? WHERE ManagerID=?";
        pdo_execute($sql, $mat_khau_moi, $ManagerID);
    }