<? 
	@session_start(); 
	$table = "free";
	$ripple = "free_ripple";
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
	
	$page_size=10; //페이지에 보여질 게시물 수

	 if (!empty($_GET['mode'])&&$_GET['mode']=="search")
	{
		if(!$_POST['search'])
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}
		$sql = "select * from $table where {$_POST['find']} like '%{$_POST['search']}%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result_con = $conn->query($sql);
	$total_record = $result_con->num_rows; //전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $page_size == 0)     
		$total_page = floor($total_record/$page_size);      
	else
		$total_page = floor($total_record/$page_size) + 1; 
	

	if (!isset($_GET['page'])||!$_GET['page']){
		$page = 1;
	}
	else{//겟변수가 있다면
		if(is_numeric($_GET['page'])){
			$page=$_GET['page'];
		}else{$page = 1;}
		
	}
	
	
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $page_size;  
	$number = $total_record - $start;

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
		
		<div class='head media_s'>
			<p id="title_r">Customer<br>Service</p>
			<br />---
		</div>

		<div id='list_h' class="media_n">고객센터&nbsp;<span class="list_h2">Customer Service</span></div>
	
			<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
			<div id="list_search">
				<div id="list_search1" class="f_l">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다.  </div>
				<div id="list_search2">
					<select name="find" class="def_btn" >
						<option value='subject'>제목</option>
						<option value='content'>내용</option>
						<option value='name'>이름</option>
					</select>
					<input type="text" name="search" class="def_btn" >
					<input type="submit" value="검색" class="def_btn" >
				</div>
			</div>
			</form>
			<div id="list_top_title">
				<ul>
					<li id="list_title1" class="list_a">번호</li>
					<li id="list_title2" class="list_b">제목</li>
					<li id="list_title3" class="list_c">글쓴이</li>
					<li id="list_title4" class="list_d">등록일</li>
				</ul>		
			</div>

			<div id="list_content">
	<?	
	   for ($i=$start; $i<$start+$page_size && $i < $total_record; $i++){ 
		  
		  //echo $result_con;
		  $result_con->data_seek($i);  //디비 포인터 이동..찾기 힘드어따ㅠㅠ         
		  $row = $result_con->fetch_assoc();      
		  
		  $item_num     = $row['num'];
		  $item_id      = $row['id'];
		  $item_name    = $row['name'];
		  $item_date    = $row['regist_day'];
		  $item_date = substr($item_date, 0, 10);  
		  $item_subject = str_replace(" ", "&nbsp;", $row['subject']);

		  $sql = "select * from $ripple where parent=$item_num";
		  $result2 = $conn->query($sql);
		  $num_ripple = $result2->num_rows; 

	?>
				<div id="list_item">
				<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
					<div id="list_item1" class="list_a"><?= $number ?></div>
					<div id="list_item2" class="list_b"><?= $item_subject ?>
	<?
			if ($num_ripple)
					echo " [$num_ripple]";
	?>
					</div>
					<div id="list_item3" class=" list_c"><?= $item_name ?></div>
					<div id="list_item4" class=" list_d"><?= $item_date ?></div>
				</a>
				</div>
				
				
	<?
		   $number--;
	   }
	?>
				<div id="page_button"> 
					<div id="page_num" class="f_l">
	<?
	   
	   for ($i=1; $i<=$total_page; $i++)
	   {
			if ($page == $i)     // 현재 페이지 번호 링크 안함
			{
				echo "<div class='now_page'> $i </div>";
			}
			else //다른페이지는 링크해야겠지??
			{ 
				echo "<a href='list.php?table=$table&page=$i'><div class='not_page'> $i </div></a>";
			}      
	   }
	?>		
					</div>
					<div id="button" class="f_r">
						<a href="list.php?table=<?=$table?>&page=<?=$page?>"><div class="def_btn">목록</div></a>&nbsp;
	<? 
		if(!empty($_SESSION['userid']))
		{
			?>

				<a href="write_form.php?table=<?=$table?>&page=<?=$page?>"><div class="def_btn">글쓰기</div></a>
	<?
			}

	?>
					</div>
				</div>	
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


