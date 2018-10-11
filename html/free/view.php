<? 
	@session_start(); 
	include "../lib/dbconn.php";
	
	if(empty($_GET['table'])&&empty($_GET['num'])){
		header('location:/');
	}


	$table=$_GET['table'];
	$num=$_GET['num'];

	if(!empty($_GET['page'])){
	$page=$_GET['page'];
	}
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

    $item_date = substr($row['regist_day'], 0, 10);

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
			<? include "../lib/g_index2.php"; ?>
		</div>
	</header>
    <div id="container">
	<div class='wrap'>

	<div id='list_box' class='back_rule'>
		<div class='head'>
			<p id="title_r">Customer<span class="media_s"><br></span> Service</p>
		</div>
 
		<div id="view_title" class="wth_100">
			<div class="t_a wth_15"><?= $item_date ?></div>
			<div class="t_b wth_70"><?= $item_subject ?></div>
			<div class="t_c wth_15"><?= $item_name ?></div>
		</div>
		<div id="view_content" class="wth_100">
			<div id="content">
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
		</div>

		<div id="view_button">
				<a href="list.php?table=<?=$table?>&page=<?=$page?>"><div class="def_btn f_r">목록</div></a>&nbsp;
			<? 
				if(!empty($_SESSION['userid']))
				{
			?>
					<a href="write_form.php?table=<?=$table?>&page=<?=$page?>"><div class="def_btn f_r">글쓰기</div></a>
			<?
				}
			?>
			<? 
				if((!empty($_SESSION['usercheck'])&&($_SESSION['usercheck']=='1'))|| (!empty($_SESSION['userid'])&&($_SESSION['userid']==$item_id)))
				{
			?>
					<a href="write_form.php?table=<?=$table?>&mode=modify&num=<?=$num?>&page=<?=$page?>"><div class="def_btn f_r">내용수정</div></a>&nbsp;
					<a href="javascript:del('delete.php?table=<?=$table?>&num=<?=$num?>')"><div class="def_btn f_r">내용삭제</div></a>&nbsp;
			<?
				}
			?>
		</div>

		<div id="ripple">
<?
	$sql = "select * from free_ripple where parent='$item_num'";
	$ripple_result = $conn->query($sql);
		
	if($ripple_result->num_rows>0){
	?>
		<div id="ripple_writer_title">
	<?
		while ($row_ripple = $ripple_result->fetch_assoc())
		{
			$ripple_num     = $row_ripple['num'];
			$ripple_id      = $row_ripple['id'];
			$ripple_name      = $row_ripple['name'];
			$ripple_content = str_replace("\n", "<br>", $row_ripple['content']);
			$ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
			$ripple_date    = substr($row_ripple['regist_day'], 0, 10);
?>
			<ul>
			<li id="writer_title1" class="in_bl f_l"><?=$ripple_name?></li>
			<li id="ripple_content" class="in_bl f_l"><?=$ripple_content?></li>
			<li id="writer_title2" class="in_bl f_l"><?=$ripple_date?></li>
			<li id="writer_title3" class="in_bl f_r"> 
		      <? 
					if((!empty($_SESSION['usercheck'])&&($_SESSION['usercheck']=='1')) || (!empty($_SESSION['userid'])&&($_SESSION['userid']==$ripple_id)))
			          echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'>x</a>"; 
			  ?>
			</li>
			</ul>

	<?
		}
	?>
	</div>
	<?
	
	}
	?>			

		<div id="ripple_input">
			<form  name="ripple_form" method="post" action="insert_ripple.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">  
				<div id="ripple_box1" class="in_bl f_l">
					<textarea id="ripple_txta" name="ripple_content"></textarea>
				</div>
				<div id="ripple_box2" class="in_bl f_r">
					<a href="#"><div id="ripple_in" onclick="check_input()">보내기</div></a>
				</div>
			</form>
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
