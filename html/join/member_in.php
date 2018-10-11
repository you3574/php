<?php
    header("Content-Type: text/javascript; charset=UTF-8");


	$conn = new mysqli("52.78.20.161", "etowner", "!dlxlelql", "etdatabase");

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "db연결완료";
	
		echo "포스트요청들어옴";
		$email = $_POST['g_email'];
		$name = $_POST['name'];

		echo $g_email;
		echo $name;

		
    $data_stream = "'" . $email  . "','" . $name . "'";
    
	$query = "insert into user(g_email,name) values (".$data_stream.")";
    
	$result = $conn->query($sql);

    if($result)
      echo "1";
    else
      echo "-1";//실패
     
    $conn->close();

?>
