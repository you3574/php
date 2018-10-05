<?php

	
    include("config.php"); 
	$error=null;
	
    if($_SERVER["REQUEST_METHOD"] == "POST"){

    $userid=addslashes($_POST['userid']); 
    $userpw=addslashes($_POST['userpw']); 

    $sql="SELECT * FROM user_info WHERE user_id='$userid' and user_pw='$userpw'";
    $result=mysql_query($sql);
	

    $row=mysql_fetch_array($result);
    $check=$row['admin_check'];
	$check2=$row['et_pw'];

	if($check==1){
		$_SESSION['userid']=$row['user_id'];
		header("location: welcome.php");
    }
    else if($check2!=null) 
    {
        $error="Your Not Administrator";
    }
    else 
    {
        $error="Your Login Name or Password is invalid";
    }
}

?>

 

<html>
<head>

<meta http-equiv="Content-Type" content="text/html" charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style> 
	body { font-family: 굴림체; } 
	input.form-control { width: 200px; } 
</style> 

<title>Login</title>

</head>
<body>

<br>
<br>

<div class="container"> 
<h1>관리자 로그인</h1> 
<hr />

<form action="" method="post">

<div class="form-group"> 
<label>사용자아이디	:</label><input type="text" name="userid" class="from-control"/></div>

<div class="form-group"> 
<label>패스워드	:</label><input type="password" name="userpw" class="from-control" /></div>

<button type="submit" class="btn btn-primary"> 
<i class="glyphicon glyphicon-ok"></i> 로그인 </button>

</form>
<hr /> 

<? 
	if ($error != null) {
	?><div class="alert alert-danger"><? echo $error; ?></div> 

<?
}
?>
</body>
</html>