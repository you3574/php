<? 
@session_start();

$table="user";

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
</head>
<body>
<div id="wrapper2">
    <header>
		<div id="header">
		<? include "../lib/g_index2.php"; ?>
		</div>
	</header>

    <div id="container">
	<div class='wrap'>
	<div id='list_box' class='back_rule'>
		 <div class='form-box'>
                <div class='head'>
                <p id="title_r">회원정보수정</p><br/>
				</div>
<!-------------------------->

<?
	include "../lib/dbconn.php";

	$m_sql="select * from $table where g_email='{$_SESSION['userid']}';";

	$m_result = $conn->query($m_sql);
	$row = $m_result->fetch_assoc();

	$member_id = $row['g_email'];
	$member_name = $row['g_name'];
	$member_tel = $row['user_tel'];
	$member_ad = $row['user_ad'];
	$member_b = $row['user_b'];

	$year=substr($member_b,0,4);
	$month=substr($member_b,4,2);
	$day=substr($member_b,6,2);
?>


<form action="member_save.php" method="POST" name="member_info">
<div class="form-box">
	<table class="album">
	<tr>
		<td>아이디</td>
		<td><?=$member_id;?></td>
	</tr>
	<tr>
		<td>이름</td>
		<td><?=$member_name;?></td>
	</tr>
	<tr>
		<td>주소</td>
		<td><input type="text" name="address" id="address" value="<?=$member_ad;?>" /></td>
	</tr>
	<tr>
		<td>전화번호</td>
		<td><input type="text" name="tel" id="tel" value="<?=$member_tel;?>" /></td>
	</tr>
	<tr>
		<td>생년월일</td>
		<td>
			<select name="year">
				<?
					for ($i = 2017; $i >= 1900; $i+=-1) {
					 print("<option value='$i' ");
					 if ($i == $year) {
					  print "selected";
					 }
					 print(">".$i."년\n");
					}
				?>
			</select>
			 <select name="month">
				<?php
				for ($i = 1; $i <= 12; $i+=1) {
				if( $i <= 9 ) 
					print("<option value='0$i' ");
				else 
					print("<option value='$i' ");
				 if ($i == $month) {
					 print "selected";
					}
				print(">".$i."월\n");
				}
				?> 
				</select>
			<select name='day'>
				<?php
					for ($i = 1; $i <= 31; $i+=1) {
					if( $i <= 9 ) 
					print("<option value='0$i' ");
					else 
					print("<option value='$i' ");
					 if ($i == $day) {
					  print "selected";
					 }
					print(">".$i."일\n");     
					}
					?> 
					</select>
						</td>
						</tr>
			</table>
			<br/>
			<input type="submit" id="submitButton" value="수정하기">
</div>
</form>
<!---------------------------->
</div>
</div>
<footer>
	<? include "../common/footer.html"; ?>
</footer>
</div>


</body>
</html>



