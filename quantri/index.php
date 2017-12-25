<?php
    @ob_start();
    session_start();
    if(isset($_SESSION['tk']) && isset($_SESSION['mk'])) {
        include_once('ketnoi.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin page | Mobile shop</title>
    <!-- Favicon-->
    <!-- <link rel="icon" href="favicon.ico" type="image/x-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/theme-pink.css" rel="stylesheet" />

    <?php
        if(isset($_GET['page_layout'])) {
            $pg = $_GET['page_layout'];
            if($pg == 'thanhvien' || $pg == 'dmsanpham' || $pg == 'sanpham' || $pg == 'donhang') {
                echo '<link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">';
            } else {
                echo '<link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet"/>';
            }
        }
    ?>
</head>

<body class="theme-pink">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">TRANG QUẢN TRỊ - MOBILE SHOP</a>
            </div>
            
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="../anh/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <?php
                        $tk = $_SESSION['tk'];
                        $sql = "SELECT tai_khoan, email FROM thanhvien WHERE tai_khoan = '$tk'";
                        $query = mysql_query($sql);
                        $row = mysql_fetch_array($query);
                    ?>
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row['tai_khoan']; ?></div>
                    <div class="email"><?php echo $row['email']; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="index.php?page_layout=suatv&id_thanhvien=<?php echo $row['id_thanhvien']; ?>"><i class="material-icons">person</i>Profile</a></li> -->
                            <!-- <li role="seperator" class="divider"></li> -->
                            <li><a onclick="return dangXuat();" href="dangxuat.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Menu</li>
                    <?php
                        $home = $thanhvien = $dmsanpham = $sanpham = '';
                        if(isset($_GET['page_layout'])) {
                            if($_GET['page_layout'] == 'thanhvien' || $_GET['page_layout'] == 'suatv' || $_GET['page_layout'] == 'themtv') {
                                $thanhvien = 'active';
                            } elseif ($_GET['page_layout'] == 'dmsanpham' || $_GET['page_layout'] == 'suadm' || $_GET['page_layout'] == 'themdm') {
                                $dmsanpham = 'active';
                            } elseif ($_GET['page_layout'] == 'sanpham' || $_GET['page_layout'] == 'suasp' || $_GET['page_layout'] == 'themsp') {
                                $sanpham = 'active';
                            } elseif ($_GET['page_layout'] == 'donhang' || $_GET['page_layout'] == 'chitietdh') {
                                $donhang = 'active';
                            } else {
                                $home = 'active';
                            }
                        } else {
                            $home = 'active';
                        }
                    ?>
                    <li class="<?php echo $home; ?>">
                        <a href="index.php?page_layout=home">
                            <i class="material-icons">home</i>
                            <span>Trang chủ quản trị</span>
                        </a>
                    </li>
                    <li class="<?php echo $sanpham; ?>">
                        <a href="index.php?page_layout=sanpham">
                            <i class="material-icons">shopping_cart</i>
                            <span>Sản phẩm</span>
                        </a>
                    </li>
                    <li class="<?php echo $dmsanpham;?>">
                        <a href="index.php?page_layout=dmsanpham">
                            <i class="material-icons">widgets</i>
                            <span>Danh mục sản phẩm</span>
                        </a>
                    </li>
                    <li class="<?php echo $donhang;?>">
                        <a href="index.php?page_layout=donhang">
                            <i class="material-icons">event_note</i>
                            <span>Đơn hàng</span>
                        </a>
                    </li>                    
                    <li class="<?php echo $thanhvien; ?>">
                        <a href="index.php?page_layout=thanhvien">
                            <i class="material-icons">person</i>
                            <span>Thành viên</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <a href="javascript:void(0);">Nhóm 7</a>
                </div>
                <div class="version">
                    <b>Phát triển ứng dụng Web</b> 
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <?php
                if(isset($_GET['page_layout'])) {
                    switch($_GET['page_layout']) {
                        case 'thanhvien': include_once('pages/tables/thanhvien.php');
                            break;
                        case 'suatv': include_once('pages/forms/thanhvien/suatv.php');
                            break;
                        case 'themtv': include_once('pages/forms/thanhvien/themtv.php');
                            break;                            
                        case 'sanpham': include_once('pages/tables/sanpham.php');
                            break;
                        case 'themsp': include_once('pages/forms/sanpham/themsp.php');
                            break;
                        case 'suasp': include_once('pages/forms/sanpham/suasp.php');
                            break;
                        case 'dmsanpham': include_once('pages/tables/dmsanpham.php');
                            break;
                        case 'suadm': include_once('pages/forms/danhmuc/suadm.php');
                            break;
                        case 'themdm': include_once('pages/forms/danhmuc/themdm.php');
                            break;
                        case 'donhang': include_once('pages/tables/donhang.php');
                            break;
                        case 'chitietdh': include_once('pages/forms/donhang/chitietdh.php');
                            break;
                        default: include_once('pages/index-content.php');
                    }
                } else {
                    include_once('pages/index-content.php');
                }
            ?>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <?php
        if(isset($_GET['page_layout'])) {
            echo '<script src="js/pages/tables/jquery-datatable.js"></script>';
            // Jquery DataTable Plugin Js
            echo '<script src="plugins/jquery-datatable/jquery.dataTables.js"></script>';
            echo '<script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>';
            echo '<script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>';
            echo '<script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>';
            echo '<script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>';
            echo '<script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>';
            echo '<script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>';
            echo '<script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>';
            echo '<script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>';
        } else {
            echo '<script src="js/pages/index.js"></script>';
        }
    ?>
    <!-- Demo Js -->
    <script src="js/demo.js"></script>

</body>

</html>

<?php
} else {
    header('location: dangnhap.php');
}
?>