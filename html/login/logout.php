<?
  @session_start();
  unset($_SESSION['userid']);
  unset($_SESSION['username']);
  unset($_SESSION['usercheck']);

  //header('location:../index.html');
	header('Location: http://publiday.co.kr?logout=1');
?>
