<?php
//header("Content-Type: text/html; charset=UTF-8");
include_once("include/config.php");

define(BACK_URL_ERROR, URL_PATH."?editor=1&error=");
define(BACK_URL_RESULT, URL_PATH."?editor=1&result=");

if (empty($_POST["link-name"])) {
	header('Location: '.BACK_URL_ERROR.'Ошибка в доступе.');
	exit;
}

$blank_page_sql = ($_POST["blank"] == "yes") ? "true" : "false";


include_once "include/_db_connect.php";

define(POST_LINK, mysql_real_escape_string($_POST["link-name"]));
define(POST_MEMO, nl2br(mysql_real_escape_string($_POST["memo"])));

$raw = mysql_fetch_row(mysql_query("SELECT * FROM ".DB_TABLENAME." WHERE link='".POST_LINK."'"));
$force_update = (!empty($raw)) ? true : false;
mysql_free_result($raw);


if ($_POST["remove"] == "del") {
	$sql = "DELETE FROM `".DB_TABLENAME."` WHERE link = '".POST_LINK."'";
	(mysql_query($sql))
		? header('Location: '.BACK_URL_RESULT.'Успешно удалена запись с адресом '.POST_LINK)
		: header('Location: '.BACK_URL_ERROR.'При удалении произошла ошибка!');
	mysql_close($link);
	exit;
}
elseif (($_POST["replace"] == "yes") || ($force_update)) {
	$sql = "UPDATE `".DB_TABLENAME."` SET content = '".POST_MEMO."', notes = '".$blank_page_sql."' WHERE link = '".POST_LINK."'";
	(mysql_query($sql))
		? header('Location: '.BACK_URL_RESULT.'Успешно обновлена запись с адресом '.POST_LINK)
		: header('Location: '.BACK_URL_ERROR.'Ошибка при обновлении');
	mysql_close($link);
	exit;
}
else {
	$sql = "INSERT INTO `".DB_TABLENAME."` (`id`, `link`, `caption`, `content`, `notes`) VALUES (NULL, '".POST_LINK."', 'via_form', '".POST_MEMO."', '".$blank_page_sql."')";
	(mysql_query($sql))
       ? header('Location: '.BACK_URL_RESULT.'Успешно создана запись с адресом '.POST_LINK)
	   : header('Location: '.BACK_URL_ERROR.'Ошибка при записи в базу!');
    mysql_close($link);
    exit;
    }
 ?>
