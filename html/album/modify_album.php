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
   include "../lib/dbconn.php";   

	$total=$_POST['change_t'];

	for($i=0; $i<$total; $i++){
		$con_id=$_POST['con_id'];
		$con_num=$_POST['con_num'];


		$sql = "update album set vol='{$con_num[$i]}', pay_ck='1' where al_id='{$con_id[$i]}';";
		$conn->query($sql);
	
	}
   $conn->close();

   echo "
	   <script>
	    location.href = 'myalbum.php';
	   </script>
	";
?>

   
