<?php
if(isset($_SESSION['giohang'])){
    $arrId = array();
    foreach($_SESSION['giohang'] as $id_sp=>$sl){
        $arrId[] = $id_sp;
    }
    $strId = implode(', ', $arrId);
    $sql = "SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp DESC";
    $query = mysql_query($sql); 
}
?>
<div class="prd-block"> 
    <h2>xác nhận hóa đơn thanh toán</h2>
    <div class="payment">
        <table border="0px" cellpadding="0px" cellspacing="0px" width="100%">
            <tr id="invoice-bar">
                <td width="45%">Tên Sản phẩm</td>
                <td width="20%">Giá</td>
                <td width="15%">Số lượng</td>
                <td width="20%">Thành tiền</td>
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
                <td class="prd-name">Tổng giá trị hóa đơn là:</td>
                <td colspan="2"></td>
                <td class="prd-total"><span><?php echo number_format($totalPriceAll);?> VNĐ</span></td>
            </tr>
        </table>
    
    </div>
    
    <?php
    if(isset($_POST['submit'])){
        $ten =  $_POST['ten'];
        $mail = $_POST['mail'];
        $dt = $_POST['dt'];
        $dc =   $_POST['dc'];
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
                    <label for="sdt">Địa chỉ Email:</label>
                    <input type="text" class="form-control" name="mail" required="">
                </div>
                <div class="form-group">
                    <label for="sdt">Số điện thoại:</label>
                    <input type="number" class="form-control" name="dt" required="">
                </div>
                <div class="form-group">
                    <label for="noidung">Địa chỉ nhận hàng:</label>
                    <textarea class="form-control" rows="5" name="dc" required=""></textarea>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Xác nhận mua hàng</button>
            </form>
        </div>
    </div>

</div>    