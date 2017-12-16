<div id="cart">
    <p>Bạn đang có <span style="font-size: 15px;"><?php if(isset($_SESSION['giohang'])) {echo count($_SESSION['giohang']);} else {echo 0;} ?></span> sản phẩm</p>
    <div class="bootstrap-iso"><p><a href="index.php?page_layout=giohang">Chi tiết giỏ hàng <span class="glyphicon glyphicon-copy"></span></a></p></div>
</div>