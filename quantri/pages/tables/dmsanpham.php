<script type="text/javascript">
    function xoaDanhMuc() {
        var conf = confirm("Bạn có chắc chắn muốn xóa danh mục này?");
        return conf;    
    }
</script>

<?php
    $sql = "SELECT * FROM dmsanpham ORDER BY id_dm ASC";
    $query = mysql_query($sql);
?>

<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DANH MỤC SẢN PHẨM
                </h2>
                <a id="tqt-a-header" href="index.php?page_layout=themdm"><button type="button" class="btn btn-info"><b>Thêm danh mục</b></button></a>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysql_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo $row['id_dm']; ?></td>
                                <td><?php echo $row['ten_dm']; ?></td>
                                <td><a href="index.php?page_layout=suadm&id_dm=<?php echo $row['id_dm']; ?>"><i class="material-icons" style="font-size: 20px;">edit</i></a></td>
                                <td><a onclick="return xoaDanhMuc();" href="pages/forms/danhmuc/xoadm.php?id_dm=<?php echo $row['id_dm']; ?>"><i class="material-icons" style="font-size: 20px;">delete</i></a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Basic Examples -->