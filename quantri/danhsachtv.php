<h2>quản lý thành viên</h2>
  <div id="main">
      <button class="btn danger">Thêm thành viên</button>
      <table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr id="prd-bar">
              <td width="5%">ID</td>
              <td width="40%">Tên tài khoản</td>
              <td width="25%">Quyền truy cập</td>
              <td width="15%">Sửa</td>
              <td width="15%">Xóa</td>
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

                $sql = "SELECT * FROM thanhvien
                        ORDER BY id_thanhvien ASC
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
              <td><span><?php echo $row['id_thanhvien']; ?></span></td>
              <td class="l5"><a href="quantri.php?page_layout=suasp"><?php echo $row['tai_khoan']; ?></a></td>
              <td class="l5"><span class="price"><?php echo $row['quyen_truy_cap']; ?></span></td>
              <td><a href="#?>"><span>Sửa</span></a></td>
              <td><a onclick="return xoaSanPham();" href="#?>"><span>Xóa</span></a></td>
            </tr>
            <?php } ?>
        </table>

        <p id="pagination"><?php echo $listPage;?></p>
  </div>