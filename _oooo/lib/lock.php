<?php
include('config.php');

$head_page=null;
$main1=null;
//유저확인 >>pw로 인식

if(!empty($_SESSION["user_name"])&&!empty($_SESSION["user_id"] )){
	$user_name=$_SESSION["user_name"];
	$user_id=$_SESSION["user_id"];
	
	$lock_sql="select * from user_info where user_name='$user_name' and user_id='$user_id';";
	$lock_result=$conn->query($lock_sql);
	
	$lock_result->num_rows;
	
	$lock_r = $lock_result->fetch_assoc();
				
	$login_s1 = $lock_r['user_name'];
	$login_s2 = $lock_r['et_pw'];
	$login_s3 = $lock_r['user_tel'];
	
	$head_page='_user';
	$main1='ur_';

	if($lock_r['admin_check']==1){
		$head_page='_admin';
		$main1='ad_';
		$_SESSION["admin_ck"] = $lock_r['admin_check'];

	}

}


?>


