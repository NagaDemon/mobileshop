<?php
	$id_thanhvien = $_GET['id_thanhvien'];
	$sql = "SELECT * FROM thanhvien WHERE id_thanhvien = $id_thanhvien";
	$query = mysql_query($sql);
	$row = mysql_fetch_array($query);
?>

<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 id="noti-suasp">SỬA THÔNG TIN THÀNH VIÊN</h2>
                <?php
                    if(isset($_POST['submit'])) {
                        $tai_khoan = $_POST['tai_khoan'];
                        $email = $_POST['email'];
                        $mat_khau = $_POST['mat_khau'];
                        $quyen_truy_cap = $_POST['quyen_truy_cap'];
                        $error = '';
                        $id_thanhvien = $row['id_thanhvien'];

                        $sqlTv = "SELECT tai_khoan, email FROM thanhvien WHERE NOT (id_thanhvien = $id_thanhvien)";
                        $queryTv = mysql_query($sqlTv);
                        while($rowTv = mysql_fetch_array($queryTv)) {
                            if($rowTv['tai_khoan'] == $tai_khoan) {
                                $error = 'Tài khoản đã có người sử dụng';
                                break;
                            }
                            if($rowTv['email'] == $email) {
                                $error = 'Email đã có người sử dụng';
                                break;
                            }
                        }

                        if($error == '') {
                            $sql = "UPDATE thanhvien SET tai_khoan = '$tai_khoan', email = '$email', mat_khau = '$mat_khau', quyen_truy_cap = '$quyen_truy_cap' WHERE id_thanhvien = $id_thanhvien";
                            $query = mysql_query($sql);
                            header("location: index.php?page_layout=suatv&id_thanhvien=$id_thanhvien&state=ok");
                        }
                    }
                ?>
                <?php
                    if(isset($error)) {
                        if($error != '') {
                            echo '<p id="error-alert">'.$error.'</p>';
                        }
                    } else {
                        if(isset($_GET['state'])) {
                            echo '<p id="success-alert"><i class="material-icons">done</i>Cập nhật thành công</p>';
                        }
                    }
                ?>

                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="index.php?page_layout=thanhvien">Xem danh sách thành viên</a></li>
                            <li><a href="index.php?page_layout=themtv">Thêm mới thành viên</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="tai_khoan">Tài khoản</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="tai_khoan" id="tai_khoan" class="form-control" placeholder="Nhập tài khoản" required="" value="<?php if(isset($_POST['tai_khoan'])) { echo $_POST['tai_khoan']; } else { echo $row['tai_khoan']; }?>">
                                </div>
                            </div>
                        </div>
                    </div>                   
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="email">Email</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required="" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } else { echo $row['email']; } ?>">
                                </div>
                            </div>
                        </div>
                    </div>                                        
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="mat_khau">Mật khẩu</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="mat_khau" id="mat_khau" class="form-control" placeholder="Nhập mật khẩu" required="" value="<?php if(isset($_POST['mat_khau'])) { echo $_POST['mat_khau']; } else { echo $row['mat_khau']; } ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="quyen_truy_cap">Quyền truy cập</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <select class="form-control show-tick" name="quyen_truy_cap">
                                <option <?php 
                                if(isset($_POST['quyen_truy_cap'])) {
                                    if($_POST['quyen_truy_cap'] == 'Admin') {
                                        echo "selected='selected'";
                                    }
                                } else {
                                    if($row['quyen_truy_cap'] == 'Admin') {
                                        echo "selected='selected'";
                                    }
                                }
                                ?> value="Admin">Admin</option>
                                <option <?php 
                                if(isset($_POST['quyen_truy_cap'])) {
                                    if($_POST['quyen_truy_cap'] == 'Editor') {
                                        echo "selected='selected'";
                                    }
                                } else {
                                    if($row['quyen_truy_cap'] == 'Editor') {
                                        echo "selected='selected'";
                                    }
                                }
                                ?> value="Editor">Editor</option>
                            </select>
                        </div>
                    </div>                                       
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <input type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect" value="CẬP NHẬT">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Horizontal Layout -->