<?php
@session_start();
// https://www.sanwebe.com/2012/11/login-with-google-api-php
require_once ('libraries/Google/autoload.php');

// https://console.developers.google.com/ 에서 client ID and secret 생성
$client_id = '722774985963-31rrc1llg0bu86va1tvipl8fupqqcnkg.apps.googleusercontent.com';
$client_secret = 'vNXX2PsaKpTdqIqoJI9_2HTn';
$redirect_uri = 'http://publiday.co.kr/'; 

//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client(); // 객체 생성
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/

// 구글에서 redirect_uri 로 code 를 보내준다.
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {//엑세스토큰이 없다면
  $authUrl = $client->createAuthUrl();
}


//Display user info or display login url as per the info we have.
echo '<div class="back_rule">';
if (isset($authUrl)){
	?>
	<nav>
		<a href="/"><img src="./img/o_logo.png" id="img_h"class="in_bl f_l"></a>
		<ul>
			<li><a href="./note/list.php">공지사항</a></li>
			<li><a href="./free/list.php">고객센터</a></li>
			</span>
		</ul>
		<a class="login" href="<?=$authUrl;?>"><div class="in_bl f_r log_btn">로그인</div></a>
	</nav>
	<?

} else {

	$user = $service->userinfo->get(); // google 사용자 정보 가져오기
	
	include_once 'lib/g_connect.php';
	// DB 테이블에 구글 ID가 존재하는지 검사
	$sql ="SELECT COUNT(g_email) as usercount FROM user WHERE g_email='$user->email'";
	$result = mysql_query($sql,$db);

	if(!empty($result)) {
		$row = mysql_fetch_array($result);
		$user_count = $row[0];
	}


	if($user_count){ // 이미 가입자 정보가 있으면
		//echo '<a href="'.$redirect_uri.'?logout=1">로그아웃</a>';
		
		// et 세션정보 생성하자
		include_once 'lib/g_connect.php';
		$sql = "SELECT * FROM user WHERE g_email='$user->email';";
		$result = mysql_query($sql,$db);
		$row = mysql_fetch_array($result);

		$_SESSION['userid'] = $row['g_email'];
	    $_SESSION['username'] = $row['g_name'];
	    $_SESSION['usercheck'] = $row['admin_ck'];
	
    }
	else {
		//echo '<a href="'.$redirect_uri.'?logout=1">로그아웃</a>';
		$id = $user->id;
		$email = $user->email;
		$name = $user->name;
		//$link = $user->link;
		//$picture = $user->picture;
		$query ="INSERT INTO user(g_email, g_name) VALUES ('$email','$name')";
		mysql_query($query);
		/****첫로그인시 세션 생성*******/
		$sql = "SELECT * FROM user WHERE g_email='$user->email';";
		$result = mysql_query($sql,$db);
		$row = mysql_fetch_array($result);

		$_SESSION['userid'] = $row['g_email'];
	    $_SESSION['username'] = $row['g_name'];
	    $_SESSION['usercheck'] = $row['admin_ck'];
    }
	


	// 구글에서 보내주는 정보를 상세하기 확인할 수 있다
	/*
	echo '<pre>';
	print_r($user);
	echo '</pre>';
	*/
}


	if(!empty($_SESSION['userid'])&&($_SESSION['usercheck']=='1'))
	{
	?>
		<nav>
			<a href="/"><img src="./img/o_logo.png" id="img_h"class="in_bl f_l"></a>
			<ul>
				<li><a href="./note/list.php">공지사항</a></li>
				<li><a href="./free/list.php">고객센터</a></li>
				<li><a href="#">회원전용</a>
					<ul>
						<li><a href="./album/myalbum.php">마이앨범</a></li>
						<li><a href="./member/member_info.php">정보수정</a></li>
						<li><a href="./login/member.php">회원관리</a></li>
					</ul>
				</li>
			</ul>
			<a href="./login/logout.php"><div class="in_bl f_r log_btn">로그아웃</div></a>
		</nav>
	<?
	}
	else if(!empty($_SESSION['userid']))
	{
	?>
		<nav>
			<a href="/"><img src="./img/o_logo.png" id="img_h"class="in_bl f_l"></a>
			<ul>
				<li><a href="./note/list.php">공지사항</a></li>
				<li><a href="./free/list.php">고객센터</a></li>
				<li><a href="#">회원전용</a>
					<ul>
						<li><a href="./album/myalbum.php">마이앨범</a></li>
						<li><a href="./member/member_info.php">정보수정</a></li>
					</ul>
				</li>
			</ul>
			<a href="./login/logout.php"><div class="in_bl f_r log_btn">로그아웃</div></a>
		</nav>
	<?
	}

echo '</div>';


?>

