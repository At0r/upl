<?php
header("Content-Type: text/html; charset=UTF-8"); 
?>
<center><a href="/upl/">uploader</a> -- <a href="/upl/?editor=1">editor</a>

<?php if (!empty($_GET["editor"])) {
	include "include/_edit_ext_form.php";
}

if ((!empty($_GET["error"])) || (!empty($_GET["result"]))) {
	include("include/_result.php");
	exit;	
}

(!empty($_GET["editor"])) 
	? include("include/_editor.php")
	: include("include/_upload.php");

?>
