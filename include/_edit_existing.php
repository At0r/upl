<?php
include_once("include/config.php");	

function br2nl($str) {
$str = preg_replace("/(rn|n|r)/", "", $str);
return preg_replace("=<br */?>=i", "n", $str);
}

include_once "include/_db_connect.php";

(substr($_GET["openadress"], -1) == "/")
? $tmp_line = mysql_real_escape_string(substr($_POST["openadress"], 0, -1))
: $tmp_line = mysql_real_escape_string($_POST["openadress"]);

$query = "SELECT * FROM ".DB_TABLENAME." WHERE link='".$tmp_line."'";
$result = mysql_query($query);
$raw = mysql_fetch_row($result);

if (empty($raw)) {
	mysql_free_result($result);
	mysql_close($link);
	header('Location: '.URL_PATH.'?editor=1&error=Не удалось загрузить запись '.$tmp_line);
	exit;
}
else {
	$ext_content = $raw[3];
	$ext_fullsize = ($raw[4] == "true") ? true : false;
	$ext_link = $tmp_line;
	
}

	mysql_free_result($result);
	mysql_close($link);
	

?>
