<?
           @session_start();
?>

<?
   // 이전화면에서 이름이 입력되지 않았으면 "이름을 입력하세요"
   // 메시지 출력
   if(!$_POST['id']) {
     echo("
           <script>
             window.alert('아이디를 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   if(!$_POST['pass']) {
     echo("
           <script>
             window.alert('비밀번호를 입력하세요.')
             history.go(-1)
           </script>
         ");
         exit;
   }

   include "../lib/dbconn.php";

   $sql = "SELECT * FROM user_info WHERE user_id='{$_POST['id']}';";
   $result = $conn->query($sql);

	$num_match = $result->num_rows;

	
   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다.')
             history.go(-1)
           </script>
         ");
    }
    else
    {

        $row = $result->fetch_assoc();

        $db_pass = $row['et_pw'];

        if($_POST['pass'] != $db_pass)
        {
           echo("
              <script>
                window.alert('비밀번호가 틀립니다.')
                history.go(-1)
              </script>
           ");

           exit;
        }
        else
        {
           $userid = $row['user_id'];
		   $username = $row['user_name'];
		   $usercheck = $row['admin_check'];

           $_SESSION['userid'] = $userid;
           $_SESSION['username'] = $username;
		   $_SESSION['usercheck'] = $usercheck;

		   header('location:../index.html');
        }
   }          
?>
