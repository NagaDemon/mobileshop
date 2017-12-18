<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];  
}
else{
    $page = 1;  
}
$rowsPerPage = 3;
$perRow = $page*$rowsPerPage - $rowsPerPage;

// Nhận Từ khóa cần tìm
if(isset($_POST['stext'])) {
   $stext = $_POST['stext']; 
} else {
    if(isset($_GET['stext'])) {
        $stext = $_GET['stext'];    
    }
}

// Loại bỏ các khoảng trắng đầu và cuối chuỗi Từ khóa
$stextNew = trim($stext);

$arr_stextNew = explode(' ', $stextNew);
$stextNew = implode('%', $arr_stextNew);
$stextNew = '%'.$stextNew.'%';

$sql = "SELECT * FROM sanpham WHERE ten_sp LIKE ('$stextNew') ORDER BY id_sp DESC LIMIT $perRow, $rowsPerPage";
$query = mysql_query($sql);

$totalRow = mysql_num_rows(mysql_query("SELECT * FROM sanpham WHERE ten_sp LIKE ('$stextNew')"));
$pageNum = ceil($totalRow/$rowsPerPage);

if($pageNum = 1) {
    $listPages = '';
} else {
    $listPages = '';
    if($page > 1){
        $listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachtimkiem&stext='.$stext.'&page=1">trang đầu</a> ';
        $pagePrev = $page - 1;
        $listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachtimkiem&stext='.$stext.'&page='.$pagePrev.'"><<</a> ';      
    }

    for($j=1; $j<=$pageNum; $j++){
        if($j == $page){
            $listPages .= '<span>'.$j.'</span> ';
        }
        else{
            $listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachtimkiem&stext='.$stext.'&page='.$j.'">'.$j.'</a> '; 
        }   
    }

    if($page < $pageNum){
        $pageNext = $page + 1;
        $listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachtimkiem&stext='.$stext.'&page='.$pageNext.'">>></a> ';      
        $listPages .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachtimkiem&stext='.$stext.'&page='.$page.'">trang cuối</a> ';
    }  
}

// Tìm kiếm từ khóa


<div class="clear"></div>
<div id="pagination"><?php echo $listPages;?></div>
