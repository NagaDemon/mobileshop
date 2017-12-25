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
    $query = "INSERT INTO sanpham VALUES(null, '1', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    mysql_query($query);
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
    $query = "INSERT INTO sanpham VALUES(null, '2', '$ten', '$str_anh', '$gia', '12 tháng', 'Sạc pin, tai nghe', 'Máy mới 100%', '$str_khuyenmai', 'Còn hàng', '1', 'Hàng xách tay')";
    mysql_query($query);
}
?>
