<?php
	$home = $gioithieu = $dichvu = $lienhe = '';
	if(isset($_GET['page_layout'])) {
		if($_GET['page_layout'] == 'gioithieu') {
			$gioithieu = 'active';
		} elseif ($_GET['page_layout'] == 'dichvu') {
			$dichvu = 'active';
		} elseif ($_GET['page_layout'] == 'lienhe') {
			$lienhe = 'active';
		} else {
			$home = 'active';
		}
	} else {
		$home = 'active';
	}
?>

<ul>
    <li class="<?php echo $home; ?>"><a href="index.php">trang chủ</a></li>
    <li class="<?php echo $gioithieu; ?>"><a href="index.php?page_layout=gioithieu">giới thiệu</a></li>
    <li class="<?php echo $dichvu; ?>"><a href="index.php?page_layout=dichvu">dịch vụ</a></li>
    <li class="<?php echo $lienhe; ?>"><a href="index.php?page_layout=lienhe">liên hệ</a></li>
</ul>