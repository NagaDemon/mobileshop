<?php
	$id_dh = $_GET['id_dh'];
	$sql = "SELECT * FROM donhang WHERE id_dh = $id_dh";
	$query = mysql_query($sql);
	$row = mysql_fetch_array($query);
?>

<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 id="noti-suasp">CHI TIẾT ĐƠN HÀNG</h2>
                <ul class="header-dropdown m-r--5">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="material-icons">more_vert</i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="index.php?page_layout=donhang">Xem danh sách đơn hàng</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <?php
                if(isset($_POST['submit'])) {
                    $tinh_trang = $_POST['tinh_trang'];
                    $id_dh = $row['id_dh'];
                    $sqlUpdate = "UPDATE donhang SET tinh_trang = '$tinh_trang' WHERE id_dh = '$id_dh'";
                    $queryUpdate = mysql_query($sqlUpdate);
                    header("location: index.php?page_layout=chitietdh&id_dh=$id_dh");
                }
            ?>

            <div class="body">
                <form method="post" action="" class="form-horizontal">
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="ten">Mã đơn hàng</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" name="id_dh" id="id_dh" class="form-control" value="<?php echo '#'.$row['id_dh']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>                  
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="ten">Tên khách hàng</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" name="ten" id="ten" class="form-control" value="<?php echo $row['ten']; ?>">
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
                                    <input type="email" readonly="" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="dien_thoai">Điện thoại</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" name="dien_thoai" id="dien_thoai" class="form-control" value="<?php echo $row['dien_thoai']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                            <label for="dia_chi">Địa chỉ</label>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" readonly="" name="dia_chi" id="dia_chi" class="form-control" value="<?php echo $row['dia_chi']; ?>">
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
                                    <input type="radio" name="tinh_trang" id="radio_1" class="radio-col-blue" value="0" <?php 
                                    if(isset($_POST['tinh_trang'])) { 
                                        if($_POST['tinh_trang'] == 0) {
                                            echo "checked=checked";
                                        }
                                    } else {
                                        if($row['tinh_trang'] == 0) {
                                            echo "checked=checked";
                                        }
                                    }
                                    ?>/>
                                    <label for="radio_1">Chưa giao hàng</label>
                                    <input type="radio" name="tinh_trang" id="radio_2" class="radio-col-blue" value="1" <?php if(isset($_POST['tinh_trang'])) { 
                                            if($_POST['tinh_trang'] == 1) {
                                                echo "checked=checked";
                                            }
                                        } else {
                                            if($row['tinh_trang'] == 1) {
                                                echo "checked=checked";
                                            }
                                        }  
                                    ?>/>
                                    <label for="radio_2">Đã giao hàng</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                            <input type="submit" name="submit" class="btn btn-primary m-t-15 waves-effect" value="CẬP NHẬT">
                        </div>
                    </div>
                                        <?php
                        $strId = $row['id_sp'];
                        $strSl = $row['so_luong'];
                        $arrSl = array();
                        $arrSl = explode(",", $strSl);
                        $i = 0;
                        $sql_sp = "SELECT * FROM sanpham WHERE id_sp IN($strId)";
                        $query_sp = mysql_query($sql_sp);
                    ?>                    
                    <div class="row clearfix">
                    <div class="body table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Ảnh sản phẩm</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $total = 0;
                                    while($row_sp = mysql_fetch_array($query_sp)) { 
                                    if($i < sizeof($arrSl)) {
                                ?>
                                <tr>
                                    <th><?php echo $row_sp['id_sp']; ?></th>
                                    <th><img width="60" src="images/<?php echo $row_sp['anh_sp']; ?>"/></th>
                                    <td><?php echo $row_sp['ten_sp']; ?></td>
                                    <td><?php echo number_format($row_sp['gia_sp']); ?></td>
                                    <td><?php echo $arrSl[$i]; ?></td>
                                    <td>
                                        <?php echo number_format($row_sp['gia_sp'] * $arrSl[$i]);
                                            $total += $row_sp['gia_sp'] * $arrSl[$i];
                                        ?>
                                    </td>
                                </tr>
                                <?php $i++; } } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="font-weight: bold;">Tổng giá trị hóa đơn: </td>
                                    <td style="font-weight: bold; color: red"><?php echo number_format($total).' VNĐ'; ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>                    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #END# Horizontal Layout -->