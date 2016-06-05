<?php
	
include_once("include/config.php");
	
$link = mysql_connect(DB_HOST, NAME, PASSWD)
    or die('Не удалось соединиться: ' . mysql_error());

mysql_select_db(DB_DB_NAME) or die('Не удалось выбрать базу данных');



?>
