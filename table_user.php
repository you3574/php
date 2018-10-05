<?

include('lock.php'); 

$cmd=$_GET['cmd'];
if($cmd=="result"){
	$what=$_POST['what'];
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
    function check_only(chk){
        var obj = document.getElementsByName("box");
        for(var i=0; i<obj.length; i++){
            if(obj[i] != chk){
                obj[i].checked = false;
            }
        }
    }
</script>

 <style> 
	body { font-family: 굴림체; }  
	th { background-color: #eee; text-align: center;} 
</style> 

<title>ET_BOOK</title>
</head>
<body>



<?
	if($what=="전송"){
		$box=$_POST['box'];
		
		if($box!=null){
			echo $box;
		}
		else{
			?><h2>사용자 체크해^^<h2><?
		}
	}

	else{

		$con=mysqli_connect("localhost","root","autoset","et_book");
		$sql = "select * from user_info where admin_check=0";
		$result = mysqli_query($con, $sql);
	?>
	
	
	<table class="table table-bordered"> 
	<tr> 
	<th width='50px'>#</th>
	<th>사용자 아이디</th>
	<th>사용자 비밀번호</th>
	<th>이티북 비밀번호</th>
	<th>사용자 이름</th>
	<th>생년월일</th>
	<th>성별</th>
	<th></th>
	</tr>
	


	<?
    while( $row = mysqli_fetch_array($result) ){   //데이터가 존재할경우 반복 실행, 한줄 한줄 출력.
		
		$user_k = $row['user_k'];
		$user_id = $row['user_id'];
		$user_pw = $row['user_pw'];
		$et_pw = $row['et_pw'];
		$user_name = $row['user_name'];
		$user_b1 = substr($row['user_b'],0,6);//이게 생일
		$user_b2 = substr($row['user_b'],6,1);//이게 성별
		

		if($user_b2!=null){
			if($user_b2==1||$user_b2==3){
				$user_b2=(string)"남자";
			}
			else{
				$user_b2=(string)"여자";
			}
		}


		?><tr><tr align='center' ><td><? echo $user_k;?></td>
		<td><? echo $user_id;?></td>
		<td><? echo $user_pw;?></td>
		<td><? echo $et_pw;?></td>
		<td><? echo $user_name?></td>
		<td><? echo $user_b1?></td>
		<td><? echo $user_b2?></td>
		<td><input type="checkbox" name="box" value=<?=$user_k?> onclick="check_only(this)"/></td>
		</tr>
		
		<?

    }//while

	?>
	
	</table>
	<input type="submit" name="what" value="전송" class="btn btn-default"/>

	<?
	}//else
	?>


</body>
</html>