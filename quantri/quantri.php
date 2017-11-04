<?php
ob_start();
session_start();
if(isset($_SESSION['tk']) && isset($_SESSION['mk'])) { 
    include_once('ketnoi.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mobile Shop - Trang chủ quản trị</title>
<link rel="stylesheet" type="text/css" href="css/quantri.css" />

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<?php
    if(isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'danhsachsp':
                echo '<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />';
                break;
            case 'themsp':
                echo '<link rel="stylesheet" type="text/css" href="css/themsp.css" />';
                break;
            case 'suasp':
                echo '<link rel="stylesheet" type="text/css" href="css/suasp.css" />';
                break;
            case 'danhsachtv':
                echo '<link rel="stylesheet" type="text/css" href="css/danhsachtv.css" />';
                break;
        }
    }
?>

</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="navbar">
            <ul>
                <li id="admin-home"><a href="quantri.php">trang chủ quản trị</a></li>
                <li><a href="quantri.php?page_layout=danhsachtv">thành viên</a></li>
                <li><a href="quantri.php?page_layout=danhsachsp">danh mục sản phẩm</a></li>
                <li><a href="#">sản phẩm</a></li>
                <li><a target="_blank" href="#">xem website</a></li>
            </ul>
            <div id="user-info">
                <p>Xin chào <span><?php if(isset($_SESSION['tk'])) {echo $_SESSION['tk'];} else {echo 'Admin';} ?></span> đã đăng nhập vào hệ thống</p>
                <p><a href="dangxuat.php">Đăng xuất</a></p>
            </div>
        </div>
        <div id="banner">
            <div id="logo"><a href="quantri.php"><img src="anh/logo.png" /></a></div>
        </div>
    </div>
    <div id="body">
        
        <?php
            // Master Page
            if(isset($_GET['page_layout'])) {
                switch($_GET['page_layout']) {
                    case 'danhsachsp': include_once('danhsachsp.php');
                    break;

                    case 'themsp': include_once('themsp.php');
                    break;

                    case 'suasp': include_once('suasp.php');
                    break;

                    case 'danhsachtv': include_once('danhsachtv.php');
                    break;

                    default: include_once('gioithieu.php');
                }
            } else {
                include_once('gioithieu.php');
            }
        ?>
        
    </div>
    <div id="footer">
        <div id="footer-info">
            <h4>Phát triển ứng dụng Web</h4>
        </div>
    </div>
</div>
</body>
</html>

<?php
    } else {
        header('location:index.php');
    }
?>