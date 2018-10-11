<? 
	@session_start(); 

	if(empty($_SESSION['userid'])) {
		echo("
		<script>
	     window.alert('로그인 후 이용해 주세요.')
	     history.go(-1)
	   </script>
		");
		exit;
	}

	$userid=$_SESSION['userid'];
	$username=$_SESSION['username'];
	$subject=$_POST['subject'];
	$content=$_POST['content'];

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
	$table=$_GET['table'];
	//$page=$_GET['page'];

	// 다중 파일 업로드
	$files = $_FILES["upfile"];
	$count = count($files["name"]);
	$upload_dir = './data/';

	for ($i=0; $i<$count; $i++)
	{
		$upfile_name[$i]     = $files["name"][$i];//클라이언트가 가지고 있는 파일의 이름
		$upfile_tmp_name[$i] = $files["tmp_name"][$i];//서버에 저장된 임시파일의 이름
		$upfile_type[$i]     = $files["type"][$i];//파일의 mime형식 >> 신뢰도 없음
		$upfile_size[$i]     = $files["size"][$i];//파일 사이즈
		$upfile_error[$i]    = $files["error"][$i];//에러코드
		
		
		if($upfile_name[$i]!=null){
				
			$file = explode(".", $upfile_name[$i]);//.기준으로 분리
			$file_name = $file[0];//파일 이름
			$file_ext  = $file[1];//파일 확장자
	
		}else{//똥멍충이 같은 php 이걸 인식못해서 if문을 쓰게 하다니...
			$file_name = null;
			$file_ext  = null;
		}

		$copied_file_name[$i]=null;//마지막에 sql로 다 집어넣을떄 애러 난다ㅠ

/*에러코드까지 찾아봐야 하는거니????*/
// 0 : 성공 
// 1 : php.ini 의 upload_max_filesize 보다 큽니다. 
// 2 : html 폼에서 지정한  max file size 보다 큽니다. 
// 3 : 파일이 일부분만 전송되었습니다. 
// 4 : 파일이 전송되지 않았습니다. 
// 6 : 임시 폴더가 없습니다. 
// 7 : 디스크에 파일 쓰기를 실패하였습니다. 
// 8 : 확장에 의해 파일 업로드가 중지되었습니다. 
//echo $upfile_error[$i];

		if (!$upfile_error[$i]) 
		{	
			$new_file_name = date("Y_m_d_H_i_s"); //새로운 파일 이름은 낭짜
			$new_file_name = $new_file_name."_".$i;//_몇번쨰?
			$copied_file_name[$i] = $new_file_name.".".$file_ext; //파일 이름들을 배열에 다시저장      
			//echo $copied_file_name[$i];//최종파일이름

			$uploaded_file[$i] = $upload_dir.$copied_file_name[$i];//경로와 파일이름

			if( $upfile_size[$i]  > 500000 ) {
				echo("
				<script>
				alert('업로드 파일 크기가 지정된 용량(500KB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
				</script>
				");
				exit;
			}

			if ( ($upfile_type[$i] != "image/gif") &&
				($upfile_type[$i] != "image/jpeg") &&
				($upfile_type[$i] != "image/jpg") )
			{
				echo("
					<script>
						alert('JPG와 GIF 이미지 파일만 업로드 가능합니다!');
						history.go(-1)
					</script>
					");
				exit;
			}

			if (!move_uploaded_file($upfile_tmp_name[$i], $uploaded_file[$i]) )//서버로 전송된 파일 저장
			{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
			}
		}
	}
	include "../lib/dbconn.php";       // dconn.php 파일을 불러옴

	if ((!empty($_GET['mode'])&&($_GET['mode']=="modify")))//수정하는 경우
	{
		$num=$_GET['num'];
		$page=$_GET['page'];
		
		if(!empty($_POST['del_file'])){//이거 인식을 못해서 애러를 내야겠니???망할
			$num_checked = count($_POST['del_file']); //$num_checked이 한개 이상이면 삭제할거 있음

			$position = $_POST['del_file'];//배열에 삭제할 애들 인덱스 당겨서 저장

			/*****디폴트를 지정하고 시작!******/

			for($i=0; $i<2; $i++){
			$del_ok[$i] = "n";

			}
			/**********************/

			for($i=0; $i<$num_checked; $i++)
			{
				$index = $position[$i];
				$del_ok[$index] = "y";//이렇게 하면 $del_ok배열에 Y체크된거만 삭제하면 됨ㅇㅇ나머진 null이겠지?
			}

		}else{//여긴는 삭제할거 없을때
			for($i=0; $i<2; $i++)//어차피 2개
			{
				$del_ok[$i] = "n";
			}
		
		}
		
		$sql = "select * from $table where num=$num";   
		$result = $conn->query($sql);
		$row = $result->fetch_assoc(); 

		for ($i=0; $i<$count; $i++)
		{

			$field_org_name = "file_name_".$i;
			$field_real_name = "file_copied_".$i;

			$org_name_value = $upfile_name[$i];
			$org_real_value = $copied_file_name[$i];

			if ($del_ok[$i] == "y")//삭제할서 있으면
			{
				$delete_field = "file_copied_".$i;
				$delete_name = $row[$delete_field];				
				$delete_path = "./data/".$delete_name;

				unlink($delete_path);//파일 삭제 명령어

				$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$num";
				$conn->query($sql);  // $sql 에 저장된 명령 실행
			}
			else
			{
				if (!$upfile_error[$i])//에러가 발생하지 않았다면
				{
					$sql = "update $table set $field_org_name = '$org_name_value', $field_real_name = '$org_real_value'  where num=$num";
					$conn->query($sql);  // $sql 에 저장된 명령 실행					
				}
			}
		}
		$sql = "update $table set subject='$subject', content='$content' where num=$num"; //전체적으로 수정하자
		$conn->query($sql);  // $sql 에 저장된 명령 실행
	}
	else //만약 수정이 아니하면 새로 쓰는 것뿐
	{
		
		if (!empty($_POST['html_ok'])&&$_POST['html_ok']=="y") //사용자가 html선언해서 써야함
		{
			$is_html = "y";
		}
		else //html로 안쓸거야
		{
			$is_html = "n";
			$content = htmlspecialchars($content); //컨텐츠의 특수문자를 html문자로 변환
		}

		$sql = "insert into $table (id, name, subject, content, regist_day, is_html, ";
		$sql .= " file_name_0, file_name_1, file_copied_0,  file_copied_1) ";
		$sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', '$is_html', ";
		$sql .= "'$upfile_name[0]', '$upfile_name[1]', '$copied_file_name[0]', '$copied_file_name[1]')";
		$conn->query($sql);  // $sql 에 저장된 명령 실행
	}
	$conn->close();
             // DB 연결 끊기
	
	echo "
	   <script>
	    location.href = 'list.php?table=$table';
	   </script>
	";
	
?>

  
