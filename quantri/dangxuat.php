<?php
	session_start();
	if(isset($_SESSION['tk']) && isset($_SESSION['mk'])) {
		session_unset($_SESSION['tk']);
		session_unset($_SESSION['mk']);
	}
	header('location: dangnhap.php');
?>