<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/hash_password.php";

$user_info = auth_middleware(array(1));
$contents = file_get_contents($_FILES["upload"]["tmp_name"]);
$lesson = array(
	"course_id" => $_POST["course_id"],
	"name" => $_POST["name"],
	"full_text" => $contents,
);
add_lesson(str_replace('\n', '\r\n', $lesson)) or die("Не удалось добавить лекцию");

echo "Лекция добавлена!";
?>
