<?php
    session_start();
    if(isset($_SESSION['tk']) && isset($_SESSION['mk'])) {
        $id_thanhvien = $_GET['id_thanhvien'];
        include_once('../../../ketnoi.php');
        $sql = "DELETE FROM thanhvien WHERE id_thanhvien = $id_thanhvien";
        $query = mysql_query($sql);
        header('location:../../../index.php?page_layout=thanhvien');
    }
?>