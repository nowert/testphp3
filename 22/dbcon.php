<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
//	error_reporting(E_ALL);
	ini_set('display_error',0);
	error_reporting (E_ALL ^ E_NOTICE);
$hostname_dbcon = "localhost";
$database_dbcon = "businessdb";
$username_dbcon = "root";
$password_dbcon = "1234";
$dbcon = new mysqli($hostname_dbcon, $username_dbcon, $password_dbcon,$database_dbcon) or trigger_error(mysql_error(),E_USER_ERROR); 
//mysqli_query("set names utf8");
mysqli_set_charset($dbcon,"UTF8");
$dtstemp=date("Y-m-d H:s:i");
if (!isset($_SESSION)) {
  session_start();
  
}
?>