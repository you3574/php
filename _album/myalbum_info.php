<?
   @session_start();

   if(!empty($_POST['total'])){
	   echo $_POST['total'];
   
   
   }
   	include "../lib/dbconn.php";

	//$al_sql="select vol from $album where owner='{$_SESSION['userid']}';";

	//$al_result = $conn->query($al_sql);
	//$row = $al_result->fetch_assoc();

	//$al_vol = $row['vol'];
/*
   echo "
	   <script>
	    location.href = 'view.php?table=$table&num=$num&page=$page';
	   </script>
	";


	*/
?>

   
