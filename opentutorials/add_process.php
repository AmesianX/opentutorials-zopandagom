<?php
// 1. 데이터베이스 서버에 접속
$link = mysql_connect('localhost', 'root', 'zopan0129');
if (!$link) {
	die('Could not connect: ' . mysql_error());
}
// 2. 데이터베이스 선택
mysql_select_db('opentutorials');
mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

// $sql = 'INSERT INTO `topic` (`title`, `description`, `created`) VALUES (\'' . mysql_real_escape_string($_POST['title']) . '\', \'' . mysql_real_escape_string($_POST['description']) . '\', NOW())';
$sql = "INSERT INTO topic (title, description, created) VALUES ('". $_POST['title'] . "', '". $_POST['description'] . "', NOW())";
$result = mysql_query($sql);
// if (!$result) {
if (mysql_affected_rows()!=1){
	$message = '오류: ' . mysql_error() . "\n";
	$message .= '쿼리: ' . $sql;
	echo $message;
	// die($message);
} else {
	echo "
		<script>
			alert('insert!!!');
			location.href=\"index.php?id=" . mysql_insert_id() . "\";
		</script>
	";
}
?>
