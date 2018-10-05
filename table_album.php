<?

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
	th { background-color: #eee; text-align: center;} 
</style> 

<title>ET_BOOK</title>
</head>
<body>


<?
	$con=mysqli_connect("localhost","root","autoset","et_book");
	$sql = "select * from album";
	$result = mysqli_query($con, $sql);
	
?>

	<table class="table table-bordered"> 
	<tr> 
	<th width='50px'>#</th>
	<th>앨범 이름</th>
	<th>앨범 생성일</th>
	<th>사용자 정보</th>
	<th>사용자 이름</th>
	<th>사용자 번호</th>
	<th>사용자 주소</th>
	</tr>
		

<?
    while( $row = mysqli_fetch_array($result) ){  
	
		$key=$row['user_k'];
		$sql2="select * from user_info where user_k=".$key.";";
		$result2=mysqli_query($con,$sql2);
		$row2=mysqli_fetch_array($result2);

	
		$album_k = $row['album_k'];
		$album_name = $row['album_name'];
		$album_date = $row['album_date'];
		$user_k = $row['user_k'];
		

		?>
		<tr>
		<tr align='center' >
		<td><? echo $album_k;?></td>
		<td><? echo $album_name;?></td>
		<td><? echo $album_date;?></td>
		<td><? echo $user_k;?></td>
		<td><? echo $row2['user_name'];?></td>
		<td><? echo $row2['user_tel'];?></td>
		<td><? echo $row2['user_ad'];?></td>
		</tr><?
		
    }

	?>

	</table> 


</body>
</html>