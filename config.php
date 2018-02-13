<?php
error_reporting(0);
$host="localhost";
$uname="root";
$pass="";
$db="oes";

mysql_connect($host,$uname,$pass);
mysql_select_db($db);

session_start();
?>