<?php
include_once 'g_dbinfo.php';
$c = new mysql;
$db = $c->isConnectDb($db);

class mysql{
	function isConnectDb($db) {
		$conng = @mysql_connect($db['host'].':'.$db['port'],$db['user'],$db['pass']);
		//Set encoding
		mysql_query("SET CHARSET utf8");
		mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
		if(!$conng){
			die('Not connected :' . mysql_error());
			exit;
		}
		$selc = mysql_select_db($db['name'],$conng); // 접근한 계정으로 사용할 수 있는 DB 선택
		// 연결 식별자($conng) 는 생략 가능하며, 생략시 가장 최근에 설정한 연결 식별자가 사용된다.
		return $selc ? $conng : false;
	} // */
}
?>
