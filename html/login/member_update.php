<?
    if (!empty($_GET['mode2'])&&$_GET['mode2'] == "update") 
    {   
       
	   if(!empty($_POST['pay_ck'])){
			$sql = "update $table set pay_ck='{$_POST['pay_ck']}', deli_ck='{$_POST['deli_ck']}' where al_id='{$_GET['num']}';";
	   }else{
			$sql = "update $table set deli_ck='{$_POST['deli_ck']}' where al_id='{$_GET['num']}';";
	   }
	   $result = $conn->query($sql);

		echo("<script>location.replace('member.php');</script>"); 
    }

?>

<form action="member.php?mode=modify&mode2=update&num=<?=$_GET['num'];?>" method='post'>
<ul id="update_al">
<?
	$sql = "select * from $table where al_id='$_GET[num]'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
?>

	<li><span>아이디</span> <?=$row['owner'];?></li>
	<li><span>다이어리 제목</span> <?=$row['title'];?></li>
	<li><span>등록일</span> <?=$row['date'];?></li>
	<li><span>결제상태</span>
	<? 
	if($row['pay_ck']==5){
	?>
		<input type='radio' name='pay_ck' value='0'>입금전
		<input type='radio' name='pay_ck' value='1'>입금예정
		<input type='radio' name='pay_ck' value='5' checked>입금확인
		
	<?
	}else if($row['pay_ck']==1){
	?>
		<input type='radio' name='pay_ck' value='0'>입금전
		<input type='radio' name='pay_ck' value='1' checked>입금예정
		<input type='radio' name='pay_ck' value='5'>입금확인

	<?
	}else{
	?>
		<input type='radio' name='pay_ck' value='0' checked>입금전
		<input type='radio' name='pay_ck' value='1'>입금예정
		<input type='radio' name='pay_ck' value='5'>입금확인
	<?
	}
	?>
	</li>

	<li style="border-bottom: none;"><span>배송상태</span> 
	<?
	if($row['deli_ck']==5){
	?>
	<input type='radio' name='deli_ck' value='0'>배송전
	<input type='radio' name='deli_ck' value='1'>배송중
	<input type='radio' name='deli_ck' value='5' checked>배송완료

	<?
	}else if($row['deli_ck']==1){
	?>
	<input type='radio' name='deli_ck' value='0'>배송전
	<input type='radio' name='deli_ck' value='1' checked>배송중
	<input type='radio' name='deli_ck' value='5'>배송완료
	<?
	}else{
	?>
	<input type='radio' name='deli_ck' value='0' checked>배송전
	<input type='radio' name='deli_ck' value='1'>배송중
	<input type='radio' name='deli_ck' value='5'>배송완료
	<?
	}
	?>	
	</li>
 </ul>
 <br/>
 <div class="wth_100 over_h">
 <input type="submit" value="수정하기" class="def_btn modi_b">	
</div>
