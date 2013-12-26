<?php 
/* Created By Adam Khoury @ www.developphp.com 
-----------------------June 19, 2008-----------------------*/
//***  "die()" will exit the script and show an error if something goes wrong with the "connect" or "select" functions. 
//***  A "mysql_connect()" error usually means your connection specific details are wrong 
//***  A "mysql_select_db()" error usually means the database does not exist.
// Place db host name. Usually is "localhost" but sometimes a more direct string is needed
$db_host = "db4free.net:3306";
// Place the username for the MySQL database here
$db_username = "t0am"; 
// Place the password for the MySQL database here
$db_pass = "16794350";
// Place the name for the MySQL database here
$db_name = "luisdiasdb";
$db_name = "luisdiasdb";
$db_host = "localhost";
$db_username = "t0am_user";
$db_pass = "df4as654dgf2";
$db_name = "t0am_sensors";

mysql_connect("$db_host","$db_username","$db_pass") or die(mysql_error());
mysql_select_db("$db_name") or die("no database by that name");
?>