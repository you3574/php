<? @session_start(); 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="../css/style.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
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

	<div id="log_box">	
		<form method="post" action="login.php" name="member_form" id="login">
			<input type="text" name="id" class="text_box" onfocus="this.style.backgroundImage='url(none)';" onblur="if(this.value ==''){this.style.backgroundImage='url(../img/text_b.png)'}"/>
			<input type="password" name="pass" class="pw_box" onfocus="this.style.backgroundImage='url(none)';" onblur="if(this.value ==''){this.style.backgroundImage='url(../img/pw_b.png)'}"/>
			<input type="submit" class="btn_go" value="login"/>
		</form>	
	</div>

	</div>
	<footer>
		<? include "../common/footer.html"; ?>
	</footer>
</div>


</body>
</html>