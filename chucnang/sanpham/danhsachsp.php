<?php
$id_dm = $_GET['id_dm'];

if(isset($_GET['page'])){
    $page = $_GET['page'];
}
else{
    $page = 1;  
}

$rowsPerPage = 3;
$perRow = $page*$rowsPerPage - $rowsPerPage;

$sql = "SELECT * FROM sanpham WHERE id_dm = $id_dm ORDER BY id_sp DESC LIMIT $perRow, $rowsPerPage";
$query = mysql_query($sql);
$totalRow = mysql_num_rows(mysql_query("SELECT * FROM sanpham WHERE id_dm = $id_dm"));
$pageNum = ceil($totalRow/$rowsPerPage);

$listPages = '';
// Tạo nút Trang cuối và Trang sau >>
if($page > 1){
    $listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&id_dm='.$id_dm.'&page=1">Trang đầu</a> ';
    $pagePrev = $page - 1;
    $listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&id_dm='.$id_dm.'&page='.$pagePrev.'"><<</a> ';
}
// Tạo Danh sách trang
for($j=1; $j<=$pageNum; $j++){
    
    if($j==$page){
        $listPages .= '<span>'.$j.'</span> ';   
    }
    else{
        $listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&id_dm='.$id_dm.'&page='.$j.'">'.$j.'</a> '; 
    }   
}
// Tạo nút Trang đầu và Trang trước <<
if($page < $pageNum){
    $pageNext = $page + 1;
    $listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&id_dm='.$id_dm.'&page='.$pageNext.'">>></a> ';
    $listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&id_dm='.$id_dm.'&page='.$pageNum.'">Trang cuối</a> ';
}

$sqlDm = "SELECT * FROM dmsanpham WHERE id_dm = $id_dm";
$queryDm = mysql_query($sqlDm);
$rowDm = mysql_fetch_array($queryDm);
?>
<div class="prd-block">
    <h2><?php echo $rowDm['ten_dm'];?></h2>
    <div class="pr-list">
        <?php
        $i=1;
        while($row = mysql_fetch_array($query)){
        ?>
        <div class="prd-item">
            <a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'];?>"><img height="144" src="quantri/anh/<?php echo $row['anh_sp'];?>" /></a>
            <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp'];?>"><?php echo $row['ten_sp'];?></a></h3>
            <p>Bảo hành: <?php echo $row['bao_hanh'];?></p>
            <p>Tình trạng: <?php echo $row['tinh_trang'];?></p>
            <p class="price"><span>Giá: <?php echo number_format($row['gia_sp']);?> VNĐ</span></p>
            
        </div>
        <?php
            if($i%3==0){
                echo '<div class="clear"></div>';   
            }
            $i++;
        }
        ?>
    </div>
</div>    
<div class="clear"></div>
<div id="pagination"><?php echo $listPages;?></div>    