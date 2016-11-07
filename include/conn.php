<?php
$server ="localhost";  //服务器IP地址,如果是本地，可以写成localhost
$uid ="sa";  //用户名
$pwd ="gm-Medicare"; //密码
$database ="jhw_test";  //数据库名称
 
//进行数据库连接
$conn =mssql_connect($server,$uid,$pwd) or die ("connect failed");
mssql_select_db($database,$conn);

?>