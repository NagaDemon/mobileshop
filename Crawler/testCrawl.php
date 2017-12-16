<?php
/**
 * Created by PhpStorm.
 * User: Huy Hoang
 * Date: 2017/11/18
 * Time: 11:27
 */
include('simple_html_dom.php');
//require "simple_html_dom.php";
$html = file_get_html('https://www.thegioididong.com/dtdd');
//echo $html;
$sanpham = $html->find('ul[class=cate] li a h3');
echo count($sanpham);
foreach($html->find('ul[class=cate] li a h3') as $element)
    echo $element . '<br>';

?>
