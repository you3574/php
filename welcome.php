
<?php
include('lock.php'); 

$cmd=$_GET['cmd'];
if($cmd=="result"){
	$what=$_POST['what'];}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <style> 
	body { font-family: 굴림체; }  
	#top{height : 140px;  margin-bottom:5px; }
	#main_contents{ position : relative;  padding :5px;}/*아래 애들 감싸는 거 이거 설정하는게 제일 귀찮음*/
	#sidebar{position : absolute; float : left; width : 118px; height : 97%; border-right:solid 1px #cccccc;}
	#section {width :900px; min-height : 400px;  margin-left : 130px;}
	body { font-family: 굴림체; }  
	th { background-color: #eee; text-align: center;} 
</style> 

<title>ET_BOOK</title>
</head>
<body>
<div class="container"> 
<div id="top">

<h1>관리자페이지</h1>

<hr />
	<table>
	<td>
		아이디 : <?echo $login_session1;?> 
		<br>
		비밀번호 : <?echo $login_session2;?>
	</td>
	<td>
		&nbsp;&nbsp;&nbsp;</td>
	<td>
		<a href="logout.php"><button class="btn btn-primary"> 로그아웃</button></a>
	</td>
	</table>
<hr />
</div>

  <div id="main_contents">
  <form action="<?=$_SERVER['PHP_SELF']?>?cmd=result" method="post">

	<div id="sidebar">
		<input type="submit" name="what" value="USER_INFO&nbsp;" class="btn btn-default"/>
		<br><br>
		<input type="submit" name="what" value="ALBUM_INFO" class="btn btn-default"/>
	</div>

	<div id="section">
	
	<?php

	if($what=="ALBUM_INFO"){
		include('table_album.php');
		}
	else{

		include('table_user.php');
		}	
	?>

	</div>

  </div>
  </form>


</div>
</body>
</html>