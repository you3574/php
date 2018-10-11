<? 
	@session_start();
	$table="album";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="../css/style.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
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
		<div class='head'>
				<p id="title_r">Diary List</p><br/>
					----<br/><br/>
					백업된 앨범의 경우 15일 이내에 삭제됩니다.<br/>
					출판된 앨범이 경우 Publiday에 보관됩니다.
		</div>
	
	<div id="list_search1" class="f_l">▷ total : <?=$al_total ?></div>
	<div id="result_list">

	<form action="./myalbum.php?how=much" id="the_form" method="post">
		<table id="ad_album">
			<tr>
				<th>번호</th>
				<th>다이어리 정보</th>
				<th>수량</th>
				<th>이미지</th>
				<th>주문처리상태</th>
			</tr>
<?

		if($al_total==0){
			echo "<tr><td colspan='5'><br />만들어진 앨범이 없습니다. <br />---<br />앨범은 모바일에서만 제작이 가능합니다.<br /><br /></td></tr>";

			echo "</table></form>";
	
		}else{


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
					<input type="checkbox" name="chk[]" value="<?=$al_id;?>"/>
					</td>
					<td><?=$album_title;?></td>			
					<td>
					<select name='vol_<?=$al_id;?>'>

						<?for($i=1; $i<$album_vol; $i++){?>
							<option value='<?=$i;?>' /><?=$i?></option>
						<?	}?>
						
						<option value='<?=$album_vol;?>'  selected/><?=$album_vol;?></option>

						<?for($i=$album_vol+1; $i<=5; $i++){?>
							<option value='<?=$i;?>' /><?=$i?></option>
						<?	}?>

					</select>
					</td>
					<td>미리보기</td>			
					<td><?=$album_pay_ck;?></td>
				</tr>

	<?
			}

	?>

	</table>
		<br/>
		<input type="submit"  class="def_btn f_r" value="확인"/>
		<input type="reset"  class="def_btn f_r" value="초기화"/>
	</form>
	<br /><br /><br /><br />

<?


}//else 닫기



	if(!empty($_GET['how'])&&$_GET['how']=="much"){
?>

	<form action="./modify_album.php" id="the_form" method="post">
<?
		$user_chk=count($_POST['chk']);//사용자가 넘긴 총 개수
		?>
		<input type="hidden" name="change_t" value="<?=$user_chk;?>"/>
		
		<?
		$num=0;
		for($i=0; $i<$user_chk; $i++){
			$conts_id = $_POST['chk'];
			$conts_num[$i]=$_POST['vol_'.$conts_id[$i]];//선택된 다이어리 갯수
			
			$num+=$conts_num[$i]; //다이어리 총개수

			?>

			<input type="hidden" name="con_id[]" value="<?=$conts_id[$i];?>"/>
			<input type="hidden" name="con_num[]" value="<?=$conts_num[$i];?>"/>
			<?
		}


	?>


	<table class="pay">
			<tr>
				<td class="tx_l">구매금액</td>
				<td>
				<?
				$payof=$num*7000;
				
				echo number_format($payof);


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
				<td class="tx_l">배송비</td>
				<td>
					2,500
				</td>
			</tr>
			<tr id="point">
				<td class="tx_l">총 입금액</td>
				<td>
				<?
					echo number_format($payof+2500);
				?>
				</td>
			</tr>
		</table>
		<br />
		<input type="submit"  id="publish" class="def_btn f_r" value="출판하기"/>
	</form>
<?
}
?>



	</div><!--result_list-->

	</div><!--list_box닫기-->


</div>
</div>
	<footer>
		<? include "../common/footer.html"; ?>
	</footer>
</div>


</body>
</html>