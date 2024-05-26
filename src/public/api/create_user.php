<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/login.php";
include_once $_SERVER["DOCUMENT_ROOT"] .'/../database/database.php';
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/hash_password.php";

if (!verify_access($_COOKIE[$AUTH_COOKIE], array(3))) {
	header("Location: ../error.html");
	exit();
}

$user = $_POST;
$hash_salt = hash_password($user["password"]);
$user["password"] = $hash_salt["hash"];
$user["salt"] = $hash_salt["salt"];

regiser_user($user) or die("Не удалось зарегистрировать пользователя");

printf("Пользователь %s успешно зарегистрирован", $user["login"]);
?>
