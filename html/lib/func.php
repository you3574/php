<?
   function latest_article($table, $loop) 
   {
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = $conn->query($sql);
		
		echo "<ul id='sub_notice'>";
		while ($row = $result->fetch_assoc())
		{
			$num = $row['num'];
			$subject = $row['subject'];
			$regist_day = substr($row['regist_day'], 0, 10);
			

			echo "
				<li><a href='./$table/view.php?table=$table&num=$num'><span class='sub_txt wth_70'>".$subject."</span></a><span class='sub_date'>".$regist_day."</span></li>";
		}
		echo "</ul>";
		$conn->close();
   }
?>