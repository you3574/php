<?
	include "../lib/dbconn.php";

	$num=$_GET['num'];
	//$page=$_GET['page'];
	$table=$_GET['table'];
	$ripple_num=$_GET['ripple_num'];

	$sql = "delete from note_ripple where num=$ripple_num";
	$conn->query($sql);
	$conn->close();
	
	echo "<script>location.href = 'view.php?table=$table&num=$num';</script>";
?>
