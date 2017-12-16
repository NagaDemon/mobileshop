<?php
    session_start();
    if(isset($_SESSION['tk']) && isset($_SESSION['mk'])) {
        $id_dm = $_GET['id_dm'];
        include_once('../../../ketnoi.php');
        $sql = "DELETE FROM dmsanpham WHERE id_dm = $id_dm";
        $query = mysql_query($sql);
        header('location:../../../index.php?page_layout=dmsanpham');
    }
?>