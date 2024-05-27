<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/hash_password.php";

$user_info = auth_middleware(array(1));

$course_id = $_POST['course_id'];
$login = $_POST['login'];

if (has_access_by_login($course_id, $login)) {
	echo "Доступ уже был выдан!";
	exit();
};
add_access($course_id, $login) or die("Не удалось добавить доступ");

echo "Доступ выдан";
?>
