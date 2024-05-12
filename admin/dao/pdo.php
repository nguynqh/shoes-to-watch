<?php
    function pdo_get_connection(){
        $pdo = new PDO("mysql:host=localhost;dbname=MVH_Watch",'root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    function pdo_execute($sql){//thêm dữ liệu
        $sql_args = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn -> prepare($sql);
            $stmt -> execute($sql_args);
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }

    function pdo_query($sql){ // hàm truy xuất dữ liệu về mảng
        $sql_args = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn ->prepare($sql);
            $stmt -> execute($sql_args);
            $rows = $stmt -> fetchAll();
            return $rows;
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }

    function pdo_query_one($sql){ // trả về 1 hàng dữ liệu
        $sql_args = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn ->prepare($sql);
            $stmt -> execute($sql_args);
            $row = $stmt -> fetch();
            return $row;
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }

    function pdo_query_value($sql){
        $sql_args = array_slice(func_get_args(),1);
        try{
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->execute($sql_args);
            $row = $stmt ->fetch();
            return array_values($row)[0];
        }catch(PDOException $e){
            throw $e;
        }finally{
            unset($conn);
        }
    }

    function save_file($fieldname, $target_dir){
        $file_uploaded = $_FILES[$fieldname];
        $file_name = basename($file_uploaded["name"]);
        $target_path = $target_dir . $file_name;
        move_uploaded_file($file_uploaded["tmp_name"], $target_path);
        return $file_name;
    }

    function check_login(){
        if(!isset($_SESSION['user'])){      
            header("location: /MVH_Watch/tai-khoan/dang-nhap.php");
        }
    }
    
    ?>

