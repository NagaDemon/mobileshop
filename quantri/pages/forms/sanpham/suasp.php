<?php
    $id_sp = $_GET['id_sp'];
    $sql = "SELECT * FROM sanpham WHERE id_sp = $id_sp";
    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);

    $sqlDm = "SELECT * FROM dmsanpham";
    $queryDm = mysql_query($sqlDm);
?>

<!-- Horizontal Layout -->
<div class="row clearfix" style="margin-top: -18px;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 id="noti-suasp">SỬA THÔNG TIN SẢN PHẨM</h2>
                <?php
                    if(isset($_POST['submit'])) {
                        $ten_sp = $_POST['ten_sp'];
                        $id_dm = $_POST['id_dm'];
                        $gia_sp = $_POST['gia_sp'];
                        $bao_hanh = $_POST['bao_hanh'];
                        $phu_kien = $_POST['phu_kien'];
                        $tinh_trang = $_POST['tinh_trang'];
                        $khuyen_mai = $_POST['khuyen_mai'];
                        $trang_thai = $_POST['trang_thai'];
                        $dac_biet = $_POST['dac_biet'];
                        $chi_tiet_sp = $_POST['chi_tiet_sp'];
                        if($_FILES['anh_sp']['name'] == '') {
                            $anh_sp = $_POST['anh_sp'];
                        } else {
                            $anh_sp = $_FILES['anh_sp']['name'];
                            $tmp =  $_FILES['anh_sp']['tmp_name'];
                            move_uploaded_file($tmp, 'images/'.$anh_sp);
                        }
                        $error = '';

                        $sqlSp = "SELECT ten_sp FROM sanpham WHERE NOT (id_sp = $id_sp)";
                        $querySp = mysql_query($sqlSp);
                        while($rowSp = mysql_fetch_array($querySp)) {
                            if($rowSp['ten_sp'] == $ten_sp) {
                                $error = 'Tên sản phẩm đã tồn tại';
                                break;
                            }
                        }

                        if($error == '') {
                            $sql = "UPDATE sanpham SET id_dm = $id_dm, ten_sp = '$ten_sp', anh_sp = '$anh_sp', gia_sp = '$gia_sp', bao_hanh = '$bao_hanh', phu_kien = '$phu_kien', tinh_trang = '$tinh_trang', khuyen_mai = '$khuyen_mai', trang_thai = '$trang_thai', dac_biet = '$dac_biet', chi_tiet_sp = '$chi_tiet_sp' WHERE id_sp = $id_sp";
                            $query = mysql_query($sql);
                            
                            $id_sp = $row['id_sp'];
                            header("location: index.php?page_layout=suasp&id_sp=$id_sp&state=ok");
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
                            <li><a href="index.php?page_layout=sanpham">Xem danh sách sản phẩm</a></li>
                            <li><a href="index.php?page_layout=themsp">Thêm mới sản phẩm</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="body">
                <form method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="ten_sp">Tên sản phẩm</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="ten_sp" id="ten_sp" class="form-control" placeholder="Nhập tên sản phẩm" required="" value="<?php if(isset($_POST['ten_sp'])) { echo $_POST['ten_sp']; } else { echo $row['ten_sp']; } ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="anh_sp">Ảnh mô tả</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <img src="images/<?php echo $row['anh_sp']; ?>" width="80px;" style="display: inline;">
                                    <input type="file" name="anh_sp" id="anh_sp" style="display: inline;">
                                    <input type="hidden" name="anh_sp" value="<?php echo $row['anh_sp']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="id_dm">Nhà cung cấp</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <select class="form-control show-tick" name="id_dm">
                                <?php while($rowDm = mysql_fetch_array($queryDm)) { ?>
                                    <option <?php if($rowDm['id_dm'] == $row['id_dm']) { echo "selected='selected'";} ?> value="<?php echo $rowDm['id_dm']; ?>"><?php echo $rowDm['ten_dm']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="gia_sp">Giá sản phẩm</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="gia_sp" id="gia_sp" class="form-control" placeholder="Nhập giá sản phẩm" required="" value="<?php if(isset($_POST['gia_sp'])) { echo number_format($_POST['gia_sp']); } else { echo number_format($row['gia_sp']); } ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="bao_hanh">Bảo hành</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="bao_hanh" id="bao_hanh" class="form-control" placeholder="Nhập bảo hành" required="" value="<?php if(isset($_POST['bao_hanh'])) { echo $_POST['bao_hanh']; } else { echo $row['bao_hanh']; } ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="phu_kien">Phụ kiện</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="phu_kien" id="phu_kien" class="form-control" placeholder="Nhập phụ kiện" required="" value="<?php if(isset($_POST['phu_kien'])) { echo $_POST['phu_kien']; } else { echo $row['phu_kien']; } ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="tinh_trang">Tình trạng</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="tinh_trang" id="tinh_trang" class="form-control" placeholder="Nhập tình trạng" required="" value="<?php if(isset($_POST['tinh_trang'])) { echo $_POST['tinh_trang']; } else { echo $row['tinh_trang']; } ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="khuyen_mai">Khuyến mại</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="khuyen_mai" id="khuyen_mai" class="form-control" placeholder="Nhập khuyến mại" required="" value="<?php if(isset($_POST['khuyen_mai'])) { echo $_POST['khuyen_mai']; } else { echo $row['khuyen_mai']; } ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="trang_thai">Trạng thái</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="trang_thai" id="trang_thai" class="form-control" placeholder="Nhập trạng thái" required="" value="<?php if(isset($_POST['trang_thai'])) { echo $_POST['trang_thai']; } else { echo $row['trang_thai']; } ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="dac_biet">Sản phẩm đặc biệt</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="radio" name="dac_biet" id="radio_1" class="radio-col-blue" value="1" <?php 
                                    if(isset($_POST['dac_biet'])) { 
                                        if($_POST['dac_biet'] == 1) {
                                            echo "checked=checked";
                                        }
                                    } else {
                                        if($row['dac_biet'] == 1) {
                                            echo "checked=checked";
                                        }
                                    }
                                    ?>/>
                                    <label for="radio_1">CÓ</label>
                                    <input type="radio" name="dac_biet" id="radio_2" class="radio-col-blue" value="0" <?php if(isset($_POST['dac_biet'])) { 
                                            if($_POST['dac_biet'] == 0) {
                                                echo "checked=checked";
                                            }
                                        } else {
                                            if($row['dac_biet'] == 0) {
                                                echo "checked=checked";
                                            }
                                        }  
                                    ?>/>
                                    <label for="radio_2">KHÔNG</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="chi_tiet_sp">Chi tiết sản phẩm</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" name="chi_tiet_sp" placeholder="Chi tiết sản phẩm..." required=""><?php if(isset($_POST['chi_tiet_sp'])) { echo $_POST['chi_tiet_sp']; } else { echo $row['chi_tiet_sp']; } ?></textarea>
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