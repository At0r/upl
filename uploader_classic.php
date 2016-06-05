<?php

include_once("include/config.php");

define(UPLOAD_NAME, $_FILES['upload_file']['name']);
define(FOLDER_TAG, $_POST['tagfolder']);
define(POST_FILENAME, $_POST['filename']);
define(TMP_NAME, $_FILES['upload_file']['tmp_name']);

$tagpatch = "";
$error_line = false;


// folder check
if (FOLDER_TAG != "") {
	$tag_path = htmlspecialchars(mb_strtolower(FOLDER_TAG))."/";
	mkdir($upload_directory . $tag_path, 0777, true);

	if (file_exists($upload_directory . $tag_path)) {
		$upload_directory = $upload_directory . $tag_path;
	}
}

// file name
if ((!empty(POST_FILENAME)) && (!file_exists($uploaddir . POST_FILENAME))) {
	$final_file_name = htmlspecialchars(POST_FILENAME);
	$uploadfile = $upload_directory . $final_file_name;
}
else {
	$salt = rand(100,900) . rand(100,400) . rand(300,900);
	$uploadfile = $upload_directory . $salt . htmlspecialchars(basename(UPLOAD_NAME));
	$final_file_name = $salt . htmlspecialchars(basename(UPLOAD_NAME));
}


// Upload check
if (!move_uploaded_file(TMP_NAME, $uploadfile)) {
	$error_line = true;
}

// debug
//print_r($_FILES);

//OUTPUT via GET

($error_line)
	? $get_q = "error=1"
	: $get_q = "result=" . $tag_path . $final_file_name;


header('Location: '.URL_PATH.'?'.$get_q);
exit;

?>
