<!doctype html>
 <body>
<style>
 input {width:600px;}
</style>


<a href="login.html">로그인</a>
	<form action="https://www.googleapis.com/oauth2/v4/token" method="post" enctype="application/x-www-form-urlencoded">
		code : <input type="text" name="code" value="<?=$_GET['code'];?>" /><br/>
		client_id : <input type="text" name="client_id" value="619026325470-3hqaqedoq9i49h3j4dojda90r6jv65rm.apps.googleusercontent.com" /><br/>
		client_secret : <input type="text" name="client_secret" value="BxHQEmtFfdFfT1P8buG-4ndS" /><br/>
		redirect_uri : <input type="text" name="redirect_uri" value="http://localhost/recive.php" /><br/>
		grant_type : <input type="text" name="grant_type" value="authorization_code" />
	<input type="submit" value="전송" />
	</form>



 </body>
</html>


