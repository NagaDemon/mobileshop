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
                <td class="prd-price"><?php echo $row['gia_sp'];?> VNĐ</td>
                <td class="prd-number"><?php echo $_SESSION['giohang'][$row['id_sp']];?></td>
                <td class="prd-total"><?php echo $totalPrice;?> VNĐ</td>
            </tr>
            <?php
                $totalPriceAll += $totalPrice;
            }
            ?>
            
            <tr>
                <td class="prd-name">Tổng giá trị hóa đơn là:</td>
                <td colspan="2"></td>
                <td class="prd-total"><span><?php echo $totalPriceAll;?> VNĐ</span></td>
            </tr>
        </table>
    
    </div>
    
    <?php
    if(isset($_POST['submit'])){
        if($_POST['ten'] == ''){
            $error_ten = '<span>(*)</span>';
        }
        else{
            $ten =  $_POST['ten'];
        }
        
        if($_POST['mail'] == ''){
            $error_mail = '<span>(*)</span>';
        }
        else{
            $mail = $_POST['mail'];
        }
        
        if($_POST['dt'] == ''){
            $error_dt = '<span>(*)</span>';
        }
        else{
            $dt = $_POST['dt'];
        }
        
        if($_POST['dc'] == ''){
            $error_dc = '<span>(*)</span>';
        }
        else{
            $dc =   $_POST['dc'];
        }       
    }
    ?>
        
    <div class="form-payment">
        <form method="post">
        <ul>
            <li class="info-cus"><label>Tên khách hàng</label><br /><input type="text" name="ten" /> <?php if(isset($error_ten)){echo $error_ten;}?></li>
            <li class="info-cus"><label>Địa chỉ Email</label><br /><input type="text" name="mail" /> <?php if(isset($error_mail)){echo $error_mail;}?></li>
            <li class="info-cus"><label>Số Điện thoại</label><br /><input type="text" name="dt" /> <?php if(isset($error_dt)){echo $error_dt;}?></li>
            <li class="info-cus"><label>Địa chỉ nhận hàng</label><br /><input type="text" name="dc" /> <?php if(isset($error_dc)){echo $error_dc;}?></li>
            <li><input type="submit" name="submit" value="Xác nhận mua hàng" /> <input type="reset" name="reset" value="Làm lại" /></li>
        </ul>
        </form>
    </div>
</div>    