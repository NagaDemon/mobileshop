<script type="text/javascript">
    function deleteAll() {
        var conf = confirm("Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng?");
        return conf;    
    }
</script>

<div class="prd-block">
    <h2>giỏ hàng của bạn</h2>
    <?php
    if(isset($_SESSION['giohang'])){
        
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
                <td class="cart-item-img" width="25%" rowspan="4"><img height="144" src="quantri/anh/<?php echo $row['anh_sp'];?>" /></td>
                <td width="25%">Sản phẩm:</td>
                <td class="cart-item-title" width="50%"><?php echo $row['ten_sp'];?></td>
            </tr>
            <tr>
                <td>Giá:</td>
                <td><span><?php echo number_format($row['gia_sp']);?> VNĐ</span></td>
            </tr>
            <tr>
                <td>Số lượng:</td>
                <td><input type="number" min="0" name="sl[<?php echo $row['id_sp']?>]" value="<?php echo $_SESSION['giohang'][$row['id_sp']];?>" /> (Bỏ mặt hàng này) <a href="chucnang/giohang/xoahang.php?id_sp=<?php echo $row['id_sp'];?>">X</a></td>
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
        <p>Tổng giá trị giỏ hàng là: <span style="font-size: 20px;"><?php echo number_format($totalPriceAll);?> VNĐ</span></p>
        <p class="update-cart"><a onclick="document.getElementById('giohang').submit();" href="#"><span>Cập nhật giỏ hàng</span></a></p>

        <p><a href="index.php">Bổ sung sản phẩm</a> <span>•</span> <a href="chucnang/giohang/xoahang.php?id_sp=0" onclick="return deleteAll();">Xóa hết sản phẩm</a> <span>•</span> <a href="index.php?page_layout=muahang">Dừng mua và Thanh toán</a></p>
    </div>
    <?php
    }else {
        echo '<script>alert("Hiện không có Sản phẩm nào trong Giỏ hàng của bạn!");</script>';   
    }
    ?>
</div>   