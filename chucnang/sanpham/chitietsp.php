<?php
$id_sp = $_GET['id_sp'];
$sql = "SELECT * FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm WHERE id_sp = $id_sp";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
?>
<div class="prd-block">  
    <div class="prd-only">
        <div class="prd-img"><img width="100%" src="quantri/images/<?php echo $row['anh_sp'];?>" /></div>   
        <br>
        <div class="prd-intro">
            <h3><?php echo $row['ten_sp'];?></h3>
            <p id="prd-price">Giá sản phẩm: <span><?php echo number_format($row['gia_sp']);?> VNĐ</span></p>
            <table>
                <tr>
                    <td width="30%"><span>Bảo hành:</span></td>
                    <td>• <?php echo $row['bao_hanh'];?></td>
                </tr>
                <tr>
                    <td><span>Đi kèm:</span></td>
                    <td>• <?php echo $row['phu_kien'];?></td>
                </tr>
                <tr>
                    <td><span>Tình trạng:</span></td>
                    <td>• <?php echo $row['tinh_trang'];?></td>
                </tr>
                <tr>
                    <td><span>Khuyến Mại:</span></td>
                    <td>• <?php echo $row['khuyen_mai'];?></td>
                </tr>
                <tr>
                    <td><span>Còn hàng:</span></td>
                    <td>• <?php echo $row['trang_thai'];?></td>
                </tr>
                <tr>
                    <td><span>Chi tiết:</span></td>
                    <td>• <?php echo $row['chi_tiet_sp'];?></td>
                </tr>
            </table>
            <div id="prd-button"><p class="add-cart"><a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp']; ?>"><span>Đặt mua</span></a></p><br></div>
        </div>
        
        <div class="clear"></div>

    </div>

<?php
// Validate Form
if(isset($_POST['submit'])) {
    $ten =  $_POST['ten'];
    $dien_thoai = $_POST['dien_thoai'];
    $binh_luan = $_POST['binh_luan'];
    $ngay_gio = date("Y-m-d G:i:s");
    
    if(isset($ten) && isset($dien_thoai) && isset($binh_luan)){
        $sql = "INSERT INTO blsanpham(ten, dien_thoai, binh_luan, ngay_gio, id_sp) VALUES('$ten', '$dien_thoai', '$binh_luan', '$ngay_gio', '$id_sp')"; 
        $query = mysql_query($sql);
        header('location:index.php?page_layout=chitietsp&id_sp='.$id_sp);
    }   
}
?>    
    <div class="prd-comment">
    <h3>Bình luận sản phẩm</h3>

    <div class="bootstrap-iso">
        <form method="post" action="index.php?page_layout=chitietsp&id_sp=<?php echo $id_sp;?>">
            <div class="form-group">
                <label for="ten">Tên:</label>
                <input type="text" class="form-control" name="ten" required="">
            </div>
            <div class="form-group">
                <label for="sdt">Số điện thoại:</label>
                <input type="number" class="form-control" name="dien_thoai" required="">
            </div>
            <div class="form-group">
                <label for="noidung">Nội dung:</label>
                <textarea class="form-control" rows="5" name="binh_luan" required=""></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Bình luận</button>
        </form>
    </div>

    </div>
    
    <?php
    $sqlBl = "SELECT * FROM blsanpham WHERE id_sp = $id_sp ORDER BY id_bl ASC";
    $queryBl = mysql_query($sqlBl);
    $totalBl = mysql_num_rows($queryBl);
    if($totalBl > 0){
    ?>
    <div class="comment-list">
       <?php
       while($row = mysql_fetch_array($queryBl)){
       ?>
        <ul>
            <li class="com-title"><?php echo $row['ten'];?><br /><span><?php echo $row['ngay_gio'];?></span></li>
            <li class="com-details"><?php echo $row['binh_luan'];?></li>
        </ul>
        <?php
       }
        ?>   
    </div>
    <?php
    }
    ?>
    
    <!-- <div class="com-pagination"><span>1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a></div> -->
</div>    