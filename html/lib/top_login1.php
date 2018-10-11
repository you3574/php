<?
include './lib/g_index1.php';
?>
	<div id="top_login">
	<a href="/"><img src="./img/o_logo.png" width='30' id='header_logo2' class='f_l'/></a>

	
<?
    if(!empty($_SESSION['userid'])&&($_SESSION['usercheck']=='1'))
	{
?>
        <a href="./album/member_info.php"><div class="in_bl menu_txt">정보수정</div></a>
		<a href="./album/myalbum.php"><span class="h2_txt">마이앨범</span></a>
		<a href="./login/member.php"><span class="h2_txt">회원관리</span></a>
		<!--a href="./login/logout.php"><span class="h2_txt">로그아웃</span></a-->
		
		a href="'.$redirect_uri.'?logout=1">로그아웃</a>
<?
	}
	else if(!empty($_SESSION['userid']))
	{
?>
		<a href="./album/member_info.php"><div class="in_bl menu_txt">정보수정</div></a>
		<a href="./album/myalbum.php"><span class="h2_txt">마이앨범</span></a>
		<!--a href="./login/logout.php"><span class="h2_txt">로그아웃</span></a-->

<?
	}

?>

	
	 </div>
