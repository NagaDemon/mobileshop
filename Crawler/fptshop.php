<?php

include('simple_html_dom.php');
include('dbCon.php');
include('url_to_absolute/url_to_absolute.php');

$main_url = 'https://fptshop.com.vn';
//iphone
$url = $main_url .'/apple/iphone';
$html = file_get_html($url);
foreach($html->find('div.fs-icapps') as $sanpham)
{
	//anh iphone
    //echo $sanpham->find('a img', 0) . '<br>';
    $img = $sanpham->find('a img', 0)->src;
    $str_anh = basename($img);
    $u = '../quantri/images/' . $str_anh;
    
    //save img to folder
    file_put_contents($u, file_get_contents('http:'.$img));

    //ten san pham
    echo $ten = $sanpham->find('h3.fs-ilap-name a span', 0)->plaintext;
    //gia san pham
    echo $str_gia = $sanpham->find('div.fs-ilap-if div.fs-ilap-price p.fs-ilap-pri', 0)->plaintext . '<br>';
    echo $gia = filter_var($str_gia, FILTER_SANITIZE_NUMBER_INT);
    //khuyen mai
    $link = $sanpham->find('a', 0);
    $href = $link->href;
    $sub_url = $main_url . $href;
    $sub_html = file_get_html($sub_url);
    $khuyenmais = $sub_html->find('div.fs-dtslct ul li');
    $str_khuyenmai = '';
    foreach ($khuyenmais as $khuyenmai) {
    	echo $khuyenmai->plaintext . '<br>';
    	$str_khuyenmai = $str_khuyenmai .'<br>'. $khuyenmai->plaintext;
    }

    //insert database
    if ($gia != 0 && $str_gia != ''){
    	$sql = "SELECT ten_sp FROM sanpham WHERE id_dm = 1";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)) {
        		//echo 'id: ' . $row["ten_sp"]. '<br>';
        		if ($ten != $row["ten_sp"]){
        			$query = "INSERT INTO sanpham VALUES(null, '1', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    				mysqli_query($conn, $query);
        		} else{
        			$query = "UPDATE sanpham SET anh_sp = '$str_anh', gia_sp = '$gia', khuyen_mai = '$str_khuyenmai' WHERE ten_sp = '$ten'";
    				mysqli_query($conn, $query);
        		}
    		}
		} else {
			$query = "INSERT INTO sanpham VALUES(null, '1', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    		mysqli_query($conn, $query);
		}
    }
}

//samsung
echo '------------------------------------------------------------------------------------------------------'.'<br>';
$url = $main_url . '/dien-thoai/samsung';
$html = file_get_html($url);

foreach($html->find('div.fs-lpil') as $sanpham)
{
	//anh
    $img = $sanpham->find('a[class=fs-lpil-img]', 0)->find('p img[class=lazy]', 0);
    $property = 'data-original';
    $img_src = $img->$property;

    $str_anh = basename($img_src);
    $u = '../quantri/images/' . $str_anh;

    //save img to folder
    file_put_contents($u, file_get_contents('http:'.$img_src));
    
    //ten
    echo $ten = $sanpham->find('div div h3 a', 0)->plaintext;

    //gia
    echo $str_gia = $sanpham->find('div div div.fs-lpil-price p', 0) . '<br>';
    echo $gia = filter_var($str_gia, FILTER_SANITIZE_NUMBER_INT);
    
    
    //khuyen mai
    $link = $sanpham->find('a', 0);
    $href = $link->href;
    $sub_url = $main_url . $href;
    $sub_html = file_get_html($sub_url);
    $khuyenmais = $sub_html->find('div.fs-dtslct ul li (text)');	
    $str_khuyenmai = '';
    foreach ($khuyenmais as $khuyenmai) {
    	echo $khuyenmai->plaintext . '<br>';
    	$str_khuyenmai = $str_khuyenmai .'<br>'. $khuyenmai->plaintext;
	}

	//insert database
    if ($gia != 0 && $str_gia != ''){
    	$sql = "SELECT ten_sp FROM sanpham WHERE id_dm = 2";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)) {
        		//echo 'id: ' . $row["ten_sp"]. '<br>';
        		if ($ten != $row["ten_sp"]){
        			$query = "INSERT INTO sanpham VALUES(null, '2', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    				mysqli_query($conn, $query);
        		} else{
        			$query = "UPDATE sanpham SET anh_sp = '$str_anh', gia_sp = '$gia', khuyen_mai = '$str_khuyenmai' WHERE ten_sp = '$ten'";
    				mysqli_query($conn, $query);
        		}
    		}
		}else {
			$query = "INSERT INTO sanpham VALUES(null, '2', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    		mysqli_query($conn, $query);
		}
    }
}

//Sony
echo '------------------------------------------------------------------------------------------------------'.'<br>';
$url = $main_url . '/dien-thoai/sony';
$html = file_get_html($url);

foreach($html->find('div.fs-lpil') as $sanpham)
{
	//anh
    $img = $sanpham->find('a[class=fs-lpil-img]', 0)->find('p img[class=lazy]', 0);
    $property = 'data-original';
    $img_src = $img->$property;

    $str_anh = basename($img_src);
    $u = '../quantri/images/' . $str_anh;

    //save img to folder
    file_put_contents($u, file_get_contents('http:'.$img_src));
    
    //ten
    echo $ten = $sanpham->find('div div h3 a', 0)->plaintext;

    //gia
    echo $str_gia = $sanpham->find('div div div.fs-lpil-price p', 0) . '<br>';
    echo $gia = filter_var($str_gia, FILTER_SANITIZE_NUMBER_INT);
    
    //khuyen mai
    $link = $sanpham->find('a', 0);
    $href = $link->href;
    $sub_url = $main_url . $href;
    $sub_html = file_get_html($sub_url);
    $khuyenmais = $sub_html->find('div.fs-dtslct ul li (text)');	
    $str_khuyenmai = '';
    foreach ($khuyenmais as $khuyenmai) {
    	echo $khuyenmai->plaintext . '<br>';
    	$str_khuyenmai = $str_khuyenmai .'<br>'. $khuyenmai->plaintext;
	}

	//insert database
    if ($gia != 0 && $str_gia != ''){
    	$sql = "SELECT ten_sp FROM sanpham WHERE id_dm = 3";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)) {
        		echo 'id: ' . $row["ten_sp"]. '<br>';
        		if ($ten != $row["ten_sp"]){
        			$query = "INSERT INTO sanpham VALUES(null, '3', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    				mysqli_query($conn, $query);
        		} else{
        			$query = "UPDATE sanpham SET anh_sp = '$str_anh', gia_sp = '$gia', khuyen_mai = '$str_khuyenmai' WHERE ten_sp = '$ten'";
    				mysqli_query($conn, $query);
        		}
    		}
		}else {
			$query = "INSERT INTO sanpham VALUES(null, '3', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    		mysqli_query($conn, $query);
		}
    }
}

//LG

//HTC
echo '------------------------------------------------------------------------------------------------------'.'<br>';
$url = $main_url . '/dien-thoai/htc';
$html = file_get_html($url);

foreach($html->find('div.fs-lpil') as $sanpham)
{
	//anh
    $img = $sanpham->find('a[class=fs-lpil-img]', 0)->find('p img[class=lazy]', 0);
    $property = 'data-original';
    $img_src = $img->$property;

    $str_anh = basename($img_src);
    $u = '../quantri/images/' . $str_anh;

    //save img to folder
    file_put_contents($u, file_get_contents('http:'.$img_src));
    
    //ten
    echo $ten = $sanpham->find('div div h3 a', 0)->plaintext;

    //gia
    echo $str_gia = $sanpham->find('div div.fs-lpilname div.fs-lpil-price p', 0) . '<br>';
    if(!isset($str_gia)){
    	echo '222222222222222222222222222222222222222222222222222222';
    }
    echo '111111111111111111111111111111111111111111111111: ' . $str_gia . '<br>';
    echo $gia = filter_var($str_gia, FILTER_SANITIZE_NUMBER_INT);
    
    //khuyen mai
    $link = $sanpham->find('a', 0);
    $href = $link->href;
    $sub_url = $main_url . $href;
    $sub_html = file_get_html($sub_url);
    $khuyenmais = $sub_html->find('div.fs-dtslct ul li (text)');	
    $str_khuyenmai = '';
    foreach ($khuyenmais as $khuyenmai) {
    	echo $khuyenmai->plaintext . '<br>';
    	$str_khuyenmai = $str_khuyenmai .'<br>'. $khuyenmai->plaintext;
	}

	//insert database
    if ($gia != 0 && $str_gia != ''){
    	$sql = "SELECT ten_sp FROM sanpham WHERE id_dm = 5";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)) {
        		//echo 'id: ' . $row["ten_sp"]. '<br>';
        		if ($ten != $row["ten_sp"]){
        			$query = "INSERT INTO sanpham VALUES(null, '5', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    				mysqli_query($conn, $query);
        		} else{
        			$query = "UPDATE sanpham SET anh_sp = '$str_anh', gia_sp = '$gia', khuyen_mai = '$str_khuyenmai' WHERE ten_sp = '$ten'";
    				mysqli_query($conn, $query);
        		}
    		}
		}else {
			$query = "INSERT INTO sanpham VALUES(null, '5', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    		mysqli_query($conn, $query);
		}
    }
}

//nokia
echo '------------------------------------------------------------------------------------------------------'.'<br>';
$url = $main_url . '/dien-thoai/nokia';
$html = file_get_html($url);

foreach($html->find('div.fs-lpil') as $sanpham)
{
	//anh
    $img = $sanpham->find('a[class=fs-lpil-img]', 0)->find('p img[class=lazy]', 0);
    $property = 'data-original';
    $img_src = $img->$property;

    $str_anh = basename($img_src);
    $u = '../quantri/images/' . $str_anh;

    //save img to folder
    file_put_contents($u, file_get_contents('http:'.$img_src));
    
    //ten
    echo $ten = $sanpham->find('div div h3 a', 0)->plaintext;

    //gia
    echo $str_gia = $sanpham->find('div div div.fs-lpil-price p', 0) . '<br>';
    echo $gia = filter_var($str_gia, FILTER_SANITIZE_NUMBER_INT);
    
    //khuyen mai
    $link = $sanpham->find('a', 0);
    $href = $link->href;
    $sub_url = $main_url . $href;
    $sub_html = file_get_html($sub_url);
    $khuyenmais = $sub_html->find('div.fs-dtslct ul li (text)');	
    $str_khuyenmai = '';
    foreach ($khuyenmais as $khuyenmai) {
    	echo $khuyenmai->plaintext . '<br>';
    	$str_khuyenmai = $str_khuyenmai .'<br>'. $khuyenmai->plaintext;
	}

	//insert database
    if ($gia != 0 && $str_gia != ''){
    	$sql = "SELECT ten_sp FROM sanpham WHERE id_dm = 6";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)) {
        		echo 'id: ' . $row["ten_sp"]. '<br>';
        		if ($ten != $row["ten_sp"]){
        			$query = "INSERT INTO sanpham VALUES(null, '6', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    				mysqli_query($conn, $query);
        		} else{
        			$query = "UPDATE sanpham SET anh_sp = '$str_anh', gia_sp = '$gia', khuyen_mai = '$str_khuyenmai' WHERE ten_sp = '$ten'";
    				mysqli_query($conn, $query);
        		}
    		}
		}else {
			$query = "INSERT INTO sanpham VALUES(null, '6', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    		mysqli_query($conn, $query);
		}
    }
}

//Asus
echo '------------------------------------------------------------------------------------------------------'.'<br>';
$url = $main_url . '/dien-thoai/asus';
$html = file_get_html($url);

foreach($html->find('div.fs-lpil') as $sanpham)
{
	//anh
    $img = $sanpham->find('a[class=fs-lpil-img]', 0)->find('p img[class=lazy]', 0);
    $property = 'data-original';
    $img_src = $img->$property;

    $str_anh = basename($img_src);
    $u = '../quantri/images/' . $str_anh;

    //save img to folder
    file_put_contents($u, file_get_contents('http:'.$img_src));
    
    //ten
    echo $ten = $sanpham->find('div div h3 a', 0)->plaintext;

    //gia
    echo $str_gia = $sanpham->find('div div div.fs-lpil-price p', 0) . '<br>';
    echo $gia = filter_var($str_gia, FILTER_SANITIZE_NUMBER_INT);
    
    //khuyen mai
    $link = $sanpham->find('a', 0);
    $href = $link->href;
    $sub_url = $main_url . $href;
    $sub_html = file_get_html($sub_url);
    $khuyenmais = $sub_html->find('div.fs-dtslct ul li (text)');	
    $str_khuyenmai = '';
    foreach ($khuyenmais as $khuyenmai) {
    	echo $khuyenmai->plaintext . '<br>';
    	$str_khuyenmai = $str_khuyenmai .'<br>'. $khuyenmai->plaintext;
	}

	//insert database
    if ($gia != 0){
    	$sql = "SELECT ten_sp FROM sanpham WHERE id_dm = 8";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)) {
        		echo 'id: ' . $row["ten_sp"]. '<br>';
        		if ($ten != $row["ten_sp"]){
        			$query = "INSERT INTO sanpham VALUES(null, '8', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    				mysqli_query($conn, $query);
        		} else{
        			$query = "UPDATE sanpham SET anh_sp = '$str_anh', gia_sp = '$gia', khuyen_mai = '$str_khuyenmai' WHERE ten_sp = '$ten'";
    				mysqli_query($conn, $query);
        		}
    		}
		}else {
			$query = "INSERT INTO sanpham VALUES(null, '8', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    		mysqli_query($conn, $query);
		}
    }
}

//Lenovo
echo '------------------------------------------------------------------------------------------------------'.'<br>';
$url = $main_url . '/dien-thoai/lenovo';
$html = file_get_html($url);

foreach($html->find('div.fs-lpil') as $sanpham)
{
	//anh
    $img = $sanpham->find('a[class=fs-lpil-img]', 0)->find('p img[class=lazy]', 0);
    $property = 'data-original';
    $img_src = $img->$property;

    $str_anh = basename($img_src);
    $u = '../quantri/images/' . $str_anh;

    //save img to folder
    file_put_contents($u, file_get_contents('http:'.$img_src));
    
    //ten
    echo $ten = $sanpham->find('div div h3 a', 0)->plaintext;

    //gia
    echo $str_gia = $sanpham->find('div div div.fs-lpil-price p', 0) . '<br>';
    echo $gia = filter_var($str_gia, FILTER_SANITIZE_NUMBER_INT);
    
    //khuyen mai
    $link = $sanpham->find('a', 0);
    $href = $link->href;
    $sub_url = $main_url . $href;
    $sub_html = file_get_html($sub_url);
    $khuyenmais = $sub_html->find('div.fs-dtslct ul li (text)');	
    $str_khuyenmai = '';
    foreach ($khuyenmais as $khuyenmai) {
    	echo $khuyenmai->plaintext . '<br>';
    	$str_khuyenmai = $str_khuyenmai .'<br>'. $khuyenmai->plaintext;
	}

	//insert database
    if ($gia != 0){
    	$sql = "SELECT ten_sp FROM sanpham WHERE id_dm = 9";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
    		while($row = mysqli_fetch_assoc($result)) {
        		echo 'id: ' . $row["ten_sp"]. '<br>';
        		if ($ten != $row["ten_sp"]){
        			$query = "INSERT INTO sanpham VALUES(null, '9', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    				mysqli_query($conn, $query);
        		} else{
        			$query = "UPDATE sanpham SET anh_sp = '$str_anh', gia_sp = '$gia', khuyen_mai = '$str_khuyenmai' WHERE ten_sp = '$ten'";
    				mysqli_query($conn, $query);
        		}
    		}
		}else {
			$query = "INSERT INTO sanpham VALUES(null, '9', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    		mysqli_query($conn, $query);
		}
    }
}
?>
