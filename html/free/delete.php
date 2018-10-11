<?
	@session_start();
	include "../lib/dbconn.php";

	$num=$_GET['num'];
	$table=$_GET['table'];

	$sql = "select * from $table where num = $num";
		
	$result = $conn->query($sql);

	$row =$result->fetch_assoc();

	$copied_name[0] = $row['file_copied_0'];
	$copied_name[1] = $row['file_copied_1'];

	for ($i=0; $i<2; $i++)
	{
		if ($copied_name[$i])
	   {
			$image_name = "./data/".$copied_name[$i];
			unlink($image_name);
	   }
	}

	$sql = "delete from $table where num = $num";
	
	$conn->query($sql);
	$conn->close();

	echo "
	   <script>
		location.href = 'list.php?table=$table';
	   </script>
	";
?>

