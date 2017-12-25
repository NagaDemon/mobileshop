<?php
	$dbHost = 'localhost';
	$dbUSer = 'root';
	$dbPass = '';
	$dbName = 'mobileshop';
	$dbConnect = mysql_connect($dbHost, $dbUSer, $dbPass);
	$dbSelected = mysql_select_db($dbName, $dbConnect);
	$dbSetLang = mysql_query("SET NAMES utf8"); 
?>