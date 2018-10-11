<?

	$name=$_POST['usrname'];
	$email=$_POST['usrmail'];
	$contents=$_POST['comment'];
	$regist_day = date("Y-m-d (H:i)"); 

	$conn = new mysqli("localhost", "root", "!dlxlelql", "myhome");

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "insert into contactme (date, name, email, contents) ";
	$sql .= "values('$regist_day', '$name', '$email', '$contents');";
	$conn->query($sql);		
	/*
	//에러체크
	if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
	} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	*/
	$conn->close();

	//한글꺠짐 해결
	echo "
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	   <script>
		alert('성공적으로 메시지를 전달했습니다.');
	    history.go(-1);  
	   </script>
	";






?>