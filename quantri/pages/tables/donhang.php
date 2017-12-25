<script type="text/javascript">
    function xoaDonHang() {
        var conf = confirm("Bạn có chắc chắn muốn xóa đơn hàng này?");
        return conf;    
    }
</script>

<?php
    $sql = "SELECT * FROM donhang ORDER BY id_dh ASC";
    $query = mysql_query($sql);
?>

<!-- Basic Examples -->
<div class="row clearfix" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    DANH SÁCH ĐƠN HÀNG
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên khách hàng</th>
                                <th>Email</th>
                                <th>Điện thoại</th>
                                <th>Tình trạng</th>
                                <th>Chi tiết</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysql_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo $row['id_dh']; ?></td>
                                <td><?php echo $row['ten']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['dien_thoai']; ?></td>
                                <td>
                            	<?php 
                            	if($row['tinh_trang'] == 1) { 
                                	echo "<span style='color: green; font-weight: bold;'>Đã giao hàng</span>";
                                } else {
                                	echo "<span style='color: red; font-weight: bold;'>Chưa giao hàng</span>";
                                } 
                                ?>
                                </td>
                                <td><a href="index.php?page_layout=chitietdh&id_dh=<?php echo $row['id_dh'];?>"><i class="material-icons" style="font-size: 20px;">edit</i></a></td>
                                <td><a onclick="return xoaDonHang();" href="pages/forms/donhang/xoadh.php?id_dh=<?php echo $row['id_dh']; ?>"><i class="material-icons">delete</i></a></td>
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