<?php

if (!empty($_POST["openadress"])) {
	include_once("include/_edit_existing.php");
}

?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=500" initial-scale=1.0 />
<meta name="HandheldFriendly" content="true" />
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Editor 1.0</title>
</head>	
<body>
	<div style="position:absolute; width:100%; top:20%; text-align:center; font-size:20pt; font-family:monospace;">	

	<form action="saver.php" method="POST" id="q3"> 
    Создать заметку:<br />
    Ссылка: &nbsp;&nbsp;<input name="link-name" type="text" <?php if (!empty($ext_link)) { echo 'value="'.$ext_link.'"'; } ?>><br />
    <textarea name="memo" wrap="soft" cols="35" rows="10"> <?php if (!empty($ext_content)) { echo $ext_content; } ?></textarea><br />
    <input type="reset" value="Сброс" /><input type="submit" value="Сделать запрос" />
    <br />
     <label><input type="checkbox" name="remove" value="del">Удалить?</label>
    <br />
    <label><input type="checkbox" name="replace" value="yes" <?php if (!empty($ext_content)) { echo 'checked="checked"'; } ?> >Обновить?</label>
    <br />
    <label><input type="checkbox" name="blank" value="yes" <?php if ($ext_fullsize) { echo 'checked="checked"'; } ?>>blank?</label>
	</form>	
	
	</div>	
</body>
</html>
