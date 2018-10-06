<?
$table_sql=mysql_query("select * from album;");

	  while($row=mysql_fetch_array($table_sql)){ 

		$album_k = $row['album_k'];
		$album_name = $row['album_name'];
		$album_date = $row['album_date'];
		$user_k = $row['user_k'];
		$empty = $row['empty'];

		
		if($user_k%2==0){
		?>
			<tr align='center'>
		<?}
		else{
		?>
			<tr class="odd" align='center'>
		<?
		}?>
		<td><? echo $album_k;?></td>
		<td><? echo $album_name;?></td>
		<td><? echo $album_date;?></td>
		<td><? echo $user_k;?></td>
		<td><? echo $empty;?></td>
		</tr>
		
		<?

		}
?>
