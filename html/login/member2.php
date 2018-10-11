<? 
	@session_start();
	if($_SESSION['usercheck']!='1'){
		header('Location: /');
	}
	 
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
	
	
	 if (!empty($_GET['mode'])&&$_GET['mode']=="search")
	{
		if(!$_POST['search'])
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     window.location.href='/login/member.php';
				</script>
			");
			exit;
		}
		$sql = "select * from $table where {$_POST['find']} like '%{$_POST['search']}%' order by al_id";
	}
	else
	{
		$sql = "select * from $table order by al_id";
	}


	$result = $conn->query($sql);


?>
<body>


<div id="wrapper2">
    <header>
		<div id="header">
			<? include "../lib/top_login2.php"; ?>
			<? include "../lib/top_menu2.php"; ?>
		</div>
	</header>
    <div id="container">
	<div class='wrap'>
	<!------------------------------------------>

	<div id='list_box' class='wth_80 m_lr_10'>


	<div class='head'>
		<p id="title">결제, 배송 조회</p>		
	</div>
	
	<div id="search_box">	
		<form  name="board_form" method="post" action="member.php?mode=search"> 
			<div id="list_search" class="tx_c">
				<div>
					<select name="find">
						<option value='owner'>사용자</option>
						<option value='title'>앨범제목</option>
						<!--option value='pay_ck'>결제</option-->
						<!--option value='deli_ck'>배송</option-->
					</select>
					<input type="text" name="search">
					<input type="submit" value="검색">
				</div>
			</div>
			</form>
	</div>
	<div id="result_list">

	<table id="ad_album">
	<tr>
		<th class="ad_a">#</th>
		<th class="ad_b">앨범주인</th>
		<th class="ad_c">앨범제목</th>
		<th class="ad_d">등록일</th>
		<th class="ad_e">결제상태</th>
		<th class="ad_f">배송상태</th>
	</tr>
<?

	while($album_modi = $result->fetch_assoc()) {

		$al_id = $album_modi['al_id'];
		$owner = $album_modi['owner'];
		$title = $album_modi['title'];
		$date = $album_modi['date'];
		//$g_pdf = $album_modi['g_pdf']; //앨범경로 표현할 필요가 없음
		$pay_ck = $album_modi['pay_ck'];
		$deli_ck = $album_modi['deli_ck'];


		?>
		<tr><form  name="modi_album_form" method="post" action="member_update.php?mode=update"> 
		<td class="ad_a">
		<? echo $al_id;?>
			<input type='hidden' name='id[<?=$al_id;?>]' value='<?=$al_id;?>'>
		</td>
		<td class="ad_b"><? echo $owner;?></td>
		<td class="ad_c"><? echo $title;?></td>
		<td class="ad_d"><? echo $date?></td>
		
		<td class="ad_e">
		<?
		if($pay_ck==5){
		?>
			<input type='radio' name='radio[<?=$al_id;?>]' value='1'>입금전
			<input type='radio' name='radio[<?=$al_id;?>]' value='5' checked>입금확인
			</td>
			<td class="ad_f">
				<?
				if($deli_ck==1){
				?>
					<input type='checkbox' name='ckdbox[<?=$al_id;?>]' value='1' checked>배송완료
				<?}else{
				?>
					<input type='checkbox' name='ckdbox[<?=$al_id;?>]' value='1'>배송 전
				<?
				}
				?>

			</td>
		<?
		} else if($pay_ck==1){
		?>
			<input type='radio' name='radio[<?=$al_id;?>]' value='1' checked>입금전
			<input type='radio' name='radio[<?=$al_id;?>]' value='5'>입금확인
			</td>
			<td class="ad_f">
			-
			</td>
		<?
		}else{
		?>
			미결제
			</td>
			<td class="ad_f">
			-
			</td>
		<?
		}
		?>
		<td><input type='submit' value="변경"></td>
		</tr>
	<?
	}
	?>

	</table>
	</form>
	</div>




	</div>

	<!-------------------------------------------------->
		

	</div>
	</div>
	<footer>
		<? include "../common/footer.html"; ?>
	</footer>
</div>


</body>
</html>


