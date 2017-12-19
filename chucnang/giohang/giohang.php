// Giỏ hàng
<script type="text/javascript">
    function deleteAll() {
        var conf = confirm("Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng?");
        return conf;    
    }

    function deleteProduct() {
        var conf = confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
        return conf;
    }
</script>

<div class="prd-block">
    <h2>giỏ hàng của bạn</h2>
    <?php
    if(isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])){
        if(isset($_POST['sl'])){
            foreach($_POST['sl'] as $id_sp=>$sl){
                if($sl == 0){
                    unset($_SESSION['giohang'][$id_sp]);    
                }
                elseif($sl > 0){
                    $_SESSION['giohang'][$id_sp] = $sl; 
                }   
            }       
        }
        
        $arrId = array();
        foreach($_SESSION['giohang'] as $id_sp=>$so_luong){
            $arrId[] = $id_sp; 
        }
        $strId = implode(',', $arrId);
        $sql = "SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp DESC";
        $query = mysql_query($sql);
    ?>
    <div class="cart">
        <form id="giohang" method="post">
        <?php
        $totalPriceAll = 0;
        while($row = mysql_fetch_array($query)){
            $totalPrice = $row['gia_sp']*$_SESSION['giohang'][$row['id_sp']];
        ?>
        <table width="100%">
            <tr>
                <td class="cart-item-img" width="25%" rowspan="4"><img height="144" src="quantri/images/<?php echo $row['anh_sp'];?>" /></td>
                <td width="25%">Sản phẩm:</td>
                <td class="cart-item-title" width="50%"><?php echo $row['ten_sp'];?></td>
            </tr>
            <tr>
                <td>Giá:</td>
                <td><span><?php echo number_format($row['gia_sp']);?> VNĐ</span></td>
            </tr>
            <tr>
                <td>Số lượng:</td>
                <td>
                    <div class="bootstrap-iso">
                    <input type="number" min="1" max="1000" class="form-control-custom" name="sl[<?php echo $row['id_sp']?>]" value="<?php echo $_SESSION['giohang'][$row['id_sp']];?>" /> <span id="custom_span1">(Bỏ mặt hàng này)</span> <a href="chucnang/giohang/xoahang.php?id_sp=<?php echo $row['id_sp'];?>" onclick="return deleteProduct()"><span id="custom_span2" class="glyphicon glyphicon-trash"></span></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Tổng tiền:</td>
                <td><span><?php echo number_format($totalPrice);?> VNĐ</span></td>
            </tr>
        </table>
        <?php
            $totalPriceAll += $totalPrice;
        }
        ?>
        </form> 
        <p style="font-size: 13px;">Tổng giá trị giỏ hàng là: <span style="font-size: 20px;"><?php echo number_format($totalPriceAll);?> VNĐ</span></p>
        <p class="update-cart"><a onclick="document.getElementById('giohang').submit();" href="#"><span>Cập nhật giỏ hàng</span></a></p>

        <br>
        <div class="bootstrap-iso">
            <button type="button" class="btn btn-primary"><a href="index.php">Bổ sung sản phẩm</a></button>
            <button type="button" class="btn btn-danger"><a href="chucnang/giohang/xoahang.php?id_sp=0" onclick="return deleteAll();">Xóa hết sản phẩm</a></button>
            <button type="button" class="btn btn-success"><a href="index.php?page_layout=muahang">Dừng mua và thanh toán</a></button>
        </div>

    </div>
    <?php } else { ?>
        <div class="bootstrap-iso">
            <div class="alert alert-danger-custom">
                Bạn không có sản phẩm nào trong giỏ hàng.
            </div>
            <button type="button" class="btn btn-primary"><a href="index.php">Bổ sung sản phẩm</a></button>
        </div>
    <?php } ?>
</div>   
