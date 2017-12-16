<?php
    $sqlDm = "SELECT ten_dm FROM dmsanpham";
    $queryDm = mysql_query($sqlDm);
?>

<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 id="noti-suasp">THÊM THÀNH VIÊN MỚI</h2>
                <?php
                    if(isset($_POST['submit'])) {
                        $ten_dm = $_POST['ten_dm'];
                        $error = '';
                        
                        while($rowDm = mysql_fetch_array($queryDm)) {
                            if($rowDm['ten_dm'] == $ten_dm) {
                                $error = 'Tên danh mục đã tồn tại';
                                break;
                            }
                        }

                        if($error == '') {
                            $sql = "INSERT INTO dmsanpham(ten_dm) VALUES('$ten_dm')";
                            $query = mysql_query($sql);
                            
                            $sql_id = "SELECT id_dm FROM dmsanpham WHERE ten_dm = '$ten_dm'";
                            $query_id = mysql_query($sql_id);
                            $row_id = mysql_fetch_array($query_id);
                            $id_dm = $row_id['id_dm'];
                            header("location: index.php?page_layout=suadm&id_dm=$id_dm&state=ok");
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
                            <li><a href="index.php?page_layout=dmsanpham">Xem danh sách danh mục</a></li>
                            <li><a href="index.php?page_layout=themdm">Thêm danh mục mới</a></li>
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
                                    <input type="text" name="ten_dm" id="ten_dm" class="form-control" placeholder="Nhập danh mục" required="" value="<?php if(isset($ten_dm)) {echo $ten_dm;} ?>">
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