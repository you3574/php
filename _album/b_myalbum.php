<? 
	@session_start(); 
	$table="album";
/*********************************
$_SESSION['userid'] // 구글이메일
$_SESSION['username'] //구글이름
$_SESSION['usercheck'] //관리자체크
**********************************/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html" charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="../css/style.css">

</head>
<?	
	
	include "../lib/dbconn.php";

	$al_sql = "select * from $table where owner='{$_SESSION['userid']}'";

	$al_result = $conn->query($al_sql);

	$al_total= $al_result->num_rows; //전체 앨범 수


?>
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
                <p id="title_r">Diary List</p><br/>
                ----<br/><br/>
                백업된 앨범의 경우 15일 이내에 삭제됩니다.<br/>
                출판된 앨범이 경우 Publiday에 보관됩니다.<br/>
				<br/>
				</div>
			<div id="list_search1" class="f_l">▷ total : <?= $al_total ?></div>
			</div>

		<form action="./myalbum.php?ubin_chk=ok" id="the_form" method="post">
		<table class="album">
			<thead>
				<th>번호</th>
				<th>다이어리 정보</th>
				<th>수량</th>
				<th>이미지</th>
				<th>주문처리상태</th>
			</thead>
			
<?

		$index=0;
		while($member_modi = $al_result->fetch_assoc()) {

			$al_id = $member_modi['al_id'];
			$album_title = $member_modi['title'];
			$album_vol = $member_modi['vol'];
			$album_g_pdf = $member_modi['g_pdf']; 
			$album_pay_ck = $member_modi['pay_ck'];

			if($album_pay_ck==5){
				$album_pay_ck="입금확인";
			}else if($album_pay_ck==1){
				$album_pay_ck="입금예정";
			}else{
				$album_pay_ck="미입금";
			}
?>
		<tr>
			<td>
			<input type="checkbox" name="<?=$index;?>_chk" value="y"/>
			<input type="hidden" name="<?=$index;?>_id" value="<?=$al_id;?>"/><?=$al_id;?>
			</td>
			<td><?=$album_title;?></td>			
			<td>
			<select name='<?=$index;?>_vol'>
				<?for($i=1; $i<=5; $i++){?>
					<option value='<?=$i;?>' /><?=$i?></option>
				<?	}?>
			</select>
			</td>
			<td>미리보기</td>			
			<td><?=$album_pay_ck;?></td>
		</tr>

		
<?
$index++;
}
?>
		</table>
		<br/>
		<input type="submit" id="submitButton" value="확인"/>
		<input type="reset" id="submitButton" value="초기화"/> 
		</form>

		<br/>
		<br/>



<form action="myalbum_info.php" method="POST">
<?
	if(!empty($_GET['ubin_chk'])&&$_GET['ubin_chk']=="ok"){
//POST로 받은 값들
			$num=0;
			$total_m=0;

			for($i=0; $i<$al_total; $i++){
				if(!empty($_POST[$i."_chk"])&&$_POST[$i."_chk"]=='y'){
					$num+=$_POST[$i."_vol"];
					
					$ch_id[$total_m]=$_POST[$i."_id"];
					$check[$total_m]=$_POST[$i."_vol"];
					?>

					<input type="hidden" name="arr_a1[<?=$total_m;?>]" value="<?=$ch_id[$total_m];?>" />
					<input type="hidden" name="arr_a2[<?=$total_m;?>]" value="<?=$check[$total_m];?>" />
					<?
					$total_m++;
				}						
			}
			
			//echo $total_m;
			?>
			<input type="hidden" name="total" value="<?=$total_m;?>" />
<!---------------------->
		<table class="pay">
			<tr>
				<td>구매금액</td>
				<td>
				<?
				echo $num;
				/*
				$pay=0;
					if($page<=20){
						$pay=&num*14000;
						echo"$pay";
						}
					else if(20<$page<=30){
						$pay=&num*16000;
						echo"$pay";
						}
					else if(30<$page<=40){
						$pay=&num*17500;
						echo"$pay";
						}
					else if(40<$page<=50){
						$pay=&num*19000;
						echo"$pay";
						}
					else if(50<$page<=60){
						$pay=&num*20000;
						echo"$pay";
						}
					else if(60<$page<=70){
						$pay=&num*21000;
						echo"$pay";
						}
					else if(70<$page<=80){
						$pay=&num*22000;
						echo"$pay";
						}
					else if(80<$page<=90){
						&pay=&num*22500;
						echo"$pay";
						}
					else{
						&pay=&num*23000;
						echo"$pay";
						}
				*/		
				?>
				</td>
			<tr>
			<tr>
				<td>배송비</td>
				<td>
					2500
				</td>
			</tr>
			<tr id="point">
				<td>총 입금액</td>
				<td>
				<?
					echo $num+2500;
				?>
				</td>
			</tr>
		</table>
		<input type="submit" id="submitButton" value="출판하기"/>
		</form>
		<br/>
		<br/>
		<!--div id="page_button"> 
			<div id="page_num" class="f_l">
			<form action="myalbum_info.php" method="POST" name="al_submit">
				<input type="button" id="submitButton" value="출판하기"/>
				<input type="hidden" name=''>
			</form>
		</div>
		</div-->
		<br/>
		<br/>

<?
}
?>


		</div>
		</div>
		</div>
<footer>
		<? include "../common/footer.html"; ?>
</footer>
</body>
</html>
