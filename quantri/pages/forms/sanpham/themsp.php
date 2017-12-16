<?php
    $sqlDm = "SELECT * FROM dmsanpham";
    $queryDm = mysql_query($sqlDm);
?>

<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
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
                        $anh_sp = $_FILES['anh_sp']['name'];
                        $tmp =  $_FILES['anh_sp']['tmp_name'];
                        move_uploaded_file($tmp, 'images/'.$anh_sp);
                        $error = '';

                        $sqlTen = "SELECT ten_sp FROM sanpham";
                        $queryTen = mysql_query($sqlTen);
                        while($rowTen = mysql_fetch_array($queryTen)) {
                            if($rowTen['ten_sp'] == $ten_sp) {
                                $error = 'Tên sản phẩm đã tồn tại';
                                break;
                            }
                        }

                        if($error == '') {
                            $sql = "INSERT INTO sanpham(ten_sp, gia_sp, bao_hanh, phu_kien, tinh_trang, khuyen_mai, trang_thai, chi_tiet_sp, anh_sp, id_dm, dac_biet) VALUES('$ten_sp', '$gia_sp', '$bao_hanh', '$phu_kien', '$tinh_trang', '$khuyen_mai', '$trang_thai', '$chi_tiet_sp', '$anh_sp', '$id_dm', '$dac_biet')";
                            $query = mysql_query($sql);
                            
                            $sql_id = "SELECT id_sp FROM sanpham WHERE ten_sp = '$ten_sp'";
                            $query_id = mysql_query($sql_id);
                            $row_id = mysql_fetch_array($query_id);
                            $id_sp = $row_id['id_sp'];
                            header("location: index.php?page_layout=suasp&id_sp=$id_sp&state=ok");
                        }
                    }
                ?>

                <h2 id="noti-suasp">THÊM SẢN PHẨM MỚI</h2>
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
                            <li><a href="index.php?page_layout=sanpham">Xem danh sách sản phẩm</a></li>
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
                                    <input type="text" name="ten_sp" id="ten_sp" class="form-control" placeholder="Nhập tên sản phẩm" required="" value="<?php if(isset($ten_sp)) { echo $ten_sp; } ?>">
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
                                    <input type="file" name="anh_sp" id="anh_sp" required="">
                                    <input type="hidden" name="anh_sp"> 
                                </div>
                            </div>
                        </div>
                    </div>                    
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="id_dm">Nhà cung cấp</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <select class="form-control show-tick" name="id_dm" required="">
                                    <option value="" selected disabled>Nhập nhà cung cấp</option>
                                <?php while($rowDm = mysql_fetch_array($queryDm)) { ?>
                                    <option value="<?php echo $rowDm['id_dm']; ?>"><?php echo $rowDm['ten_dm']; ?></option>
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
                                    <input type="number" name="gia_sp" id="gia_sp" class="form-control" placeholder="Nhập giá sản phẩm" required="" value="<?php if(isset($gia_sp)) { echo $gia_sp; } ?>">
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
                                    <input type="text" name="bao_hanh" id="bao_hanh" class="form-control" placeholder="Nhập bảo hành" required="" value="<?php if(isset($bao_hanh)) { echo $bao_hanh; } ?>">
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
                                    <input type="text" name="phu_kien" id="phu_kien" class="form-control" placeholder="Nhập phụ kiện" required="" value="<?php if(isset($phu_kien)) { echo $phu_kien; } ?>">
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
                                    <input type="text" name="tinh_trang" id="tinh_trang" class="form-control" placeholder="Nhập tình trạng" required="" value="<?php if(isset($tinh_trang)) { echo $tinh_trang; } ?>">
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
                                    <input type="text" name="khuyen_mai" id="khuyen_mai" class="form-control" placeholder="Nhập khuyến mại" required="" value="<?php if(isset($khuyen_mai)) { echo $khuyen_mai; } ?>">
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
                                    <input type="text" name="trang_thai" id="trang_thai" class="form-control" placeholder="Nhập trạng thái" required="" value="<?php if(isset($trang_thai)) { echo $trang_thai; } ?>">
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
                                    <input type="radio" name="dac_biet" id="radio_1" class="radio-col-blue" value="1" required <?php if(isset($dac_biet)) { if($dac_biet == '1') { echo "checked";} } ?>/>
                                    <label for="radio_1">CÓ</label>
                                    <input type="radio" name="dac_biet" id="radio_2" class="radio-col-blue" value="0" required <?php if(isset($dac_biet)) { if($dac_biet == '0') { echo "checked";} } ?>/>
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
                                    <textarea rows="4" class="form-control no-resize" name="chi_tiet_sp" placeholder="Chi tiết sản phẩm..." required=""><?php if(isset($chi_tiet_sp)) { echo $chi_tiet_sp; } ?></textarea>
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