<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8" />
	<meta name="HandheldFriendly" content="true" />
	<meta name="viewport" content="width=650" initial-scale=1.0 />

  <link rel="stylesheet" type="text/css" href="style.css" />
  <title>RESULT</title>
</head>
<body><div style="position:absolute; width:100%; top:35%; text-align:center; font-size:20pt; font-family:monospace;">
<br /><br />
<?php
include_once("include/config.php");

define(GET_EDITOR, $_GET["editor"]);
define(GET_ERROR, htmlspecialchars($_GET["error"]));
define(GET_RESULT, htmlspecialchars($_GET["result"]));
	
if (empty(GET_EDITOR)) {
	if (!empty(GET_ERROR)) {
		echo "При загрузке что-то пошло не так";
		$link = "Попробовать снова?";
	}
	elseif (!empty(GET_RESULT)) { 
		echo "Файл успешно загружен:<br />"; ?>
		<input name="filename" type="text" size="45" onClick="this.setSelectionRange(0, this.value.length)" value="https://i.atorero.com/<?php echo GET_RESULT; ?>"> <?php
		$link = "Загрузить еще файл?";
	}
	else {
		echo "WTF???";
		$link = "назад";
	}
	
}	
else {
	
	if (!empty(GET_ERROR)) {
		echo GET_ERROR;
		$link = "Веруться назад";
	}
	elseif (!empty(GET_RESULT)) {
		echo GET_RESULT;
		$link = "В начало";
	}
}
?>

 <br /><br />
 <a href="<?php echo (empty(GET_EDITOR)) ? URL_PATH : URL_PATH."?editor=1"; ?>"><?php echo $link; ?></a>

</div></body>
</html> 
