<script type="text/javascript">
    function xoaSanPham() {
        var conf = confirm("Bạn có chắc chắn muốn xóa thành viên này?");
        return conf;    
    }
</script>

<?php
    $sql = "SELECT * FROM thanhvien ORDER BY id_thanhvien ASC";
    $query = mysql_query($sql);
?>

<!-- Basic Examples -->
<div class="row clearfix" style="margin-top: -18px;">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DANH SÁCH THÀNH VIÊN
                </h2>
                <a id="tqt-a-header" href="index.php?page_layout=themtv"><button type="button" class="btn btn-info"><b>Thêm thành viên</b></button></a>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên tài khoản</th>
                                <th>Email</th>
                                <th>Quyền truy cập</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysql_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo $row['id_thanhvien']; ?></td>
                                <td><?php echo $row['tai_khoan']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['quyen_truy_cap']; ?></td>
                                <td><a href="index.php?page_layout=suatv&id_thanhvien=<?php echo $row['id_thanhvien']; ?>"><i class="material-icons" style="font-size: 20px;">edit</i></a></td>
                                <td><a onclick="return xoaSanPham();" href="pages/forms/thanhvien/xoatv.php?id_thanhvien=<?php echo $row['id_thanhvien']; ?>"><i class="material-icons" style="font-size: 20px;">delete</i></a></td>
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