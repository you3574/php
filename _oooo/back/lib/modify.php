<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_GET["x"], false);

$ses_sql=mysql_query("select * from user_info where user_k='$obj->chk_value';");
$outp = array();
$outp=mysql_fetch_array($ses_sql);


echo json_encode($outp);
?>