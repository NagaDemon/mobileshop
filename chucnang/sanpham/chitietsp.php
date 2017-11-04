<?php
$id_sp = $_GET['id_sp'];
$sql = "SELECT * FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm WHERE id_sp = $id_sp";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
?>
<div class="prd-block">  
    <div class="prd-only">
        <div class="prd-img"><img width="50%" src="quantri/anh/<?php echo $row['anh_sp'];?>" /></div>   
        <div class="prd-intro">
            <h3><?php echo $row['ten_sp'];?></h3>
            <p>Giá sản phẩm: <span><?php echo $row['gia_sp'];?> VNĐ</span></p>
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
            </table>
            <p class="add-cart"><a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp']; ?>"><span>Đặt mua</span></a></p>
        </div>
        
        <div class="clear"></div>
        
        <div class="prd-details">
        <p><?php echo $row['chi_tiet_sp'];?></p>
        </div>
    </div>

<?php
// Validate Form
if(isset($_POST['submit'])){
    if($_POST['ten'] == ''){
        $error_ten = '(*)';
    }
    else{
        $ten =  $_POST['ten'];
    }
    
    if($_POST['dien_thoai'] == ''){
        $error_dien_thoai = '(*)';
    }
    else{
        $dien_thoai = $_POST['dien_thoai'];
    }
    
    if($_POST['binh_luan'] == ''){
        $error_binh_luan = '(*)';
    }
    else{
        $binh_luan = $_POST['binh_luan'];
    }
    // Xử lý thêm mới bình luận
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
    <form method="post" action="index.php?page_layout=chitietsp&id_sp=<?php echo $id_sp;?>">
        <ul>
            <li class="required">Tên <br /><input type="text" name="ten" /> <?php if(isset($error_ten)){echo '<span>'.$error_ten.'</span>';}?></li>
            <li class="required">Số điện thoại <br /><input type="text" name="dien_thoai" /> <?php if(isset($error_dien_thoai)){echo '<span>'.$error_dien_thoai.'</span>';}?></li>
            <li class="required">Nội dung <br /><textarea name="binh_luan"></textarea> <?php if(isset($error_binh_luan)){echo '<span>'.$error_binh_luan.'</span>';}?></li>
            <li><input type="submit" name="submit" value="Bình luận" /></li>
        </ul>
    </form>
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
    
    <div class="com-pagination"><span>1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a></div>
</div>    