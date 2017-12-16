<?php
if(isset($_SESSION['giohang'])){
    $arrId = array();
    foreach($_SESSION['giohang'] as $id_sp=>$so_luong){
        $arrId[] = $id_sp;
        $arrSl[] = $so_luong;
    }
    $strId = implode(',', $arrId);
    $strSl = implode(',', $arrSl);
    $sql = "SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp DESC";
    $query = mysql_query($sql); 
}
?>

<?php if(isset($_GET['state']) == 'ok') { ?>
    <div class="bootstrap-iso">
        <div class="alert alert-success-custom">
            Đơn hàng của quý khách đã được lưu trong hệ thống. <span class="glyphicon glyphicon-ok"></span>
        </div>
    </div>
<?php } ?>

<div class="prd-block"> 
    <h2>xác nhận hóa đơn thanh toán</h2>
    <div class="payment">
        <table border="0px" cellpadding="0px" cellspacing="0px" width="100%" style="font-size: 14px; font-weight: bold;">
            <tr id="invoice-bar">
                <td width="30%">Tên Sản phẩm</td>
                <td width="25%">Đơn giá</td>
                <td width="15%">Số lượng</td>
                <td width="30%">Thành tiền</td>
            </tr>
            
            <?php
            $totalPriceAll = 0;
            while($row = mysql_fetch_array($query)){
                $totalPrice = $row['gia_sp']*$_SESSION['giohang'][$row['id_sp']];
            ?>
            <tr>
                <td class="prd-name"><?php echo $row['ten_sp'];?></td>
                <td class="prd-price"><?php echo number_format($row['gia_sp']);?> VNĐ</td>
                <td class="prd-number"><?php echo $_SESSION['giohang'][$row['id_sp']];?></td>
                <td class="prd-total"><?php echo number_format($totalPrice);?> VNĐ</td>
            </tr>
            <?php
                $totalPriceAll += $totalPrice;
            }
            ?>
            
            <tr>
                <td class="prd-name" style="color: black">Tổng giá trị hóa đơn là:</td>
                <!-- <td colspan="2"></td> -->
                <td colspan="3" class="prd-total" style="text-align: center; background-color: #E6E6E6; font-size: 16px;"><span><?php echo number_format($totalPriceAll);?> VNĐ</span></td>
            </tr>
        </table>

    </div>
    
    <?php
    if(isset($_POST['submit'])){
        $ten =  $_POST['ten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];
        $sql = "INSERT INTO donhang (ten, email, dien_thoai, dia_chi, tinh_trang, id_sp, so_luong) VALUES ('$ten', '$email', '$dienthoai', '$diachi', 0, '$strId', '$strSl')";
        $query = mysql_query($sql);
        header('location:index.php?page_layout=muahang&state=ok');
    }
    ?>
    
    <br>    
    <div class="form-payment">
        <div class="bootstrap-iso">
            <form method="post">
                <div class="form-group">
                    <label for="ten">Tên khách hàng:</label>
                    <input type="text" class="form-control" name="ten" required="">
                </div>
                <div class="form-group">
                    <label for="email">Địa chỉ Email:</label>
                    <input type="email" class="form-control" name="email" required="">
                </div>
                <div class="form-group">
                    <label for="dienthoai">Số điện thoại:</label>
                    <input type="text" class="form-control" name="dienthoai" required="">
                </div>
                <div class="form-group">
                    <label for="diachi">Địa chỉ nhận hàng:</label>
                    <textarea class="form-control" rows="5" name="diachi" required=""></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Xác nhận mua hàng</button>
            </form>
        </div>
    </div>

</div>    