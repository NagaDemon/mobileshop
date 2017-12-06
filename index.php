<?php
    ob_start();
    session_start();
    include_once('cauhinh/ketnoi.php');
?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mobile Shop</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap-iso.css">
<link rel="stylesheet" type="text/css" href="css/trangchu.css" />
<link rel="stylesheet" type="text/css" href="css/slideshow.css" />

<?php
    if(isset($_GET['page_layout'])) {
        switch($_GET['page_layout']) {
            case 'danhsachtimkiem': echo '<link rel="stylesheet" type="text/css" href="css/danhsachtimkiem.css" />';
                break;
            case 'gioithieu': echo '<link rel="stylesheet" type="text/css" href="css/gioithieu.css" />';
                break;
            case 'dichvu': echo '<link rel="stylesheet" type="text/css" href="css/dichvu.css" />';
                break;
            case 'lienhe': echo '<link rel="stylesheet" type="text/css" href="css/lienhe.css" />';
                break;
            case 'danhsachsp': echo '<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />';
                break;
            case 'chitietsp': echo '<link rel="stylesheet" type="text/css" href="css/chitietsp.css" />';
                break;
            case 'giohang': echo '<link rel="stylesheet" type="text/css" href="css/giohang.css" />';
                break;
            case 'muahang': echo '<link rel="stylesheet" type="text/css" href="css/muahang.css" />';
                break;
            case 'hoanthanh': echo '<link rel="stylesheet" type="text/css" href="css/hoanthanh.css" />';
                break;
        }
    }
?>

<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
<script type="text/javascript" src="js/slide.js"></script>

</head>
<body>

<!-- Wrapper -->
<div id="wrapper">
	<!-- Header -->
    <div id="header">
    	<div id="search-bar">
        	<?php include_once('chucnang/timkiem/timkiem.php'); ?>
            <?php include_once('chucnang/giohang/giohangcuaban.php'); ?>	
        </div>
        <div id="main-bar">
        	<div id="logo"><a href="index.php"><img src="anh/logo_1.png" /></a></div>
            <div id="banner"></div>
        </div>
        <div id="navbar">
        	<?php include_once('chucnang/menungang/menungang.php'); ?>
        </div>
    </div>
    <!-- End Header -->
    <!-- Body -->
    <div id="body">
        <!-- Slide -->
            <?php include_once('chucnang/slideshow/slideshow.php'); ?>
        <!-- End Slide -->
        
    	<!-- Left Column -->
    	<div id="l-col">
        	<!-- <?php include_once('chucnang/tuvan/tuvan.php'); ?> -->
            <?php include_once('chucnang/sanpham/danhmucsp.php'); ?>
            <?php include_once('chucnang/quangcao/quangcao.php'); ?>
            <!-- <div class="l-sidebar"></div> -->
        </div>
        <!-- End Left Column -->
        
        <!-- Right Column -->
        <div id="r-col">           
            <div id="main">
                <?php
                    if(isset($_GET['page_layout'])) {
                        switch($_GET['page_layout']) {
                            case 'danhsachtimkiem': include_once('chucnang/timkiem/danhsachtimkiem.php');
                                break;
                            case 'gioithieu': include_once('chucnang/menungang/gioithieu.php');
                                break;
                            case 'dichvu': include_once('chucnang/menungang/dichvu.php');
                                break;
                            case 'lienhe': include_once('chucnang/menungang/lienhe.php');
                                break;
                            case 'danhsachsp': include_once('chucnang/sanpham/danhsachsp.php');
                                break;
                            case 'chitietsp': include_once('chucnang/sanpham/chitietsp.php');
                                break;
                            case 'giohang': include_once('chucnang/giohang/giohang.php');
                                break;
                            case 'muahang': include_once('chucnang/giohang/muahang.php');
                                break;
                            case 'hoanthanh': include_once('chucnang/giohang/hoanthanh.php');
                                break;
                            default: include_once('chucnang/sanpham/sanphamdacbiet.php');
                            include_once('chucnang/sanpham/sanphammoi.php');
                        }
                    } else {
                        include_once('chucnang/sanpham/sanphamdacbiet.php');
                        include_once('chucnang/sanpham/sanphammoi.php');
                    }
                ?>
            </div>
        </div>
        <!-- End Right Column -->
    	    
        <div id="brand"></div>
    </div>
    <!-- End Body -->
    <!-- Footer -->
    <div id="footer">
    	<div id="footer-info">
        	<h4>PHÁT TRIỂN ỨNG DỤNG WEB</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            
        </div>
    </div>
    <!-- End Footer -->
</div>
<!-- End Wrapper -->

</body>
</html>
