<?php
    require_once ('../../dao/Qly-Admin.php');

    extract($_REQUEST);

    khach_hang_delete($ManagerID);

    header('location:admin-list.php');

?>