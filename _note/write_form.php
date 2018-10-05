<? 
	@session_start(); 
	include "../lib/dbconn.php";

	$table=$_GET['table'];
	$page=$_GET['page'];

	if (!empty($_GET['mode'])&&($_GET['mode']=="modify"))
	{
		$num=$_GET['num'];

		$sql = "select * from $table where num=$num";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		$item_subject     = $row['subject'];
		$item_content     = $row['content'];
		$item_file_0 = $row['file_name_0'];
		$item_file_1 = $row['file_name_1'];

		$copied_file_0 = $row['file_copied_0'];
		$copied_file_1 = $row['file_copied_1'];
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
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요1");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
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

	<!-------------------------------->

	<div id="write_box" class="wth_80 m_lr_10">        

		<div id="write_form_title">
			<h3>게시판 글쓰기</h3>
		</div>
		
<?
	if(!empty($_GET['mode'])&&($_GET['mode']=="modify"))
	{
?>
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
	else
	{
?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
<?
	}
?>
		<div id="write_form">
			<div id="write_row1"> 사용자 이름 : <?=$_SESSION['username']?>
<?

	if( !empty($_SESSION['userid']) && empty($_GET['mode']))//유저가 존재하는데 modify가 아닌경우
	{
?>
				<div class="col3"><input type="checkbox" name="html_ok" value="y"> 체크시HTML 쓰기 </div>
				</div>
			
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject"></div>
			</div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"></textarea></div>
			</div>

<?
	}else{
?>			
			</div>
			
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>

			
<?
			}
?>
			<div id="write_row4"><div class="col1"> 이미지파일1   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>

<? 	if ((!empty($_GET['mode'])&&($_GET['mode']=="modify")) && $item_file_0)
	{
?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="0"> 삭제</div>
			
<?
	}
?>
			<div class="write_line"></div>
			<div id="write_row5"><div class="col1"> 이미지파일2  </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
<? 	if ((!empty($_GET['mode'])&&($_GET['mode']=="modify")) && $item_file_1)
	{
?>
			<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="1"> 삭제</div>
			
<?
	}
?>

		</div>

		<div id="write_button">
			<a href="#"><div onclick="check_input()">완료</div></a>&nbsp;
			<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
		</div>
		</form>

	</div> 


	<!----------------------------------->

	</div>
	<footer>
		<? include "../common/footer.html"; ?>
	</footer>
</div>




</body>
</html>
