<?php

include('simple_html_dom.php');
include('dbCon.php');

//iphone
$url = 'https://www.thegioididong.com/dtdd-apple-iphone';
//$url = 'https://www.thegioididong.com/dtdd-apple-iphone#m:80&o:1';
$html = file_get_html($url);
foreach($html->find('ul[class=cate] li a') as $sanpham)
{
    echo $ten = $sanpham->find('h3', 0) . '<br>';
    //$anh = $sanpham->find('img', 0) . '<br>';
    echo $gia = $sanpham->find('strong ', 0) . '<br>';
    echo $khuyenmai = $sanpham->find('div span', 0) . '<br>';

    //insert database
    $ten = htmlentities($ten, ENT_QUOTES, "UTF-8");
    $gia = htmlentities($gia, ENT_QUOTES, "UTF-8");
    $khuyenmai = htmlentities($khuyenmai, ENT_QUOTES, "UTF-8");

    $query = "INSERT INTO sanpham VALUES(null, '1', '$ten', '', '$gia', '', '', '', '$khuyenmai', '', '', '')";
    mysql_query($query);
}

//samsung
$url = 'https://www.thegioididong.com/dtdd-samsung';
$html = file_get_html($url);
foreach($html->find('ul[class=cate] li a') as $sanpham)
{
    echo $ten = $sanpham->find('h3', 0) . '<br>';
    //$anh = $sanpham->find('img', 0) . '<br>';
    echo $gia = $sanpham->find('strong ', 0) . '<br>';
    echo $khuyenmai = $sanpham->find('div span', 0) . '<br>';

    //insert database
    $ten = htmlentities($ten, ENT_QUOTES, "UTF-8");
    $gia = htmlentities($gia, ENT_QUOTES, "UTF-8");
    $khuyenmai = htmlentities($khuyenmai, ENT_QUOTES, "UTF-8");

    $query = "INSERT INTO sanpham VALUES(null, '1', '$ten', '', '$gia', '', '', '', '$khuyenmai', '', '', '')";
    mysql_query($query);
}
?>
<script>

</script>
