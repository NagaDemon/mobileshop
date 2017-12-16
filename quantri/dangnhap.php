<?php
ob_start();
session_start();
if(isset($_SESSION['tk']) && isset($_SESSION['mk'])) {
    header('location:index.php');
}
include_once('ketnoi.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign in | Mobile Shop</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">

<?php
    if(isset($_POST['submit'])) {
        if(isset($_POST['username']) && isset($_POST['password'])) {
            $tk = $_POST['username'];
            $mk = $_POST['password'];
            $sql = "SELECT * FROM thanhvien WHERE tai_khoan = '$tk' AND mat_khau = '$mk'";
            $query = mysql_query($sql);
            $totalRows = mysql_num_rows($query);

            if($totalRows <= 0) {
                $error = 'Tài khoản không tồn tại';
            } else {
                $_SESSION['tk'] = $tk;
                $_SESSION['mk'] = $mk;
                header('location:index.php');
            }
        }
    }
?>

    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Mobile Shop<b></b></a>
            <small>-- Nhóm 7 --</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">
                        <?php 
                            if(isset($error)) {
                                // $error = '<div class="alert alert-danger">Tài khoản hoặc mật khẩu không đúng.</div>';
                                $error = '<p style="color: #E91E63; text-align: center">Tài khoản hoặc mật khẩu không đúng</p>';
                                echo $error;
                            }else {
                                // $info = '<div class="alert alert-info">Vui lòng đăng nhập.</div>';
                                echo 'Vui lòng đăng nhập';
                            } 
                        ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" value="" placeholder="Tên đăng nhập" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" value="" placeholder="Mật khẩu" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Nhớ tài khoản</label>
                        </div>
                        <div class="col-xs-5">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit">ĐĂNG NHẬP</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="dangky.html">Đăng ký!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Quên mật khẩu?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>