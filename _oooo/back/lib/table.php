<?
$user_sql="select * from user_info limit 0, 10;";
$user_result = $conn->query($user_sql);

if ($user_result->num_rows > 0) {
    
    while($user_r = $user_result->fetch_assoc()) {
        
		$user_k = $user_r['user_k'];
		$user_id = $user_r['user_id'];
		$et_pw = $user_r['et_pw'];
		$user_name = $user_r['user_name'];
		$user_b = substr($user_r['user_b'],0,6);
		$user_tel = $user_r['user_tel'];
		$user_ad = $user_r['user_ad'];

		
		if($user_k%2==0){
		?>
			<tr id="<?=$user_k?>" align='center'>
		<?}
		else{
		?>
			<tr id="<?=$user_k?>" class="odd" align='center'>
		<?
		}?>
		<td><? echo $user_k;?></td>
		<td><? echo $user_id;?></td>
		<td><? echo $et_pw;?></td>
		<td><? echo $user_name?></td>
		<td><? echo $user_b?></td>
		<td><? echo $user_tel?></td>
		<td><? echo $user_ad?></td>
		<td><input type="checkbox" name="ck_group" value="<?=$user_k?>" /></td>
		</tr>
		<?
    }
} 

	
?>
