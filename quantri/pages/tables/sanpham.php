<script type="text/javascript">
    function xoaSanPham() {
        var conf = confirm("Bạn có chắc chắn muốn xóa sản phẩm này?");
        return conf;    
    }
</script>

<!-- Basic Examples -->
<div class="row clearfix" style="margin-top: -18px;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DANH SÁCH SẢN PHẨM
                </h2>
                <a id="tqt-a-header" href="index.php?page_layout=themsp"><button id="tqt-btn-header" type="button" class="btn btn-info"><b>Thêm sản phẩm</b></button></a>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Nhà cung cấp</th>
                                <th>Ảnh mô tả</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm = dmsanpham.id_dm
                                    ORDER BY id_sp DESC";
                            $query = mysql_query($sql);
                            while($row = mysql_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id_sp']; ?></td>
                                <td><?php echo $row['ten_sp']; ?></td>
                                <td><?php echo number_format($row['gia_sp']); ?></td>
                                <td><?php echo $row['ten_dm']; ?></td>
                                <td align="center"><img width="60" src="images/<?php echo $row['anh_sp']; ?>"/></td>
                                <td><a href="index.php?page_layout=suasp&id_sp=<?php echo $row['id_sp']; ?>"><i class="material-icons">edit</i></a></td>
                                <td><a onclick="return xoaSanPham();" href="pages/forms/sanpham/xoasp.php?id_sp=<?php echo $row['id_sp']; ?>"><i class="material-icons">delete</i></a></td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->