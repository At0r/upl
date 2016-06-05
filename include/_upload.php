<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width" initial-scale=1.0 />
<meta name="HandheldFriendly" content="true" />
	<script src="dropzone.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<title>Uploader 1.0</title>
</head>	
<body>
	<div style="position:absolute; width:100%; top:40%; text-align:center; font-size:20pt; font-family:monospace;">	

	<form enctype="multipart/form-data" action="uploader_classic.php" method="POST" id="q2"> 
    Отправить файл:<br /><input name="upload_file" type="file" size="10" /><br />
    Имя: &nbsp;&nbsp;<input name="filename" type="text" onClick="this.setSelectionRange(0, this.value.length)" value="<?php echo date("Y-m-d-His").".jpg"; ?>"><br />
    Папка: <input name="tagfolder" type="text"><br />
    <input type="submit" value="Отправить файл" />
	</form>	
	
	</div>	
</body>
</html>
