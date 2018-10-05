<? 
	@session_start(); 
	include "../lib/dbconn.php";

	$table=$_GET['table'];
	$num=$_GET['num'];
	if(!empty($_GET['page']))
	$page=$_GET['page'];

	$sql = "select * from $table where num='$num';";
	$result = $conn->query($sql);
    $row = $result->fetch_assoc();       
	
	$item_num     = $row['num'];
	$item_id      = $row['id'];
	$item_name    = $row['name'];

	$image_name[0]   = $row['file_name_0'];
	$image_name[1]   = $row['file_name_1'];
	$image_copied[0] = $row['file_copied_0'];
	$image_copied[1] = $row['file_copied_1'];

    $item_date    = $row['regist_day'];
	$item_subject = str_replace(" ", "&nbsp;", $row['subject']);
	$item_content = $row['content'];
	$is_html      = $row['is_html'];

	if ($is_html!="y")
	{
		$item_content = str_replace(" ", "&nbsp;", $item_content);
		$item_content = str_replace("\n", "<br>", $item_content);
	}	

	for ($i=0; $i<2; $i++)
	{	
		if ($image_copied[$i]) 
		{
			$imageinfo = GetImageSize("./data/".$image_copied[$i]);
			$image_width[$i] = $imageinfo[0];
			$image_height[$i] = $imageinfo[1];
			$image_type[$i]  = $imageinfo[2];

			if ($image_width[$i] > 785)
				$image_width[$i] = 785;
		}
		else
		{
			$image_width[$i] = "";
			$image_height[$i] = "";
			$image_type[$i]  = "";
		}
	}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="../css/style.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>
	function check_input()
	{
		if (!document.ripple_form.ripple_content.value)
		{
			alert("내용을 입력하세요!");    
			document.ripple_form.ripple_content.focus();
			return;
		}
		document.ripple_form.submit();
    }

    function del(href) 
    {
        if(confirm("한번 삭제하면 복구가 불가능합니당아아아아아.\n\n정말 삭제하시겠습니까?")) {
                document.location.href = href;
        }
    }
</script>
</head>
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

	<div id="view_box" class='wth_80 m_lr_10'>        

		<div id="view_title">
			<div id="view_title1">제목 : <?= $item_subject ?></div>
			<div id="view_title2">최근 등록일 : <?= $item_date ?> </div>	
		</div>

		<div id="view_content">
<?
	for ($i=0; $i<2; $i++)//이미지 뿌리기
	{
		if ($image_copied[$i])
		{
			$img_name = $image_copied[$i];
			$img_name = "./data/".$img_name;
			$img_width = $image_width[$i];
			
			echo "<img src='$img_name' width='$img_width'>"."<br><br>";
		}
	}
?>
			<?= $item_content ?>
		</div>

		<div id="ripple">
<?
	    $sql = "select * from note_ripple where parent='$item_num'";
	    $ripple_result = $conn->query($sql);


		while ($row_ripple = $ripple_result->fetch_assoc())
		{
			$ripple_num     = $row_ripple['num'];
			$ripple_id      = $row_ripple['id'];
			$ripple_name      = $row_ripple['name'];
			$ripple_content = str_replace("\n", "<br>", $row_ripple['content']);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = $row_ripple['regist_day'];
?>
			<div id="ripple_writer_title"><hr />여기부터 리플
			<ul>
			<li id="writer_title1">리플단사람 : <?=$ripple_name?></li>
			<li id="writer_title2">리플 등록일 : <?=$ripple_date?></li>
			<li id="writer_title3"> 
		      <? 
					if((!empty($_SESSION['usercheck'])&&($_SESSION['usercheck']=='1')) || (!empty($_SESSION['userid'])&&($_SESSION['userid']==$ripple_id)))
			          echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>[리플본인 || 관리자는 리플삭제 가능 >> 한번해봐]</a>"; 
			  ?>
			</li>
			</ul>
			</div>
			<div id="ripple_content">리플 내용 :<?=$ripple_content?></div>
			<div class="hor_line_ripple"></div>
<?
		}
?>			
			<form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">  
			<div id="ripple_box">
				<div id="ripple_box1">여기에 댓글 다시오...아무리 생각해도 오늘은 기능만 디자인은 무리무리</div>
				<div id="ripple_box2"><textarea rows="5" cols="65" name="ripple_content"></textarea>
				</div>
				<div id="ripple_box3"><a href="#"><div onclick="check_input()">댓글달기</div></a></div>
			</div>
			</form>
		</div> 리플끝 <hr/>

		<div id="view_button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
<? 
	if((!empty($_SESSION['usercheck'])&&($_SESSION['usercheck']=='1'))|| (!empty($_SESSION['userid'])&&($_SESSION['userid']==$item_id)))
	{
?>
				<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>">내용수정하기</a>&nbsp;
				<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')">내용삭제하기</a>&nbsp;
<?
	}
?>
<? 
	if(!empty($_SESSION['userid'])&&($_SESSION['usercheck']=='1'))
	{
?>
				<a href="write_form.php?table=<?=$table?>&page=<?=$page?>">글쓰기</a>
<?
	}
?>
		</div>
		

	</div> 

	</div>
	</div>
	<footer>
		<? include "../common/footer.html"; ?>
	</footer>
</div>

</body>
</html>
