<?php
include('config.php');

//session_start();
$user_check=$_SESSION['userid'];//관리자:1, 아니면:0값 전달 

$ses_sql=mysql_query("select * from user_info where user_id='$user_check' ");
$row=mysql_fetch_array($ses_sql);

$login_session1=$row['user_id'];
$login_session2=$row['user_pw'];

if(!isset($login_session1))//입력된 값이 없을 때 다시 login 페이지로 가
{
header("Location: index.php");
}


?>


