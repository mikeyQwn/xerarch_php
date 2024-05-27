<?php
include_once $_SERVER["DOCUMENT_ROOT"] .'/../utils/auth.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/hash_password.php";

$user_info = auth_middleware(array(1));

add_access($_POST['course_id'], $_POST['login']) or die("Не удалось добавить доступ");

echo "Доступ выдан";
?>
