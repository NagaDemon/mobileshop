<?php
	$id_dm = $_GET['id_dm'];
	$sql = "SELECT * FROM dmsanpham WHERE id_dm = $id_dm";
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
                        $ten_dm = $_POST['ten_dm'];
                        $error = '';
                        $id_dm = $row['id_dm'];
                        $error = '';

                        $sqlDm = "SELECT ten_dm FROM dmsanpham WHERE NOT (id_dm = $id_dm)";
                        $queryDm = mysql_query($sqlDm);
                        while($rowDm = mysql_fetch_array($queryDm)) {
                            if($rowDm['ten_dm'] == $ten_dm) {
                                $error = 'Tên danh mục đã tồn tại';
                                break;
                            }
                        }

                        if($error == '') {
                            $sql = "UPDATE dmsanpham SET ten_dm = '$ten_dm' WHERE id_dm = $id_dm";
                            $query = mysql_query($sql);
                            header("location: index.php?page_layout=suadm&id_dm=$id_dm&state=ok");
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
                            <li><a href="index.php?page_layout=dmsanpham">Xem danh sách danh mục</a></li>
                            <li><a href="index.php?page_layout=themdm">Thêm mới danh mục</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="ten_dm">Tên danh mục</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="ten_dm" id="ten_dm" class="form-control" placeholder="Nhập tài khoản" required="" value="<?php if(isset($_POST['ten_dm'])) { echo $_POST['ten_dm']; } else { echo $row['ten_dm']; }?>">
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