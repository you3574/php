<?php
include('config.php');


//유저확인 >>pw로 인식

if(isset($_SESSION["admin_pw"])){
	$user_check=$_SESSION["admin_pw"];
	
	$lock_sql="select * from admin where admin_pw='$user_check';";
	$lock_result=$conn->query($lock_sql);
	
	$lock_result->num_rows;
	
	$lock_r = $lock_result->fetch_assoc();
				
	$login_s1 = $lock_r['admin_name'];
	$login_s2 = $lock_r['admin_pw'];
	$login_s3 = $lock_r['admin_tel'];



}
else{
	include('./index.html');
}

?>


