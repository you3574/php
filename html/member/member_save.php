<?php

	@session_start();
	include "../lib/dbconn.php";

	$address=$_POST['address'];
	$tel = $_POST['tel'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];

		
		$sql="update user set user_ad='$address', user_tel='$tel', user_b=concat('$year','$month','$day') where g_email='{$_SESSION['userid']}';";	
		
		$conn->query($sql);//쿼리실행
		Header("Location:member_info.php");
	
?>

