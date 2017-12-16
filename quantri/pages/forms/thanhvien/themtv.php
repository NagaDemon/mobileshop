<?php
    $sqlTv = "SELECT tai_khoan, email FROM thanhvien";
    $queryTv = mysql_query($sqlTv);
?>

<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 id="noti-suasp">THÊM THÀNH VIÊN MỚI</h2>
                <?php
                    if(isset($_POST['submit'])) {
                        $tai_khoan = $_POST['tai_khoan'];
                        $email = $_POST['email'];
                        $quyen_truy_cap = $_POST['quyen_truy_cap'];
                        $mat_khau = $_POST['mat_khau'];
                        $mat_khau_2 = $_POST['mat_khau_2'];
                        $error = '';
                        
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

                        if($mat_khau == $mat_khau_2) {
                            if($error == '') {
                                $sql = "INSERT INTO thanhvien(tai_khoan, email, quyen_truy_cap, mat_khau) VALUES('$tai_khoan', '$email', '$quyen_truy_cap', '$mat_khau')";
                                $query = mysql_query($sql);
                                
                                $sql_id = "SELECT id_thanhvien FROM thanhvien WHERE tai_khoan = '$tai_khoan'";
                                $query_id = mysql_query($sql_id);
                                $row_id = mysql_fetch_array($query_id);
                                $id_thanhvien = $row_id['id_thanhvien'];
                                header("location: index.php?page_layout=suatv&id_thanhvien=$id_thanhvien&state=ok");
                            }
                        } else {
                            $error = 'Mật khẩu không chính xác';
                        }     
                    }
                ?>    

                <?php
                    if(isset($error)) {
                        echo '<p id="error-alert">'.$error.'</p>';
                    }
                ?>
                
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="index.php?page_layout=thanhvien">Xem danh sách thành viên</a></li>
                            <li><a href="index.php?page_layout=themtv">Thêm thành viên mới</a></li>
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
                                    <input type="text" name="tai_khoan" id="tai_khoan" class="form-control" placeholder="Nhập tài khoản" required="" value="<?php if(isset($tai_khoan)) {echo $tai_khoan;} ?>">
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
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email" required="" value="<?php if(isset($email)) {echo $email;} ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="quyen_truy_cap">Quyền truy cập</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <select class="form-control show-tick" name="quyen_truy_cap" required="">
                                    <option value="" selected disabled>Nhập quyền truy cập</option>
                                    <option value="Admin" <?php if(isset($quyen_truy_cap)) {if($quyen_truy_cap == 'Admin') { echo "selected='selected'"; } } ?>>Admin</option>
                                    <option value="Editor" <?php if(isset($quyen_truy_cap)) {if($quyen_truy_cap == 'Editor') { echo "selected='selected'"; } } ?>>Editor</option>
                            </select>
                        </div>
                    </div>                    
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="mat_khau">Mật khẩu</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="mat_khau" id="mat_khau" class="form-control" placeholder="Nhập mật khẩu" required="" value="<?php if(isset($mat_khau)) {echo $mat_khau;} ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="mat_khau_2">Xác minh mật khẩu</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="mat_khau_2" id="mat_khau_2" class="form-control" placeholder="Nhập lại mật khẩu" required="" value="<?php if(isset($mat_khau_2)) {echo $mat_khau_2;} ?>">
                                </div>
                            </div>
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