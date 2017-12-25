<?php
	session_start();
	if(isset($_SESSION['tk']) && isset($_SESSION['mk'])) {
		$id_dh = $_GET['id_dh'];
		include_once('../../../ketnoi.php');
		$sql = "DELETE FROM donhang WHERE id_dh = $id_dh";
		$query = mysql_query($sql);
		header('location:../../../index.php?page_layout=donhang');
	}
?>