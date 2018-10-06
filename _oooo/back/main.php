<?	
    include("./lib/config.php"); 
	$error=null;
	
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    $userid=addslashes($_POST['admin_k']); 
    $userpw=addslashes($_POST['admin_pw']); 

    $sql="SELECT * FROM admin WHERE admin_k='$userid' and admin_pw='$userpw'";
    $result=mysql_query($sql);
	
    $row=mysql_fetch_array($result);
	

	$count=mysql_num_rows($result);

	if(count==1){

		session_register("user_id");
		$_SESSION['admin_k']=$user_id;

		header("location:publiday.html");

	}

	else{
			$error="안됨";
		}



?>

 

<html>
<head>

<meta http-equiv="Content-Type" content="text/html" charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<link rel="stylesheet" href="./css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<title>Login</title>

</head>
<body>
<div id="login">
<p>PUBLIDAY ADMINISTRATOR ONLY</p>

<form action="" method="post">
			
		<div class="in_bl f_l">
			<input type="text" name="userid" class="login_btn_txt"/>
			<br/>
			<input type="password" name="userpw" class="login_btn_txt" />
		</div>


		<!--div class="in_bl f_l">
			<button type="submit" class="login_btn">로그인</button>
		</div-->

		
		</form>


</div>

<!--div class="wrap">
	<div class="m_b m_t">PUBLIDAY</div>
	<div class="box">
		<form action="" method="post">
			
			<div class="m_b box_text">Administrator</div>
			<div class="m_b">
			<input type="text" name="userid" class="box_btn"/>
			</div>

			<div style="height:15px"></div>

			<div class="m_b box_text">Password</div>
			<div class="m_b">
			<input type="password" name="userpw" class="box_btn" />
			</div>

			<div class="danger m_b">
				<? 
				if ($error != null) {
				?><? echo $error; ?>

				<?
				}
				?>
			</div>

			<button type="submit" class="lg_btn">로그인</button>

		
		</form>
	

	</div>

</div-->


</body>
</html>
