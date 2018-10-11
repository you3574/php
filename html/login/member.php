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


	$result_con = $conn->query($sql);


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
			<p id="title_r">결제, 배송 관리</p>
			---
	</div>
	
	<div id="search_box">	
		<form  name="board_form" method="post" action="member.php?mode=search"> 
			<div id="list_search" class="tx_c">
				<div>
					<select name="find" class="def_btn">
						<option value='owner'>사용자</option>
						<option value='title'>앨범제목</option>
						<!--option value='pay_ck'>결제</option-->
						<!--option value='deli_ck'>배송</option-->
					</select>
					<input type="text" name="search" class="def_btn">
					<input type="submit" value="검색" class="def_btn">
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
		<th class="ad_g"></th>
	</tr>
<?

	while($album_modi = $result_con->fetch_assoc()) {

		$al_id = $album_modi['al_id'];
		$owner = $album_modi['owner'];
		$title = $album_modi['title'];
		$date = $album_modi['date'];
		//$g_pdf = $album_modi['g_pdf']; //앨범경로 표현할 필요가 없음
		$pay_ck = $album_modi['pay_ck'];
		$deli_ck = $album_modi['deli_ck'];

		if($pay_ck==5){
			$pay_ck="입금확인";
		}else if($pay_ck==1){
			$pay_ck="입금예정";
		}else{
			$pay_ck="미입금";
		}

		if($deli_ck==1){
			$deli_ck='배송완료';
		}else{
			$deli_ck='-';
		}
		
		

?>
		<tr>
		<td class="ad_a">
		<? echo $al_id;?>
			<input type='hidden' name='id[<?=$al_id;?>]' value='<?=$al_id;?>'>
		</td>
		<td class="ad_b"><? echo $owner;?></td>
		<td class="ad_c"><? echo $title;?></td>
		<td class="ad_d"><? echo $date;?></td>
		<td class="ad_e"><? echo $pay_ck?></td>
		<td class="ad_f"><? echo $deli_ck?></td>

		<td class="ad_g"><a href='member.php?mode=modify&num=<?=$al_id;?>'><div class="def_btn m_r_5 f_r">수정</div></a></td>
		</tr>
	<?
	}
	?>

	</table>
	</div>
    <?
	if(!empty($_GET['mode'])&&$_GET['mode']=="modify"){
	?>
	<br />
	<div id='modify_box'>
			
		<? include 'member_update.php'; ?>


	</div>

	<?
	}
	?>
	</div>
		

	</div>
	</div>



	<footer>
		<? include "../common/footer.html"; ?>
	</footer>
</div>


</body>
</html>