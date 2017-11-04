<?php

session_start();
if(isset($_SESSION['tk']) && isset($_SESSION['mk'])) {
	$id_sp = $_GET['id_sp'];
	include_once('ketnoi.php');
	$sql = "DELETE FROM sanpham WHERE id_sp = $id_sp";
	$query = mysql_query($sql);
	header('location:quantri.php?page_layout=danhsachsp');
}

?>