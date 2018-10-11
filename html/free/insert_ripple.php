<?
   @session_start();

   if(empty($_SESSION['userid'])) {
     echo("
	   <script>
	     window.alert('로그인 후 이용하세요.')
	     history.go(-1)
	   </script>
	 ");
	 exit;
   }   
   include "../lib/dbconn.php";       // dconn.php 파일을 불러옴

   $regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
   $num=$_GET['num'];
   $page=$_GET['page'];
   $table=$_GET['table'];
   $userid=$_SESSION['userid'];
   $username=$_SESSION['username'];
   $ripple_content=$_POST['ripple_content'];

   // 레코드 삽입 명령
   $sql = "insert into free_ripple (parent, id, name, content, regist_day) ";
   $sql .= "values($num, '$userid', '$username', '$ripple_content', '$regist_day')";    
   
   $conn->query($sql);
   $conn->close();

   echo "
	   <script>
	    location.href = 'view.php?table=$table&num=$num&page=$page';
	   </script>
	";
?>

   
