<?php

include('simple_html_dom.php');
include('dbCon.php');

$main_url = 'https://fptshop.com.vn';
//iphone
$url = 'https://fptshop.com.vn/apple/iphone';
$html = file_get_html($url);
foreach($html->find('div.fs-icapps') as $sanpham)
{
	//anh
    echo $sanpham->find('a img', 0) . '<br>';
    //ten
    echo $sanpham->find('h3.fs-ilap-name a span', 0)->innertext;
    //gia
    echo $sanpham->find('div.fs-ilap-if div.fs-ilap-price p.fs-ilap-pri', 0)->innertext . '<br>';
    
    //khuyen mai
    $link = $sanpham->find('a', 0);
    $href = $link->href;
    $sub_url = $main_url . $href;
    $sub_html = file_get_html($sub_url);
    $khuyenmais = $sub_html->find('div.fs-dtslct ul li');
    foreach ($khuyenmais as $khuyenmai) {
    	echo $khuyenmai->innertext . '<br>';
    }
    break;
}



echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
//samsung
$url = 'https://fptshop.com.vn/dien-thoai/samsung';
$html = file_get_html($url);
foreach($html->find('div.fs-lpil') as $sanpham)
{
	//anh
    $img = $sanpham->find('a p img', 0);
    $property = 'data-original';
    $img_src = $img->$property;
    echo $img_src.'<br>';
    echo '//cdn.fptshop.com.vn/Uploads/Thumbs/2017/9/30/636423665830387822_1o.png <br>';
    $u = '../quantri/images/' . basename($img_src);
    file_put_contents($u, file_get_contents($img_src));
    
    //ten
    echo $sanpham->find('div div h3 a', 0)->innertext;
    //gia
    echo $sanpham->find('div div div p', 0) . '<br>';
    
    //khuyen mai
    // $link = $sanpham->find('a', 0);
    // $href = $link->href;
    // $sub_url = $main_url . $href;
    // $sub_html = file_get_html($sub_url);
    // $khuyenmais = $sub_html->find('div.fs-dtslct ul li (text)');
    // foreach ($khuyenmais as $khuyenmai) {
    // 	echo $khuyenmai . '<br>';
    break;
}
?>
<script>

</script>