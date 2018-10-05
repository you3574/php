<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "autoset";
$mysql_database = "et_book";

$bd = @mysql_connect($mysql_hostname, $mysql_user, $mysql_password);
mysql_select_db($mysql_database, $bd);

?>

