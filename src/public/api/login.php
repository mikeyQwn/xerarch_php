<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/../database/database.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/login.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/../utils/hash_password.php";
include_once $_SERVER["DOCUMENT_ROOT"] .'/../constants.php';

$login_info = login($_POST["login"], $_POST["password"]);
if ($login_info["ok"]) {
	$cookie = $login_info["cookie"];
	setcookie($AUTH_COOKIE, $cookie, time() + 3600, "/");
	$role_id = $login_info["role_id"];
	if ($role_id == 1) {
		header("Location: ../professor/index.php");
		exit();
	}
	if ($role_id == 2) {
		header("Location: ../student/index.php");
		exit();
	}
	if ($role_id == 3) {
		header("Location: ../moderator/index.php");
		exit();
	}
} 
header("Location: ../error.html");
exit();
?>
