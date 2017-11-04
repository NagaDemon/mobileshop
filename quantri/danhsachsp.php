<script type="text/javascript">
    function xoaSanPham() {
        var conf = confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
        return conf;    
    }
</script>

<h2>quản lý sản phẩm</h2>
	<div id="main">
        <a href="quantri.php?page_layout=themsp"><button class="btn danger">Thêm sản phẩm</button></a>
    	<table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
        	<tr id="prd-bar">
            	<td width="5%">ID</td>
                <td width="40%">Tên sản phẩm</td>
                <td width="15%">Giá</td>
                <td width="20%">Nhà cung cấp</td>
                <td width="10%">Ảnh mô tả</td>
                <td width="5%">Sửa</td>
                <td width="5%">Xóa</td>
            </tr>
            <?php
                if(isset($_GET['page'])) {
                    $page = $_GET['page'];  
                }
                else{
                    $page = 1;  
                }
                $rowsPerPage = 10;
                $firstRow = $page * $rowsPerPage - $rowsPerPage;

                $sql = "SELECT * FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm
                        ORDER BY id_sp DESC
                        LIMIT $firstRow, $rowsPerPage";
                $query = mysql_query($sql);
                $totalRow = mysql_num_rows(mysql_query("SELECT * FROM sanpham"));
                $totalPage = ceil($totalRow/$rowsPerPage);

                $listPage = '';
                for($i=1; $i <= $totalPage; $i++) {
                    if($i == $page) {
                        $listPage .= '<span>'.$i.'</span> ';    
                    }
                    else {
                        $listPage .= '<a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachsp&page='.$i.'">'.$i.'</a> ';   
                    }   
                }
            ?>
            <?php while($row = mysql_fetch_array($query)) { ?>
            <tr>
            	<td><span><?php echo $row['id_sp']; ?></span></td>
                <td class="l5"><a href="quantri.php?page_layout=suasp"><?php echo $row['ten_sp']; ?></a></td>
                <td class="l5"><span class="price"><?php echo $row['gia_sp']; ?></span></td>
                <td class="l5"><?php echo $row['ten_dm']; ?></td>
                <td><span class="thumb"><img width="60" src="anh/<?php echo $row['anh_sp']; ?>" /></span></td>
                <td><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp']; ?>"><span>Sửa</span></a></td>
                <td><a onclick="return xoaSanPham();" href="xoasp.php?id_sp=<?php echo $row['id_sp']; ?>"><span>Xóa</span></a></td>
            </tr>
            <?php } ?>
        </table>

        <p id="pagination"><?php echo $listPage;?></p>
	</div>